<?php

namespace App\Http\Controllers\HRAdmin;

use App\Models\User;
use App\Jobs\SendEmailJob;
use App\Models\EmployeeDemo;
use Illuminate\Http\Request;
use App\Models\NotificationLog;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class NotificationController extends Controller
{
    //
    public function index(Request $request) {

        if($request->ajax()){

            $date_sent_from = $request->get('date_sent_from') ? $request->get('date_sent_from') : '1900-01-01';
            $date_sent_to = $request->get('date_sent_to') ?  $request->get('date_sent_to') : '2099-12-31';
            $recipients = $request->get('recipients') ? $request->get('recipients') : '';
            $alert_format = $request->get('alert_format');

            $notifications = NotificationLog::when($date_sent_from, function ($query) use($date_sent_from, $date_sent_to) {
                    $query->whereBetween('date_sent', [$date_sent_from, $date_sent_to] );
                })
                ->whereHas('recipients.recipient', function ($query) use($recipients) { 
                        $query->whereRaw("lower(name) like  '%". strtolower($recipients) . "%'"); 
                })
                ->when($alert_format, function ($query) use($alert_format) {
                        $query->where('alert_format', $alert_format);
                })
                // ->when($recipients, function ($query, $recipients) {
                //     $query->whereHas('notification_log_recipients', function ($query) use ($recipients){
                //         $query->where('name', 'like', '%'.$recipients.'%');
                //     })
                // })
                ->select(['id', 'subject', 'recipients', 'alert_type', 'alert_format', 'description','date_sent','created_at'])
                ->with(['recipients'])
                ->orderBy('created_at','desc');

            return Datatables::of($notifications)
                // ->filter(function ($query) use ($request) {
                //     if ($request->has('name')) {
                //         $query->where('name', 'like', "%{$request->get('name')}%");
                //     }

                //     if ($request->has('email')) {
                //         $query->where('email', 'like', "%{$request->get('email')}%");
                //     }
                // })
                ->addColumn('alert_type_name', function ($notification) {
                    return $notification->alert_type_name(); 
                })
                ->addColumn('alert_format_name', function ($notification) {
                     return $notification->alert_format_name(); 
                })
                ->addColumn('recipients', function ($notification) {
                    $userIds = $notification->recipients()->pluck('recipient_id')->toArray();
                    $users = User::whereIn('id', $userIds)->pluck('name');
                     return implode('; ', $users->toArray() );
                })
                ->addColumn('action', function ($notification) {

                    return '<a href="#" class="notification-modal btn btn-xs btn-primary" value="'. $notification->id .'"><i class="glyphicon glyphicon-envelope"></i>View</a>';
                })
                //->removeColumn('password')
                ->make(true);
        }

        $alert_format_list = NotificationLog::ALERT_FORMAT;

        return view('hradmin.notifications.index', compact('alert_format_list') );

    }

    public function show(Request $request) 
    {
     
        $notificationLog = NotificationLog::where('id', $request->notification_id)->first();

        if($request->ajax()){
            return view('hradmin.notifications.partials.show', compact('notificationLog') ); 
        } 
     
    }

    public function notify(Request $request) 
    {

        $alert_format_list = NotificationLog::ALERT_FORMAT;

        $organization_list = $this->getOrgLevel0();

        return view('hradmin.notifications.notify', compact('alert_format_list','organization_list') );
    }

    public function send(Request $request) 
    {

        // array for build the select option on the page
        if ($request->recipients) {
            $recipients = User::whereIn('id', $request->recipients)->pluck('name','id');
            $request->session()->flash('old_recipients', 
                 $recipients
            );
        }

        if ($request->sender_id) {
            $sender_ids = User::whereIn('id', array($request->sender_id) )->pluck('name','id');
            $request->session()->flash('old_sender_ids', 
                 $sender_ids
            );
        }

        //setup Validator and passing request data and rules
        $validator = Validator::make(request()->all(), [
            'sender_id'          => 'required',
            'recipients'         => 'required',
            'subject'            => 'required',
            'body'               => 'required',
        ]);

        //hook to add additional rules by calling the ->after method
        $validator->after(function ($validator) {
            if (request('sender_id')) {
                $user = User::find(request('sender_id'));
                if ( !($user->azure_id) ) {
                    $validator->errors()->add('sender_id', 'The selected sender is not an Azure AD user.'); 
                }
            }
        });
    
        //run validation which will redirect on failure
        $validator->validate();

        // Send a notification to all participants that you would like to schedule a conversation 
        //$toAddresses = User::whereIn('id', $request->recipients)->pluck('email');
        $current_user = User::find(Auth::id());

        // Method 1: Real-Time
        // $sendMail = new \App\MicrosoftGraph\SendMail();
        // $sendMail->toRecipients = $request->recipients;
        // $sendMail->sender_id = $request->sender_id;
        // $sendMail->subject = $request->subject;
        // $sendMail->body = $request->body;
        // $sendMail->alertFormat = $request->alert_format;
        // $response = $sendMail->sendMailWithoutGenericTemplate();
        // if ($response->getStatus() == 202) {
        //     return redirect()->route('hradmin.notifications.notify')
        //         ->with('success','Email with subject "' . $request->subject  . '" was successfully sent.');
        // }

        // Method 2: Using Queue
        $sendEmailJob = new SendEmailJob();
        $sendEmailJob->toRecipients = $request->recipients;
        $sendEmailJob->sender_id = $request->sender_id;
        $sendEmailJob->subject = $request->subject;
        $sendEmailJob->body = $request->body;
        $sendEmailJob->alertFormat = $request->alert_format;
        dispatch($sendEmailJob);

        return redirect()->route('hradmin.notifications.notify')
            ->with('success','Job for sending email with subject "' . $request->subject  . '" was successfully dispatched.');
    

    }

    public function getUsers(Request $request)
    {

        $search = $request->search;
        //return $this->respondeWith(User::where('name', 'LIKE', "%{$search}%")->paginate());


        $users =  User::whereRaw("lower(name) like '%". strtolower($search)."%'")
                    ->whereNotNull('email')->paginate();

        return ['data'=> $users];
                  
    }


    protected function getOrgLevel0() {

    return EmployeeDemo::whereNotIn('organization',['',' '])->select('organization')->groupBy('organization')->pluck('organization');

    } 

}

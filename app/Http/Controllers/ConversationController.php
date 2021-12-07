<?php

namespace App\Http\Controllers;

use App\Http\Requests\Conversation\ConversationRequest;
use App\Http\Requests\Conversation\SignoffRequest;
use App\Http\Requests\Conversation\UnSignoffRequest;
use App\Http\Requests\Conversation\UpdateRequest;
use App\Models\Conversation;
use App\Models\ConversationParticipant;
use App\Models\ConversationTopic;
use App\Models\Participant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authId = Auth::id();

        $conversationMessage = Conversation::warningMessage();
        $conversationTopics = ConversationTopic::all();
        $participants = Participant::all();
        $query = Conversation::with('conversationParticipants');
        $type = 'upcoming';
        if ($request->is('conversation/past')) {
            $conversations = $query->where(function($query) use ($authId) {
                $query->where('user_id', $authId)->
                    orWhereHas('conversationParticipants', function($query) use ($authId) {
                    return $query->where('participant_id', $authId);
                });
            })->whereNotNull('signoff_user_id')->whereNotNull('supervisor_signoff_id')->orderBy('date', 'asc')->paginate(10);
            $type = 'past';
        } else {
            $conversations = $query->where(function($query) use ($authId) {
                $query->where('user_id', $authId)->
                    orWhereHas('conversationParticipants', function($query) use ($authId) {
                        return $query->where('participant_id', $authId);
                    });
            })->where(function($query) {
                $query->whereNull('signoff_user_id')
                    ->orWhereNull('supervisor_signoff_id');
            })->orderBy('date', 'asc')->paginate(10);
        }

        return view('conversation.index', compact('type', 'conversations', 'conversationTopics', 'participants', 'conversationMessage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ConversationRequest $request)
    {
      
        DB::beginTransaction();
        $isDirectRequest = true;
        if(route('my-team.my-employee') == url()->previous()) {
            $isDirectRequest = false;
        }

        $actualOwner = $isDirectRequest ? Auth::id() : $request->owner_id ?? Auth::id();

        $conversation = new Conversation();
        $conversation->conversation_topic_id = $request->conversation_topic_id;
        // $conversation->comment = $request->comment ?? '';
        $conversation->user_id = $actualOwner;
        $conversation->date = $request->date;
        $conversation->time = $request->time;
        $conversation->save();

        foreach ($request->participant_id as $key => $value) {
            ConversationParticipant::updateOrCreate([
                'conversation_id' => $conversation->id,
                'participant_id' => $value,
            ]);
        }

        if(!in_array($actualOwner, $request->participant_id)) {
            ConversationParticipant::updateOrCreate([
                'conversation_id' => $conversation->id,
                'participant_id' => $actualOwner,
            ]);
        }
        DB::commit();
        if(request()->ajax()){
            return response()->json(['success' => true, 'message' => 'Conversation Created successfully']);
        }else{
            return redirect()->route('conversation.upcoming');
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Conversation $conversation)
    {
        $conversation->topics = ConversationTopic::all();

        return $conversation;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Conversation $conversation)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Conversation $conversation)
    {
        if ($request->field != 'conversation_participant_id') {
            $conversation->{$request->field} = $request->value;
        } elseif ($request->field == 'conversation_participant_id') {
            ConversationParticipant::where('conversation_id', $conversation->id)->delete();
            foreach ($request->value as $key => $value) {
                ConversationParticipant::updateOrCreate([
                    'conversation_id' => $conversation->id,
                    'participant_id' => $value,
                ]);
            }
        }

        $conversation->update();

        return $conversation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conversation $conversation)
    {
        $conversation->delete();

        return redirect()->back();
    }

    public function signOff(SignoffRequest $request, Conversation $conversation)
    {
        $user = User::find(Auth::id());
        if ($user->hasRole('Supervisor')) {
            $conversation->supervisor_signoff_id = Auth::id();
            $conversation->supervisor_signoff_time = Carbon::now();
        } else {
            $conversation->signoff_user_id = Auth::id();
            $conversation->sign_off_time = Carbon::now();
        }
        $conversation->update();

        return response()->json(['success' => true, 'Message' => 'Sign Off Successfull', 'data' => $conversation]);
    }

    public function unsignOff(UnSignoffRequest $request, Conversation $conversation)
    {
        $conversation->signoff_user_id = null;
        $conversation->update();

        return
        response()->json(['success' => true, 'Message' => 'UnSign Successfull', 'data' => $conversation]);;
    }

    public function templates(Request $request) {
        $query = new ConversationTopic; 
        if ($request->has('search') && $request->search) {
            $query = $query->where('name', 'LIKE', "%$request->search%");
        }
        $templates = $query->get();
        $searchValue = $request->search ?? '';
        $conversationMessage = Conversation::warningMessage();
        return view('conversation.templates', compact('templates', 'searchValue', 'conversationMessage'));
    }

    public function templateDetail($id) {
        $template = ConversationTopic::findOrFail($id);
        $allTemplates = ConversationTopic::all();
        $participants = Auth::user()->reportees()->get();
        $reportingManager = Auth::user()->reportingManager()->get();
        $participants = $participants->toBase()->merge($reportingManager);
        return view('conversation.partials.template-detail-modal-body', compact('template','allTemplates','participants','reportingManager'));
    }
}

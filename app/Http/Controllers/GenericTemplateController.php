<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GenericTemplate;

use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;

use App\MicrosoftGraph\TokenCache;
use App\Models\GenericTemplateBind;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class GenericTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $search = $request->q;

        if (isset($search)) {
            //dd($request->search);
            $generic_templates = GenericTemplate::where('template', 'like', '%'. $search .'%')
                ->orWhere('description', 'like', '%'. $search .'%')
                ->orderBy('template')->paginate(10);

            $generic_templates->appends(['q' => $request->q ]);

        } else {
            // get all the record 
            $generic_templates = GenericTemplate::orderBy('template')->paginate(10);
        }   

        // load the view and pass the sharks
        return view('admin.generictemplate.index', compact('generic_templates','search'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.generictemplate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //setup Validator and passing request data and rules
        $validator = Validator::make(request()->all(), [
            'template'           => 'required|min:10|max:30|unique:generic_templates,template',
            'description'        => 'required|max:250',
            'instructional_text' => 'required',
            'sender'             => 'required',
            'email'              => '',
            'subject'            => 'required',
            'body'               => 'required',
        ]);


        //hook to add additional rules by calling the ->after method
        $validator->after(function ($validator) {
            
            if ( request('sender') == 1 && (!(empty(request('email')))) ) {
                $validator->errors()->add('email', 'To supply email, the sender field must be set to Other.'); 
            }

            if ( request('sender') == 2 && (empty(request('email'))) ) {
                $validator->errors()->add('email', 'The email field is required.'); 
            }

            if ( str_contains( request('template') ?? '', ' ')) {
                $validator->errors()->add('template', 'The template name contains space.');
            }
    
            if (preg_match('/[a-z]/', request('template') ,$matches)) {
                $validator->errors()->add('template', 'The template name must be upper case.');
            }

            //
            $binds = request('binds');
            $descriptions = request('descriptions');
            for ($i=0; $i < count($binds); $i++) {
                if ($binds[$i] != '' && empty($descriptions[$i]) ) {
                    $validator->errors()->add('description' .$i, 'required.');
                }
                if (empty($binds[$i])  && $descriptions[$i] != '' ) {
                    $validator->errors()->add('bind' .$i, 'required.');
                }
                if (empty($binds[$i]) && empty($descriptions[$i]) ) {
                    $validator->errors()->add('bind' .$i, 'required.');
                    $validator->errors()->add('description' .$i, 'required.');
                }
            }

            // Validate detail
            $collection = collect( request('binds') );
            $collection = $collection->duplicates();
  
             if ($collection) {
                foreach ($collection->all() as $key => $value) {
                    $validator->errors()->add('bind' .$key, 'duplicate bind.');
                }
            }
        });

        //run validation which will redirect on failure
        $validator->validate();

        if ($request->email) {
            $email = $this->getAzureEmail($request->email);   
        }

        $generic_template = GenericTemplate::Create(
            [
            'template' => $request->template,
            'description' =>  $request->description,
            'instructional_text' => $request->instructional_text,
            'sender' => $request->sender,
            'email' => $email ?? '',
            'azure_id' => $request->email,
            'subject' => $request->subject,
            'body' => $request->body,
            'created_by_id' => Auth::id(),
            ]
        );

    
        $binds = $request->input('binds', []);
        $descriptions = $request->input('descriptions', []);
        for ($i=0; $i < count($binds); $i++) {
            if ($binds[$i] != '') {
                $generic_template->binds()->create([
                    'seqno' => $i,
                    'bind' => $binds[$i], 
                    'description' => $descriptions[$i],
                ]);        
            }
        }

        return redirect()->route('generic-template.index')
            ->with('success','Template' . $request->template  . ' created successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $generic_template = GenericTemplate::find($id);

        // show the view and pass the campaign year to it
        return view('admin.generictemplate.show', compact('generic_template'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $generic_template = GenericTemplate::find($id);

        $generic_template->load('binds');

        // show the view and pass the campaign year to it
        return view('admin.generictemplate.edit', compact('generic_template'));
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

         //setup Validator and passing request data and rules
         $validator = Validator::make(request()->all(), [
            'template'           => 'required|min:10|max:30',
            'description'        => 'required|max:250',
            'instructional_text' => 'required',
            'sender'             => 'required',
            'email'              => '',
            'subject'            => 'required',
            'body'               => 'required',
        ]);

        //hook to add additional rules by calling the ->after method
        $validator->after(function ($validator) {

            if ( request('sender') == 1 && (!(empty(request('email')))) ) {
                $validator->errors()->add('email', 'To supply email, the sender field must be set to Other.'); 
            }

            if ( request('sender') == 2 && (empty(request('email'))) ) {
                $validator->errors()->add('email', 'The email field is required.'); 
            }

            if ( str_contains( request('template') ?? '', ' ')) {
                $validator->errors()->add('template', 'The template name contains space.');
            }
    
            if (preg_match('/[a-z]/', request('template') ,$matches)) {
                $validator->errors()->add('template', 'The template name must be upper case.');
            }

            //
            $binds = request('binds');
            $descriptions = request('descriptions');
            for ($i=0; $i < count($binds); $i++) {
                if ($binds[$i] != '' && empty($descriptions[$i]) ) {
                    $validator->errors()->add('description' .$i, 'required.');
                }
                if (empty($binds[$i])  && $descriptions[$i] != '' ) {
                    $validator->errors()->add('bind' .$i, 'required.');
                }
                if (empty($binds[$i]) && empty($descriptions[$i]) ) {
                    $validator->errors()->add('bind' .$i, 'required.');
                    $validator->errors()->add('description' .$i, 'required.');
                }
            }

            // Validate detail
            $collection = collect( request('binds') );
            $collection = $collection->duplicates();
  
             if ($collection) {
                foreach ($collection->all() as $key => $value) {
                    $validator->errors()->add('bind' .$key, 'duplicate bind.');
                }
            }
        });

        //run validation which will redirect on failure
        $validator->validate();

        if ($request->email) {
            $email = $this->getAzureEmail($request->email);   
        }

        $generic_template = GenericTemplate::find($id);
        $generic_template->update([
            'description' =>  $request->description,
            'instructional_text' => $request->instructional_text,
            'sender' => $request->sender,
            'email' => $email ?? '',
            'azure_id' => $request->email,
            'subject' => $request->subject,
            'body' => $request->body,
            'modified_by_id' => Auth::id(),
        ]);

        // Update 
        foreach ($generic_template->binds as $bind) {
            $bind->delete();
        }

        $binds = $request->input('binds', []);
        $descriptions = $request->input('descriptions', []);
        for ($i=0; $i < count($binds); $i++) {
            if ($binds[$i] != '') {
                $generic_template->binds()->create([
                    'seqno' => $i,
                    'bind' => $binds[$i], 
                    'description' => $descriptions[$i],
                ]);        
            }
        }

        return redirect()->route('generic-template.index')
            ->with('success','Template' . GenericTemplate::find($id)->template  . ' updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getUsers(Request $request)
    {
        
        $tokenCache = new TokenCache();
        $accessToken = $tokenCache->getAccessToken();
    
        // Create a Graph client
        $graph = new Graph();
        $graph->setAccessToken($accessToken);

        $queryParams = array(
           '$select' => 'id,displayName,mail,userPrincipalName',
           //'$filter'  =>  "startswith(displayName,'". $request->q . "')",
           //'$search'  =>  '"displayName:' . $request->q . '"',
           '$orderby' => 'displayName'
         );
     
       if (trim($request->q)) {
           $queryParams['$search'] = '"displayName:' . trim($request->q) . '"';
       }
  
        // test User  API https://graph.microsoft.com/v1.0/users
       $getUsersUrl = '/users?'.http_build_query($queryParams);
       $users = $graph->createRequest('GET', $getUsersUrl)
              ->addHeaders(['ConsistencyLevel'=> 'eventual'])
               ->setReturnType(Model\User::class)
               ->execute();

        $formatted_users = [];
        foreach ($users as $user) {
             $formatted_users[] = [
                    'id' => $user->getId(), 
                    //'text' => $user->getDisplayName() . ' (' . $user->getMail() . ')',
                    'text' => $user->getMail(),
            ];
        }

        // return "[{'id':31,'name':'Abc'}, {'id':32,'name':'Abc12'}, {'id':33,'name':'Abc123'},{'id':34,'name':'Abc'}]";
        return response()->json($formatted_users);

    }

    public function getAzureEmail($id)
    {
        $tokenCache = new TokenCache();
        $accessToken = $tokenCache->getAccessToken();
    
        // Create a Graph client
        $graph = new Graph();
        $graph->setAccessToken($accessToken);

        
        $user = $graph->createRequest('GET', '/users/' . $id)
            ->setReturnType(Model\User::class)
            ->execute();

        return $user->getMail();
       
    }


}

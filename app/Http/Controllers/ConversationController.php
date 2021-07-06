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
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $freshWarning = Conversation::hasNotYetScheduledConversation(Auth::id());
        $showWarning = false;
        if (!$freshWarning) {
            $showWarning = Conversation::hasNotDoneAtleastOnceIn4Months();
        }
        $conversationTopics = ConversationTopic::all();
        $participants = Participant::all();
        $query = Conversation::with('conversationParticipants');
        $type = 'upcoming';
        if ($request->is('conversation/past')) {
            $conversations = $query->whereNotNull('signoff_user_id')->orderBy('date', 'asc')->paginate(10);
            $type = 'past';
        } else {
            $conversations = $query->whereNull('signoff_user_id')->orderBy('date', 'asc')->paginate(10);
        }

        return view('conversation.index', compact('type', 'conversations', 'conversationTopics', 'participants', 'showWarning', 'freshWarning'));
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
        $conversation = new Conversation();
        $conversation->conversation_topic_id = $request->conversation_topic_id;
        // $conversation->comment = $request->comment ?? '';
        $conversation->user_id = Auth::id();
        $conversation->date = $request->date;
        $conversation->time = $request->time;
        $conversation->save();

        foreach ($request->participant_id as $key => $value) {
            ConversationParticipant::updateOrCreate([
                'conversation_id' => $conversation->id,
                'participant_id' => $value,
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Conversation Created successfully']);
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
        $conversation->signoff_user_id = Auth::id();
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
}

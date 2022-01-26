<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\ConversationParticipant;

class ConversationSeeder_Additional_20220126 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 111003, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 111002 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 111003, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 111002 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 111003, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 111002 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 111003, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 111002 ]);






    }
}

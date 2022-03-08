<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\ConversationParticipant;

class ConversationSeeder_Additional_20220308 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120077, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120079 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120077, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120079 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120077, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120079 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120077, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120079 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120003, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120032 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120008, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120032 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120015, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120032 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120003, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120032 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120045, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120044 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120045, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120044 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120050, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120044 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120050, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120044 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120048, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120047 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120048, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120047 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120071, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120047 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120071, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120047 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120054, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120064 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120054, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120064 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120056, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120064 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120056, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120064 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120058, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120065 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120058, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120065 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120060, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120065 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120060, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120065 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120062, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120066 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120062, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120066 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120062, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120066 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120062, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120066 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120052, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120075 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120052, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120075 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120073, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120075 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120073, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120075 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120067, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120076 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120067, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120076 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120069, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120076 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120069, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120076 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120079, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120078 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120079, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120078 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120079, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120078 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120079, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120078 ]);



    }
}

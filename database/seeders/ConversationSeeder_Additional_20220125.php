<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\ConversationParticipant;

class ConversationSeeder_Additional_20220125 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 110086, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110084 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 110086, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110084 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 110086, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110084 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 110086, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110084 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 110092, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110086 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 110092, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110086 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 110092, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110086 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 110092, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110086 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 110088, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110087 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 110088, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110087 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 110088, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110087 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 110088, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110087 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 110089, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110092 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 110090, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110092 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 110091, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110092 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 110089, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110092 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 110093, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110094 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 110093, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110094 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 110093, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110094 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 110093, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 110094 ]);




    }
}

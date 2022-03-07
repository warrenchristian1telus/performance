<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\ConversationParticipant;

class ConversationSeeder_Additional_20220307 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120010, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120000 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120010, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120000 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120013, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120000 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120013, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120000 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120019, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120005 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120019, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120005 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120024, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120005 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120024, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120005 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120016, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120008 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120016, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120008 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120028, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120008 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120028, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120008 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120000, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120015 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120002, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120015 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120005, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120015 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120021, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120015 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120022, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120015 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120036, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120015 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120037, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120015 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120009, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120016 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120014, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120016 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120018, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120016 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120023, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120016 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120031, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120016 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120026, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120022 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120026, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120022 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120034, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120022 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120034, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120022 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120004, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120023 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120004, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120023 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120027, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120023 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120027, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120023 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120007, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120024 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120025, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120024 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120033, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120024 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120007, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120024 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120001, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120028 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120006, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120028 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120017, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120028 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120001, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120028 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120020, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120030 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120020, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120030 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120020, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120030 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120020, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120030 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120030, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120036 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120030, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120036 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120030, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120036 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120030, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120036 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120011, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120037 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120012, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120037 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120029, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120037 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120035, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120037 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120039, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120040 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120039, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120040 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120039, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120040 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120039, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120040 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120042, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120041 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120042, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120041 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120042, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120041 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120042, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120041 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120046, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120045 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120046, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120045 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120046, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120045 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120046, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120045 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120049, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120048 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120049, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120048 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120049, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120048 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120049, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120048 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120051, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120050 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120051, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120050 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120051, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120050 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120051, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120050 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120053, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120052 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120053, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120052 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120053, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120052 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120053, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120052 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120055, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120054 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120055, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120054 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120055, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120054 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120055, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120054 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120057, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120056 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120057, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120056 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120057, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120056 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120057, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120056 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120059, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120058 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120059, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120058 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120059, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120058 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120059, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120058 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120061, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120060 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120061, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120060 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120061, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120060 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120061, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120060 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120063, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120062 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120063, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120062 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120063, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120062 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120063, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120062 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120068, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120067 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120068, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120067 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120068, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120067 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120068, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120067 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120070, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120069 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120070, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120069 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120070, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120069 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120070, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120069 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120072, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120071 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120072, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120071 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120072, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120071 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120072, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120071 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 120074, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120073 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 120074, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120073 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 120074, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120073 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 120074, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 120073 ]);


    }
}

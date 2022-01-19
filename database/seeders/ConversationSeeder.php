<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\ConversationParticipant;

class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            [
                'conversation_topic_id' => 1,
                'user_id' => 1,
                'date' => Carbon::now()->addDays(10),
                'time' => Carbon::now()
            ],
            [
                'conversation_topic_id' => 2,
                'user_id' => 1,
                'date' => Carbon::now()->addDays(14),
                'time' => Carbon::now()
            ],
            [
                'conversation_topic_id' => 3,
                'user_id' => 1,
                'date' => Carbon::now()->addDays(8),
                'time' => Carbon::now()
            ],
            [
                'conversation_topic_id' => 1,
                'user_id' => 1,
                'date' => Carbon::now()->subDays(10),
                'time' => Carbon::now()
            ],
            [
                'conversation_topic_id' => 2,
                'user_id' => 1,
                'date' => Carbon::now()->subDays(14),
                'time' => Carbon::now()
            ],
            [
                'conversation_topic_id' => 3,
                'user_id' => 1,
                'date' => Carbon::now()->subDays(8),
                'time' => Carbon::now()
            ],
        ];

        foreach ($list as $l) {
            $conversation = \App\Models\Conversation::updateOrCreate([
                'conversation_topic_id' => $l['conversation_topic_id'],
                'date' => $l['date'],
                'time' => $l['time'],
            ], $l);

                ConversationParticipant::updateOrCreate([
                    'conversation_id' => $conversation->id,
                    'participant_id' => rand(1,3)
                ]);
                ConversationParticipant::updateOrCreate([
                    'conversation_id' => $conversation->id,
                    'participant_id' => $conversation->user_id
                ]);
        }

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100003, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100002 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100003, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100002 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100003, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100002 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100003, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100002 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100006, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100005 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100006, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100005 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100006, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100005 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100006, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100005 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100009, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100008 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100010, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100008 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100011, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100008 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100012, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100008 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100015, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100014 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100018, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100014 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100027, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100014 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100030, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100014 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100035, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100014 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100043, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100014 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100020, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100015 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100020, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100015 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100042, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100015 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100042, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100015 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100016, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100018 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100028, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100018 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100038, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100018 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100026, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100018 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100024, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100019 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100024, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100019 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100024, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100019 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100024, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100019 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100019, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100020 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100019, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100020 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100019, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100020 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100019, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100020 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100026, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100025 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100029, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100025 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100031, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100025 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100032, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100025 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100036, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100025 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100039, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100025 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100025, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100027 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100025, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100027 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100025, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100027 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100025, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100027 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100023, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100028 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100023, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100028 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100023, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100028 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100023, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100028 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100017, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100030 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100017, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100030 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100021, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100030 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100021, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100030 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100040, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100038 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100040, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100038 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100040, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100038 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100040, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100038 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100022, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100042 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100037, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100042 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100037, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100042 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100022, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100042 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100033, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100043 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100034, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100043 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100041, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100043 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100034, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100043 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100046, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100045 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100047, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100045 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100048, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100045 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100049, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100045 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100050, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100045 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100053, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100052 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100053, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100052 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100054, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100052 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100055, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100052 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100058, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100055 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100058, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100055 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100058, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100055 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100058, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100055 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100061, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100060 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100061, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100060 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100061, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100060 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100061, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100060 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100061, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100062 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100061, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100062 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100061, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100062 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100061, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100062 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100065, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100064 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100066, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100064 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100066, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100064 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100068, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100064 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100071, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100070 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100071, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100070 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100071, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100070 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100071, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100070 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100076, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100075 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100077, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100075 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100077, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100075 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100076, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100075 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100078, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100076 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100079, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100076 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100080, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100076 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100080, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100076 ]);

        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 1, 'user_id' => 100083, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100082 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 2, 'user_id' => 100083, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100082 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 3, 'user_id' => 100083, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100082 ]);
        $conversation = \App\Models\Conversation::updateOrCreate([ 'conversation_topic_id' => 4, 'user_id' => 100083, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now(), ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $conversation->user_id ]);
        ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => 100082 ]);




    }
}

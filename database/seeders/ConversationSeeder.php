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
                'date' => Carbon::now()->addDays(10),
                'time' => Carbon::now(),
                'comment' => 'Nice Conversation lets continue tomorrow',
            ],
            [
                'conversation_topic_id' => 2,
                'date' => Carbon::now()->addDays(14),
                'time' => Carbon::now(),
                'comment' => 'Nice Conversation lets continue tomorrow',
            ],
            [
                'conversation_topic_id' => 3,
                'date' => Carbon::now()->addDays(8),
                'time' => Carbon::now(),
                'comment' => 'Nice Conversation lets continue tomorrow',
            ],
            [
                'conversation_topic_id' => 1,
                'date' => Carbon::now()->subDays(10),
                'time' => Carbon::now(),
                'comment' => 'Nice Conversation lets continue tomorrow',
            ],
            [
                'conversation_topic_id' => 2,
                'date' => Carbon::now()->subDays(14),
                'time' => Carbon::now(),
                'comment' => 'Nice Conversation lets continue tomorrow',
            ],
            [
                'conversation_topic_id' => 3,
                'date' => Carbon::now()->subDays(8),
                'time' => Carbon::now(),
                'comment' => 'Nice Conversation lets continue tomorrow',
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
                'participant_id' => rand(1,5)
            ]);
        }
    }
}

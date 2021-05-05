<?php

namespace Database\Seeders;

use App\Models\ConversationTopic;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
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
                'id' => 1,
                'name' => 'Performance Check-In',
            ],
            [
                'id' => 2,
                'name' => 'Goal Setting',
            ],
            [
                'id' => 3,
                'name' => 'Career Conversation',
            ],
            [
                'id' => 4,
                'name' => 'Performance Improvement',
            ],

        ];

        foreach ($list as $l) {
            ConversationTopic::updateOrCreate([
                'id' => $l['id'],
            ], $l);
        }
    }
}

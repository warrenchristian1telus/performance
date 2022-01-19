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
          [ 'conversation_topic_id' => 1, 'user_id' => 100002, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 2, 'user_id' => 100002, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 3, 'user_id' => 100002, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 4, 'user_id' => 100002, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 1, 'user_id' => 100005, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 2, 'user_id' => 100005, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 3, 'user_id' => 100005, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 4, 'user_id' => 100005, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 1, 'user_id' => 100008, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 2, 'user_id' => 100008, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 3, 'user_id' => 100008, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 4, 'user_id' => 100008, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 1, 'user_id' => 100014, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 2, 'user_id' => 100014, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 3, 'user_id' => 100014, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 4, 'user_id' => 100014, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 1, 'user_id' => 100045, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 2, 'user_id' => 100045, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 3, 'user_id' => 100045, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 4, 'user_id' => 100045, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 1, 'user_id' => 100052, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 2, 'user_id' => 100052, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 3, 'user_id' => 100052, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 4, 'user_id' => 100052, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 1, 'user_id' => 100057, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 2, 'user_id' => 100057, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 3, 'user_id' => 100057, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 4, 'user_id' => 100057, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 1, 'user_id' => 100060, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 2, 'user_id' => 100060, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 3, 'user_id' => 100060, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 4, 'user_id' => 100060, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 1, 'user_id' => 100064, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 2, 'user_id' => 100064, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 3, 'user_id' => 100064, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 4, 'user_id' => 100064, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 1, 'user_id' => 100070, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 2, 'user_id' => 100070, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 3, 'user_id' => 100070, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 4, 'user_id' => 100070, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 1, 'user_id' => 100073, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 2, 'user_id' => 100073, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 3, 'user_id' => 100073, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 4, 'user_id' => 100073, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 1, 'user_id' => 100075, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 2, 'user_id' => 100075, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 3, 'user_id' => 100075, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 4, 'user_id' => 100075, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 1, 'user_id' => 100082, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 2, 'user_id' => 100082, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 3, 'user_id' => 100082, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
          [ 'conversation_topic_id' => 4, 'user_id' => 100082, 'date' => Carbon::now()->subDays(10), 'time' => Carbon::now() ],
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

            switch ($l['user_id'])
            {
              case 100002:
                switch ($conversation->id) {
                  case 1:
                  case 2:
                  case 3:
                  case 4:
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] ]);
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] - 1 ]);
                    break;
                }
                break;
              case 100005:
                switch ($conversation->id) {
                  case 5:
                  case 6:
                  case 7:
                  case 8:
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] ]);
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] - 1 ]);
                    break;
                }
                break;
              case 100008:
                switch ($conversation->id) {
                  case 9:
                  case 10:
                  case 11:
                  case 12:
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] ]);
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] - 1 ]);
                    break;
                }
                break;
              case 100014:
                switch ($conversation->id) {
                  case 13:
                  case 14:
                  case 15:
                  case 16:
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] ]);
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] - 1 ]);
                    break;
                }
                break;
              case 100045:
                switch ($conversation->id) {
                  case 17:
                  case 18:
                  case 19:
                  case 20:
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] ]);
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] - 1 ]);
                    break;
                }
                break;
              case 100052:
                switch ($conversation->id) {
                  case 21:
                  case 22:
                  case 23:
                  case 24:
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] ]);
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] - 1 ]);
                    break;
                }
                break;
              case 100057:
                switch ($conversation->id) {
                  case 25:
                  case 26:
                  case 27:
                  case 28:
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] ]);
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] - 1 ]);
                    break;
                }
                break;
              case 100060:
                switch ($conversation->id) {
                  case 29:
                  case 30:
                  case 31:
                  case 32:
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] ]);
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] - 1 ]);
                    break;
                }
                break;
              case 100064:
                switch ($conversation->id) {
                  case 33:
                  case 34:
                  case 35:
                  case 36:
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] ]);
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] - 1 ]);
                    break;
                }
                break;
              case 100070:
                switch ($conversation->id) {
                  case 37:
                  case 38:
                  case 39:
                  case 40:
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] ]);
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] - 1 ]);
                    break;
                }
                break;
              case 100073:
                switch ($conversation->id) {
                  case 41:
                  case 42:
                  case 43:
                  case 44:
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] ]);
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] - 1 ]);
                    break;
                }
                break;
              case 100075:
                switch ($conversation->id) {
                  case 45:
                  case 46:
                  case 47:
                  case 48:
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] ]);
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] - 1 ]);
                    break;
                }
                break;
              case 100082:
                switch ($conversation->id) {
                  case 49:
                  case 50:
                  case 51:
                  case 52:
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] ]);
                    ConversationParticipant::updateOrCreate([ 'conversation_id' => $conversation->id, 'participant_id' => $l['user_id'] - 1 ]);
                    break;
                }
                break;
              default:
                ConversationParticipant::updateOrCreate([
                    'conversation_id' => $conversation->id,
                    'participant_id' => rand(1,3)
                ]);
                ConversationParticipant::updateOrCreate([
                    'conversation_id' => $conversation->id,
                    'participant_id' => $conversation->user_id
                ]);
            }
        }
    }
}

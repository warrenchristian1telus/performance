<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Goal;

class SupervisorGoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goal_types = [
            [
                'id' => 995,
                'title' => 'Lease Agreement',
                'start_date' => '2021-04-13',
                'target_date' => '2021-04-20',
                'status' => 'active',
                'goal_type_id' => 1,
                'is_shared' => 1,
                'what' => 'My goal is to create a lease agreement on crown land for a First Nations development project, which all parties are comfortable signing.',
                'why' => 'This will preserve the relationship and advance the economic objectives of the province and the local community.',
                'how' => 'I will do this by building trusting relationships with all parties, acquiring knowledge in industrial land use, mapping out the remaining tasks, assessing progress and creating the negotiation document.',
                'measure_of_success' => 'Increase X by Y%',
                'user_id' => 7,
            ],
            [
                'id' => 996,
                'title' => 'Building Partnerships',
                'start_date' => '2021-04-13',
                'target_date' => '2021-04-20',
                'status' => 'active',
                'goal_type_id' => 1,
                'is_shared' => 1,
                'what' => 'My goal is to build partnerships with organizations external to government.',
                'why' => 'This will help increase our profile in the private sector and make our work more valued.',
                'how' => 'I will do this by connecting with local business associations.',
                'measure_of_success' => 'Increase X by Y%',
                'user_id' => 7,
            ],

            [
                'id' => 997,
                'title' => 'Coaching Leadership Style',
                'start_date' => '2021-04-13',
                'target_date' => '2021-04-20',
                'status' => 'active',
                'goal_type_id' => 2,
                'is_shared' => 1,
                'what' => 'My goal is to shift to a coaching leadership style.',
                'why' => 'This will help me bring out the best in my team',
                'how' => 'I will do this by working towards certification in the BC Public Service Supervisory Development Program, and signing up for Performance Coaching.',
                'measure_of_success' => 'Increase X by Y%',
                'user_id' => 7,
            ],
            [
                'id' => 998,
                'goal_type_id' => 1,
                'is_shared' => 1,
                'start_date' => '2021-04-13',
                'target_date' => '2021-04-20',
                'status' => 'active',
                'title' => 'Stakeholder Relationships',
                'what' => 'My goal is to understand stakeholder needs.',
                'why' => 'This will help me influence decision making on key issues.',
                'how' => 'I will do this by designing and delivering a consultation process and writing a report summarising my findings.',
                'measure_of_success' => 'Increase X by Y%',
                'user_id' => 7,
            ],
            [
                'id' => 999,
                'goal_type_id' => 2,
                'start_date' => '2021-04-13',
                'is_shared' => 1,
                'target_date' => '2021-04-20',
                'status' => 'active',
                'title' => 'Culture Shift',
                'what' => 'My goal is to facilitate a culture shift towards excellence in communication.',
                'why' => 'So that all communication practices are based on the principle of two-way symmetrical communication, engaging equal input from the public and the organization.',
                'how' => 'I will do this by creating a Culture Change Strategy, detailing all tactics (e.g. designing guidelines, processes, procedures) by the end of the second quarter.',
                'measure_of_success' => 'Increase X by Y%',
                'user_id' => 7,

            ]
        ];

        foreach ($goal_types as $goal_type) {
            Goal::updateOrCreate([
                'id' => $goal_type['id'],
            ], $goal_type);
        }
    }
}

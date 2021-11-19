<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Goal;
use App\Scopes\NonLibraryScope;

class GoalBankSeeder extends Seeder
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
                'id' => 20000,
                'title' => 'Lease Agreement',
                'start_date' => '2021-11-13',
                'target_date' => '2021-12-20',
                'status' => 'active',
                'goal_type_id' => 1,
                'is_mandatory' => 0,
                'is_library' => 1,
                'is_shared' => 1,
                'what' => 'My goal is to create a lease agreement on crown land for a First Nations development project, which all parties are comfortable signing.',
                'why' => 'This will preserve the relationship and advance the economic objectives of the province and the local community.',
                'how' => 'I will do this by building trusting relationships with all parties, acquiring knowledge in industrial land use, mapping out the remaining tasks, assessing progress and creating the negotiation document.',
                'measure_of_success' => 'Increase X by Y%',
                'user_id' => 7,
            ],
            [
                'id' => 20001,
                'title' => 'Building Partnerships',
                'start_date' => '2021-11-13',
                'target_date' => '2021-12-20',
                'status' => 'active',
                'goal_type_id' => 1,
                'is_shared' => 1,
                'is_mandatory' => 0,
                'is_library' => 1,
                'what' => 'My goal is to build partnerships with organizations external to government.',
                'why' => 'This will help increase our profile in the private sector and make our work more valued.',
                'how' => 'I will do this by connecting with local business associations.',
                'measure_of_success' => 'Increase X by Y%',
                'user_id' => 7,
            ],
            [
                'id' => 20002,
                'start_date' => '2021-11-13',
                'target_date' => '2021-12-20',
                'status' => 'active',
                'goal_type_id' => 1,
                'is_shared' => 1,
                'is_mandatory' => 1,
                'is_library' => 1,
                'title' => 'Stakeholder Relationships',
                'what' => 'My goal is to understand stakeholder needs.',
                'why' => 'This will help me influence decision making on key issues.',
                'how' => 'I will do this by designing and delivering a consultation process and writing a report summarising my findings.',
                'measure_of_success' => 'Increase X by Y%',
                'user_id' => 7,
            ]
        ];

        foreach ($goal_types as $goal_type) {
            Goal::withoutGlobalScope(NonLibraryScope::class)->updateOrCreate([
                'id' => $goal_type['id'],
            ], $goal_type);
        }
        $userIds = [];
        for ($i = 11; $i< 219; $i++) {
            $userIds[] = $i;
        }

        $goalIds = [997,998,999];

        $goals = Goal::whereIn("id", $goalIds)->get();
        foreach($goals as $goal) {
            $goal->sharedWith()->sync(array_filter($userIds));
        }

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GoalType;


class GoalTypeSeeder extends Seeder
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
                'name' => 'Work',
                'description' => 'Work Goals are foundational / required for your current position (in current role).',
                'order' => 1
            ],
            [
                'name' => 'Career Development',
                'description' => 'Career Development Goals are desirable but not required (in order to improve and grow) and can be strategic or long-term',
                'order' => 3
            ],
            [
                'name' => 'Learning',
                'description' => 'Learning Goals are formal (i.e. courses or programs) and informal (i.e. networking or mentoring) activities relevant to your role or personal development.',
                'order' => 2
            ]
        ];

        foreach ($goal_types as $goal_type) {
            GoalType::updateOrCreate([
                'name' => $goal_type['name'],
            ], $goal_type);
        }
    }
}

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
                'name' => 'Core',
                'description' => 'Core Goals are foundational or required for your current position (in your current role). '
            ],
            [
                'name' => 'Growth',
                'description' => 'Growth Goals are desirable, but not required in order to improve and grow professionally.'
            ],
            [
                'name' => 'Career',
                'description' => 'Career Goals are future-oriented, whether they are strategic or long-term.'
            ],
            [
                'name' => 'Learning',
                'description' => 'Learning Goals are formal (i.e. courses or programs) and informal (i.e. networking or mentoring) activities relevant to your role or personal development.'
            ]
        ];

        foreach ($goal_types as $goal_type) {
            GoalType::updateOrCreate([
                'name' => $goal_type['name'],
            ], $goal_type);
        }
    }
}

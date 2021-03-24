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
            ],
            [
                'name' => 'Growth',
            ],
            [
                'name' => 'Career',
            ]
        ];

        foreach ($goal_types as $goal_type) {
            GoalType::updateOrCreate([
                'name' => $goal_type['name'],
            ], $goal_type);
        }
    }
}

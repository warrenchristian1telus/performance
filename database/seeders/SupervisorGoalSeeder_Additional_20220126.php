<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Goal;

class SupervisorGoalSeeder_Additional_20220126 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $supvgoal = \App\Models\Goal::updateOrCreate(
          [
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
              'user_id' => 111001,
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 111002
          ]
        );





    }
}

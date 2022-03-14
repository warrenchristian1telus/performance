<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Goal;

class SupervisorGoalSeeder_Additional_20220307 extends Seeder
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
              'user_id' => 120032,
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 120003
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 120008
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 120015
          ]
        );

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
              'user_id' => 120038,
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 120040
          ]
        );

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
              'user_id' => 120043,
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 120041
          ]
        );

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
              'user_id' => 120044,
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 120045
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 120050
          ]
        );

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
              'user_id' => 120047,
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 120048
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 120071
          ]
        );

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
              'user_id' => 120064,
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 120054
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 120056
          ]
        );

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
              'user_id' => 120065,
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 120058
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 120060
          ]
        );

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
              'user_id' => 120066,
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 120062
          ]
        );

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
              'user_id' => 120075,
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 120052
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 120073
          ]
        );

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
              'user_id' => 120076,
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 120067
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 120069
          ]
        );

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
              'user_id' => 120078,
          ]
        );
        DB::table('goals_shared_with')->updateOrInsert(
          [
            'goal_id' => $supvgoal->id,
            'user_id' => 120079
          ]
        );




    }
}

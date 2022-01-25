<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Goal;
use App\Scopes\NonLibraryScope;

class GoalBankSeeder_Additional_20220125 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $supvgoal = Goal::withoutGlobalScope(NonLibraryScope::class)->updateOrCreate(
        [
          'title' => 'Building Partnerships',
          'start_date' => '2022-01-11',
          'target_date' => '2022-12-20',
          'status' => 'active',
          'goal_type_id' => 1,
          'is_shared' => 1,
          'is_mandatory' => 0,
          'is_library' => 1,
          'what' => 'My goal is to build partnerships with organizations external to government.',
          'why' => 'This will help increase our profile in the private sector and make our work more valued.',
          'how' => 'I will do this by connecting with local business associations.',
          'measure_of_success' => 'Increase X by Y%',
          'user_id' => 110094,
        ]
      );

      $supvgoal = Goal::withoutGlobalScope(NonLibraryScope::class)->updateOrCreate(
        [
          'title' => 'Building Partnerships',
          'start_date' => '2022-01-11',
          'target_date' => '2022-12-20',
          'status' => 'active',
          'goal_type_id' => 1,
          'is_shared' => 1,
          'is_mandatory' => 0,
          'is_library' => 1,
          'what' => 'My goal is to build partnerships with organizations external to government.',
          'why' => 'This will help increase our profile in the private sector and make our work more valued.',
          'how' => 'I will do this by connecting with local business associations.',
          'measure_of_success' => 'Increase X by Y%',
          'user_id' => 110095,
        ]
      );

      $supvgoal = Goal::withoutGlobalScope(NonLibraryScope::class)->updateOrCreate(
        [
          'title' => 'Building Partnerships',
          'start_date' => '2022-01-11',
          'target_date' => '2022-12-20',
          'status' => 'active',
          'goal_type_id' => 1,
          'is_shared' => 1,
          'is_mandatory' => 0,
          'is_library' => 1,
          'what' => 'My goal is to build partnerships with organizations external to government.',
          'why' => 'This will help increase our profile in the private sector and make our work more valued.',
          'how' => 'I will do this by connecting with local business associations.',
          'measure_of_success' => 'Increase X by Y%',
          'user_id' => 110096,
        ]
      );

      $supvgoal = Goal::withoutGlobalScope(NonLibraryScope::class)->updateOrCreate(
        [
          'title' => 'Building Partnerships',
          'start_date' => '2022-01-11',
          'target_date' => '2022-12-20',
          'status' => 'active',
          'goal_type_id' => 1,
          'is_shared' => 1,
          'is_mandatory' => 0,
          'is_library' => 1,
          'what' => 'My goal is to build partnerships with organizations external to government.',
          'why' => 'This will help increase our profile in the private sector and make our work more valued.',
          'how' => 'I will do this by connecting with local business associations.',
          'measure_of_success' => 'Increase X by Y%',
          'user_id' => 110097,
        ]
      );



    }
}

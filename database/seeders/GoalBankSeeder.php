<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
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

        // $supvgoal = Goal::withoutGlobalScope(NonLibraryScope::class)->updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //     'user_id' => 100001,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100003
        //   ]
        // );

        // $supvgoal = Goal::withoutGlobalScope(NonLibraryScope::class)->updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //     'user_id' => 100002,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100003
        //   ]
        // );

        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100005,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100006
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100008,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100009
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100010
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100011
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100012
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100014,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100015
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100018
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100027
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100030
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100035
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100043
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100015,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100020
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100042
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100018,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100016
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100028
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100038
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100019,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100024
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100020,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100019
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100025,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100026
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100029
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100031
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100032
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100036
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100039
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100027,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100025
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100028,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100023
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100030,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100017
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100021
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100038,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100040
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100042,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100022
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100037
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100043,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100033
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100034
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100041
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100045,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100046
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100047
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100048
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100049
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100050
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100052,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100053
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100054
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100055
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100055,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100058
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100060,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100061
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100061,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100062
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100064,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100065
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100066
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100068
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100070,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100071
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100075,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100076
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100077
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100076,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100078
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100079
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100080
        //   ]
        // );
        //
        // $supvgoal = \App\Models\Goal::updateOrCreate(
        //   [
        //     'title' => 'Building Partnerships',
        //     'start_date' => '2022-01-11',
        //     'target_date' => '2022-12-20',
        //     'status' => 'active',
        //     'goal_type_id' => 1,
        //     'is_shared' => 1,
        //     'is_mandatory' => 0,
        //     'is_library' => 1,
        //     'what' => 'My goal is to build partnerships with organizations external to government.',
        //     'why' => 'This will help increase our profile in the private sector and make our work more valued.',
        //     'how' => 'I will do this by connecting with local business associations.',
        //     'measure_of_success' => 'Increase X by Y%',
        //       'user_id' => 100082,
        //   ]
        // );
        // DB::table('goals_shared_with')->updateOrInsert(
        //   [
        //     'goal_id' => $supvgoal->id,
        //     'user_id' => 100083
        //   ]
        // );






    }
}

<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserRoleSeeder::class);
        $this->call(UserRoleSeederAdmins::class);
        $this->call(UserTableSeeder::class);
        $this->call(UserTableSeederAdmins::class);
        $this->call(GoalTypeSeeder::class);
        $this->call(SupervisorGoalSeeder::class);
        $this->call(GoalBankSeeder::class);
        $this->call(TopicSeeder::class);
        // $this->call(ParticipantSeeder::class);
        $this->call(AdditionalUsersTableSeeder::class);
        $this->call(ConversationSeeder::class);
        $this->call(ExcusedReasonSeeder::class);
        $this->call(AccessLevelsSeeder::class);
        $this->call(RoleSeeder_Add_Longnames::class);
        // Items below are for user testing in Test environment
        // $this->call(UserTableSeeder_Additional_20220125::class);
        // $this->call(SupervisorGoalSeeder_Additional_20220125::class);
        // $this->call(ConversationSeeder_Additional_20220125::class);
        // $this->call(UserTableSeeder_Additional_20220126::class);
        // $this->call(SupervisorGoalSeeder_Additional_20220126::class);
        // $this->call(ConversationSeeder_Additional_20220126::class);
        // $this->call(UserTableSeeder_Additional_20220307::class);
        // $this->call(SupervisorGoalSeeder_Additional_20220307::class);
        // $this->call(ConversationSeeder_Additional_20220307::class);
        // $this->call(UserTableSeeder_Additional_20220308::class);
        // $this->call(SupervisorGoalSeeder_Additional_20220308::class);
        // $this->call(ConversationSeeder_Additional_20220308::class);
        // Generic Template
        $this->call(GenericTemplateSeeder::class);
    }
}

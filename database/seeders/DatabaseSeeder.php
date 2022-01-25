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
        $this->call(UserTableSeeder::class);
        $this->call(GoalTypeSeeder::class);
        $this->call(SupervisorGoalSeeder::class);
        $this->call(GoalBankSeeder::class);
        $this->call(TopicSeeder::class);
        // $this->call(ParticipantSeeder::class);
        $this->call(ConversationSeeder::class);
        $this->call(AdditionalUsersTableSeeder::class);
        $this->call(ExcusedReasonSeeder::class);
        // Items below are for user testing in Test environment
        $this->call(UserTableSeeder_Additional_20220125::class);
        $this->call(GoalBankSeeder_Additional_20220125::class);
        $this->call(ConversationSeeder_Additional_20220125::class);
    }
}

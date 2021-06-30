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
        $this->call(UserTableSeeder::class);
        $this->call(GoalTypeSeeder::class);
        $this->call(SupervisorGoalSeeder::class);
        $this->call(TopicSeeder::class);
        $this->call(ParticipantSeeder::class);
        $this->call(ConversationSeeder::class);
        $this->call(AdditionalUsersTableSeeder::class);
        $this->call(UserRoleSeeder::class);
    }
}

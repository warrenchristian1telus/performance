<?php

namespace Database\Seeders;

use App\Models\NotificationLog;
use Illuminate\Database\Seeder;

class NotificationLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        NotificationLog::factory()
            ->count(50)
            ->create();
    }
}

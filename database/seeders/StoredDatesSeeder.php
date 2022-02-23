<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\StoredDate;


class StoredDatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed_dates = [
            [
                'id' => 1,
                'name' => 'ODS Last Pull for employee_demo',
                'value' => Carbon::now()->subDays(365)
            ]
        ];

        foreach ($seed_dates as $stored_date) {
            StoredDate::updateOrCreate([
              'id' => $stored_date['id'],
            ], $stored_date);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AccessLevel;


class AccessLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $access_levels = [
            [
                'name' => 'HR Administrator',
            ],
            [
                'name' => 'System Adminitrator',
            ],
            [
                'name' => 'Contact Centre Representative',
            ]
        ];

        foreach ($access_levels as $access_level) {
            AccessLevel::updateOrCreate([
                'name' => $access_level['name'],
            ], $access_level);
        }
    }
}

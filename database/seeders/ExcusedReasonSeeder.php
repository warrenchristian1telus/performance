<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExcusedReason;


class ExcusedReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $excused_reasons = [
            [
                'name' => 'Medical Leave',
                'description' => 'Medical Leave'
            ],
            [
                'name' => 'Secondment',
                'description' => 'Secondment'
            ],
            [
                'name' => 'Other Leave',
                'description' => 'Other Leave'
            ]
        ];

        foreach ($excused_reasons as $excused_reason) {
            ExcusedReason::updateOrCreate([
                'name' => $excused_reason['name'],
            ], $excused_reason);
        }
    }
}

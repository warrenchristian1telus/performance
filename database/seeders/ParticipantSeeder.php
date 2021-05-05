<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            [
                'id' => 1,
                'name' => 'Simon Smith',
            ],
            [
                'id' => 2,
                'name' => 'Jane Doe',
            ],
            [
                'id' => 3,
                'name' => 'Susan Johnson',
            ],
            [
                'id' => 4,
                'name' => 'John Smith',
            ],
            [
                'id' => 5,
                'name' => 'Anna Adams',
            ],
        ];

        foreach ($list as $l) {
            \App\Models\Participant::updateOrCreate([
                'id' => $l['id'],
            ], $l);
        }
    }
}

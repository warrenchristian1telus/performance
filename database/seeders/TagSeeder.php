<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'id' => 1,
                'name' => 'Finance'
            ],
            [
                'id' => 2,
                'name' => 'Technology'
            ],
            [
                'id' => 3,
                'name' => 'Communications'
            ],
            [
                'id' => 4,
                'name' => 'Human Resources'
            ],
        ];

        foreach($tags as $tag) {
            Tag::updateOrCreate([
                'id' => $tag['id'],
            ], $tag);
        }
    }
}

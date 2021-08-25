<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // User Creation

    $users = [
      [
        'id' => 1,
        'email' => 'employee1@example.com',
        'name' => 'Employee A',
        'password' => 'employee1@123'
      ],
      [
        'id' => 2,
        'email' => 'employee2@example.com',
        'name' => 'Employee B',
        'password' => 'employee2@123'
      ],
      [
        'id' => 3,
        'email' => 'employee3@example.com',
        'name' => 'Employee C',
        'password' => 'employee3@123'
      ],
      [
        'id' => 4,
        'name' => 'Simon Smith',
        'email' =>'SimonSmith@example.com',
        'password' => 'SimonSmith'
      ],
      [
        'id' => 5,
        'name' => 'Jane Doe',
        'email' =>'JaneDoe@example.com',
        'password' => 'JaneDoe'
      ],
      [
        'id' => 6,
        'name' => 'Susan Johnson',
        'email' =>'SusanJohnson@example.com',
        'password' => 'SusanJohnson'
      ],
      [
        'id' => 7,
        'name' => 'John Smith',
        'email' =>'JohnSmith@example.com',
        'password' => 'JohnSmith'
      ],
      [
        'id' => 8,
        'name' => 'Anna Adams',
        'email' =>'AnnaAdams@example.com',
        'password' => 'AnnaAdams'
      ],
      [
        'id' => 998,
        'email' => 'supervisor2@example.com',
        'name' => 'Supervisor2',
        'password' => 'supervisor2@123',
      ],
      [
        'id' => 999,
        'email' => 'supervisor@example.com',
        'name' => 'Supervisor',
        'password' => 'supervisor@123',
      ],
      [
        'id' => 1901,
        'email' => 'director@example.com',
        'name' => 'Director',
        'password' => 'director@123'
      ],
      [
        'id' => 1902,
        'email' => 'director2@example.com',
        'name' => 'Director 2',
        'password' => 'director@123'
      ],
      [
        'id' => 1903,
        'email' => 'director3@example.com',
        'name' => 'Director 3',
        'password' => 'director@123'
      ],
    ];

    foreach ($users as $user) {
      User::updateOrCreate([
        'email' => $user['email'],
      ], [
        'id' => $user['id'],
        'name' => $user['name'],
        'password' => Hash::make($user['password']),
      ]);
    }
  }
}

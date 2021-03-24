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
        'email' => 'employee1@example.com',
        'name' => 'Employee A',
        'password' => 'employee1@123'
      ],
      [
        'email' => 'employee2@example.com',
        'name' => 'Employee B',
        'password' => 'employee2@123'
      ],
      [
        'email' => 'employee3@example.com',
        'name' => 'Employee C',
        'password' => 'employee3@123'
      ]
    ];

    foreach ($users as $user) {
      User::updateOrCreate([
        'email' => $user['email'],
      ], [
        'name' => $user['name'],
        'password' => Hash::make($user['password']),
      ]);
    }

  }
}

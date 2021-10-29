<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

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
        'name' => 'Employee 1',
        'password' => 'employee1@123',
        'reporting_to' => 7,
        'role' => 'Employee',
        'joining_date' => '01-OCT-2021'
      ],
      [
        'id' => 2,
        'email' => 'employee2@example.com',
        'name' => 'Employee 2',
        'password' => 'employee2@123',
        'reporting_to' => 7,
        'role' => 'Employee',
        'joining_date' => '01-JAN-2020'
      ],
      [
        'id' => 3,
        'email' => 'employee3@example.com',
        'name' => 'Employee 3',
        'password' => 'employee3@123',
        'reporting_to' => 8,
        'role' => 'Employee',
        'joining_date' => '14-MAR-2021'
      ],
      [
        'id' => 4,
        'email' => 'employee4@example.com',
        'name' => 'Employee 4',
        'password' => 'employee4@123',
        'reporting_to' => 8,
        'role' => 'Employee',
        'joining_date' => '19-SEP-2017'
      ],
      [
        'id' => 5,
        'email' => 'employee5@example.com',
        'name' => 'Employee 5',
        'password' => 'employee5@123',
        'reporting_to' => 9,
        'role' => 'Employee',
        'joining_date' => '03-SEP-2021'
      ],
      [
        'id' => 6,
        'email' => 'employee6@example.com',
        'name' => 'Employee 6',
        'password' => 'employee6@123',
        'reporting_to' => 9,
        'role' => 'Employee',
        'joining_date' => '07-NOV-2018'
      ],
      [
        'id' => 7,
        'email' => 'supervisor1@example.com',
        'name' => 'Supervisor 1',
        'password' => 'supervisor1@123',
        'reporting_to' => 10,
        'role' => 'Supervisor',
        'joining_date' => '01-AUG-2019'
      ],
      [
        'id' => 8,
        'email' => 'supervisor2@example.com',
        'name' => 'Supervisor 2',
        'password' => 'supervisor2@123',
        'reporting_to' => 10,
        'role' => 'Supervisor',
        'joining_date' => '08-AUG-2016'
      ],
      [
        'id' => 9,
        'email' => 'supervisor3@example.com',
        'name' => 'Supervisor 3',
        'password' => 'supervisor3@123',
        'reporting_to' => 10,
        'role' => 'Supervisor',
        'joining_date' => '02-FEB-2015'
      ],
      [
        'id' => 10,
        'email' => 'executive1@example.com',
        'name' => 'Executive 1',
        'password' => 'executive1@123',
        'role' => 'Supervisor',
        'joining_date' => '04-DEC-2014'
      ]
    ];

    foreach ($users as $user) {
      $entry = User::updateOrCreate([
        'email' => $user['email'],
      ], [
        'id' => $user['id'],
        'name' => $user['name'],
        'password' => Hash::make($user['password']),
        'reporting_to' => $user['reporting_to'] ?? null,
        'joining_date' => Carbon::createFromFormat("d-M-Y", $user['joining_date'])
      ]);

      $entry->assignRole($user['role']);
    }
  }
}

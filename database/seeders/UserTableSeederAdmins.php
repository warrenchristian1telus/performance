<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class UserTableSeederAdmins extends Seeder
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
        'id' => 21,
        'email' => 'hradmin1@example.com',
        'name' => 'HR Admin 1',
        'password' => 'hradmin1@123',
        'reporting_to' => 10,
        'role' => 'HR Admin',
        'joining_date' => '04-MAR-2014'
      ],
      [
        'id' => 22,
        'email' => 'hradmin2@example.com',
        'name' => 'HR Admin 2',
        'password' => 'hradmin2@123',
        'reporting_to' => 10,
        'role' => 'HR Admin',
        'joining_date' => '05-APR-2014'
      ],
      [
        'id' => 23,
        'email' => 'hradmin3@example.com',
        'name' => 'HR Admin 3',
        'password' => 'hradmin3@123',
        'reporting_to' => 10,
        'role' => 'HR Admin',
        'joining_date' => '08-MAY-2014'
      ],
      [
        'id' => 24,
        'email' => 'employee24@example.com',
        'name' => 'Employee 24',
        'password' => 'employee24@123',
        'reporting_to' => 21,
        'role' => 'Employee',
        'joining_date' => '01-OCT-2021'
      ],
      [
        'id' => 25,
        'email' => 'employee25@example.com',
        'name' => 'Employee 25',
        'password' => 'employee25@123',
        'reporting_to' => 22,
        'role' => 'Employee',
        'joining_date' => '01-OCT-2021'
      ],
      [
        'id' => 31,
        'email' => 'sysadmin1@example.com',
        'name' => 'Sys Admin 1',
        'password' => 'sysadmin1@123',
        'reporting_to' => 10,
        'role' => 'Sys Admin',
        'joining_date' => '14-FEB-2014'
      ],
      [
        'id' => 32,
        'email' => 'sysadmin2@example.com',
        'name' => 'Sys Admin 2',
        'password' => 'sysadmin2@123',
        'reporting_to' => 10,
        'role' => 'Sys Admin',
        'joining_date' => '11-FEB-2014'
      ],
      [
        'id' => 33,
        'email' => 'sysadmin3@example.com',
        'name' => 'Sys Admin 3',
        'password' => 'sysadmin3@123',
        'reporting_to' => 10,
        'role' => 'Sys Admin',
        'joining_date' => '14-DEC-2014'
      ],
      [
        'id' => 34,
        'email' => 'employee34@example.com',
        'name' => 'Employee 34',
        'password' => 'employee34@123',
        'reporting_to' => 31,
        'role' => 'Employee',
        'joining_date' => '01-OCT-2021'
      ],
      [
        'id' => 35,
        'email' => 'employee35@example.com',
        'name' => 'Employee 35',
        'password' => 'employee35@123',
        'reporting_to' => 32,
        'role' => 'Employee',
        'joining_date' => '01-OCT-2021'
      ],
  ];

    foreach ($users as $user) {
      $entry = User::updateOrCreate([
        'email' => $user['email'],
      ], [
        'id' => $user['id'],
        'name' => $user['name'],
        'password' => Hash::make($user['password']),
        'reporting_to' => $user['reporting_to'] ?? null,
        'joining_date' => Carbon::createFromFormat("d-M-Y", $user['joining_date']),
      ]);

      $entry->assignRole($user['role']);
    }




  }
}

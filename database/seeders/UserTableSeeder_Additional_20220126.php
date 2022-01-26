<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class UserTableSeeder_Additional_20220126 extends Seeder
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
      [ 'id' => 111001, 'email' => 'inderjit.randhawa@gov.bc.ca', 'name' => 'Indy Randhawa', 'password' => 'indy@123',  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      [ 'id' => 111002, 'email' => 'lauren.dwornik@gov.bc.ca', 'name' => 'Lauren Dwornik', 'password' => 'lauren@123', 'reporting_to' => 111001,  'role' => 'Supervisor', 'joining_date' => '16-JAN-2022' ],
      [ 'id' => 111003, 'email' => 'tracy.mosig@gov.bc.ca', 'name' => 'Tracy Mosig', 'password' => 'tracy@123', 'reporting_to' => 111002,  'role' => 'Employee', 'joining_date' => '17-JAN-2022' ],
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

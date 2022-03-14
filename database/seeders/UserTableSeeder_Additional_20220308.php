<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class UserTableSeeder_Additional_20220308 extends Seeder
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
        [ 'id' => 120080, 'email' => 'bobbi.sadler@gov.bc.ca', 'name' => 'Bobbi Sadler', 'password' => 'bobbi@123',  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120081, 'email' => 'generic.executive@gov.bc.ca', 'name' => 'Generic Executive', 'password' => 'generic@123',  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],


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

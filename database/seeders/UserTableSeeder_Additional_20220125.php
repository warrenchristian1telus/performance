<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class UserTableSeeder_Additional_20220125 extends Seeder
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
      [ 'id' => 110084, 'email' => 'lindsay.mclaughlin@gov.bc.ca', 'name' => 'Lindsay McLaughlin', 'password' => 'lindsay@123', 'reporting_to' => 110095,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      [ 'id' => 110085, 'email' => 'melanie.nielsen@gov.bc.ca', 'name' => 'Melanie Neilsen', 'password' => 'melanie@123', 'reporting_to' => 110096,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      [ 'id' => 110086, 'email' => 'juliet.fox@gov.bc.ca', 'name' => 'Juliet Fox', 'password' => 'juliet@123', 'reporting_to' => 110084,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      [ 'id' => 110087, 'email' => 'sarah.mcshane@gov.bc.ca', 'name' => 'Sarah McShane', 'password' => 'sarah@123', 'reporting_to' => 110097,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      [ 'id' => 110088, 'email' => 'marlo.peddle@gov.bc.ca', 'name' => 'Marlo Peddle', 'password' => 'marlo@123', 'reporting_to' => 110087,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      [ 'id' => 110089, 'email' => 'courtenay.wilson@gov.bc.ca', 'name' => 'Courtenay Wilson', 'password' => 'courtenay@123', 'reporting_to' => 110092,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      [ 'id' => 110090, 'email' => 'deanne.turnbullloverock@gov.bc.ca', 'name' => 'Deanne Turnbull Loverock', 'password' => 'deanne@123', 'reporting_to' => 110092,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      [ 'id' => 110091, 'email' => 'chrystalla.efthymiou@gov.bc.ca', 'name' => 'Chrystalla Efthymiou', 'password' => 'chrystalla@123', 'reporting_to' => 110092,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      [ 'id' => 110092, 'email' => 'mark.muldoon@gov.bc.ca', 'name' => 'Mark Muldoon', 'password' => 'mark@123', 'reporting_to' => 110086,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      [ 'id' => 110093, 'email' => 'melissa.love@gov.bc.ca', 'name' => 'Melissa Love', 'password' => 'melissa@123', 'reporting_to' => 110094,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      [ 'id' => 110094, 'email' => 'deborah.schwarz@gov.bc.ca', 'name' => 'Deborah Schwartz', 'password' => 'deborah@123',  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      [ 'id' => 110095, 'email' => 'catherine.pool@gov.bc.ca', 'name' => 'Catherine Poole', 'password' => 'catherine@123',  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      [ 'id' => 110096, 'email' => 'trudy.rotgans@gov.bc.ca', 'name' => 'Trudy Rotgans', 'password' => 'trudy@123',  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      [ 'id' => 110097, 'email' => 'cordelia.williams@gov.bc.ca', 'name' => 'Cordelia Williams', 'password' => 'cordelia@123',  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
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

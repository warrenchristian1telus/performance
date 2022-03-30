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
      ],

      [ 
        'id' => 702, 
        'name' => 'Supervisor One', 
        'email' => 'supervisor1@extest.gov.bc.ca', 
        'azure_id' => 'd321f903-1418-4777-805c-b588857703c9',
        "password" => 'watchdog', 
        "reporting_to" => null, 
        "joining_date" => '11-OCT-2011', 
        'role' => 'Employee',
        "samaccountname" => 'SUPERVISOR1', 
        'guid' => 'FE40A79B39134D49B363FFEB2DBECC71'
      ],
      [ 
        'id' => 701, 
        'name' => 'Employee 11', 
        'email' => 'employee11@extest.gov.bc.ca', 
        'azure_id' => 'c910c169-eb51-43f6-8923-2640e7c75400', 
        "password" => 'watchdog', 
        "reporting_to" => 702, 
        "joining_date" => '06-FEB-2020', 
        'role' => 'Employee',
        "samaccountname" => 'EMPLOYEE11', 
        'guid' => '11B8F4AEAB4A44CF95EFA80B418ED70B'
      ],
      [ 
        'id' => 703, 
        'name' => 'Employee 12', 
        'email' => 'employee12@extest.gov.bc.ca', 
        'azure_id' => 'c9a685ac-4489-4c9e-ad64-a87bdf846467',
        "password" => 'watchdog', 
        "reporting_to" => 702, 
        "joining_date" => '20-JUL-2011', 
        'role' => 'Employee',
        "samaccountname" => 'EMPLOYEE12', 
        'guid' => '844CC197345F4338B2AF76454137267D'
      ],
      [ 
        'id' => 704, 
        'name' => 'Employee 13', 
        'email' => 'employee13@extest.gov.bc.ca', 
        'azure_id' => 'b859ce71-b123-46c8-9ea3-001be8cc5618', 
        "password" => 'watchdog', 
        "reporting_to" => 702, 
        "joining_date" => '10-FEB-2005', 
        'role' => 'Employee',
        "samaccountname" => 'EMPLOYEE13', 
        'guid' => 'F65BFEC28FC34F658F6927176244AA03'
      ],
      [ 
        'id' => 705, 
        'name' => 'Supervisor Two', 
        'email' => 'supervisor2@extest.gov.bc.ca', 
        'azure_id' => 'ee7a7585-34da-4c00-b802-ccfdc0233381',
        "password" => 'watchdog', 
        "reporting_to" => null, 
        "joining_date" => '14-JUL-2008', 
        'role' => 'Employee',
        "samaccountname" => 'SUPERVISOR1', 
        'guid' => 'D097DC45D450428898145D17319CD754'
      ],
      [ 
        'id' => 706, 
        'name' => 'Employee 21', 
        'email' => 'employee21@extest.gov.bc.ca', 
        'azure_id' => '8bdd1142-26fb-405f-80ad-1c27a1d2c716',
        "password" => 'watchdog', 
        "reporting_to" => 705, 
        "joining_date" => '25-APR-2014', 
        'role' => 'Employee',
        "samaccountname" => 'EMPLOYEE21', 
        'guid' => '1EF27D0F64204C5A96B565184D6CC624'
      ],

      // [ 'id' => 100001, 'email' => 'marlo.waldie@gov.bc.ca', 'name' => 'Marlo Waldie', 'password' => 'marlo@123',  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100002, 'email' => 'shelley.wiggins@gov.bc.ca ', 'name' => 'Shelley Wiggins', 'password' => 'shelley@123', 'reporting_to' => 100001,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100003, 'email' => 'alexandria.neilson@gov.bc.ca', 'name' => 'Alexandria Neilson', 'password' => 'alexandria@123', 'reporting_to' => 100002,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100004, 'email' => 'michelle.mcphee@gov.bc.ca', 'name' => 'Michelle McPhee', 'password' => 'michelle@123',  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100005, 'email' => 'sandra.thoms@gov.bc.ca', 'name' => 'Sandra Thoms', 'password' => 'sandra@123', 'reporting_to' => 100004,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100006, 'email' => 'dawn.androsoff@gov.bc.ca', 'name' => 'Dawn Androsoff', 'password' => 'dawn@123', 'reporting_to' => 100005,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100007, 'email' => 'amy.maass@gov.bc.ca', 'name' => 'Amy Maass', 'password' => 'amy@123',  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100008, 'email' => 'cshepherd@trustee.bc.ca', 'name' => 'Christine Shepherd', 'password' => 'christine@123', 'reporting_to' => 100007,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100009, 'email' => 'eamaya@trustee.bc.ca', 'name' => 'Emi Amaya', 'password' => 'emi@123', 'reporting_to' => 100008,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100010, 'email' => 'nhawes@trustee.bc.ca', 'name' => 'Nathan Hawes', 'password' => 'nathan@123', 'reporting_to' => 100008,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100011, 'email' => 'eletkeman@trustee.bc.ca', 'name' => 'Evan Letkeman', 'password' => 'evan@123', 'reporting_to' => 100008,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100012, 'email' => 'tscagliati@trustee.bc.ca', 'name' => 'Trevor Scagliati', 'password' => 'trevor@123', 'reporting_to' => 100008,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100013, 'email' => 'adam.mckinnon@gov.bc.ca', 'name' => 'Adam Mckinnon', 'password' => 'adam@123',  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100014, 'email' => 'heather.house@gov.bc.ca', 'name' => 'Heather House', 'password' => 'heather@123', 'reporting_to' => 100013,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100015, 'email' => 'carolyn.babakaiff@gov.bc.ca', 'name' => 'Carolyn Babakaiff', 'password' => 'carolyn@123', 'reporting_to' => 100014,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100016, 'email' => 'roland.best@gov.bc.ca', 'name' => 'Roland Best', 'password' => 'roland@123', 'reporting_to' => 100018,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100017, 'email' => 'katie.brand@gov.bc.ca', 'name' => 'Katie Brand', 'password' => 'katie@123', 'reporting_to' => 100030,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100018, 'email' => 'caley.byrne@gov.bc.ca', 'name' => 'Caley Byrne', 'password' => 'caley@123', 'reporting_to' => 100014,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100019, 'email' => 'melanie.carrigan@gov.bc.ca', 'name' => 'Melanie Carrigan', 'password' => 'melanie@123', 'reporting_to' => 100020,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100020, 'email' => 'evelyn.carty@gov.bc.ca', 'name' => 'Evelyn Carty', 'password' => 'evelyn@123', 'reporting_to' => 100015,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100021, 'email' => 'merran.davies@gov.bc.ca', 'name' => 'Merran Davies', 'password' => 'merran@123', 'reporting_to' => 100030,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100022, 'email' => 'leah.good@gov.bc.ca', 'name' => 'Leah Good', 'password' => 'leah@123', 'reporting_to' => 100042,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100023, 'email' => 'robert.hall@gov.bc.ca', 'name' => 'Robert Hall', 'password' => 'robert@123', 'reporting_to' => 100028,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100024, 'email' => 'mehdi.hashemi@gov.bc.ca', 'name' => 'Mehdi Hashemi', 'password' => 'mehdi@123', 'reporting_to' => 100019,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100025, 'email' => 'kimberlee.johns@gov.bc.ca', 'name' => 'Kimberlee Johns', 'password' => 'kimberlee@123', 'reporting_to' => 100027,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100026, 'email' => 'john.paul.johnson@gov.bc.ca', 'name' => 'John Paul Johnson', 'password' => 'john paul@123', 'reporting_to' => 100025,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100027, 'email' => 'tonja.joyce@gov.bc.ca', 'name' => 'Tonja Joyce', 'password' => 'tonja@123', 'reporting_to' => 100014,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100028, 'email' => 'rakiya.larkin@gov.bc.ca', 'name' => 'Rakiya Larkin', 'password' => 'rakiya@123', 'reporting_to' => 100018,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100029, 'email' => 'anita.lyapina@gov.bc.ca', 'name' => 'Anita Lyapina', 'password' => 'anita@123', 'reporting_to' => 100025,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100030, 'email' => 'martina.mangion@gov.bc.ca', 'name' => 'Martina Mangion', 'password' => 'martina@123', 'reporting_to' => 100014,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100031, 'email' => 'gabriele.marchese@gov.bc.ca', 'name' => 'Gabriele Marchese', 'password' => 'gabriele@123', 'reporting_to' => 100025,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100032, 'email' => 'gloria.mendez@gov.bc.ca', 'name' => 'Gloria Mendez', 'password' => 'gloria@123', 'reporting_to' => 100025,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100033, 'email' => 'wendy.ormond@gov.bc.ca', 'name' => 'Wendy Ormond', 'password' => 'wendy@123', 'reporting_to' => 100043,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100034, 'email' => 'crystal.percival@gov.bc.ca', 'name' => 'Crystal Percival', 'password' => 'crystal@123', 'reporting_to' => 100043,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100035, 'email' => 'crystal.redman@gov.bc.ca', 'name' => 'Crystal Redman', 'password' => 'crystal@123', 'reporting_to' => 100014,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100036, 'email' => 'starlee.renton@gov.bc.ca', 'name' => 'Starlee Renton', 'password' => 'starlee@123', 'reporting_to' => 100025,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100037, 'email' => 'melissa.roht@gov.bc.ca', 'name' => 'Melissa Roht', 'password' => 'melissa@123', 'reporting_to' => 100042,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100038, 'email' => 'jaclyn.sadler@gov.bc.ca', 'name' => 'Jaclyn Sadler', 'password' => 'jaclyn@123', 'reporting_to' => 100018,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100039, 'email' => 'greg.szabo@gov.bc.ca', 'name' => 'Greg Szabo', 'password' => 'greg@123', 'reporting_to' => 100025,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100040, 'email' => 'sheralie.taylor@gov.bc.ca', 'name' => 'Sheralie Taylor', 'password' => 'sheralie@123', 'reporting_to' => 100038,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100041, 'email' => 'heather.thorburn@gov.bc.ca', 'name' => 'Heather Thorburn', 'password' => 'heather@123', 'reporting_to' => 100043,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100042, 'email' => 'michelle.tindall@gov.bc.ca', 'name' => 'Michelle Tindall', 'password' => 'michelle@123', 'reporting_to' => 100015,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100043, 'email' => 'trish.wetterberg@gov.bc.ca', 'name' => 'Trish Wetterberg', 'password' => 'trish@123', 'reporting_to' => 100014,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100044, 'email' => 'norma.glendinning@gov.bc.ca', 'name' => 'Norma Glendinning', 'password' => 'norma@123',  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100045, 'email' => 'avril.harkness-miller@gov.bc.ca', 'name' => 'Avril Harkness-Miller', 'password' => 'avril@123', 'reporting_to' => 100044,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100046, 'email' => 'alexis.eagles@gov.bc.ca', 'name' => 'Alexis Eagles', 'password' => 'alexis@123', 'reporting_to' => 100045,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100047, 'email' => 'adonica.sweet@gov.bc.ca', 'name' => 'Adonica Sweet', 'password' => 'adonica@123', 'reporting_to' => 100045,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100048, 'email' => 'marianna.dowhaniuk@gov.bc.ca', 'name' => 'Marianna Dowhaniuk', 'password' => 'marianna@123', 'reporting_to' => 100045,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100049, 'email' => 'nichole.grenier@gov.bc.ca', 'name' => 'Nichole Grenier', 'password' => 'nichole@123', 'reporting_to' => 100045,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100050, 'email' => 'terri.trevors@gov.bc.ca', 'name' => 'Terri Trevors', 'password' => 'terri@123', 'reporting_to' => 100045,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100051, 'email' => 'bob.scott@gov.bc.ca', 'name' => 'Bob Scott', 'password' => 'bob@123',  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100052, 'email' => 'jennifer.mcgarvie@gov.bc.ca', 'name' => 'Jennifer McGarvie', 'password' => 'jennifer@123', 'reporting_to' => 100051,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100053, 'email' => 'kevin.unrau@gov.bc.ca', 'name' => 'Kevin Unrau', 'password' => 'kevin@123', 'reporting_to' => 100052,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100054, 'email' => 'wina.lee@gov.bc.ca ', 'name' => 'Wina Lee', 'password' => 'wina@123', 'reporting_to' => 100052,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100055, 'email' => 'ricky.yap@gov.bc.ca ', 'name' => 'Ricky Yap', 'password' => 'ricky@123', 'reporting_to' => 100052,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100056, 'email' => 'kelly.penner@gov.bc.ca', 'name' => 'Kelly Penner', 'password' => 'kelly@123',  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100057, 'email' => 'amber.kendall@gov.bc.ca', 'name' => 'Amber Kendall', 'password' => 'amber@123', 'reporting_to' => 100056,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100058, 'email' => 'nicole.n.brown@gov.bc.ca', 'name' => 'Nicole Brown', 'password' => 'nicole@123', 'reporting_to' => 100055,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100059, 'email' => 'stephaney.kolp@gov.bc.ca', 'name' => 'Stephaney Kolp', 'password' => 'stephaney@123',  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100060, 'email' => 'camille.parent@gov.bc.ca', 'name' => 'Camille Parent', 'password' => 'camille@123', 'reporting_to' => 100059,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100061, 'email' => 'jinita.bhulabhai@gov.bc.ca', 'name' => 'Jinita Bhulabhai', 'password' => 'jinita@123', 'reporting_to' => 100060,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100062, 'email' => 'michelle.neuman@gov.bc.ca', 'name' => 'Michelle Neuman', 'password' => 'michelle@123', 'reporting_to' => 100061,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100063, 'email' => 'erik.wanless@gov.bc.ca', 'name' => 'Erik Wanless', 'password' => 'erik@123',  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100064, 'email' => 'cara.mcgregor@gov.bc.ca', 'name' => 'Cara McGregor', 'password' => 'cara@123', 'reporting_to' => 100063,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100065, 'email' => 'jackie.morrison@gov.bc.ca', 'name' => 'Jackie Morrison', 'password' => 'jackie@123', 'reporting_to' => 100064,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100066, 'email' => 'britney.mace@gov.bc.ca', 'name' => 'Britney Mace', 'password' => 'britney@123', 'reporting_to' => 100064,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100067, 'email' => 'eleanor.mulloy@gov.bc.ca', 'name' => 'Eleanor Mulloy', 'password' => 'eleanor@123', 'reporting_to' => 100063,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100068, 'email' => 'gina.armstrong@gov.bc.ca', 'name' => 'Gina Armstrong', 'password' => 'gina@123', 'reporting_to' => 100064,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100069, 'email' => 'caroline.birnie@gov.bc.ca', 'name' => 'Caroline Birnie', 'password' => 'caroline@123',  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100070, 'email' => 'karley.webb@gov.bc.ca', 'name' => 'Karley Webb', 'password' => 'karley@123', 'reporting_to' => 100069,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100071, 'email' => 'miranda.riou-green@gov.bc.ca', 'name' => 'Miranda Riou-Green', 'password' => 'miranda@123', 'reporting_to' => 100070,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100072, 'email' => 'cleo.boucher@gov.bc.ca', 'name' => 'Cleo Boucher', 'password' => 'cleo@123',  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100073, 'email' => 'travis.clark@gov.bc.ca', 'name' => 'Travis Clark', 'password' => 'travis@123', 'reporting_to' => 100072,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100074, 'email' => 'ruben.bronee@gov.bc.ca', 'name' => 'Rueben Bronee', 'password' => 'rueben@123',  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100075, 'email' => 'mikayla.ford@gov.bc.ca', 'name' => 'Mikalya Ford', 'password' => 'mikalya@123', 'reporting_to' => 100074,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100076, 'email' => 'carl.jensen@gov.bc.ca', 'name' => 'Carl Jensen', 'password' => 'carl@123', 'reporting_to' => 100075,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100077, 'email' => 'christine.kormos@gov.bc.ca', 'name' => 'Christine Kormos', 'password' => 'christine@123', 'reporting_to' => 100075,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100078, 'email' => 'takuro.ishikawa@gov.bc.ca', 'name' => 'Tak Ishikawa', 'password' => 'tak@123', 'reporting_to' => 100076,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100079, 'email' => 'lindsay.milespickup@gov.bc.ca', 'name' => 'Lindsay Miles-Pickup', 'password' => 'lindsay@123', 'reporting_to' => 100076,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100080, 'email' => 'stephanie.wilkie@gov.bc.ca', 'name' => 'Steph Wilkie', 'password' => 'steph@123', 'reporting_to' => 100076,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100081, 'email' => 'keith.parker@gov.bc.ca', 'name' => 'Keith Parker', 'password' => 'keith@123',  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100082, 'email' => 'forrest.jacob@gov.bc.ca', 'name' => 'Forrest Jacob', 'password' => 'forrest@123', 'reporting_to' => 100081,  'role' => 'Supervisor', 'joining_date' => '15-JAN-2022' ],
      // [ 'id' => 100083, 'email' => 'jennifer.a.little@gov.bc.ca', 'name' => 'Jennifer Little', 'password' => 'jennifer@123', 'reporting_to' => 100082,  'role' => 'Employee', 'joining_date' => '15-JAN-2022' ],
    ];

    $azure_users = [ 
    [
      'id' => 702, 
      'name' => 'Supervisor One', 
      'email' => 'supervisor1@extest.gov.bc.ca', 
      'azure_id' => 'd321f903-1418-4777-805c-b588857703c9',
      "password" => 'watchdog', 
      "reporting_to" => null, 
      "joining_date" => '11-OCT-2011', 
      'role' => 'Employee',
      "samaccountname" => 'SUPERVISOR1', 
      'guid' => 'FE40A79B39134D49B363FFEB2DBECC71'
    ],
    [ 
      'id' => 701, 
      'name' => 'Employee 11', 
      'email' => 'employee11@extest.gov.bc.ca', 
      'azure_id' => 'c910c169-eb51-43f6-8923-2640e7c75400', 
      "password" => 'watchdog', 
      "reporting_to" => 702, 
      "joining_date" => '06-FEB-2020', 
      'role' => 'Employee',
      "samaccountname" => 'EMPLOYEE11', 
      'guid' => '11B8F4AEAB4A44CF95EFA80B418ED70B'
    ],
    [ 
      'id' => 703, 
      'name' => 'Employee 12', 
      'email' => 'employee12@extest.gov.bc.ca', 
      'azure_id' => 'c9a685ac-4489-4c9e-ad64-a87bdf846467',
      "password" => 'watchdog', 
      "reporting_to" => 702, 
      "joining_date" => '20-JUL-2011', 
      'role' => 'Employee',
      "samaccountname" => 'EMPLOYEE12', 
      'guid' => '844CC197345F4338B2AF76454137267D'
    ],
    [ 
      'id' => 704, 
      'name' => 'Employee 13', 
      'email' => 'employee13@extest.gov.bc.ca', 
      'azure_id' => 'b859ce71-b123-46c8-9ea3-001be8cc5618', 
      "password" => 'watchdog', 
      "reporting_to" => 702, 
      "joining_date" => '10-FEB-2005', 
      'role' => 'Employee',
      "samaccountname" => 'EMPLOYEE13', 
      'guid' => 'F65BFEC28FC34F658F6927176244AA03'
    ],
    [ 
      'id' => 705, 
      'name' => 'Supervisor Two', 
      'email' => 'supervisor2@extest.gov.bc.ca', 
      'azure_id' => 'ee7a7585-34da-4c00-b802-ccfdc0233381',
      "password" => 'watchdog', 
      "reporting_to" => null, 
      "joining_date" => '14-JUL-2008', 
      'role' => 'Employee',
      "samaccountname" => 'SUPERVISOR1', 
      'guid' => 'D097DC45D450428898145D17319CD754'
    ],
    [ 
      'id' => 706, 
      'name' => 'Employee 21', 
      'email' => 'employee21@extest.gov.bc.ca', 
      'azure_id' => '8bdd1142-26fb-405f-80ad-1c27a1d2c716',
      "password" => 'watchdog', 
      "reporting_to" => 705, 
      "joining_date" => '25-APR-2014', 
      'role' => 'Employee',
      "samaccountname" => 'EMPLOYEE21', 
      'guid' => '1EF27D0F64204C5A96B565184D6CC624'
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

    // Part-2 Azure Test domain users
    foreach ($azure_users as $user) {
      $entry = User::updateOrCreate([
        'email' => $user['email'],
      ], [
        'id' => $user['id'],
        'name' => $user['name'],
        'password' => Hash::make($user['password']),
        'azure_id' => $user['azure_id'], 
        'reporting_to' => $user['reporting_to'] ?? null,
        'joining_date' => Carbon::createFromFormat("d-M-Y", $user['joining_date']),
        'samaccountname' => $user['samaccountname'],
        'guid' => $user['guid'],

      ]);

      $entry->assignRole($user['role']);
    }



  }
}

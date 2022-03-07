<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class UserTableSeeder_Additional_20220307 extends Seeder
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
        [ 'id' => 120000, 'email' => 'elaine.1.abanto@gov.bc.ca', 'name' => 'Elaine Abanto', 'password' => 'elaine@123', 'reporting_to' => 120015,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120001, 'email' => 'tanvi.ahuja@gov.bc.ca', 'name' => 'Tanvi Ahuja', 'password' => 'tanvi@123', 'reporting_to' => 120028,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120002, 'email' => 'iris.andrews@gov.bc.ca', 'name' => 'Iris Andrews', 'password' => 'iris@123', 'reporting_to' => 120015,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120003, 'email' => 'petrina.barrett@gov.bc.ca', 'name' => 'Petrina Barrett', 'password' => 'petrina@123', 'reporting_to' => 120032,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120004, 'email' => 'nicole.benbow@gov.bc.ca', 'name' => 'Nicole Benbow', 'password' => 'nicole@123', 'reporting_to' => 120023,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120005, 'email' => 'nicholas.berry@gov.bc.ca', 'name' => 'Nicholas Berry', 'password' => 'nicholas@123', 'reporting_to' => 120015,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120006, 'email' => 'alison.buchanan@gov.bc.ca', 'name' => 'Alison Buchanan', 'password' => 'alison@123', 'reporting_to' => 120028,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120007, 'email' => 'julianne.burslem@gov.bc.ca', 'name' => 'Julianne Burslem', 'password' => 'julianne@123', 'reporting_to' => 120024,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120008, 'email' => 'ian.busby@gov.bc.ca', 'name' => 'Ian Busby', 'password' => 'ian@123', 'reporting_to' => 120032,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120009, 'email' => 'fred.campbell@gov.bc.ca', 'name' => 'Frederick Campbell', 'password' => 'frederick@123', 'reporting_to' => 120016,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120010, 'email' => 'jaspal.dhaliwal@gov.bc.ca', 'name' => 'Jaspal Dhaliwal', 'password' => 'jaspal@123', 'reporting_to' => 120000,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120011, 'email' => 'emma.forristal@gov.bc.ca', 'name' => 'Emma Forristal', 'password' => 'emma@123', 'reporting_to' => 120037,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120012, 'email' => 'anthony.gabriel@gov.bc.ca', 'name' => 'Anthony Gabriel', 'password' => 'anthony@123', 'reporting_to' => 120037,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120013, 'email' => 'caylla.harvey@gov.bc.ca', 'name' => 'Caylla Harvey', 'password' => 'caylla@123', 'reporting_to' => 120000,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120014, 'email' => 'stuart.hemerling@gov.bc.ca', 'name' => 'Stuart Hemerling', 'password' => 'stuart@123', 'reporting_to' => 120016,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120015, 'email' => 'ian.hennem@gov.bc.ca', 'name' => 'Ian Hennem', 'password' => 'ian@123', 'reporting_to' => 120032,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120016, 'email' => 'steven.jones@gov.bc.ca', 'name' => 'Steven Jones', 'password' => 'steven@123', 'reporting_to' => 120008,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120017, 'email' => 'christine.kapoor@gov.bc.ca', 'name' => 'Christine Kapoor', 'password' => 'christine@123', 'reporting_to' => 120028,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120018, 'email' => 'tyler.king@gov.bc.ca', 'name' => 'Tyler King', 'password' => 'tyler@123', 'reporting_to' => 120016,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120019, 'email' => 'igor.krasnov@gov.bc.ca', 'name' => 'Igor Krasnov', 'password' => 'igor@123', 'reporting_to' => 120005,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120020, 'email' => 'donna.launay@gov.bc.ca', 'name' => 'Donna Launay', 'password' => 'donna@123', 'reporting_to' => 120030,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120021, 'email' => 'carrie.mccaffery@gov.bc.ca', 'name' => 'Carrie McCaffery', 'password' => 'carrie@123', 'reporting_to' => 120015,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120022, 'email' => 'ian.mcneill@gov.bc.ca', 'name' => 'Ian McNeill', 'password' => 'ian@123', 'reporting_to' => 120015,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120023, 'email' => 'laura.monner@gov.bc.ca', 'name' => 'Laura Monner', 'password' => 'laura@123', 'reporting_to' => 120016,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120024, 'email' => 'jennifer.l.oneill@gov.bc.ca', 'name' => 'Jennifer O\'Neill', 'password' => 'jennifer@123', 'reporting_to' => 120005,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120025, 'email' => 'lori.pater@gov.bc.ca', 'name' => 'Lorene Pater', 'password' => 'lorene@123', 'reporting_to' => 120024,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120026, 'email' => 'courtney.price@gov.bc.ca', 'name' => 'Courtney Price', 'password' => 'courtney@123', 'reporting_to' => 120022,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120027, 'email' => 'nataliya.sarnetska@gov.bc.ca', 'name' => 'Nataliya Sarnetska', 'password' => 'nataliya@123', 'reporting_to' => 120023,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120028, 'email' => 'glen.seredynski@gov.bc.ca', 'name' => 'Glen Seredynski', 'password' => 'glen@123', 'reporting_to' => 120008,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120029, 'email' => 'tanya.sheena@gov.bc.ca', 'name' => 'Tanya Sheena', 'password' => 'tanya@123', 'reporting_to' => 120037,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120030, 'email' => 'todd.sheridan@gov.bc.ca', 'name' => 'Todd Sheridan', 'password' => 'todd@123', 'reporting_to' => 120036,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120031, 'email' => 'akihiro.shin@gov.bc.ca', 'name' => 'Akihiro Shin', 'password' => 'akihiro@123', 'reporting_to' => 120016,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120032, 'email' => 'dean.skinner@gov.bc.ca', 'name' => 'Dean Skinner', 'password' => 'dean@123',  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120033, 'email' => 'jonathan.stedman@gov.bc.ca', 'name' => 'Jonathan Stedman', 'password' => 'jonathan@123', 'reporting_to' => 120024,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120034, 'email' => 'stewart.thompson@gov.bc.ca', 'name' => 'Stewart Thompson', 'password' => 'stewart@123', 'reporting_to' => 120022,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120035, 'email' => 'jennifer.todd@gov.bc.ca', 'name' => 'Jennifer Todd', 'password' => 'jennifer@123', 'reporting_to' => 120037,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120036, 'email' => 'peter.velinov@gov.bc.ca', 'name' => 'Peter Velinov', 'password' => 'peter@123', 'reporting_to' => 120015,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120037, 'email' => 'carter.williamson@gov.bc.ca', 'name' => 'Carter Williamson', 'password' => 'carter@123', 'reporting_to' => 120015,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120038, 'email' => 'mikayla.ford@gov.bc.ca', 'name' => 'Mikayla Ford', 'password' => 'mikayla@123',  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120039, 'email' => 'christine.kormos@gov.bc.ca', 'name' => 'Christine Kormos', 'password' => 'christine@123', 'reporting_to' => 120040,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120040, 'email' => 'takuro.ishikawa@gov.bc.ca', 'name' => 'Tak Ishikawa', 'password' => 'tak@123', 'reporting_to' => 120038,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120041, 'email' => 'karley.webb@gov.bc.ca', 'name' => 'Karley Webb', 'password' => 'karley@123', 'reporting_to' => 120043,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120042, 'email' => 'miranda.riou-green@gov.bc.ca', 'name' => 'Miranda Riou-Green', 'password' => 'miranda@123', 'reporting_to' => 120041,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120043, 'email' => 'caroline.birnie@gov.bc.ca', 'name' => 'Caroline Birnie', 'password' => 'caroline@123',  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120044, 'email' => 'matthew.waters@gov.bc.ca', 'name' => 'Matt Waters', 'password' => 'matt@123',  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120045, 'email' => 'indira.cruz@gov.bc.ca', 'name' => 'Indira Cruz', 'password' => 'indira@123', 'reporting_to' => 120044,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120046, 'email' => 'employee.one@gov.bc.ca', 'name' => 'Employee One', 'password' => 'employee@123', 'reporting_to' => 120045,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120047, 'email' => 'christina.vendramin@gov.bc.ca', 'name' => 'Christina Vendramin', 'password' => 'christina@123',  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120048, 'email' => 'lisa.sorensen@gov.bc.ca', 'name' => 'Lisa Sorensen', 'password' => 'lisa@123', 'reporting_to' => 120047,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120049, 'email' => 'employee.two@gov.bc.ca', 'name' => 'Employee Two', 'password' => 'employee@123', 'reporting_to' => 120048,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120050, 'email' => 'greg.bartlett@gov.bc.ca', 'name' => 'Greg Bartlett', 'password' => 'greg@123', 'reporting_to' => 120044,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120051, 'email' => 'employee.three@gov.bc.ca', 'name' => 'Employee Three', 'password' => 'employee@123', 'reporting_to' => 120050,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120052, 'email' => 'randee.nelson@gov.bc.ca', 'name' => 'Randee Nelson', 'password' => 'randee@123', 'reporting_to' => 120075,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120053, 'email' => 'employee.four@gov.bc.ca', 'name' => 'Employee Four', 'password' => 'employee@123', 'reporting_to' => 120052,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120054, 'email' => 'danette.grimason@gov.bc.ca', 'name' => 'Danette Grimason', 'password' => 'danette@123', 'reporting_to' => 120064,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120055, 'email' => 'employee.five@gov.bc.ca', 'name' => 'Employee Five', 'password' => 'employee@123', 'reporting_to' => 120054,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120056, 'email' => 'christopher.swan@gov.bc.ca', 'name' => 'Chris Swan', 'password' => 'chris@123', 'reporting_to' => 120064,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120057, 'email' => 'employee.six@gov.bc.ca', 'name' => 'Employee Six', 'password' => 'employee@123', 'reporting_to' => 120056,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120058, 'email' => 'tony.marrington@gov.bc.ca', 'name' => 'Tony Marrington', 'password' => 'tony@123', 'reporting_to' => 120065,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120059, 'email' => 'employee.seven@gov.bc.ca', 'name' => 'Employee Seven', 'password' => 'employee@123', 'reporting_to' => 120058,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120060, 'email' => 'lyle.blomquist@gov.bc.ca', 'name' => 'Lyle Blomquist', 'password' => 'lyle@123', 'reporting_to' => 120065,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120061, 'email' => 'employee.eight@gov.bc.ca', 'name' => 'Employee Eight', 'password' => 'employee@123', 'reporting_to' => 120060,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120062, 'email' => 'nathan.caller@gov.bc.ca', 'name' => 'Nathan Caller', 'password' => 'nathan@123', 'reporting_to' => 120066,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120063, 'email' => 'employee.nine@gov.bc.ca', 'name' => 'Employee Nine', 'password' => 'employee@123', 'reporting_to' => 120062,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120064, 'email' => 'melody.shepherd@gov.bc.ca', 'name' => 'Melody Shepherd', 'password' => 'melody@123',  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120065, 'email' => 'emilio.magliocchi@gov.bc.ca', 'name' => 'Emilio Magliocchi', 'password' => 'emilio@123',  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120066, 'email' => 'joe.gosse@gov.bc.ca', 'name' => 'Joe Gosse', 'password' => 'joe@123',  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120067, 'email' => 'greg.campbell@gov.bc.ca', 'name' => 'Greg Campbell', 'password' => 'greg@123', 'reporting_to' => 120076,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120068, 'email' => 'employee.ten@gov.bc.ca', 'name' => 'Employee Ten', 'password' => 'employee@123', 'reporting_to' => 120067,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120069, 'email' => 'oliver.mckenzie@gov.bc.ca', 'name' => 'Oliver McKenzie', 'password' => 'oliver@123', 'reporting_to' => 120076,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120070, 'email' => 'employee.eleven@gov.bc.ca', 'name' => 'Employee Eleven', 'password' => 'employee@123', 'reporting_to' => 120069,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120071, 'email' => 'ryan.payment@gov.bc.ca', 'name' => 'Ryan Payment', 'password' => 'ryan@123', 'reporting_to' => 120047,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120072, 'email' => 'employee.twelve@gov.bc.ca', 'name' => 'Employee Twelve', 'password' => 'employee@123', 'reporting_to' => 120071,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120073, 'email' => 'matt.hawes@gov.bc.ca', 'name' => 'Matt Hawes', 'password' => 'matt@123', 'reporting_to' => 120075,  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120074, 'email' => 'employee.thirteen@gov.bc.ca', 'name' => 'Employee Thirteen', 'password' => 'employee@123', 'reporting_to' => 120073,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120075, 'email' => 'sherry.froehlich@gov.bc.ca', 'name' => 'Sherry Froehlich', 'password' => 'sherry@123',  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120076, 'email' => 'kenneth.kay@gov.bc.ca', 'name' => 'Ken Kay', 'password' => 'ken@123',  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120077, 'email' => 'travis.clark@gov.bc.ca', 'name' => 'Travis Clark', 'password' => 'travis@123', 'reporting_to' => 120079,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120078, 'email' => 'cleo.boucher@gov.bc.ca', 'name' => 'Cleo Boucher', 'password' => 'cleo@123',  'role' => 'Supervisor', 'joining_date' => '01-MAR-2022' ],
        [ 'id' => 120079, 'email' => 'caitlyn.rutledge@gov.bc.ca', 'name' => 'Caitlyn Rutledge', 'password' => 'caitlyn@123', 'reporting_to' => 120078,  'role' => 'Employee', 'joining_date' => '01-MAR-2022' ],

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

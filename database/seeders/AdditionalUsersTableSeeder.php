<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdditionalUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = ["PSA","AEST","AFF","AG","MCF","CITZ","EDUC","EMLI","ENV","FIN","FLNR","HLTH","IRR","JERI","LBR","MHA","MUNI","PSSG","SDPR","TACS","TRAN"];
        $NO_OF_ACCOUNT_PER_DEPT = 9;

        $users = [];
        foreach ($departments as $dept) {
            for ($i=1; $i <= $NO_OF_ACCOUNT_PER_DEPT; $i++) { 
                $user = [
                    'email' => $dept . $i . '@example.com',
                    'name' => $dept . $i,
                    'password' => $dept . $i . '@123'
                ];
                array_push($users, $user);
            }
        }

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

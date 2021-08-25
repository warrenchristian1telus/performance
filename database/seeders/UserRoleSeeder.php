<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->setupEmployeeRole();
        $this->setupSupervisorRole();
    }

    public function setupEmployeeRole() {
        $permissions = [
            [
                'name' => 'dashboard',
                'guard_name' => 'web'
            ],
            [
                'name' => 'goals',
                'guard_name' => 'web'
            ],
            [
                'name' => 'conversions',
                'guard_name' => 'web'
            ]
        ];

        $this->setupUserRolePermission(
            [998, 999, 1901],
            $permissions,
            'Employee',
            true
        );
    }

    public function setupSupervisorRole() {

        $permissions = [
            [
                'name' => 'dashboard',
                'guard_name' => 'web'
            ],
            [
                'name' => 'goals',
                'guard_name' => 'web'
            ],
            [
                'name' => 'conversions',
                'guard_name' => 'web'
            ],
            [
                'name' => 'my team',
                'guard_name' => 'web'
            ]
        ];

        $this->setupUserRolePermission(
            [999, 998, 1901],
            $permissions,
            'Supervisor'
        );

    }

    public function setupUserRolePermission($userIds, $permissions, $roleName, $userIdsNotIn = false) {
        
        $query = new User;
        
        if ($userIdsNotIn) {
            $query = $query->whereNotIn("id", $userIds);
        } else {
            $query = $query->whereIn("id", $userIds);
        }

        $users = $query->get();

        $permissionObj = $this->createPermissions($permissions);

        $role = Role::updateOrCreate([
            'name' => $roleName,
        ]);

        $role->syncPermissions(array_map(function ($p) {
            return $p->id;
        }, $permissionObj));

        foreach ($users as $user) {
            $user->assignRole([$role->id]);
        } 
    }


    public function createPermissions($permissions) : array {
        $permissionsObj = [];
        foreach ($permissions as $permission) {
            $per = Permission::updateOrCreate($permission, $permission);
            array_push($permissionsObj, $per);
        }
        return $permissionsObj;
    }
}

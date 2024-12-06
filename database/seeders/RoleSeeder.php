<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::findByName('Admin');
        $executive = Role::findByName('Executive');
        $employee = Role::findByName('Employee');
        $customer = Role::findByName('Customer');

        $admin->givePermissionTo([
            'admin',
            'executive',
            'employee',
            'customer'
        ]);

        $executive->givePermissionTo([
            'executive',
            'employee',
            'customer'
        ]);

        $employee->givePermissionTo([
            'employee',
            'customer'
        ]);

        $customer->givePermissionTo([
            'customer'
        ]);
    }
}

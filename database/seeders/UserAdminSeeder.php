<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = 'admin';
        $superAdminRole = 'super-admin';
        $userRole = 'user';

        $userAdmin = User::firstOrCreate([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('Password1'),
        ]);

        $userAdmin->syncRoles([$adminRole]);

        $userSuperAdmin = User::firstOrCreate([
            'name' => 'super-admin',
            'email' => 'super-admin@mail.ru',
            'password' => Hash::make('Password1'),
        ]);

        $userSuperAdmin->syncRoles([$superAdminRole]);

        $user = User::firstOrCreate([
            'name' => 'user',
            'email' => 'user@mail.ru',
            'password' => Hash::make('Password1'),
        ]);

        $user->syncRoles([$userRole]);
    }
}

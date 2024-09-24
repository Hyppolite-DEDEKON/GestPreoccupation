<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Vérifie si l'utilisateur Admin existe
        if (User::where('email', 'admin@example.com')->doesntExist()) {
            $adminRole = Role::where('name', 'admin')->first();

            // Crée l'utilisateur Admin
            User::create([
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin'),
                'role_id' => $adminRole->id,  // Associe le rôle Admin
            ]);
        }
    }
}

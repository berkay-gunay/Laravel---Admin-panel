<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::updateOrCreate(
            ['username' => 'admin'], 
            [
                'name' => 'Berkay',
                'email' => 'admin@berkay.com',
                'password' => Hash::make('Admin123!'),
            ]
        );
    }
}

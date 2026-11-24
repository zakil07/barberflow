<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@barberflow.test'],
            [
                'name' => 'Administrator BarberFlow',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'                  => 'User',
            'email'                 => 'user@gmail.com',
            'email_verified_at'     => now(),
            'password'              => bcrypt(123),
            'login_as'              => 'student',
        ]);

        User::create([
            'name'                  => 'Instructor',
            'email'                 => 'instructor@gmail.com',
            'email_verified_at'     => now(),
            'password'              => bcrypt(123),
            'login_as'              => 'instructor',
        ]);
    }
}

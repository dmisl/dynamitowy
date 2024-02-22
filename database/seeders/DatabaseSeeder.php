<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // creating user roles
        Role::create(['name' => 'student']);
        Role::create(['name' => 'teacher']);
        Role::create(['name' => 'headmaster']);

        // creating admin user
        User::create(['name' => 'Admin Adminiv', 'email' => 'admin@gmail.com', 'password' => 'adminn', 'role_id' => 1]);
        // creating teacher
        User::create(['name' => 'Mariya Bogdanivna', 'email' => 'pizdamyroska@gmail.com', 'password' => 'adminn', 'role_id' => 2]);

        // TO DO!!!!
        // TO DO!!!!
        // TO DO!!!!
        // TO DO!!!!
        // TO DO!!!!
        // TO DO!!!!
        // Teacher::create(['user_id' => 2, ])

        // creating subjects
        Subject::create(['name' => 'History', 'user_id' => 2]);
    }
}

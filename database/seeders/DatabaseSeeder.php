<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Classroom;
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
        User::create(['name' => 'Admin Adminiv', 'email' => 'admin@gmail.com', 'password' => 'adminn', 'role_id' => 3]);
        // creating teachers and their users
        User::create(['name' => 'Gierach Janusz', 'email' => 'gierach_janusz@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Motas-Korzonek Magdalena', 'email' => 'motas_magdalena@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Mekal Tomasz', 'email' => 'mekal_tomasz@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Stadnik-Komorkiewicz Renata', 'email' => 'komorkiewicz_renata@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Belotti Marek', 'email' => 'belotti_marek@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Wisniewski Rafal', 'email' => 'wisniewski_rafal@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Zych Franciszek', 'email' => 'zych_franciszek@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Gorczyca Janusz', 'email' => 'gorczyca_janusz@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Laskowska Malgorzata', 'email' => 'laskowska_malgorzata@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Westler Krzystof', 'email' => 'westler_krzystof@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Trela Marta', 'email' => 'trela_marta@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Bednarczyk Wieslaw', 'email' => 'bednarczyk_wieslaw@gmail.com', 'password' => 'teacher', 'role_id' => 2]);

        $count = User::all()->count();
        for ($i = 2; $i < $count; $i++) {
            Teacher::create(['user_id' => $i]);
        }

        // creating subjects
        Subject::create(['name' => 'Wychowanie fizyczne', 'teacher_id' => 1]);
        Subject::create(['name' => 'Jezyk polski', 'teacher_id' => 2]);
        Subject::create(['name' => 'Matematyka', 'teacher_id' => 3]);
        Subject::create(['name' => 'Jezyk angielski', 'teacher_id' => 4]);
        Subject::create(['name' => 'Testowanie i dokumentowanie aplikacji', 'teacher_id' => 5]);
        Subject::create(['name' => 'Programowanie obiektowe', 'teacher_id' => 6]);
        Subject::create(['name' => 'Programowanie aplikacji desktowych', 'teacher_id' => 6]);
        Subject::create(['name' => 'Praktyka zawodowa', 'teacher_id' => 6]);
        Subject::create(['name' => 'Programowanie obiektowe', 'teacher_id' => 6]);
        Subject::create(['name' => 'Programowanie aplikacji mobilnych', 'teacher_id' => 6]);
        Subject::create(['name' => 'Programowanie aplikacji zaawansowanych', 'teacher_id' => 6]);
        Subject::create(['name' => 'Matematyka', 'teacher_id' => 7]);
        Subject::create(['name' => 'Fizyka', 'teacher_id' => 7]);
        Subject::create(['name' => 'Historia', 'teacher_id' => 8]);
        Subject::create(['name' => 'Wiedza o spoleczenstwie', 'teacher_id' => 8]);
        Subject::create(['name' => 'Chemia', 'teacher_id' => 9]);
        Subject::create(['name' => 'Biologia', 'teacher_id' => 10]);
        Subject::create(['name' => 'Geografia', 'teacher_id' => 11]);
        Subject::create(['name' => 'Jezyk niemiecki', 'teacher_id' => 12]);
        Subject::create(['name' => 'Zajecia z wychowawca', 'teacher_id' => 13]);

        // creating students and their classroom
        Classroom::create(['name' => '4TIP', 'teacher_id' => 12]);

        User::create(['name' => 'Kamil Balda', 'email' => 'kamil_balda@gmail.com', 'classroom_id' => 1, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Vadym Yakymiv', 'email' => 'vadym_yakymiv@gmail.com', 'classroom_id' => 1, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Ivan Kompaniiets', 'email' => 'ivan_kompanieets@gmail.com', 'classroom_id' => 1, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Vitalii Kompaniiets', 'email' => 'vitalii_kompanieets@gmail.com', 'classroom_id' => 1, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Kacper Wozniak', 'email' => 'kacper_wozniak@gmail.com', 'classroom_id' => 1, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Przemek Kasak', 'email' => 'przemek_kasak@gmail.com', 'classroom_id' => 1, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Piotr Niechosa', 'email' => 'piotr_niechosa@gmail.com', 'classroom_id' => 1, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Jakub Ramian', 'email' => 'jakub_ramian@gmail.com', 'classroom_id' => 1, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Denys Shlychkov', 'email' => 'denyk_shlychkov@gmail.com', 'classroom_id' => 1, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Maksym Psyshchanitsa', 'email' => 'maksym_psyshchanitsa@gmail.com', 'classroom_id' => 1, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Wiktor Samolyk', 'email' => 'wiktor_samolyk@gmail.com', 'classroom_id' => 1, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Szczepan Spilczynski', 'email' => 'szczepan_spilczynski@gmail.com', 'classroom_id' => 1, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Kacper Bartoszek', 'email' => 'kacper_bartoszek@gmail.com', 'classroom_id' => 1, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Artur Czernikowski', 'email' => 'artur_czernikowski@gmail.com', 'classroom_id' => 1, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Marcel Mierzwa', 'email' => 'marcel_mierzwa@gmail.com', 'classroom_id' => 1, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Oleg Buhaienko', 'email' => 'oleg_buhaienko@gmail.com', 'classroom_id' => 1, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Markiian Zhylchenko', 'email' => 'markiian_zhylchenko@gmail.com', 'classroom_id' => 1, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Vladyslaw Belza', 'email' => 'vladyslaw_belza@gmail.com', 'classroom_id' => 1, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Dmytro Slutyi', 'email' => 'dmytro_slutyi@gmail.com', 'classroom_id' => 1, 'role_id' => 1, 'password' => 'student']);

    }
}

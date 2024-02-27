<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Classroom;
use App\Models\Lesson;
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
        User::create(['name' => 'Pasieczny Robert', 'email' => 'pasieczny_robert@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Latala Magdalena', 'email' => 'latala_magdalena@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Hala Pawel', 'email' => 'hala_pawel@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Pachucka Haniyeh', 'email' => 'pachucha_haniyeh@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Opiela Elzbieta', 'email' => 'opiela_elzbieta@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Czerwonka Izabela', 'email' => 'czerwonka_izabela@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Zieminski Marek', 'email' => 'zieminski_marek@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Zielinski Robert', 'email' => 'zielinski_robert@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Iwanicki Wojciech', 'email' => 'iwanicki_wojciech@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Bednarczyk Iwona', 'email' => 'bednarczyk_iwona@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Sanecki Robert', 'email' => 'sanecki_robert@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Zych Marta', 'email' => 'zych_marta@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
        User::create(['name' => 'Lysiak-Kosowska Lucyna', 'email' => 'kosowska_lucyna@gmail.com', 'password' => 'teacher', 'role_id' => 2]);

        $count = User::all()->count();
        for ($i = 1; $i < $count; $i++) {
            Teacher::create(['user_id' => $i+1]);
        }

        Teacher::create(['user_id' => 1]);

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

        Subject::create(['name' => 'Jezyk angielski', 'teacher_id' => 14]);
        Subject::create(['name' => 'Jezyk polski', 'teacher_id' => 17]);
        Subject::create(['name' => 'Matematyka', 'teacher_id' => 24]);
        Subject::create(['name' => 'M4.J1.Podlaczanie urzadzen', 'teacher_id' => 19]);
        Subject::create(['name' => 'M4.J2.Obslugiwanie urzadzen', 'teacher_id' => 19]);
        Subject::create(['name' => 'M5.J1.Tworzenie dokumentow', 'teacher_id' => 21]);
        Subject::create(['name' => 'M6.J2.Obsluga pobotow', 'teacher_id' => 19]);
        Subject::create(['name' => 'Wiedza o spoleczenstwie', 'teacher_id' => 24]);
        Subject::create(['name' => 'Wychowanie fizyczne', 'teacher_id' => 23]);
        Subject::create(['name' => 'Praktyka zawodowa', 'teacher_id' => 19]);
        Subject::create(['name' => 'Zajecia z wychowawca', 'teacher_id' => 23]);

        Subject::create(['name' => 'M3.J3 Montowanie elementow', 'teacher_id' => 13]);
        Subject::create(['name' => 'M2.J1 Stosowanie technologii mechanicznej', 'teacher_id' => 15]);
        Subject::create(['name' => 'M3.J1 Montowanie elementow', 'teacher_id' => 21]);
        Subject::create(['name' => 'Podstawy przedsiebiorczosci', 'teacher_id' => 16]);
        Subject::create(['name' => 'Wychowanie fizyczne', 'teacher_id' => 18]);
        Subject::create(['name' => 'Zajecia z wychowawca', 'teacher_id' => 3]);
        Subject::create(['name' => 'Praktyka zawodowa', 'teacher_id' => 20]);
        Subject::create(['name' => 'Informatyka', 'teacher_id' => 22]);

        // creating students and their classroom

        // 4TIP
        Classroom::create(['name' => '4TIP', 'teacher_id' => 26]);

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

        // Sanecki
        // 4TEM
        Classroom::create(['name' => '4TEM', 'teacher_id' => 24]);

        User::create(['name' => 'Oliver Ambroziewicz', 'email' => 'oliver_ambroziewicz@gmail.com', 'classroom_id' => 2, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Jakub Bojarski', 'email' => 'jakub_bojarski@gmail.com', 'classroom_id' => 2, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Nazar Chornyi', 'email' => 'nazar_chornyi@gmail.com', 'classroom_id' => 2, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Wiktor Cudak', 'email' => 'wiktor_cudak@gmail.com', 'classroom_id' => 2, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Tomek Ciastek', 'email' => 'tomek_ciastek@gmail.com', 'classroom_id' => 2, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Lukasz Czernecki', 'email' => 'lukasz_czernecki@gmail.com', 'classroom_id' => 2, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Marcin Lepski', 'email' => 'marcin_lepski@gmail.com', 'classroom_id' => 2, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Patrik Maciong', 'email' => 'patrik_maciong@gmail.com', 'classroom_id' => 2, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Adam Krzeminski', 'email' => 'adam_krzeminski@gmail.com', 'classroom_id' => 2, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Mateusz Mucha', 'email' => 'mateusz_mucha@gmail.com', 'classroom_id' => 2, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Karol Prarzmowski', 'email' => 'karol_prarzmowski@gmail.com', 'classroom_id' => 2, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Pawel Przekota', 'email' => 'pawel_przekota@gmail.com', 'classroom_id' => 2, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Yaroslaw Rudnyk', 'email' => 'yaroslaw_rudnyk@gmail.com', 'classroom_id' => 2, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Arsenii Karalenka', 'email' => 'arsenii_karalenka@gmail.com', 'classroom_id' => 2, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Andriy Rudobelec', 'email' => 'andriy_rudobelec@gmail.com', 'classroom_id' => 2, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Jakub Tarkowski', 'email' => 'jakub_tarkowski@gmail.com', 'classroom_id' => 2, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Maksymilian Wegiel', 'email' => 'maksymilian_wegiel@gmail.com', 'classroom_id' => 2, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Karol Gospodarczyk', 'email' => 'karol_gospodarczyk@gmail.com', 'classroom_id' => 2, 'role_id' => 1, 'password' => 'student']);

        Classroom::create(['name' => '4TEM', 'teacher_id' => 4]);

        User::create(['name' => 'Bogdan Chornyi', 'email' => 'bogdan_chornyi@gmail.com', 'classroom_id' => 3, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Kyrylo Dumanski', 'email' => 'kyrylo_dumanski@gmail.com', 'classroom_id' => 3, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Andriy Bahinski', 'email' => 'andriy_bahinski@gmail.com', 'classroom_id' => 3, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Blarzyj Widkowski', 'email' => 'blarzyj_widkowski@gmail.com', 'classroom_id' => 3, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Kacper Hamera', 'email' => 'kacper_hamera@gmail.com', 'classroom_id' => 3, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Kacper Cihocki', 'email' => 'kacper_cihocki@gmail.com', 'classroom_id' => 3, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Kacper Dyl', 'email' => 'kacper_dyl@gmail.com', 'classroom_id' => 3, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Tomek Wolos', 'email' => 'tomek_wolos@gmail.com', 'classroom_id' => 3, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Dawid Burczy', 'email' => 'dawid_burczy@gmail.com', 'classroom_id' => 3, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Jakub Plaza', 'email' => 'jakub_plaza@gmail.com', 'classroom_id' => 3, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Artur Banas', 'email' => 'artur_banas@gmail.com', 'classroom_id' => 3, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Pawel Perla', 'email' => 'pawel_perla@gmail.com', 'classroom_id' => 3, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Bartek Ordon', 'email' => 'bartek_ordon@gmail.com', 'classroom_id' => 3, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Wiktoria Chryszko', 'email' => 'wiktoria_chryszko@gmail.com', 'classroom_id' => 3, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Marek Chaban', 'email' => 'marek_chaban@gmail.com', 'classroom_id' => 3, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Oleksandr Rezanov', 'email' => 'oleksandr_rezanov@gmail.com', 'classroom_id' => 3, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Olivier Biezdra', 'email' => 'olivier_biezdra@gmail.com', 'classroom_id' => 3, 'role_id' => 1, 'password' => 'student']);
        User::create(['name' => 'Filip Samojeden', 'email' => 'filip_samojeden@gmail.com', 'classroom_id' => 3, 'role_id' => 1, 'password' => 'student']);

        // creating timetable

        // 4TIP

        // Monday
        Lesson::create(['classroom_id' => 1, 'subject_id' => 1, 'day' => 1, 'lesson_number' => 4]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 2, 'day' => 1, 'lesson_number' => 5]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 3, 'day' => 1, 'lesson_number' => 6]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 4, 'day' => 1, 'lesson_number' => 7]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 5, 'day' => 1, 'lesson_number' => 8]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 5, 'day' => 1, 'lesson_number' => 9]);

        // Tuesday
        Lesson::create(['classroom_id' => 1, 'subject_id' => 6, 'day' => 2, 'lesson_number' => 3]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 6, 'day' => 2, 'lesson_number' => 4]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 3, 'day' => 2, 'lesson_number' => 5]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 13, 'day' => 2, 'lesson_number' => 6]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 14, 'day' => 2, 'lesson_number' => 7]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 1, 'day' => 2, 'lesson_number' => 8]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 1, 'day' => 2, 'lesson_number' => 9]);

        // Wednesday
        Lesson::create(['classroom_id' => 1, 'subject_id' => 16, 'day' => 3, 'lesson_number' => 0]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 4, 'day' => 3, 'lesson_number' => 1]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 4, 'day' => 3, 'lesson_number' => 2]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 3, 'day' => 3, 'lesson_number' => 3]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 17, 'day' => 3, 'lesson_number' => 4]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 2, 'day' => 3, 'lesson_number' => 5]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 7, 'day' => 3, 'lesson_number' => 6]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 7, 'day' => 3, 'lesson_number' => 7]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 8, 'day' => 3, 'lesson_number' => 8]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 8, 'day' => 3, 'lesson_number' => 9]);

        // Thursday
        Lesson::create(['classroom_id' => 1, 'subject_id' => 18, 'day' => 4, 'lesson_number' => 2]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 12, 'day' => 4, 'lesson_number' => 3]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 15, 'day' => 4, 'lesson_number' => 4]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 9, 'day' => 4, 'lesson_number' => 5]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 10, 'day' => 4, 'lesson_number' => 6]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 10, 'day' => 4, 'lesson_number' => 7]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 10, 'day' => 4, 'lesson_number' => 8]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 8, 'day' => 4, 'lesson_number' => 9]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 8, 'day' => 4, 'lesson_number' => 10]);

        // Friday
        Lesson::create(['classroom_id' => 1, 'subject_id' => 19, 'day' => 5, 'lesson_number' => 0]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 4, 'day' => 5, 'lesson_number' => 1]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 4, 'day' => 5, 'lesson_number' => 2]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 3, 'day' => 5, 'lesson_number' => 3]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 2, 'day' => 5, 'lesson_number' => 4]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 8, 'day' => 5, 'lesson_number' => 5]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 11, 'day' => 5, 'lesson_number' => 6]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 11, 'day' => 5, 'lesson_number' => 7]);
        Lesson::create(['classroom_id' => 1, 'subject_id' => 20, 'day' => 5, 'lesson_number' => 8]);

        // 4TEP
        Lesson::create(['classroom_id' => 2, 'subject_id' => 1, 'day' => 1, 'lesson_number' => 1]);

    }
}

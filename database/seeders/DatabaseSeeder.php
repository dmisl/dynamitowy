<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Classroom;
use App\Models\GradeType;
use App\Models\Lesson;
use App\Models\PresenceType;
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

        // creating presence types
        PresenceType::create(['desc' => 'Obecny', 'text' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="10" height="10" viewBox="0 0 256 256" xml:space="preserve"><defs></defs><g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" ><path d="M 45 0 C 20.147 0 0 20.147 0 45 c 0 24.853 20.147 45 45 45 s 45 -20.147 45 -45 C 90 20.147 69.853 0 45 0 z M 52.87 52.189 C 50.779 54.063 48.156 55 45 55 c -3.196 0 -5.829 -0.947 -7.9 -2.839 c -2.071 -1.894 -3.107 -4.281 -3.107 -7.161 c 0 -2.878 1.036 -5.266 3.107 -7.161 C 39.171 35.947 41.804 35 45 35 c 3.156 0 5.779 0.937 7.87 2.811 c 2.09 1.874 3.136 4.27 3.136 7.189 C 56.007 47.921 54.961 50.317 52.87 52.189 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" /></g></svg>']);
        PresenceType::create(['desc' => 'Nieobecnosc', 'text' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="10" height="10" viewBox="0 0 256 256" xml:space="preserve"><defs></defs><g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" ><path d="M 86.5 48.5 h -83 C 1.567 48.5 0 46.933 0 45 s 1.567 -3.5 3.5 -3.5 h 83 c 1.933 0 3.5 1.567 3.5 3.5 S 88.433 48.5 86.5 48.5 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(29,29,27); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" /><path d="M 86.5 48.5 h -83 C 1.567 48.5 0 46.933 0 45 s 1.567 -3.5 3.5 -3.5 h 83 c 1.933 0 3.5 1.567 3.5 3.5 S 88.433 48.5 86.5 48.5 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(29,29,27); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" /></g></svg>']);
        PresenceType::create(['desc' => 'Nieobecnosc uspraw.', 'text' => '<p class="p-0 m-0">u</p>']);
        PresenceType::create(['desc' => 'Zwolnienie', 'text' => '<p class="p-0 m-0">z</p>']);
        PresenceType::create(['desc' => 'Spoz. z pow. przy.', 'text' => '<p class="p-0 m-0">s</p>']);
        PresenceType::create(['desc' => 'Spoz. z niepow. przy.', 'text' => '<p class="p-0 m-0">ns</p>']);
        PresenceType::create(['desc' => 'Niewiadomo', 'text' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="10" height="10" viewBox="0 0 256 256" xml:space="preserve"><defs></defs><g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" ><path d="M 63.835 7.659 c -5.257 -5.122 -12.197 -7.834 -19.547 -7.649 C 29.799 0.382 18.012 12.748 18.012 27.574 v 3.955 c 0 0.552 0.448 1 1 1 h 12.334 c 0.552 0 1 -0.448 1 -1 v -4.112 c 0 -6.913 5.419 -12.776 12.081 -13.07 c 3.492 -0.149 6.803 1.088 9.321 3.498 c 2.52 2.411 3.907 5.658 3.907 9.144 v 0.691 c 0 6.893 -5.54 12.517 -12.402 12.652 c -0.081 -0.021 -0.165 -0.032 -0.252 -0.032 c -7.353 0 -13.334 5.982 -13.334 13.334 v 15.237 c 0 0.553 0.448 1 1 1 H 45 c 0.552 0 1 -0.447 1 -1 V 58.096 c 0 -1.86 1.337 -3.468 3.109 -3.739 c 13.043 -1.993 22.879 -13.461 22.879 -26.677 v -0.691 C 71.988 19.647 69.093 12.783 63.835 7.659 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" /><path d="M 45 75.666 H 32.666 c -0.552 0 -1 0.447 -1 1 V 89 c 0 0.553 0.448 1 1 1 H 45 c 0.552 0 1 -0.447 1 -1 V 76.666 C 46 76.113 45.552 75.666 45 75.666 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" /></g></svg>']);

        // creating grade types
        GradeType::create(['text' => '6']);
        GradeType::create(['text' => '6-']);
        GradeType::create(['text' => '5']);
        GradeType::create(['text' => '5+']);
        GradeType::create(['text' => '5-']);
        GradeType::create(['text' => '4']);
        GradeType::create(['text' => '4+']);
        GradeType::create(['text' => '4-']);
        GradeType::create(['text' => '3']);
        GradeType::create(['text' => '3+']);
        GradeType::create(['text' => '3-']);
        GradeType::create(['text' => '2']);
        GradeType::create(['text' => '2+']);
        GradeType::create(['text' => '2-']);
        GradeType::create(['text' => '1']);
        GradeType::create(['text' => '1+']);
        GradeType::create(['text' => '1-']);
        GradeType::create(['text' => '0']);
        GradeType::create(['text' => 'np']);

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
            User::create(['name' => 'Chmiel Miroslaw', 'email' => 'chmiel_miroslaw@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
            User::create(['name' => 'Hajdo Edyta', 'email' => 'hajdo_edyta@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
            User::create(['name' => 'Anna Motyka', 'email' => 'anna_motyka@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
            User::create(['name' => 'Babraj Jerzy', 'email' => 'babraj_jerzy@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
            User::create(['name' => 'Zimnicka-Nowak Anna', 'email' => 'zimnicka_anna@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
            User::create(['name' => 'Czajka Janusz', 'email' => 'czajka_janusz@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
            User::create(['name' => 'Maj Pawel', 'email' => 'maj_pawel@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
            User::create(['name' => 'Babula Anna', 'email' => 'babula_anna@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
            User::create(['name' => 'Natalia Urbaniak', 'email' => 'natalia_urbaniak@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
            User::create(['name' => 'Kolosinska Katarzyna', 'email' => 'kolosinska_katarzyna@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
            User::create(['name' => 'Hala Joanna', 'email' => 'hala_joanna@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
            User::create(['name' => 'Gozdyra Krzystof', 'email' => 'gozdyra_krzystof@gmail.com', 'password' => 'teacher', 'role_id' => 2]);

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
            Subject::create(['name' => 'Fizyka', 'teacher_id' => 3]);
            Subject::create(['name' => 'Historia', 'teacher_id' => 7]);
            Subject::create(['name' => 'Wiedza o spoleczenstwie', 'teacher_id' => 7]);
            Subject::create(['name' => 'Chemia', 'teacher_id' => 8]);
            Subject::create(['name' => 'Biologia', 'teacher_id' => 9]);
            Subject::create(['name' => 'Geografia', 'teacher_id' => 10]);
            Subject::create(['name' => 'Jezyk niemiecki', 'teacher_id' => 11]);
            Subject::create(['name' => 'Zajecia z wychowawca', 'teacher_id' => 12]);

            Subject::create(['name' => 'Jezyk angielski', 'teacher_id' => 14]);
            Subject::create(['name' => 'Jezyk polski', 'teacher_id' => 17]);
            Subject::create(['name' => 'Matematyka', 'teacher_id' => 24]);
            Subject::create(['name' => 'M4.J1.Podlaczanie urzadzen', 'teacher_id' => 19]);
            Subject::create(['name' => 'M4.J2.Obslugiwanie urzadzen', 'teacher_id' => 19]);
            Subject::create(['name' => 'M5.J1.Tworzenie dokumentow', 'teacher_id' => 21]);
            Subject::create(['name' => 'M6.J2.Obsluga pobotow', 'teacher_id' => 19]);
            Subject::create(['name' => 'Wiedza o spoleczenstwie', 'teacher_id' => 25]);
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

            Subject::create(['name' => 'Jezyk angielski', 'teacher_id' => 26]);
            Subject::create(['name' => 'Historia', 'teacher_id' => 25]);
            Subject::create(['name' => 'Procesy transportowe w logistyce', 'teacher_id' => 27]);
            Subject::create(['name' => 'Logistyka w jednostkach gospodarczych', 'teacher_id' => 27]);
            Subject::create(['name' => 'Uslugi transportowo-spedycyjne', 'teacher_id' => 27]);
            Subject::create(['name' => 'Praktyka zawodowa', 'teacher_id' => 27]);
            Subject::create(['name' => 'Obsluga jednostek zewnetrznych', 'teacher_id' => 28]);
            Subject::create(['name' => 'Jezyk angielski zawodowy', 'teacher_id' => 26]);
            Subject::create(['name' => 'Planowanie przeplywu zasobow', 'teacher_id' => 22]);
            Subject::create(['name' => 'Zajecia z wychowawca', 'teacher_id' => 22]);
            Subject::create(['name' => 'Wiedza o spoleczenstwie', 'teacher_id' => 26]);

            Subject::create(['name' => 'M3.J2 Montowanie elementow', 'teacher_id' => 21]);

            Subject::create(['name' => 'Logistyka w procesach produkcji', 'teacher_id' => 16]);
            Subject::create(['name' => 'Logistyka zaopatrzen i produkcji', 'teacher_id' => 27]);
            Subject::create(['name' => 'Bezpieczenstwo i higiena pracy', 'teacher_id' => 15]);
            Subject::create(['name' => 'Przedsiebiorstwo logistyczne', 'teacher_id' => 16]);
            Subject::create(['name' => 'Zajecia z wychowawca', 'teacher_id' => 28]);
            Subject::create(['name' => 'Plastyka', 'teacher_id' => 29]);
            Subject::create(['name' => 'Jezyk niemiecki', 'teacher_id' => 30]);
            Subject::create(['name' => 'Zapasy i magazymowanie', 'teacher_id' => 28]);
            Subject::create(['name' => 'Informatyka', 'teacher_id' => 31]);
            Subject::create(['name' => 'Fizyka', 'teacher_id' => 32]);
            Subject::create(['name' => 'Wychowanie fizyczne', 'teacher_id' => 31]);
            Subject::create(['name' => 'Doradztwo zawodowe', 'teacher_id' => 28]);
            Subject::create(['name' => 'Historia i terazniejszosc', 'teacher_id' => 33]);

            Subject::create(['name' => 'Praktyka zawodowa', 'teacher_id' => 12]);
            Subject::create(['name' => 'Zajecia z wychowawca', 'teacher_id' => 34]);
            Subject::create(['name' => 'Programowanie obiektowe', 'teacher_id' => 12]);
            Subject::create(['name' => 'Matematyka', 'teacher_id' => 35]);
            Subject::create(['name' => 'Jezyk polski', 'teacher_id' => 7]);
            Subject::create(['name' => 'Programowanie aplikacji internetowych', 'teacher_id' => 22]);
            Subject::create(['name' => 'Jezyk angielski', 'teacher_id' => 34]);
            Subject::create(['name' => 'Projektowanie oprogramowania', 'teacher_id' => 6]);

            Subject::create(['name' => 'Edukacja dla bezpieczenstwa', 'teacher_id' => 23]);
            Subject::create(['name' => 'Historia', 'teacher_id' => 36]);
            Subject::create(['name' => 'Pracownia podstaw mechatroniki - pneumatyka', 'teacher_id' => 13]);
            Subject::create(['name' => 'Pracownia podstaw mechatroniki - elektrotechnika', 'teacher_id' => 13]);
            Subject::create(['name' => 'Pracownia pomiarow elektrycznych', 'teacher_id' => 13]);
            Subject::create(['name' => 'Pracownia pomiarow geometrycznych', 'teacher_id' => 37]);
            Subject::create(['name' => 'Podstawy rysunku technicznego', 'teacher_id' => 37]);
            Subject::create(['name' => 'Zajecia z wychowawca', 'teacher_id' => 1]);

            Subject::create(['name' => 'Administracja bazami danych', 'teacher_id' => 5]);
            Subject::create(['name' => 'Zajecia z wychowawca', 'teacher_id' => 33]);
            Subject::create(['name' => 'Projektowanie i tworzenie stron internetowych', 'teacher_id' => 6]);

            Subject::create(['name' => 'Podstawy informatyki', 'teacher_id' => 5]);
            Subject::create(['name' => 'Zajecia z wychowawca', 'teacher_id' => 7]);

        // creating students and their classroom

        // 4TIP
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

        // 4TEM
            Classroom::create(['name' => '4TEM', 'teacher_id' => 23]);

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

        // 3TEM
            Classroom::create(['name' => '3TEM', 'teacher_id' => 3]);

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

        // 4TML

            Classroom::create(['name' => '4TL', 'teacher_id' => 22]);

            User::create(['name' => 'Vitalii Lenga', 'email' => 'vitalii_lenga@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Veronika Lepka', 'email' => 'veronika_lepka@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Andrii Mercedes', 'email' => 'andrii_mercedes@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Aleksandra Brodka', 'email' => 'aleksandra_brodka@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Aleksandra Przybysz', 'email' => 'aleksandra_przybysz@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Damian Lenard', 'email' => 'damian_lenard@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Dominika Bielecka', 'email' => 'dominika_bielecka@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Emilia Krzeminska', 'email' => 'emilia_krzeminska@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Eryk Kaldon', 'email' => 'eryk_kaldon@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Gabi Czerwinska', 'email' => 'gabi_czerwinska@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Joanna Stachula', 'email' => 'joanna_stachula@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Julia Krupa', 'email' => 'julia_krupa@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Kacper Regula', 'email' => 'kacper_regula@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Kacper Suron', 'email' => 'kacper_suron@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Lukasz Maczuga', 'email' => 'lukasz_maczuga@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Natalia Jesionek', 'email' => 'natalia_jesionek@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Natalia Rekas', 'email' => 'natalia_rekas@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Nikola Witalec', 'email' => 'nikola_witalec@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Oliwia Mroczek', 'email' => 'oliwia_mroczek@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Oleksandr Radio', 'email' => 'oleksandr_radio@gmail.com', 'classroom_id' => 4, 'role_id' => 1, 'password' => 'student']);
        // 1TL
            Classroom::create(['name' => '1TL', 'teacher_id' => 28]);

            User::create(['name' => 'Zlata Antoniuk', 'email' => 'zlata_antoniuk@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Natalia Bihun', 'email' => 'natalia_bihun@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Martyna Butryn', 'email' => 'martyna_butryn@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Jakub Cygan', 'email' => 'jakub_cygan@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Tomasz Czernikowski', 'email' => 'tomasz_czernikowski@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Julia Czerwinska', 'email' => 'julia_czerwinska@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Jakub Gamon', 'email' => 'jakub_gamon@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Oleksandr Holova', 'email' => 'oleksandr_holova@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Daniil Hunko', 'email' => 'daniil_hunko@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Illia Ilchenko', 'email' => 'illia_ilchenko@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Oleskii Kapustynskii', 'email' => 'oleksii_kapustynskiy@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Ihor Kibasz', 'email' => 'ihor_kibasz@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Nikita Klymenko', 'email' => 'nikita_klymenko@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Mykhailo Koropetskiy', 'email' => 'mykhailo_koropetskiy@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Karyna Kuzhelna', 'email' => 'karyna_kuzhelna@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Mariia Myryhina', 'email' => 'mariia_myryhina@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Nazar Maliuk', 'email' => 'nazar_maliuk@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Yulia Ovychynnikova', 'email' => 'yulia_ovychynnikova@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Ihor Pahonnyi', 'email' => 'ihor_pahonnyi@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Oleksandr Pilo', 'email' => 'oleksandr_pilo@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Dmytro Serhilenko', 'email' => 'dmytro_serhilenko@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Ihor Shemet', 'email' => 'ihor_shemet@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Ivan Tokarczuk', 'email' => 'ivan_tokarczuk@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Martyna Wrobet', 'email' => 'martyna_wrobet@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Vitalii Yaramenko', 'email' => 'vitalii_yaramenko@gmail.com', 'classroom_id' => 5, 'role_id' => 1, 'password' => 'student']);


        // 3TEP

            Classroom::create(['name' => '3TEP', 'teacher_id' => 34]);

            User::create(['name' => 'Yaroslaw Bahawkow', 'email' => 'yaroslaw_bahawkow@gmail.com', 'classroom_id' => 6, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Ivan Fefilow', 'email' => 'ivan_fefilow@gmail.com', 'classroom_id' => 6, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Yelisei Ivankov', 'email' => 'yelosei_ivankov@gmail.com', 'classroom_id' => 6, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Wiktor Faszysta', 'email' => 'wiktor_faszysta@gmail.com', 'classroom_id' => 6, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Mark Sidar', 'email' => 'mark_sidar@gmail.com', 'classroom_id' => 6, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Maksim Belkin', 'email' => 'maksim_belkin@gmail.com', 'classroom_id' => 6, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Antoni Motyka', 'email' => 'antoni_motyka@gmail.com', 'classroom_id' => 6, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Sandra Pikus', 'email' => 'sandra_pikus@gmail.com', 'classroom_id' => 6, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Natalia Fornel', 'email' => 'natalia_fornel@gmail.com', 'classroom_id' => 6, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Natalia Grelak', 'email' => 'natalia_grelak@gmail.com', 'classroom_id' => 6, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Tomasz Domin', 'email' => 'tomasz_domin@gmail.com', 'classroom_id' => 6, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Timofey Muzychkin', 'email' => 'timofey_murychkin@gmail.com', 'classroom_id' => 6, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Diana Bandarenka', 'email' => 'diana_bandarenka@gmail.com', 'classroom_id' => 6, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Daria Bandarenka', 'email' => 'daria_bandarenka@gmail.com', 'classroom_id' => 6, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Marcel Kolodziej', 'email' => 'marcel_kolodziej@gmail.com', 'classroom_id' => 6, 'role_id' => 1, 'password' => 'student']);

        // 1TME

            Classroom::create(['name' => '1TME', 'teacher_id' => 1]);

            User::create(['name' => 'Ihor Antoniuk', 'email' => 'ihor_antoniuk@gmail.com', 'classroom_id' => 7, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Marcel Baran', 'email' => 'marcel_baran@gmail.com', 'classroom_id' => 7, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Filip Dul', 'email' => 'filip_dul@gmail.com', 'classroom_id' => 7, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Fornal Dul', 'email' => 'fornal_dul@gmail.com', 'classroom_id' => 7, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Pawel Forc', 'email' => 'pawel_forc@gmail.com', 'classroom_id' => 7, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Dominik Fornal', 'email' => 'dominik_fornal@gmail.com', 'classroom_id' => 7, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Michal Gruszczynski', 'email' => 'michal_gruszczynski@gmail.com', 'classroom_id' => 7, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Stanislaw Wojciech', 'email' => 'stanislaw_wojciech@gmail.com', 'classroom_id' => 7, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Tadeusz Kuna', 'email' => 'tadeusz_kuna@gmail.com', 'classroom_id' => 7, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Katerzyna Melnyk', 'email' => 'katerzyna_melnyk@gmail.com', 'classroom_id' => 7, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Bartlomiej Pietruszka', 'email' => 'bartlomiej_pietruszka@gmail.com', 'classroom_id' => 7, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Wojciech Ryjo', 'email' => 'wojciech_ryjo@gmail.com', 'classroom_id' => 7, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Filip Sienkiewicz', 'email' => 'filip_sienkiewicz@gmail.com', 'classroom_id' => 7, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Filip Sobolew', 'email' => 'filip_sobolew@gmail.com', 'classroom_id' => 7, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Karol Strak', 'email' => 'karol_strak@gmail.com', 'classroom_id' => 7, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Witalij Switlicki', 'email' => 'witalij_switlicki@gmail.com', 'classroom_id' => 7, 'role_id' => 1, 'password' => 'student']);

        // 2TP

            Classroom::create(['name' => '2TP', 'teacher_id' => 33]);

            User::create(['name' => 'Roman Vuiko', 'email' => 'roman_vuiko@gmail.com', 'classroom_id' => 8, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Mykola Vuiko', 'email' => 'mykola_vuiko@gmail.com', 'classroom_id' => 8, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Mateusz Wujcik', 'email' => 'mateusz_wujcik@gmail.com', 'classroom_id' => 8, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Karol Kazimierski', 'email' => 'karol_kazimierski@gmail.com', 'classroom_id' => 8, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Karol Grebowicz', 'email' => 'karol_grebowicz@gmail.com', 'classroom_id' => 8, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Kamil Kaldon', 'email' => 'kamil_kaldon@gmail.com', 'classroom_id' => 8, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Katerina Hubska', 'email' => 'katerina_hubska@gmail.com', 'classroom_id' => 8, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Anna Plaksina', 'email' => 'anna_plaksina@gmail.com', 'classroom_id' => 8, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Artek Vdovyczenko', 'email' => 'artek_vdovuczenko@gmail.com', 'classroom_id' => 8, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Wladyslaw Dubinin', 'email' => 'wladyslaw_dubinin@gmail.com', 'classroom_id' => 8, 'role_id' => 1, 'password' => 'student']);

        // 1TP

            Classroom::create(['name' => '2TP', 'teacher_id' => 7]);

            User::create(['name' => 'Kristian Aswiczynski', 'email' => 'kristian_aswiczynski@gmail.com', 'classroom_id' => 9, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Aleksandr Achmataliew', 'email' => 'aleksandr_achmataliew@gmail.com', 'classroom_id' => 9, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Tomasz Filipik', 'email' => 'tomasz_filipik@gmail.com', 'classroom_id' => 9, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Marek Wruber', 'email' => 'marek_wruber@gmail.com', 'classroom_id' => 9, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Bartek Kopesz', 'email' => 'bartek_kopesz@gmail.com', 'classroom_id' => 9, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Jakub Solowiec', 'email' => 'jakub_solowiec@gmail.com', 'classroom_id' => 9, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Wladyslaw Sawicki', 'email' => 'wladyslaw_sawicki@gmail.com', 'classroom_id' => 9, 'role_id' => 1, 'password' => 'student']);
            User::create(['name' => 'Yurii Zhylchenko', 'email' => 'yurii_zhylchenko@gmail.com', 'classroom_id' => 9, 'role_id' => 1, 'password' => 'student']);

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
                Lesson::create(['classroom_id' => 1, 'subject_id' => 12, 'day' => 2, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 13, 'day' => 2, 'lesson_number' => 7]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 1, 'day' => 2, 'lesson_number' => 8]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 1, 'day' => 2, 'lesson_number' => 9]);

            // Wednesday
                Lesson::create(['classroom_id' => 1, 'subject_id' => 15, 'day' => 3, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 4, 'day' => 3, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 4, 'day' => 3, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 3, 'day' => 3, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 16, 'day' => 3, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 2, 'day' => 3, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 7, 'day' => 3, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 7, 'day' => 3, 'lesson_number' => 7]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 8, 'day' => 3, 'lesson_number' => 8]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 8, 'day' => 3, 'lesson_number' => 9]);

            // Thursday
                Lesson::create(['classroom_id' => 1, 'subject_id' => 17, 'day' => 4, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 3, 'day' => 4, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 14, 'day' => 4, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 9, 'day' => 4, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 10, 'day' => 4, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 10, 'day' => 4, 'lesson_number' => 7]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 10, 'day' => 4, 'lesson_number' => 8]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 8, 'day' => 4, 'lesson_number' => 9]);
                Lesson::create(['classroom_id' => 1, 'subject_id' => 8, 'day' => 4, 'lesson_number' => 10]);

            // Friday
            Lesson::create(['classroom_id' => 1, 'subject_id' => 18, 'day' => 5, 'lesson_number' => 0]);
            Lesson::create(['classroom_id' => 1, 'subject_id' => 4, 'day' => 5, 'lesson_number' => 1]);
            Lesson::create(['classroom_id' => 1, 'subject_id' => 4, 'day' => 5, 'lesson_number' => 2]);
            Lesson::create(['classroom_id' => 1, 'subject_id' => 3, 'day' => 5, 'lesson_number' => 3]);
            Lesson::create(['classroom_id' => 1, 'subject_id' => 2, 'day' => 5, 'lesson_number' => 4]);
            Lesson::create(['classroom_id' => 1, 'subject_id' => 8, 'day' => 5, 'lesson_number' => 5]);
            Lesson::create(['classroom_id' => 1, 'subject_id' => 11, 'day' => 5, 'lesson_number' => 6]);
            Lesson::create(['classroom_id' => 1, 'subject_id' => 11, 'day' => 5, 'lesson_number' => 7]);
            Lesson::create(['classroom_id' => 1, 'subject_id' => 19, 'day' => 5, 'lesson_number' => 8]);

        // 4TEM
            // Monday
                Lesson::create(['classroom_id' => 2, 'subject_id' => 15, 'day' => 1, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 12, 'day' => 1, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 20, 'day' => 1, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 21, 'day' => 1, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 17, 'day' => 1, 'lesson_number' => 5]);
            // Tuesday
                Lesson::create(['classroom_id' => 2, 'subject_id' => 20, 'day' => 2, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 20, 'day' => 2, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 21, 'day' => 2, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 18, 'day' => 2, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 22, 'day' => 2, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 23, 'day' => 2, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 23, 'day' => 2, 'lesson_number' => 7]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 24, 'day' => 2, 'lesson_number' => 8]);
            // Wednesday
                Lesson::create(['classroom_id' => 2, 'subject_id' => 23, 'day' => 3, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 20, 'day' => 3, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 16, 'day' => 3, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 22, 'day' => 3, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 27, 'day' => 3, 'lesson_number' => 7]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 28, 'day' => 3, 'lesson_number' => 8]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 28, 'day' => 3, 'lesson_number' => 9]);
            // Thursday
                Lesson::create(['classroom_id' => 2, 'subject_id' => 13, 'day' => 4, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 28, 'day' => 4, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 22, 'day' => 4, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 25, 'day' => 4, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 23, 'day' => 4, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 24, 'day' => 4, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 24, 'day' => 4, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 29, 'day' => 4, 'lesson_number' => 7]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 29, 'day' => 4, 'lesson_number' => 8]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 29, 'day' => 4, 'lesson_number' => 9]);
            // Friday
                Lesson::create(['classroom_id' => 2, 'subject_id' => 29, 'day' => 5, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 29, 'day' => 5, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 21, 'day' => 5, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 20, 'day' => 5, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 22, 'day' => 5, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 22, 'day' => 5, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 29, 'day' => 5, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 26, 'day' => 5, 'lesson_number' => 7]);
                Lesson::create(['classroom_id' => 2, 'subject_id' => 26, 'day' => 5, 'lesson_number' => 8]);
        // 3TEM
            // Monday
                Lesson::create(['classroom_id' => 3, 'subject_id' => 12, 'day' => 1, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 13, 'day' => 1, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 31, 'day' => 1, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 31, 'day' => 1, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 31, 'day' => 1, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 20, 'day' => 1, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 32, 'day' => 1, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 32, 'day' => 1, 'lesson_number' => 7]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 32, 'day' => 1, 'lesson_number' => 8]);
            // Tuesday
                Lesson::create(['classroom_id' => 3, 'subject_id' => 15, 'day' => 2, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 34, 'day' => 2, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 21, 'day' => 2, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 3, 'day' => 2, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 35, 'day' => 2, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 13, 'day' => 2, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 16, 'day' => 2, 'lesson_number' => 6]);
            // Wednesday
                Lesson::create(['classroom_id' => 3, 'subject_id' => 36, 'day' => 3, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 3, 'day' => 3, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 18, 'day' => 3, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 23, 'day' => 3, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 37, 'day' => 3, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 37, 'day' => 3, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 37, 'day' => 3, 'lesson_number' => 7]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 37, 'day' => 3, 'lesson_number' => 8]);
            // Thursday
                Lesson::create(['classroom_id' => 3, 'subject_id' => 3, 'day' => 4, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 18, 'day' => 4, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 21, 'day' => 4, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 21, 'day' => 4, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 20, 'day' => 4, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 38, 'day' => 4, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 17, 'day' => 4, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 35, 'day' => 4, 'lesson_number' => 7]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 35, 'day' => 4, 'lesson_number' => 8]);
            // Friday
                Lesson::create(['classroom_id' => 3, 'subject_id' => 3, 'day' => 5, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 3, 'day' => 5, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 33, 'day' => 5, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 33, 'day' => 5, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 50, 'day' => 5, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 3, 'subject_id' => 50, 'day' => 5, 'lesson_number' => 5]);
        // 4TL
            // Monday
                Lesson::create(['classroom_id' => 4, 'subject_id' => 15, 'day' => 1, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 12, 'day' => 1, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 21, 'day' => 1, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 39, 'day' => 1, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 22, 'day' => 1, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 18, 'day' => 1, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 17, 'day' => 1, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 40, 'day' => 1, 'lesson_number' => 7]);
            // Tuesday
                Lesson::create(['classroom_id' => 4, 'subject_id' => 41, 'day' => 2, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 41, 'day' => 2, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 39, 'day' => 2, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 22, 'day' => 2, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 22, 'day' => 2, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 16, 'day' => 2, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 21, 'day' => 2, 'lesson_number' => 6]);
            // Wednesday
                Lesson::create(['classroom_id' => 4, 'subject_id' => 42, 'day' => 3, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 42, 'day' => 3, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 43, 'day' => 3, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 45, 'day' => 3, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 45, 'day' => 3, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 46, 'day' => 3, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 47, 'day' => 3, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 47, 'day' => 3, 'lesson_number' => 7]);
            // Thursday
                Lesson::create(['classroom_id' => 4, 'subject_id' => 45, 'day' => 4, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 45, 'day' => 4, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 43, 'day' => 4, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 44, 'day' => 4, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 44, 'day' => 4, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 39, 'day' => 4, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 22, 'day' => 4, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 49, 'day' => 4, 'lesson_number' => 7]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 48, 'day' => 4, 'lesson_number' => 8]);
            // Friday
                Lesson::create(['classroom_id' => 4, 'subject_id' => 44, 'day' => 5, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 44, 'day' => 5, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 22, 'day' => 5, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 39, 'day' => 5, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 39, 'day' => 5, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 17, 'day' => 5, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 35, 'day' => 5, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 35, 'day' => 5, 'lesson_number' => 7]);
                Lesson::create(['classroom_id' => 4, 'subject_id' => 35, 'day' => 5, 'lesson_number' => 8]);
        // 1TL
            // Monday
                Lesson::create(['classroom_id' => 5, 'subject_id' => 51, 'day' => 1, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 51, 'day' => 1, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 13, 'day' => 1, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 52, 'day' => 1, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 53, 'day' => 1, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 39, 'day' => 1, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 54, 'day' => 1, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 55, 'day' => 1, 'lesson_number' => 7]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 54, 'day' => 1, 'lesson_number' => 8]);
            // Tuesday
                Lesson::create(['classroom_id' => 5, 'subject_id' => 56, 'day' => 2, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 57, 'day' => 2, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 3, 'day' => 2, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 53, 'day' => 2, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 21, 'day' => 2, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 39, 'day' => 2, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 13, 'day' => 2, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 58, 'day' => 2, 'lesson_number' => 7]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 58, 'day' => 2, 'lesson_number' => 8]);
            // Wednesday
                Lesson::create(['classroom_id' => 5, 'subject_id' => 59, 'day' => 3, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 51, 'day' => 3, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 60, 'day' => 3, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 61, 'day' => 3, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 61, 'day' => 3, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 17, 'day' => 3, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 21, 'day' => 3, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 62, 'day' => 3, 'lesson_number' => 7]);
            // Thursday
                Lesson::create(['classroom_id' => 5, 'subject_id' => 3, 'day' => 4, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 63, 'day' => 4, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 39, 'day' => 4, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 61, 'day' => 4, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 17, 'day' => 4, 'lesson_number' => 5]);
            // Friday
                Lesson::create(['classroom_id' => 5, 'subject_id' => 52, 'day' => 5, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 57, 'day' => 5, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 21, 'day' => 5, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 5, 'subject_id' => 60, 'day' => 5, 'lesson_number' => 5]);
        // 3TEP
            // Monday
                Lesson::create(['classroom_id' => 6, 'subject_id' => 64, 'day' => 1, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 64, 'day' => 1, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 64, 'day' => 1, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 64, 'day' => 1, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 6, 'day' => 1, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 6, 'day' => 1, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 46, 'day' => 1, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 1, 'day' => 1, 'lesson_number' => 7]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 1, 'day' => 1, 'lesson_number' => 8]);
            // Tuesday
                Lesson::create(['classroom_id' => 6, 'subject_id' => 68, 'day' => 2, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 68, 'day' => 2, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 67, 'day' => 2, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 64, 'day' => 2, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 64, 'day' => 2, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 71, 'day' => 2, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 71, 'day' => 2, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 38, 'day' => 2, 'lesson_number' => 7]);
            // Wednesday
                Lesson::create(['classroom_id' => 6, 'subject_id' => 16, 'day' => 3, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 69, 'day' => 3, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 69, 'day' => 3, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 69, 'day' => 3, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 66, 'day' => 3, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 66, 'day' => 3, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 67, 'day' => 3, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 70, 'day' => 3, 'lesson_number' => 7]);
            // Thursday
                Lesson::create(['classroom_id' => 6, 'subject_id' => 15, 'day' => 4, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 17, 'day' => 4, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 1, 'day' => 4, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 18, 'day' => 4, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 67, 'day' => 4, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 68, 'day' => 4, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 65, 'day' => 4, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 34, 'day' => 4, 'lesson_number' => 7]);
            // Friday
                Lesson::create(['classroom_id' => 6, 'subject_id' => 65, 'day' => 5, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 70, 'day' => 5, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 13, 'day' => 5, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 60, 'day' => 5, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 66, 'day' => 5, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 67, 'day' => 5, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 67, 'day' => 5, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 18, 'day' => 5, 'lesson_number' => 7]);
                Lesson::create(['classroom_id' => 6, 'subject_id' => 7, 'day' => 5, 'lesson_number' => 8]);
        // 1TME
            // Monday
                Lesson::create(['classroom_id' => 7, 'subject_id' => 60, 'day' => 1, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 72, 'day' => 1, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 68, 'day' => 1, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 1, 'day' => 1, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 1, 'day' => 1, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 59, 'day' => 1, 'lesson_number' => 7]);
            // Tuesday
                Lesson::create(['classroom_id' => 7, 'subject_id' => 78, 'day' => 2, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 78, 'day' => 2, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 53, 'day' => 2, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 68, 'day' => 2, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 56, 'day' => 2, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 63, 'day' => 2, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 67, 'day' => 2, 'lesson_number' => 6]);
            // Wednesday
                Lesson::create(['classroom_id' => 7, 'subject_id' => 20, 'day' => 3, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 67, 'day' => 3, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 15, 'day' => 3, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 16, 'day' => 3, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 76, 'day' => 3, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 77, 'day' => 3, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 77, 'day' => 3, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 76, 'day' => 3, 'lesson_number' => 7]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 76, 'day' => 3, 'lesson_number' => 8]);
            // Thursday
                Lesson::create(['classroom_id' => 7, 'subject_id' => 53, 'day' => 4, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 75, 'day' => 4, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 75, 'day' => 4, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 67, 'day' => 4, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 73, 'day' => 4, 'lesson_number' => 7]);
            // Friday
                Lesson::create(['classroom_id' => 7, 'subject_id' => 73, 'day' => 5, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 68, 'day' => 5, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 74, 'day' => 5, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 1, 'day' => 5, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 20, 'day' => 5, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 18, 'day' => 5, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 60, 'day' => 5, 'lesson_number' => 7]);
                Lesson::create(['classroom_id' => 7, 'subject_id' => 79, 'day' => 5, 'lesson_number' => 8]);
        // 2TP
            // Monday
                Lesson::create(['classroom_id' => 8, 'subject_id' => 80, 'day' => 1, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 2, 'day' => 1, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 67, 'day' => 1, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 46, 'day' => 1, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 60, 'day' => 1, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 69, 'day' => 1, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 69, 'day' => 1, 'lesson_number' => 7]);
            // Tuesday
                Lesson::create(['classroom_id' => 8, 'subject_id' => 59, 'day' => 2, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 57, 'day' => 2, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 73, 'day' => 2, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 67, 'day' => 2, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 71, 'day' => 2, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 71, 'day' => 2, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 81, 'day' => 2, 'lesson_number' => 7]);
            // Wednesday
                Lesson::create(['classroom_id' => 8, 'subject_id' => 80, 'day' => 3, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 80, 'day' => 3, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 17, 'day' => 3, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 4, 'day' => 3, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 69, 'day' => 3, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 69, 'day' => 3, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 63, 'day' => 3, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 17, 'day' => 3, 'lesson_number' => 7]);
            // Thursday
                Lesson::create(['classroom_id' => 8, 'subject_id' => 67, 'day' => 4, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 4, 'day' => 4, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 2, 'day' => 4, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 2, 'day' => 4, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 82, 'day' => 4, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 82, 'day' => 4, 'lesson_number' => 7]);
            // Friday
                Lesson::create(['classroom_id' => 8, 'subject_id' => 15, 'day' => 5, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 73, 'day' => 5, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 18, 'day' => 5, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 34, 'day' => 5, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 4, 'day' => 5, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 8, 'subject_id' => 1, 'day' => 5, 'lesson_number' => 5]);
        // 1TP
            // Monday
                Lesson::create(['classroom_id' => 9, 'subject_id' => 84, 'day' => 1, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 13, 'day' => 1, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 20, 'day' => 1, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 68, 'day' => 1, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 17, 'day' => 1, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 72, 'day' => 1, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 83, 'day' => 1, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 83, 'day' => 1, 'lesson_number' => 7]);
            // Tuesday
                Lesson::create(['classroom_id' => 9, 'subject_id' => 53, 'day' => 2, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 80, 'day' => 2, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 80, 'day' => 2, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 56, 'day' => 2, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 18, 'day' => 2, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 1, 'day' => 2, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 1, 'day' => 2, 'lesson_number' => 6]);
            // Wednesday
                Lesson::create(['classroom_id' => 9, 'subject_id' => 63, 'day' => 3, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 40, 'day' => 3, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 20, 'day' => 3, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 68, 'day' => 3, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 22, 'day' => 3, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 60, 'day' => 3, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 83, 'day' => 3, 'lesson_number' => 6]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 83, 'day' => 3, 'lesson_number' => 7]);
            // Thursday
                Lesson::create(['classroom_id' => 9, 'subject_id' => 82, 'day' => 4, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 82, 'day' => 4, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 68, 'day' => 4, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 22, 'day' => 4, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 22, 'day' => 4, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 53, 'day' => 4, 'lesson_number' => 6]);
            // Friday
                Lesson::create(['classroom_id' => 9, 'subject_id' => 18, 'day' => 5, 'lesson_number' => 0]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 17, 'day' => 5, 'lesson_number' => 1]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 60, 'day' => 5, 'lesson_number' => 2]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 1, 'day' => 5, 'lesson_number' => 3]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 38, 'day' => 5, 'lesson_number' => 4]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 69, 'day' => 5, 'lesson_number' => 5]);
                Lesson::create(['classroom_id' => 9, 'subject_id' => 22, 'day' => 5, 'lesson_number' => 6]);
    }
}

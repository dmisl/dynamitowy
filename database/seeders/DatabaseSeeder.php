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
            User::create(['name' => 'Chmiel Miroslaw', 'email' => 'chmiel_miroslaw@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
            User::create(['name' => 'Hajdo Edyta', 'email' => 'hajdo_edyta@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
            User::create(['name' => 'Anna Motyka', 'email' => 'anna_motyka@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
            User::create(['name' => 'Babraj Jerzy', 'email' => 'babraj_jerzy@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
            User::create(['name' => 'Zimnicka-Nowak Anna', 'email' => 'zimnicka_anna@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
            User::create(['name' => 'Czajka Janusz', 'email' => 'czajka_janusz@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
            User::create(['name' => 'Maj Pawel', 'email' => 'maj_pawel@gmail.com', 'password' => 'teacher', 'role_id' => 2]);
            User::create(['name' => 'Babula Anna', 'email' => 'babula_anna@gmail.com', 'password' => 'teacher', 'role_id' => 2]);

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

        // creating students and their classroom

        // 4TIP
            Classroom::create(['name' => '4TIP', 'teacher_id' => 13]);

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
    }
}

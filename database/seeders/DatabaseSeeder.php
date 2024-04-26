<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Insérez des données fictives dans la table
        DB::table('settings')->delete();

        $data = [
            ['key' => 'current_session', 'value' => '2023-2024'],
            ['key' => 'societe_title', 'value' => 'MS'],
            ['key' => 'societe_name', 'value' => 'Mora Soft International Schools'],
            ['key' => 'end_first_term', 'value' => '01-12-2021'],
            ['key' => 'end_second_term', 'value' => '01-03-2022'],
            ['key' => 'phone', 'value' => '0123456789'],
            ['key' => 'about', 'value' => 'Societe charge a développent des application web et mobiles'],
            ['key' => 'address', 'value' => 'Casablanca'],
            ['key' => 'societe_email', 'value' => 'info@morasoft.com'],
            ['key' => 'logo', 'value' => '1.jpg'],
        ];

        DB::table('settings')->insert($data);
    }
}

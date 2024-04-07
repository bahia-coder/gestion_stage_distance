<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stagaire;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stagaires')->delete();
        $students = new Stagaire();
        $students->email = 'nadiaa@yahoo.com';
        $students->password = Hash::make('nadianadia');
        $students->save();
    }
}

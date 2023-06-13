<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('languages')->insert([
            'locale' => 'UA',
            'prefix' => 'ua'
        ]);

        DB::table('languages')->insert([
            'locale' => 'RU',
            'prefix' => 'ru'
        ]);

        DB::table('languages')->insert([
            'locale' => 'EN',
            'prefix' => 'en'
        ]);
    }
}

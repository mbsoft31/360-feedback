<?php

namespace Database\Seeders;

use App\Models\Survey;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => "admin",
            "email" => "admin@main.com",
            "password" => \Hash::make("admin1234"),
        ]);

        $survey = Survey::create([
            "title" => "survey 1",
            "description" => "bla bla",
            "meta" => []
        ]);
    }
}

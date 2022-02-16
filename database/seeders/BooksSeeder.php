<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Books::factory(20)->create();
        \App\Models\Authors::factory(20)->create();

    }
}

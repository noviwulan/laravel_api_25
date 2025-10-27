<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Books::create([
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'author_id' => 1,
            'published_year' => 1925,
        ]);
    }
}

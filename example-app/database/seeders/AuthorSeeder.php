<?php

namespace Database\Seeders;

use App\Models\Authors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Authors::create([
            'name' => 'F. Scott Fitzgerald',
            'birthdate' => '1896-09-24',
        ]);
    }
}

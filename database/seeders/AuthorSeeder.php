<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::factory(10)
            ->hasBooks(5)
            ->create();

        Author::factory(10)
            ->hasBooks(5)
            ->create();

        Author::factory(5)
            ->hasBooks(5)
            ->create();
    }
}

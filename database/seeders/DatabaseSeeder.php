<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AuthorSeeder::class,
            CategorySeeder::class,
            BookSeeder::class,
            PublisherSeeder::class,
            BookCopySeeder::class,
            MemberSeeder::class,
            AdminSeeder::class,
            LoanSeeder::class,
            BookAuthorSeeder::class,
            BookCategorySeeder::class
        ]);
    }
}

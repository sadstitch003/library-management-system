<?php

namespace Database\Seeders;

use App\Helpers\DatabaseIdGenerator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert([
            [
                'author_id' => DatabaseIdGenerator::generateAuthorId('J.K. Rowling'),
                'author_name' => 'J.K. Rowling',
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => DatabaseIdGenerator::generateAuthorId('George Orwell'),
                'author_name' => 'George Orwell',
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => DatabaseIdGenerator::generateAuthorId('J.R.R. Tolkien'),
                'author_name' => 'J.R.R. Tolkien',
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Helpers\DatabaseIdGenerator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'book_id' => DatabaseIdGenerator::generateBookId('The Lord of the Rings: The Fellowship of the Ring'),
                'book_title' => 'The Lord of the Rings: The Fellowship of the Ring',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => DatabaseIdGenerator::generateBookId('Harry Potter and the Sorcerer\'s Stone'),
                'book_title' => 'Harry Potter and the Sorcerer\'s Stone',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => DatabaseIdGenerator::generateBookId('Harry Potter and the Chamber of Secrets'),
                'book_title' => 'Harry Potter and the Chamber of Secrets',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => DatabaseIdGenerator::generateBookId('1984'),
                'book_title' => '1984',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => DatabaseIdGenerator::generateBookId('Animal Farm'),
                'book_title' => 'Animal Farm',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_id' => DatabaseIdGenerator::generateBookId('The Hobbit'),
                'book_title' => 'The Hobbit',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

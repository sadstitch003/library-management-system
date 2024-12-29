<?php

namespace Database\Seeders;

use App\Helpers\DatabaseIdGenerator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Helpers\Enums\BookCondition;

class BookCopySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book_copies')->insert([
            [
                'book_copy_id' => DatabaseIdGenerator::generateBookCopyId('TLOTR1', 2023),
                'book_id' => 'TLOTR1',
                'book_condition' => BookCondition::GOOD,
                'year_published' => 1954,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_copy_id' => DatabaseIdGenerator::generateBookCopyId('HPATS1', 2023),
                'book_id' => 'HPATS1',
                'book_condition' => BookCondition::GOOD,
                'year_published' => 1997,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_copy_id' => DatabaseIdGenerator::generateBookCopyId('HPATC1', 2023),
                'book_id' => 'HPATC1',
                'book_condition' => BookCondition::USED,
                'year_published' => 1998,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_copy_id' => DatabaseIdGenerator::generateBookCopyId('198401', 2023),
                'book_id' => '198401',
                'book_condition' => BookCondition::GOOD,
                'year_published' => 1949,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_copy_id' => DatabaseIdGenerator::generateBookCopyId('AF0001', 2023),
                'book_id' => 'AF0001',
                'book_condition' => BookCondition::GOOD,
                'year_published' => 1945,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_copy_id' => DatabaseIdGenerator::generateBookCopyId('TH0001', 2023),
                'book_id' => 'TH0001',
                'book_condition' => BookCondition::GOOD,
                'year_published' => 1937,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
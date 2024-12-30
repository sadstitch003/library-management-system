<?php

namespace Database\Seeders;

use App\Helpers\DatabaseIdGenerator;
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
                'publisher_id' => 'HAR1',
                'book_condition' => BookCondition::GOOD,
                'year_published' => 1954,
                'is_available' => false,
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_copy_id' => DatabaseIdGenerator::generateBookCopyId('HPATS1', 2023),
                'book_id' => 'HPATS1',
                'publisher_id' => 'MP01',
                'book_condition' => BookCondition::GOOD,
                'year_published' => 1997,
                'is_available' => false,
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_copy_id' => DatabaseIdGenerator::generateBookCopyId('HPATC1', 2023),
                'book_id' => 'HPATC1',
                'publisher_id' => 'MP01', 
                'book_condition' => BookCondition::GOOD,
                'year_published' => 1998,
                'is_available' => false,
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_copy_id' => DatabaseIdGenerator::generateBookCopyId('198401', 2023),
                'book_id' => '198401',
                'publisher_id' => 'PRH1', 
                'book_condition' => BookCondition::GOOD,
                'year_published' => 1949,
                'is_available' => false,
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_copy_id' => DatabaseIdGenerator::generateBookCopyId('AF0001', 2023),
                'book_id' => 'AF0001',
                'publisher_id' => 'SS01', 
                'book_condition' => BookCondition::GOOD,
                'year_published' => 1945,
                'is_available' => false,
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_copy_id' => DatabaseIdGenerator::generateBookCopyId('TH0001', 2023),
                'book_id' => 'TH0001',
                'publisher_id' => 'SS01',
                'book_condition' => BookCondition::GOOD,
                'year_published' => 1937,
                'is_available' => false,
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

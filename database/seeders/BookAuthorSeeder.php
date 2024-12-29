<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert data into the book_author table using the provided author and book IDs
        DB::table('book_author')->insert([
            [
                'author_id' => 'GO01',  
                'book_id' => '198401',  
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => 'GO01',  
                'book_id' => 'AF0001', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => 'JKR1', 
                'book_id' => 'HPATC1', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => 'JKR1', 
                'book_id' => 'HPATS1', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => 'JRR1', 
                'book_id' => 'TH0001',                 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_id' => 'JRR1',
                'book_id' => 'TLOTR1', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

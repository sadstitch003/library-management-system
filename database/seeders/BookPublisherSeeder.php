<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookPublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book_publisher')->insert([
            [
                'publisher_id' => 'HAR1', 
                'book_copy_id' => '198401-2023-1', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'publisher_id' => 'MP01',  
                'book_copy_id' => 'AF0001-2023-1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'publisher_id' => 'PRH1',  
                'book_copy_id' => 'HPATC1-2023-1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'publisher_id' => 'SS01',  
                'book_copy_id' => 'HPATS1-2023-1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'publisher_id' => 'HAR1',  
                'book_copy_id' => 'TH0001-2023-1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'publisher_id' => 'MP01',  
                'book_copy_id' => 'TLOTR1-2023-1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

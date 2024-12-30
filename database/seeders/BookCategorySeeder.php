<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book_category')->insert([
            ['category_id' => 'FAN1', 'book_id' => '198401', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 'HF01', 'book_id' => 'AF0001', 'created_at' => now(), 'updated_at' => now()], 
            ['category_id' => 'SF01', 'book_id' => 'HPATC1', 'created_at' => now(), 'updated_at' => now()], 
            ['category_id' => 'SF01', 'book_id' => 'HPATS1', 'created_at' => now(), 'updated_at' => now()],  
            ['category_id' => 'FAN1', 'book_id' => 'TH0001', 'created_at' => now(), 'updated_at' => now()],  
            ['category_id' => 'FAN1', 'book_id' => 'TLOTR1', 'created_at' => now(), 'updated_at' => now()], 
        ]);
    }
}

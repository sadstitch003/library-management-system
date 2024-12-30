<?php

namespace Database\Seeders;

use App\Helpers\DatabaseIdGenerator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['category_id' => DatabaseIdGenerator::generateCategoryId('Fantasy'), 'category_name' => 'Fantasy', 'status_del' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => DatabaseIdGenerator::generateCategoryId('Science Fiction'), 'category_name' => 'Science Fiction', 'status_del' => false, 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => DatabaseIdGenerator::generateCategoryId('Historical Fiction'), 'category_name' => 'Historical Fiction', 'status_del' => false, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

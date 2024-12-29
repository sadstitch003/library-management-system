<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Helpers\DatabaseIdGenerator;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inserting data into the publishers table
        DB::table('publishers')->insert([
            [
                'publisher_id' => DatabaseIdGenerator::generatePublisherId('Penguin Random House'),
                'publisher_name' => 'Penguin Random House',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'publisher_id' => DatabaseIdGenerator::generatePublisherId('HarperCollins'),
                'publisher_name' => 'Harper Collins',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'publisher_id' => DatabaseIdGenerator::generatePublisherId('Macmillan Publishers'),
                'publisher_name' => 'Macmillan Publishers',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'publisher_id' => DatabaseIdGenerator::generatePublisherId('Simon & Schuster'),
                'publisher_name' => 'Simon & Schuster',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

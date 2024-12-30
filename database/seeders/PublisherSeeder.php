<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Helpers\DatabaseIdGenerator;

class PublisherSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('publishers')->insert([
            [
                'publisher_id' => DatabaseIdGenerator::generatePublisherId('Penguin Random House'),
                'publisher_name' => 'Penguin Random House',
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'publisher_id' => DatabaseIdGenerator::generatePublisherId('HarperCollins'),
                'publisher_name' => 'Harper Collins',
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'publisher_id' => DatabaseIdGenerator::generatePublisherId('Macmillan Publishers'),
                'publisher_name' => 'Macmillan Publishers',
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'publisher_id' => DatabaseIdGenerator::generatePublisherId('Simon & Schuster'),
                'publisher_name' => 'Simon & Schuster',
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Helpers\DatabaseIdGenerator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert([
            [
                'member_id' => DatabaseIdGenerator::generateMemberId('Alice Johnson'),
                'member_name' => 'Alice Johnson',
                'member_address' => '123 Maple Street, Springfield',
                'member_phone' => '1234567890',
                'member_email' => 'alice.johnson@example.com',
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'member_id' => DatabaseIdGenerator::generateMemberId('Bob Smith'),
                'member_name' => 'Bob Smith',
                'member_address' => '456 Oak Avenue, Shelbyville',
                'member_phone' => '9876543210',
                'member_email' => 'bob.smith@example.com',
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'member_id' => DatabaseIdGenerator::generateMemberId('Cathy Brown'),
                'member_name' => 'Cathy Brown',
                'member_address' => '789 Pine Drive, Capital City',
                'member_phone' => '1122334455',
                'member_email' => 'cathy.brown@example.com',
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\DatabaseIdGenerator;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('staffs')->insert([
            [
                'staff_id' => DatabaseIdGenerator::generateStaffId('John Doe'),
                'staff_name' => 'John Doe',
                'staff_email' => 'johndoe@example.com',
                'staff_password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'staff_id' => DatabaseIdGenerator::generateStaffId('Jane Smith'),
                'staff_name' => 'Jane Smith',
                'staff_email' => 'janesmith@example.com',
                'staff_password' => Hash::make('securepassword'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'staff_id' => DatabaseIdGenerator::generateStaffId('Mark Johnson'),
                'staff_name' => 'Mark Johnson',
                'staff_email' => 'markjohnson@example.com',
                'staff_password' => Hash::make('mypassword'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\DatabaseIdGenerator;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'admin_id' => DatabaseIdGenerator::generateadminId('John Doe'),
                'admin_name' => 'John Doe',
                'admin_email' => 'johndoe@example.com',
                'admin_password' => Hash::make('password123'),
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_id' => DatabaseIdGenerator::generateadminId('Jane Smith'),
                'admin_name' => 'Jane Smith',
                'admin_email' => 'janesmith@example.com',
                'admin_password' => Hash::make('securepassword'),
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_id' => DatabaseIdGenerator::generateadminId('Mark Johnson'),
                'admin_name' => 'Mark Johnson',
                'admin_email' => 'markjohnson@example.com',
                'admin_password' => Hash::make('mypassword'),
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'admin_id' => DatabaseIdGenerator::generateadminId('Admin 1'),
                'admin_name' => 'Mark Johnson',
                'admin_email' => 'admin@gmail.com',
                'admin_password' => Hash::make('admin'),
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

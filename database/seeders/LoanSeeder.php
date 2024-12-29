<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loans')->insert([
            [
                'loan_id' => Carbon::now()->format('Ymd') . 'L01',
                'staff_id' => 'JD01',
                'member_id' => 'AJ01',
                'book_copy_id' => '198401-2023-1',
                'loan_date' => Carbon::now(),
                'loan_status' => 'Active',
                'return_date' => Carbon::now()->addWeeks(2),
                'return_date_actual' => null,
                'return_book_condition' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loan_id' => Carbon::now()->format('Ymd') . 'L02',
                'staff_id' => 'JS01',
                'member_id' => 'BS01',
                'book_copy_id' => 'AF0001-2023-1',
                'loan_date' => Carbon::now(),
                'loan_status' => 'Active',
                'return_date' => Carbon::now()->addWeeks(2),
                'return_date_actual' => null,
                'return_book_condition' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loan_id' => Carbon::now()->format('Ymd') . 'L03',
                'staff_id' => 'MJ01',
                'member_id' => 'CB01',
                'book_copy_id' => 'HPATC1-2023-1',
                'loan_date' => Carbon::now(),
                'loan_status' => 'Active',
                'return_date' => Carbon::now()->addWeeks(2),
                'return_date_actual' => null,
                'return_book_condition' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loan_id' => Carbon::now()->format('Ymd') . 'L04',
                'staff_id' => 'JD01',
                'member_id' => 'AJ01',
                'book_copy_id' => 'HPATS1-2023-1',
                'loan_date' => Carbon::now(),
                'loan_status' => 'Active',
                'return_date' => Carbon::now()->addWeeks(2),
                'return_date_actual' => null,
                'return_book_condition' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loan_id' => Carbon::now()->format('YmdHis') . 'L05',
                'staff_id' => 'JS01',
                'member_id' => 'BS01',
                'book_copy_id' => 'TH0001-2023-1',
                'loan_date' => Carbon::now(),
                'loan_status' => 'Active',
                'return_date' => Carbon::now()->addWeeks(2),
                'return_date_actual' => null,
                'return_book_condition' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loan_id' => Carbon::now()->format('YmdHis') . 'L06',
                'staff_id' => 'MJ01',
                'member_id' => 'CB01',
                'book_copy_id' => 'TLOTR1-2023-1',
                'loan_date' => Carbon::now(),
                'loan_status' => 'Active',
                'return_date' => Carbon::now()->addWeeks(2),
                'return_date_actual' => null,
                'return_book_condition' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

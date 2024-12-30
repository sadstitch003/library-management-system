<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Helpers\Enums\BookCondition;
use App\Helpers\Enums\LoanStatus;

class LoanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('loans')->insert([
            [
                'loan_id' => Carbon::now()->format('Ymd') . 'L01',
                'admin_id' => 'JD01',
                'member_id' => 'AJ01',
                'book_copy_id' => '198401-2023-001',
                'loan_date' => Carbon::now()->format('Y-m-d'),
                'loan_status' => LoanStatus::ACTIVE->value,
                'return_date' => Carbon::now()->addWeeks(2)->format('Y-m-d'),
                'return_date_actual' => null,
                'return_book_condition' => null,
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loan_id' => Carbon::now()->format('Ymd') . 'L02',
                'admin_id' => 'JS01',
                'member_id' => 'BS01',
                'book_copy_id' => 'AF0001-2023-001',
                'loan_date' => Carbon::now()->format('Y-m-d'),
                'loan_status' => LoanStatus::ACTIVE->value,
                'return_date' => Carbon::now()->addWeeks(2)->format('Y-m-d'),
                'return_date_actual' => null,
                'return_book_condition' => null,
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loan_id' => Carbon::now()->format('Ymd') . 'L03',
                'admin_id' => 'MJ01',
                'member_id' => 'CB01',
                'book_copy_id' => 'HPATC1-2023-001',
                'loan_date' => Carbon::now()->format('Y-m-d'),
                'loan_status' => LoanStatus::ACTIVE->value,
                'return_date' => Carbon::now()->addWeeks(2)->format('Y-m-d'),
                'return_date_actual' => null,
                'return_book_condition' => null,
                'status_del' => false, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loan_id' => Carbon::now()->format('Ymd') . 'L04',
                'admin_id' => 'JD01',
                'member_id' => 'AJ01',
                'book_copy_id' => 'HPATS1-2023-001',
                'loan_date' => Carbon::now()->format('Y-m-d'),
                'loan_status' => LoanStatus::RETURNED->value,
                'return_date' => Carbon::now()->addWeeks(2)->format('Y-m-d'),
                'return_date_actual' => Carbon::now()->addWeeks(1)->format('Y-m-d'),
                'return_book_condition' => BookCondition::GOOD->value,
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loan_id' => Carbon::now()->format('Ymd') . 'L05',
                'admin_id' => 'JS01',
                'member_id' => 'BS01',
                'book_copy_id' => 'TH0001-2023-001',
                'loan_date' => Carbon::now()->subDays(15)->format('Y-m-d'),
                'loan_status' => LoanStatus::ACTIVE->value,
                'return_date' => Carbon::now()->subDays(7)->format('Y-m-d'),
                'return_date_actual' => null,
                'return_book_condition' => null,
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loan_id' => Carbon::now()->format('Ymd') . 'L06',
                'admin_id' => 'MJ01',
                'member_id' => 'CB01',
                'book_copy_id' => 'TLOTR1-2023-001',
                'loan_date' => Carbon::now()->subDays(20)->format('Y-m-d'),
                'loan_status' => LoanStatus::RETURNED_LATE->value,
                'return_date' => Carbon::now()->subDays(10)->format('Y-m-d'),
                'return_date_actual' => Carbon::now()->subDays(5)->format('Y-m-d'),
                'return_book_condition' => BookCondition::GOOD->value,
                'status_del' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

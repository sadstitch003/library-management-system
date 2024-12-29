<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->string('loan_id')->primary();
            $table->string('staff_id');
            $table->string('member_id');
            $table->string('book_copy_id');
            $table->dateTime('loan_date');
            $table->string('loan_status');
            $table->dateTime('return_date');
            $table->dateTime('return_date_actual')->nullable();
            $table->string('return_book_condition')->nullable();
            $table->timestamps();

            $table->foreign('staff_id')->references('staff_id')->on('staffs')->onDelete('cascade');
            $table->foreign('member_id')->references('member_id')->on('members')->onDelete('cascade');
            $table->foreign('book_copy_id')->references('book_copy_id')->on('book_copies')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('loans');
    }
};

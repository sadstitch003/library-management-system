<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->string('loan_id')->primary()->index();
            $table->string('admin_id')->index();
            $table->string('member_id')->index();
            $table->string('book_copy_id')->index();
            $table->dateTime('loan_date');
            $table->string('loan_status');
            $table->dateTime('return_date');
            $table->dateTime('return_date_actual')->nullable();
            $table->string('return_book_condition')->nullable();
            $table->boolean('status_del');
            $table->timestamps();

            $table->foreign('admin_id')->references('admin_id')->on('admins')->onDelete('cascade');
            $table->foreign('member_id')->references('member_id')->on('members')->onDelete('cascade');
            $table->foreign('book_copy_id')->references('book_copy_id')->on('book_copies')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('loans');
    }
};

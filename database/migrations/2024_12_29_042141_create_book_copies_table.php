<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('book_copies', function (Blueprint $table) {
            $table->string('book_copy_id')->primary(); // [Book ID]-[Year]-[Number]
            $table->string('book_id');
            $table->string('book_condition');
            $table->year('year_published');
            $table->timestamps();

            $table->foreign('book_id')->references('book_id')->on('books')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_copies');
    }
};

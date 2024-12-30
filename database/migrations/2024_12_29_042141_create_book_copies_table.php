<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('book_copies', function (Blueprint $table) {
            $table->string('book_copy_id')->primary()->index(); // [Book ID]-[Year]-[Number]
            $table->string('book_id')->index();
            $table->string('publisher_id')->index();
            $table->string('book_condition');
            $table->year('year_published');
            $table->boolean('is_available');
            $table->boolean('status_del');
            $table->timestamps();

            $table->foreign('book_id')->references('book_id')->on('books')->onDelete('cascade');
            $table->foreign('publisher_id')->references('publisher_id')->on('publishers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_copies');
    }
};

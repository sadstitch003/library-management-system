<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('book_author', function (Blueprint $table) {
            $table->string('author_id');
            $table->string('book_id');
            $table->primary(['author_id', 'book_id']);
            $table->timestamps();

            $table->foreign('author_id')->references('author_id')->on('authors')->onDelete('cascade');
            $table->foreign('book_id')->references('book_id')->on('books')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_author');
    }
};

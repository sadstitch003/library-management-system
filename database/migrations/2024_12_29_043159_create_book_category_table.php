<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('book_category', function (Blueprint $table) {
            $table->string('category_id')->index();
            $table->string('book_id')->index();
            $table->primary(['category_id', 'book_id']);
            $table->timestamps();

            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
            $table->foreign('book_id')->references('book_id')->on('books')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_category');
    }
};

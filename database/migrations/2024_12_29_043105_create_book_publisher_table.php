<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('book_publisher', function (Blueprint $table) {
            $table->string('publisher_id');
            $table->string('book_copy_id');
            $table->primary(['publisher_id', 'book_copy_id']);
            $table->timestamps();

            $table->foreign('publisher_id')->references('publisher_id')->on('publishers')->onDelete('cascade');
            $table->foreign('book_copy_id')->references('book_copy_id')->on('book_copies')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_publisher');
    }
};

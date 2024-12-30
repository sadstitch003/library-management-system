<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('publishers', function (Blueprint $table) {
            $table->string('publisher_id')->primary()->index();
            $table->string('publisher_name'); 
            $table->boolean('status_del');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('publishers');
    }
};

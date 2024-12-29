<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->string('staff_id')->primary();
            $table->string('staff_name');
            $table->string('staff_email');
            $table->string('staff_password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('staffs');
    }
};


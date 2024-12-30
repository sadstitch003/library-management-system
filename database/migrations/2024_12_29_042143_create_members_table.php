<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->string('member_id')->primary()->index();
            $table->string('member_name');
            $table->string('member_address');
            $table->string('member_phone');
            $table->string('member_email');
            $table->boolean('status_del');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('members');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('address');
            $table->string('ho')->comment('Head office number');
            $table->string('support')->comment('call support no with business hour time');
            $table->string('b_hours')->comment('business hours with weekly day name seperated by comma');
            $table->integer('status')->comment('1 active 0 inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infos');
    }
};

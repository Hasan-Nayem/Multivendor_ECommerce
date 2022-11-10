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
        Schema::create('settings_images', function (Blueprint $table) {
            $table->id();
            $table->text('image_name');
            $table->integer('image_type')->comment('type 1 = logo, type 2 = favicon, type 3 = slider');
            $table->integer('status')->comment('0 = Inactive,1 = active, type 3 = slider');
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
        Schema::dropIfExists('settings_images');
    }
};

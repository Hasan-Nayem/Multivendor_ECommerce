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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('category_id');
            $table->unsignedInteger('regular_price');
            $table->unsignedInteger('offer_price')->nullable();
            $table->integer('total_quantity')->default(1);
            $table->text('meta_tags')->nullable();
            $table->integer('vendor_id')->nullable();
            $table->integer('featured_product')->default(0)->comment('0=disabled, 1=enabled');
            $table->integer('status')->default(1)->comment('0=inactive, 1=active');
            $table->string('sku_code')->nullable();
            $table->string('manufecture_date')->nullable();
            $table->string('expire_date')->nullable();
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
        Schema::dropIfExists('products');
    }
};

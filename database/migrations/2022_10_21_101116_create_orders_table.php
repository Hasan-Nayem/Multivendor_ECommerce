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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->text('country')->nullable();
            $table->text('zipcode')->nullable();
            $table->text('additional_information')->nullable();            
            $table->integer('status')->default(1)->comment('1=pending, 2=onHold, 3=Succcess, 4=Canceled, 5=Returned');
            
            $table->integer('payment_option')->default(0)->comment('1=COD, 2=SSL');
            $table->unsignedInteger('amount');
            $table->unsignedInteger('collected_amount')->nullable();
            $table->unsignedInteger('shipping_cost')->nullable();
            $table->text('transaction_id')->nullable();
            $table->text('currency')->nullable();
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
        Schema::dropIfExists('orders');
    }
};

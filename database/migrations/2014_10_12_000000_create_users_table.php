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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->unique()->nullable();
            $table->text('address1')->nullable();
            $table->text('address2')->nullable();
            $table->string('division')->nullable();
            $table->string('district')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();
            $table->text('image')->nullable();
            $table->integer('status')->default(1)->comment('0=Inactiveve, 1=Active');
            $table->integer('role')->default(3)->comment('1=Admin, 2=Vendor, 3=Cust');
            $table->string('nid')->nullable();
            $table->string('eTin')->nullable();
            $table->string('tradeLicence')->nullable();
            $table->string('store_name')->nullable();
            $table->string('store_address')->nullable();
            $table->string('store_slug')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};

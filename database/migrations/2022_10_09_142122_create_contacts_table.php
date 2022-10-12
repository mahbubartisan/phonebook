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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('birthday')->nullable();
            $table->longText('image')->nullable();
            $table->string('email')->nullable();
            $table->string('email_2')->nullable();
            $table->string('address')->nullable();
            $table->string('phone');
            $table->string('phone_2')->nullable();
            $table->string('department')->nullable();
            $table->string('company')->nullable();
            $table->string('company_phone')->nullable();
            $table->integer('favourite')->default(0);
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
        Schema::dropIfExists('contacts');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OuUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
           
        Schema::create('ou_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->unique();
            $table->string('fullname');
            $table->string('status');
            $table->string('school');
            $table->integer('phone');
            $table->integer('fax')->nullable();
            $table->string('email')->unique();
            $table->string('url')->nullable();
            $table->string('office',500);
            $table->string('remember_token')->nullable();
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
        //
         Schema::drop('ou_user');
    }
}

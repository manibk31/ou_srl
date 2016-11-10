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
            $table->string('email')->unique();
            $table->string('fullname')->nullable();
            $table->string('status')->nullable();
            $table->string('school')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('url')->nullable();
            $table->mediumText('office')->nullable();
            $table->string('photo')->nullable();
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

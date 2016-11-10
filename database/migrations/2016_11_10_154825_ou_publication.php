<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OuPublication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ou_publication', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->nullable();
            $table->text('book')->nullable();
            $table->text('chapter')->nullable();
            $table->text('article')->nullable();
            $table->text('coference')->nullable();
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
           Schema::drop('ou_publication');
    }
}

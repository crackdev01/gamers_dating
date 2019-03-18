<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaldatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_personalpage', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('date_id')->unsigned();
            $table->timestamps();
            $table -> foreign('user_id') -> references('id') -> on('users');
            $table -> foreign('date_id') -> references('personal_id') -> on('personalpages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_personalpage');
    }
}

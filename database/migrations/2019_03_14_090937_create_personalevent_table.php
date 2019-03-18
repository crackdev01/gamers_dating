<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaleventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_user', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('event_id')->unsigned();
            $table->timestamps();
            $table -> foreign('user_id') -> references('id') -> on('users');
            $table -> foreign('event_id') -> references('id') -> on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_user');
    }
}

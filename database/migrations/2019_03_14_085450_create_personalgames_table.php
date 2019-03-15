<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalgamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_games', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->bigInteger('game_id')->unsigned();
            $table->timestamps();
            $table -> foreign('id') -> references('id') -> on('users');
            $table -> foreign('game_id') -> references('game_id') -> on('games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_games');
    }
}

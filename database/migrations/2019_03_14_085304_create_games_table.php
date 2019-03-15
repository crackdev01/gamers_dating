<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('game_id');
            $table->string('game_name',60);
            $table->string('game_genre',40);
            $table->string('game_image_url',50);
            $table->string('game_extra',50)->nullable();
            $table->timestamps();
            //$table -> foreign('game_id') -> references('game_id') -> on('personal_games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}

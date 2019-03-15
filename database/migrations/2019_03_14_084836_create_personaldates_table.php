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
        Schema::create('personal_dates', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->bigInteger('date_id')->unsigned();
            $table->timestamps();
            $table -> foreign('id') -> references('id') -> on('users');
            $table -> foreign('date_id') -> references('personal_id') -> on('personal_pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_dates');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalpages', function (Blueprint $table) {
            $table->bigIncrements('personal_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('personal_firstname',40);
            $table->string('personal_lastname',40);
            $table->string('personal_nickname',40);
            $table->string('personal_gender',15);
            $table->integer('personal_age');
            $table->string('personal_location',40);
            $table->string('personal_image_url',50);
            $table->text('personal_info',500);
            $table->string('personal_status',10);
            $table->string('personal_food',100)->nullable();
            $table->string('personal_extra1',100)->nullable();
            $table->string('personal_extra2',100)->nullable();
            $table->timestamps();
            $table -> foreign('user_id') -> references('id') -> on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personalpages');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalpagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalpages', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('personal_firstname',40)->nullable();
            $table->string('personal_lastname',40)->nullable();
            $table->string('personal_nickname',40)->nullable();
            $table->string('personal_gender',15)->nullable();
            $table->integer('personal_age')->nullable();
            $table->string('personal_location',40)->nullable();
            $table->string('personal_image_url',50)->nullable();
            $table->text('personal_info',500)->nullable();
            $table->string('personal_status',10)->nullable();
            $table->string('personal_food',100)->nullable();
            $table->string('personal_extra1',100)->nullable();
            $table->string('personal_extra2',100)->nullable();
            $table->string('adminrights',20)->nullable();
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

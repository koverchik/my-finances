<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePowers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('powers', function (Blueprint $table) {
            $table->id();
            $table->integer('name_outlay_id')->unsigned();
            $table->foreign('name_outlay_id')->references('id')->on('name_outlay');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('delete_outlay')->default(0);
            $table->boolean('update_outlay')->default(0);
            $table->boolean('look_outlay')->default(1);
            $table->boolean('ability_outlay')->default(0);
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
        Schema::dropIfExists('powers');
    }
}

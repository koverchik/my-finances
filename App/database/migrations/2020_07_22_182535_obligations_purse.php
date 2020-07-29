<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ObligationsPurse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obligations_purse', function (Blueprint $table) {
            $table->id();
            $table->float('compensation', 8, 2);
            $table->boolean('model_purse')->default(0);
            $table->bigInteger('name_purse_id')->unsigned();
            $table->foreign('name_purse_id')->references('id')->on('name_purse')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('obligations_purse');
    }
}

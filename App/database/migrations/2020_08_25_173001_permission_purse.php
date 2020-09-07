<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissionPurse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission', function (Blueprint $table) {
          $table->id();
          $table->bigInteger('name_purse_id')->unsigned();
          $table->foreign('name_purse_id')->references('id')->on('name_purse')->onDelete('cascade');
          $table->bigInteger('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->boolean('delete_purse')->default(0);
          $table->boolean('update_purse')->default(0);
          $table->boolean('look_purse')->default(1);
          $table->boolean('ability_purse')->default(0);
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
        Schema::dropIfExists('permission');
    }
}

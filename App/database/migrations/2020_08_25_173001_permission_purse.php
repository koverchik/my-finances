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
          $table->boolean('delete_purse')->default(0);
          $table->boolean('update_purse')->default(0);
          $table->boolean('look_purse')->default(1);
          $table->boolean('ability_purse')->default(0);
          $table->foreignId('name_purse_id')->constrained('name_purse')->onUpdate('cascade')->onDelete('cascade');
          $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
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

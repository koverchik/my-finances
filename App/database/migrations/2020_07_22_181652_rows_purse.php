<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class RowsPurse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rows_purse', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->float('amount', 8, 2);
            $table->dateTime('created_at_time', 0);
            $table->foreignId('name_purse_id')->constrained('name_purse')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('rows_purse');
    }
}

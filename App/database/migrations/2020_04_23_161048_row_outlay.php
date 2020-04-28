<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RowOutlay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rows_outlay', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->float('amount', 8, 2);
            $table->integer('name_outlay_id')->unsigned();
            $table->foreign('name_outlay_id')->references('id')->on('name_outlay')->onDelete('cascade');
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
        Schema::dropIfExists('rows_outlay');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFloorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

   
    // id,floor_num (unique,4digit,autocreated), created_by, no_of_rooms (optional 1)
    public function up()
    {
        Schema::create('floors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('floor_num');
            $table->integer('created_by');
            $table->integer('no_of_room');
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
        Schema::dropIfExists('floors');
    }
}

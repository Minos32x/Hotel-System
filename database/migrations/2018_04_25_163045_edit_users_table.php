<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->default('avatar.jpg');
            $table->string('phone');
            $table->enum('gender', ['male', 'female']);
            $table->string('country');
            $table->time('last_login');
            $table->integer('banned_by')->nullable();
            $table->timestamp('banned_at')->nullable();
            $table->integer('approved_by')->nullable();
            $table->boolean('approved_state')->default(false);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('phone');
            $table->dropColumn('gender');
            $table->dropColumn('country');
            $table->dropColumn('last_login');
            $table->dropColumn('banned_at');
            $table->dropColumn('banned_by');
            $table->dropColumn('approved_by');
            $table->dropColumn('approved_state');


        });
    }
}

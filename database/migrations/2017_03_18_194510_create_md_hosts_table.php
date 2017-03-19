<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdHostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_hosts', function (Blueprint $table) {
            $table->increments('host_id');
            $table->string('host_username');
            $table->integer('game_id')->unsigned();
            $table->integer('game_host_type')->unsigned();

            $table->unique(['host_username', 'game_id']);
            $table->foreign('game_host_type')->references('game_host_type_id')->on('md_game_host_types')->onDelete('cascade');
            $table->foreign('game_id')->references('game_id')->on('md_games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('md_hosts');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdPlayerSlotPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_player_slot_players', function (Blueprint $table) {
            $table->increments('player_slot_player_id');
            $table->integer('game_player_slot_id')->unsigned();
            $table->string('player_username');

            $table->foreign('game_player_slot_id')->references('game_player_slot_id')->on('md_game_player_slots')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('md_player_slot_players');
    }
}

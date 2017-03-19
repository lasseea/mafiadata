<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdGamePlayerSlotAliasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_game_player_slot_aliases', function (Blueprint $table) {
            $table->integer('game_player_slot_id')->unsigned();
            $table->string('alias_name');

            $table->primary('game_player_slot_id');
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
        Schema::drop('md_game_player_slot_aliases');
    }
}

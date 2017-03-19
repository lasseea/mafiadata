<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdGamePlayerSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_game_player_slots', function (Blueprint $table) {
            $table->increments('game_player_slot_id');
            $table->integer('game_id')->unsigned();
            $table->integer('slot_number')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->string('role_name');
            $table->integer('end_status_id')->unsigned();
            $table->integer('end_day')->unsigned();

            $table->foreign('game_id')->references('game_id')->on('md_games')->onDelete('cascade');
            $table->foreign('team_id')->references('game_team_id')->on('md_game_teams')->onDelete('cascade');
            $table->foreign('end_status_id')->references('game_player_slot_end_status_id')->on('md_game_player_slot_end_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('md_game_player_slots');
    }
}

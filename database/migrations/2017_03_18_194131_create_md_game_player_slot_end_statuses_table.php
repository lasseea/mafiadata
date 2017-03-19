<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdGamePlayerSlotEndStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_game_player_slot_end_statuses', function (Blueprint $table) {
            $table->increments('game_player_slot_end_status_id');
            $table->string('status_name');
            $table->boolean('alive_or_dead');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('md_game_player_slot_end_statuses');
    }
}

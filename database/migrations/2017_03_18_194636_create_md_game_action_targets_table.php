<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdGameActionTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_game_action_targets', function (Blueprint $table) {
            $table->increments('game_action_target_id');
            $table->integer('game_action_id')->unsigned();
            $table->string('target_username');

            $table->foreign('game_action_id')->references('game_action_id')->on('md_game_actions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('md_game_action_targets');
    }
}

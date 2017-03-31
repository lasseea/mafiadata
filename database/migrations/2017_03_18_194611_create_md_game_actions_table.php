<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdGameActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_game_actions', function (Blueprint $table) {
            $table->increments('game_action_id');
            $table->string('action_user');
            $table->string('action_target');
            $table->string('action_name');
            $table->integer('game_id')->unsigned();
            $table->boolean('night_or_day');
            $table->integer('which_night_or_day')->unsigned();


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
        schema::drop('md_game_actions');
    }
}

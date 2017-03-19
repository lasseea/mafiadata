<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdGameTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_game_teams', function (Blueprint $table) {
            $table->increments('game_team_id');
            $table->integer('game_id')->unsigned();
            $table->string('game_team_name');
            $table->integer('team_type')->unsigned();
            $table->integer('result_type')->unsigned();

            $table->foreign('game_id')->references('game_id')->on('md_games')->onDelete('cascade');
            $table->foreign('team_type')->references('game_team_type_id')->on('md_game_team_types')->onDelete('cascade');
            $table->foreign('result_type')->references('game_result_type_id')->on('md_game_result_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('md_game_teams');
    }
}

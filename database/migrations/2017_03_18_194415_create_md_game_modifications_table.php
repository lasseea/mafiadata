<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdGameModificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_game_modifications', function (Blueprint $table) {
            $table->integer('game_modification_type_id')->unsigned();
            $table->integer('game_id')->unsigned();

            $table->primary(['game_modification_type_id', 'game_id']);
            $table->foreign('game_modification_type_id')->references('game_modification_type_id')->on('md_game_modification_types')->onDelete('cascade');
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
        Schema::drop('md_game_modifications');
    }
}

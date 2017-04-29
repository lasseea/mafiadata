<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_games', function (Blueprint $table) {
            $table->increments('game_id');
            $table->integer('game_community')->unsigned();
            $table->string('game_title');
            $table->string('game_thread_url');
            $table->integer('game_type')->unsigned();
            $table->boolean('normal_or_turbo');
            $table->integer('game_total_post_count')->unsigned();
            $table->text('game_description');
            $table->integer('day_length')->unsigned();
            $table->integer('night_length')->unsigned();
            $table->date('game_start_date');
            $table->string('game_data_managed_by');
            $table->timestamps();

            $table->foreign('game_community')->references('community_id')->on('md_communities')->onDelete('cascade');
            $table->foreign('game_type')->references('game_type_id')->on('md_game_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('md_games');
    }
}

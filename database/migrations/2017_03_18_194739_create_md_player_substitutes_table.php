<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdPlayerSubstitutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_player_substitutes', function (Blueprint $table) {
            $table->increments('player_slot_player_substitute_id');
            $table->integer('sub_out_id')->unsigned();
            $table->string('sub_in_username');
            $table->integer('day_of_sub')->unsigned();

            $table->foreign('sub_out_id')->references('player_slot_player_id')->on('md_player_slot_players')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('md_player_substitutes');
    }
}

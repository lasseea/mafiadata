<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdGameHostTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_game_host_types', function (Blueprint $table) {
            $table->increments('game_host_type_id');
            $table->string('game_host_type_name');

            $table->unique('game_host_type_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('md_game_host_types');
    }
}

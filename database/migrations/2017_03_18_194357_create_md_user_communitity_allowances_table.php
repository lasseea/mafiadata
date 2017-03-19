<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMdUserCommunitityAllowancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_user_community_allowances', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('community_id')->unsigned();

            $table->primary(['user_id', 'community_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('community_id')->references('community_id')->on('md_communities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('md_user_community_allowances');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player_slot_player extends Model
{
    protected $table = "md_player_slot_players";

    public $timestamps = false;

    protected $fillable = [
        'player_slot_player_id',
        'game_player_slot_id',
        'player_username',
    ];
}

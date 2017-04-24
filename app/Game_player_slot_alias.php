<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game_player_slot_alias extends Model
{
    protected $table = "md_game_player_slot_aliases";

    public $timestamps = false;

    protected $fillable = [
        'game_player_slot_id',
        'alias_name',
    ];
}

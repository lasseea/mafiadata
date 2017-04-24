<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game_player_slot_end_status extends Model
{
    protected $table = "md_game_player_slot_end_statuses";

    public $timestamps = false;

    protected $fillable = [
        'game_player_slot_end_status_id',
        'status_name',
    ];
}

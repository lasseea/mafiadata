<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game_player_slot extends Model
{
    protected $table = "md_game_player_slots";

    protected $fillable = [
        'game_player_slot_id',
        'game_id',
        'slot_number',
        'team_id',
        'role_name',
        'end_status_id',
        'end_day',
    ];
}

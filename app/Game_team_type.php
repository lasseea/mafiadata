<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game_team_type extends Model
{
    protected $table = "md_game_team_types";

    protected $fillable = [
        'game_team_type_id',
        'game_team_type',
    ];
}

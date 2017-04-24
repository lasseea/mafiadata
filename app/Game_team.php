<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game_team extends Model
{
    protected $table = "md_game_teams";

    public $timestamps = false;

    protected $fillable = [
        'game_team_id',
        'game_id',
        'game_team_name',
        'team_type',
        'result_type',
    ];
}

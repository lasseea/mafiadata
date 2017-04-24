<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game_action extends Model
{
    protected $table = "md_game_actions";

    public $timestamps = false;

    protected $fillable = [
        'game_action_id',
        'action_user',
        'action_target',
        'action_name',
        'game_id',
        'night_or_day',
        'which_night_or_day',
    ];
}

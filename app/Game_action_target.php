<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game_action_target extends Model
{
    protected $table = "md_game_action_targets";

    protected $fillable = [
        'game_action_target_id',
        'game_action_id',
        'target_username',
    ];
}

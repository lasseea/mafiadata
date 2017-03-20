<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player_substitute extends Model
{
    protected $table = "md_player_substitutes";

    protected $fillable = [
        'player_slot_player_substitute_id',
        'sub_out_id',
        'sub_in_username',
        'day_of_sub',
    ];
}

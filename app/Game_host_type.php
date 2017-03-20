<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game_host_type extends Model
{
    protected $table = "md_game_host_types";

    protected $fillable = [
        'game_host_type_id',
        'game_host_type_name',
    ];
}

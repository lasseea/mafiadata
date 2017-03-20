<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game_result_type extends Model
{
    protected $table = "md_game_result_types";

    protected $fillable = [
        'game_result_type_id',
        'game_result_type',
    ];
}

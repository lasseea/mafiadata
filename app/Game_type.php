<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game_type extends Model
{
    protected $table = "md_game_types";

    public $timestamps = false;

    protected $fillable = [
        'game_type_id',
        'game_type_name',
    ];
}

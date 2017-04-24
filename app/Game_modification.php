<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game_modification extends Model
{
    protected $table = "md_game_modifications";

    public $timestamps = false;

    protected $fillable = [
        'game_modification_type_id',
        'game_id',
    ];
}

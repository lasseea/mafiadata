<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game_modification_type extends Model
{
    protected $table = "md_game_modification_types";

    public $timestamps = false;

    protected $fillable = [
        'game_modification_type_id',
        'modification_type_name',
    ];
}

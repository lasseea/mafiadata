<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = "md_games";

    protected $fillable = [
        'game_id',
        'game_community',
        'game_title',
        'game_thread_url',
        'game_type',
        'game_total_post_count',
        'game_description',
        'day_length',
        'night_length',
        'game_start_date',
        'game_data_managed_by',
    ];
}

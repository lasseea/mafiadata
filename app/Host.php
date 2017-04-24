<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    protected $table = "md_hosts";

    public $timestamps = false;

    protected $fillable = [
        'host_id',
        'host_username',
        'game_id',
        'game_host_type',
    ];
}

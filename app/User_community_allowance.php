<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_community_allowance extends Model
{
    protected $table = "md_user_community_allowances";

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'community_id',
    ];
}

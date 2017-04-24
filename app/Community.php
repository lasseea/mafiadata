<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $table = "md_communities";

    public $timestamps = false;

    protected $fillable = [
        'community_id',
        'community_name',
        'community_link',
    ];

}

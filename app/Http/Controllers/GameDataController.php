<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameDataController extends Controller
{
    public function aggregatestats () {
        return view('gamedata/aggregatestats');
    }
}

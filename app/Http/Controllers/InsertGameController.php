<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;

class InsertGameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $gamemodificationtypes = App\Game_modification_type::all();
        return view('auth/insertgame/insertgame', compact('gamemodificationtypes'));
    }
}

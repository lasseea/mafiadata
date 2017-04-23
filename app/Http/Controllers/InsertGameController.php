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

    public function index(Request $request)
    {
        $gamemodificationtypes = App\Game_modification_type::all();
        return view('auth/insertgame/insertgame', compact('gamemodificationtypes'));
    }

    public function submit(Request $request) {
        $this->validate($request, [
            'community' => 'required',
            'url' => 'required|url',
            'title' => 'required',
            'date' => 'required',
            'gametype' => 'required',
            'gamesetup' => 'required',
            'wasitturbo' => '',
            'postcount' => 'required',
            'daylength' => 'required',
            'nightlength' => 'required',
            'gamemodification1' => '',
            'description' => '',
            'mainhost' => '',
            'hostusername1' => '',
            'hosttype1' => '',
            'teamname1' => '',
            'teamresulttype1' => '',
            'player1' => '',
            'slotteam1' => '',
            'slotrole1' => '',
            'slotstatus1' => '',
            'alias1' => '',
            'secondplayer1' => '',
            'suboutname1' => '',
            'subinname1' => '',
            'dayofsub1' => '',
            'actionuser1' => '',
            'actionname1' => '',
            'actiontextname1' => '',
            'actiontarget1' => '',
            'nightorday1' => '',
            'whichnightorday1' => '',
        ]);
        $request->session()->flash('status', 'Game submitted!');
        return redirect()->action(
            'GameDataController@aggregatestats'
        );
    }
}

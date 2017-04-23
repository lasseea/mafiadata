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
            'gamemodification.*' => 'boolean',
            'description' => '',
            'mainhost' => '',
            'hostusername.*' => '',
            'hosttype.*' => '',
            'teamname.*' => '',
            'teamresulttype.*' => '',
            'player.*' => '',
            'slotteam.*' => '',
            'slotrole.*' => '',
            'slotstatus.*' => '',
            'alias.*' => '',
            'secondplayer.*' => '',
            'suboutname.*' => '',
            'subinname.*' => '',
            'dayofsub.*' => '',
            'actionuser.*' => '',
            'actionname.*' => '',
            'actiontextname.*' => '',
            'actiontarget.*' => '',
            'nightorday.*' => '',
            'whichnightorday.*' => '',
        ]);
        $request->session()->flash('status', 'Game submitted!');
        return redirect()->action(
            'GameDataController@aggregatestats'
        );
    }
}

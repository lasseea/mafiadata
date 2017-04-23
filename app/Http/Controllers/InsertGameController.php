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
            'community' => 'required|max:191',
            'url' => 'required|url|max:191',
            'title' => 'required|max:191',
            'date' => 'date|required',
            'gametype' => 'required|max:191',
            'gamesetup' => 'required|max:191',
            'wasitturbo' => 'boolean',
            'postcount' => 'required|integer',
            'daylength' => 'required|integer',
            'nightlength' => 'required|integer',
            'gamemodification.*' => 'boolean',
            'description' => 'max:191',
            'mainhost' => 'max:191|required',
            'hostusername.*' => 'max:191|required',
            'hosttype.*' => 'max:191|required',
            'teamname.*' => 'max:191|required',
            'teamresulttype.*' => 'max:191|required',
            'player.*' => 'max:191|required',
            'slotteam.*' => 'max:191|required',
            'slotrole.*' => 'max:191|required',
            'slotstatus.*' => 'max:191|required',
            'alias.*' => 'max:191',
            'secondplayer.*' => 'max:191',
            'suboutname.*' => 'max:191|required',
            'subinname.*' => 'max:191|required',
            'dayofsub.*' => 'integer|required',
            'actionuser.*' => 'max:191|required',
            'actionname.*' => 'max:191|required',
            'actiontextname.*' => 'max:191',
            'actiontarget.*' => 'max:191|required',
            'nightorday.*' => 'max:191|required',
            'whichnightorday.*' => 'integer|required',
        ]);
        $request->session()->flash('status', 'Game submitted!');
        return redirect()->action(
            'GameDataController@aggregatestats'
        );
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;
use Auth;

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
            'url' => 'required|url|max:191|unique:md_games,game_thread_url',
            'title' => 'required|max:191',
            'date' => 'date|required',
            'gametype' => 'required|max:191',
            'gamesetup' => 'required|max:191',
            'wasitturbo' => 'boolean',
            'postcount' => 'required|integer',
            'daylength' => 'required|integer',
            'nightlength' => 'required|integer',
            'gamemodification.*' => 'boolean',
            'description' => 'max:191|required',
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
        $community = App\Community::where('community_name', $request->community)->value('community_id');
        $gametype = App\Game_type::where('game_type_name', $request->gametype)->value('game_type_id');
        DB::transaction(function () use ($community, $request, $gametype) {

            DB::table('md_games')->insert(
                [
                    'game_community' => $community,
                    'game_title' => $request->title,
                    'game_thread_url' => $request->input('url'),
                    'game_type' => $gametype,
                    'normal_or_turbo' => $request->wasitturbo,
                    'game_total_post_count' => $request->postcount,
                    'game_description' => $request->description,
                    'day_length' => $request->daylength,
                    'night_length' => $request->nightlength,
                    'game_start_date' => $request->date,
                    'game_data_managed_by' => Auth::user()->id,
                ]
            );
        });


        $request->session()->flash('status', 'Game submitted!');
        return redirect()->action(
            'GameDataController@aggregatestats'
        );
    }
}

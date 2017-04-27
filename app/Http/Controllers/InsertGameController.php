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
            'game_team_name.*' => 'max:191|required',
            'teamresulttype.*' => 'max:191|required',
            'player.*' => 'max:191|required',
            'slotteam.*' => 'max:191|required',
            'slotrole.*' => 'max:191|required',
            'slotstatus.*' => 'max:191|required',
            'endday.*' => 'integer|required',
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
        //Counts amount of game modifications, to use in a for loop to ensure check all possible modifications
        $modificationtypecount = 0;
        $modificationtypecount = App\Game_modification_type::all()->count();
        //Counts amount of added hosts, to only add exactly that number of hosts to the database, excluding the main host
        $addedhostscount = 0;
        while (isset($request->hostusername[$addedhostscount+1])) {
            $addedhostscount++;
        }
        $teamcount = 0;
        while (isset($request->teamname[$teamcount+1])) {
            $teamcount++;
        }
        $playerspotcount = 0;
        while (isset($request->player[$playerspotcount+1])) {
            $playerspotcount++;
        }
        $substitutecount = 0;
        while (isset($request->suboutname[$substitutecount+1])){
            $substitutecount++;
        }
        $actioncount = 0;
        while (isset($request->actionuser[$actioncount+1])) {
            $actioncount++;
        }
        DB::transaction(function () use (
            $community,
            $request,
            $gametype,
            $modificationtypecount,
            $addedhostscount,
            $teamcount,
            $playerspotcount,
            $substitutecount,
            $actioncount
        ) {

            $lastGameId = DB::table('md_games')->insertGetId(
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
            for ($i = 1; $i <= $modificationtypecount; $i++) {
                if ($request->gamemodification[$i] == 1) {
                    DB::table('md_game_modifications')->insert(
                        [
                            'game_modification_type_id' => $i,
                            'game_id' => $lastGameId
                        ]
                    );
                }
            }
            DB::table('md_hosts')->insert(
                 [
                     'host_username' => $request->mainhost,
                     'game_id' => $lastGameId,
                     'game_host_type' => 1
                 ]
            );
            for ($i = 1; $i <= $addedhostscount; $i++) {
                DB::table('md_hosts')->insert(
                    [
                        'host_username' => $request->hostusername[$i],
                        'game_id' => $lastGameId,
                        'game_host_type' => $request->hosttype[$i]
                    ]
                );
            }
            $teamsArray = array();
            for ($i = 1; $i <= $teamcount; $i++) {
                $lastTeamId = DB::table('md_game_teams')->insertGetId(
                    [
                        'game_id' => $lastGameId,
                        'game_team_name' => $request->teamname[$i],
                        'team_type' => $request->teamtype[$i],
                        'result_type' => $request->teamresulttype[$i],
                    ]
                );
                $teamsArray[$request->teamname[$i]] = $lastTeamId;
            }
            $playersArray = array();
            for ($i = 1; $i <= $playerspotcount; $i++) {
                $lastSpotId = DB::table('md_game_player_slots')->insertGetId(
                    [
                        'game_id' => $lastGameId,
                        'slot_number' => $i,
                        'team_id' => $teamsArray[$request->slotteam[$i]],
                        'role_name' => $request->slotrole[$i],
                        'end_status_id' => $request->slotstatus[$i],
                        'end_day' => $request->endday[$i]

                    ]
                );
                $lastPlayerId = DB::table('md_player_slot_players')->insertGetId(
                    [
                        'game_player_slot_id' => $lastSpotId,
                        'player_username' => $request->player[$i],
                    ]
                );
                $playersArray[$request->player[$i]] = $lastPlayerId;
                if (isset($request->secondplayer[$i])) {
                    $lastPlayerId = DB::table('md_player_slot_players')->insertGetId(
                        [
                            'game_player_slot_id' => $lastSpotId,
                            'player_username' => $request->secondplayer[$i],
                        ]
                    );
                    $playersArray[$request->secondplayer[$i]] = $lastPlayerId;
                }
                if (isset($request->alias[$i])) {
                    DB::table('md_game_player_slot_aliases')->insert(
                        [
                            'game_player_slot_id' => $lastSpotId,
                            'alias_name' => $request->alias[$i]
                        ]
                    );
                }
            }
            for ($i = 1; $i <= $substitutecount; $i++) {
                DB::table('md_player_substitutes')->insert(
                    [
                        'sub_out_id' => $playersArray[$request->suboutname[$i]],
                        'sub_in_username' => $request->subinname[$i],
                        'day_of_sub' => $request->dayofsub[$i]
                    ]
                );
            }
            for ($i = 1; $i <= $actioncount; $i++) {
                $actionname = "";
                if (isset($request->actiontextname[$i])) {
                    $actionname = $request->actiontextname[$i];
                } else {
                    $actionname = $request->actionname[$i];
                }
                DB::table('md_game_actions')->insert(
                    [
                        'action_user' => $request->actionuser[$i],
                        'action_name' => $actionname,
                        'action_target' => $request->actiontarget[$i],
                        'night_or_day' => $request->nightorday[$i],
                        'which_night_or_day' => $request->whichnightorday[$i],
                        'game_id' => $lastGameId,
                    ]
                );
            }
        });


        $request->session()->flash('status', 'Game submitted!');
        return redirect()->action(
            'GameDataController@aggregatestats'
        );
    }
}

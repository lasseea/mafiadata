<?php

use Illuminate\Database\Seeder;

class GameTeamTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gameTeamTypes = ['Town', 'Mafia', 'Third Party'];
        foreach ($gameTeamTypes as $gameTeamType) {
            DB::table('md_game_team_types')->insert(
                [
                    'game_team_type' => $gameTeamType
                ]
            );
        }
    }
}

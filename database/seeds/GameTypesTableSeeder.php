<?php

use Illuminate\Database\Seeder;

class GameTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gameTypes = ['Open', 'Semi-open', 'Closed', 'Bastard'];
        foreach ($gameTypes as $gameType) {
            DB::table('md_game_types')->insert(
                [
                    'game_type_name' => $gameType
                ]
            );
        }
    }
}

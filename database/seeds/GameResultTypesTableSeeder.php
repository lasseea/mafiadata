<?php

use Illuminate\Database\Seeder;

class GameResultTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $GameResultTypes = ['Won', 'Lost', 'Draw', 'Null'];
        foreach ($GameResultTypes as $gameResultType) {
            DB::table('md_game_result_types')->insert(
                [
                    'game_result_type' => $gameResultType
                ]
            );
        }
    }
}

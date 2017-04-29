<?php

use Illuminate\Database\Seeder;

class GamePlayerSlotEndStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gamePlayerSlotEndStatusesSurvived = [
            'Survived',
            'Endgamed',
            'Conceded'
        ];
        $gamePlayerSlotEndStatusesDied = [
            'Lynched',
            'Night killed by Mafia or Third Party',
            'Night killed by Town',
            'Day killed by Mafia or Third Party',
            'Day killed by Town',
            'Modkilled',
            'In-Thread Attack',
            'Killed in event',
            'Suicide',
        ];

        foreach ($gamePlayerSlotEndStatusesSurvived as $gamePlayerSlotEndStatusSurvived) {
            DB::table('md_game_player_slot_end_statuses')->insert(
                [
                    'status_name' => $gamePlayerSlotEndStatusSurvived,
                    'alive_or_dead' => '0'
                ]
            );
        }
        foreach ($gamePlayerSlotEndStatusesDied as $gamePlayerSlotEndStatusDied) {
            DB::table('md_game_player_slot_end_statuses')->insert(
                [
                    'status_name' => $gamePlayerSlotEndStatusDied,
                    'alive_or_dead' => '1'
                ]
            );
        }
    }
}

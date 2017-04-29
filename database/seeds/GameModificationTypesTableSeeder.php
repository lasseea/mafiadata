<?php

use Illuminate\Database\Seeder;

class GameModificationTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gameModificationTypes = [
            'ITAs',
            'Night Talk In Game Thread',
            'No Day Talk In Scum Chat',
            'Planned Events(Quizzes, Mini-Games, Etc.)',
            'Mafia Night Kill Had To Be Assigned',
            'Hydra',
            'Alias'
        ];
        foreach($gameModificationTypes as $gameModificationType) {
            DB::table('md_game_modification_types')->insert(
                [
                    'modification_type_name' => $gameModificationType
                ]
            );
        }
    }
}

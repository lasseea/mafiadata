<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GameHostTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hostTypes = ['Main Host', 'Co-host'];
        foreach ($hostTypes as $hostType) {
            DB::table('md_game_host_types')->insert(
                [
                    'game_host_type_name' => $hostType
                ]
            );
        }
    }
}

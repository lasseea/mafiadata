<?php

use Illuminate\Database\Seeder;

class CommunitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $communities = [
            'Mafia Universe'=>'http://www.mafiauniverse.com'
        ];

        foreach ($communities as $community => $community_link)
        {
            DB::table('md_communities')->insert
            (
                [
                    'community_name' => $community,
                    'community_link' => $community_link
                ]
            );
        }
    }
}

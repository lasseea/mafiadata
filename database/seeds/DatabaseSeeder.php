<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(GameHostTypesTableSeeder::class);
        $this->call(GameModificationTypesTableSeeder::class);
        $this->call(GamePlayerSlotEndStatusesTableSeeder::class);
        $this->call(GameResultTypesTableSeeder::class);
        $this->call(GameTypesTableSeeder::class);
        $this->call(GameTeamTypesTableSeeder::class);
        $this->call(CommunitiesTableSeeder::class);
    }
}

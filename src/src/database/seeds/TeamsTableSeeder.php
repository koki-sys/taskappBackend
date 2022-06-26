<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataArray = [
            ['id' => 9999, 'name' => "no"],
            ['id' => 1, 'name' => "team1"],
            ['id' => 2, 'name' => "team2"]
        ];
        DB::table('teams')->insert($dataArray);
    }
}

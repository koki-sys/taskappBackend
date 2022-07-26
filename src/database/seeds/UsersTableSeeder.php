<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 初期化処理

        // データ挿入
        $dataArray = [
            [
                'id' => 1,
                'name' => 'testA',
                'email' => 'testA@example.com',
                'password' => Hash::make('testtest1@'),
                'team_id' => 9999
            ],
            [
                'id' => 2,
                'name' => 'testB',
                'email' => 'testB@example.com',
                'password' => Hash::make('testtest2@'),
                'team_id' => 1
            ],
            [
                'id' => 3,
                'name' => 'testC',
                'email' => 'testC@example.com',
                'password' => Hash::make('testtest3@'),
                'team_id' => 1
            ],
            [
                'id' => 4,
                'name' => 'testD',
                'email' => 'testD@example.com',
                'password' => Hash::make('testtest4@'),
                'team_id' => 2
            ],
            [
                'id' => 5,
                'name' => 'testE',
                'email' => 'testE@example.com',
                'password' => Hash::make('testtest5@'),
                'team_id' => 2
            ]
        ];
        DB::table('users')->insert($dataArray);
    }
}

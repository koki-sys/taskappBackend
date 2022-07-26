<?php

use Illuminate\Database\Seeder;

class TasksmanagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // データ挿入
        $dataArray = [
            [
                'id' => 1,
                'task_id' => 1,
                'user_id' => 2,
                'team_id' => 1
            ],
            [
                'id' => 2,
                'task_id' => 2,
                'user_id' => 3,
                'team_id' => 1
            ],
            [
                'id' => 3,
                'task_id' => 3,
                'user_id' => 2,
                'team_id' => 1
            ],
            [
                'id' => 4,
                'task_id' => 4,
                'user_id' => 3,
                'team_id' => 1
            ],
        ];
        DB::table('tasksmanages')->insert($dataArray);
    }
}

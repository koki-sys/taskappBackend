<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        $dataArray = [
            ['id' => 1, 'name' => "画面設計書の設計", 'flg' => 1, 'deadline' => $now],
            ['id' => 2, 'name' => "トップページの作成", 'flg' => 1, 'deadline' => $now],
            ['id' => 3, 'name' => "データベースの設定", 'flg' => 0, 'deadline' => $now],
            ['id' => 4, 'name' => "E-R図", 'flg' => 0, 'deadline' => $now],
            ['id' => 5, 'name' => "要件定義書", 'flg' => 0, 'deadline' => $now],
            ['id' => 6, 'name' => "企画", 'flg' => 0, 'deadline' => $now],
        ];
        DB::table('tasks')->insert($dataArray);
    }
}

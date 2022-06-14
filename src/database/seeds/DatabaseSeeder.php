<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TeamsTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TasksmanagesTableSeeder::class);
    }
}

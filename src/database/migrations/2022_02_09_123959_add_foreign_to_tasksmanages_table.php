<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToTasksmanagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasksmanages', function (Blueprint $table) {
            $table->integer('task_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('team_id')->unsigned();

            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasksmanages', function (Blueprint $table) {
            $table->dropForeign('tasksmanages_task_id_foreign');
            $table->dropForeign('tasksmanages_user_id_foreign');
            $table->dropForeign('tasksmanages_team_id_foreign');

            $table->dropColumn('task_id');
            $table->dropColumn('user_id');
            $table->dropColumn('team_id');
        });
    }
}

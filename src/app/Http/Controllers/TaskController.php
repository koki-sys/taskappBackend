<?php

namespace App\Http\Controllers;

use App\Tasksmanage;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    /**
     * タスクを追加するメソッド
     *
     * @author koki-sys
     * @return view
     */
    public function add(Request $request)
    {
        // タスク作成
        $task = new Task;

        $task->name = $request->input('name');
        $task->deadline = $request->input('deadline');
        $task->flg = 0;

        $task->save();

        // userを検索->user_idを入れる
        foreach ($request->input('staff') as $user) {
            $user = User::where('name', $user)->select('id')->get();
            if ($user->isEmpty()) {
                return response()->json('ユーザが存在しません', Response::HTTP_BAD_REQUEST);
            }

            // taskmanagesに入れる
            $task_m = new Tasksmanage;
            $task_m->task_id = $task->id;
            $task_m->team_id = User::find($user[0]->id)->team_id;
            $task_m->user_id = $user[0]->id;

            $task_m->save();
        }

        return response()->json('タスク追加しました', Response::HTTP_OK);
    }

    /**
     * 未完了タスクの一覧データを取得するメソッド
     *
     * @author koki-sys
     * @return view
     */
    public function doing()
    {
        // DBから取得する処理
        $doingTasks = Tasksmanage::leftJoin('tasks', 'tasksmanages.task_id', '=', 'tasks.id')
        ->leftJoin('teams', 'tasksmanages.team_id', '=', 'teams.id')
        ->leftJoin('users', 'tasksmanages.user_id', '=', 'users.id')
        ->where('tasksmanages.team_id', User::where('name', session('userName'))->first()->team_id)
        ->where('flg', 0)
        ->select('tasksmanages.*', 'tasks.id as task_id', 'tasks.name as task_name', 'tasks.flg', 'tasks.deadline', 'teams.name as team_name', 'users.name as user_name')
        ->get();

        return $doingTasks;
    }

    /**
     * 完了タスクの一覧データを取得するメソッド
     *
     * @author koki-sys
     * @return view
     */
    public function done(Request $request)
    {
        $doneTasks = Tasksmanage::leftJoin('tasks', 'tasksmanages.task_id', '=', 'tasks.id')
        ->leftJoin('teams', 'tasksmanages.team_id', '=', 'teams.id')
        ->leftJoin('users', 'tasksmanages.user_id', '=', 'users.id')
        ->where('tasksmanages.team_id', $request->team_id)
        ->where('flg', 1)
        ->select('tasksmanages.*', 'tasks.id as task_id', 'tasks.name as task_name', 'tasks.flg', 'tasks.deadline', 'teams.name as team_name', 'users.name as user_name')
        ->get();

        return $doneTasks;
    }

    /**
     * チェックをつけて、完了済みに入れるメソッド
     *
     * @author koki-sys
     * @return view
     */
    public function check(Request $request)
    {
        $task = Task::find($request->task_id);

        $task->flg = 1;
        $task->save();

        return response()->json('完了しました', Response::HTTP_OK);
    }

    /**
     * 削除するためのメソッド
     * 
     * @author koki-sys
     * @return view
     */
    public function delete(Request $request)
    {
        Tasksmanage::where('id', $request->id)->delete();

        return response()->json('削除しました', Response::HTTP_OK);
    }
}

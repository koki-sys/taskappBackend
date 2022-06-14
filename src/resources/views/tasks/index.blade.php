@extends("layouts/common")

@section("content")
<h3 class="float-left">タスク</h3>
<span class="float-right" data-toggle="modal" data-target="#addTask">
    <img src="{{ asset('images/add_task.svg') }}" />
</span><br />
<!-- Modal -->
<div class="modal fade" id="addTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">タスクの追加</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- formを入れる -->
                <form>
                    <input type="text" name="task" placeholder="タスク名" />
                    <input type="datetime" name="calendar" placeholder="期日" />
                    <input type="text" name="担当者"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">タスクの追加</button>
            </div>
        </div>
    </div>
</div>
<div class="row mt-5">
    <div class="col-md-6 position-relative done">
        <div class="task-card shadow-sm">
            <div class="card-body">
                <h5 class="text-center card-title">終了したタスク</h5>
                <div class="card-scroll">
                    <!-- 判定式 -->
                    @if(!$doneTasks->isEmpty())
                    @foreach ($doneTasks as $done)
                    <div class="done-task m-2 rounded p-2">
                        <p class="text-left">{{ $done->task_name }}</p>
                        <small class="text-right">締め切り：{{ $done->deadline }}</small>
                        <small class="text-right">担当者：{{ $done->user_name }}</small>
                    </div>
                    @endforeach
                    @else
                    <img src="{{ asset('images/end_donetask.png') }}" class="d-block mx-auto w-50" />
                    <p class="text-center">完了したタスクはありません<br />タスクを作るか、完了させましょう！</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="task-card shadow-sm">
            <div class="card-body">
                <h5 class="text-center card-title">実行中のタスク</h5>
                <div class="card-scroll">
                    <!-- 判定式 -->
                    @if(!$doingTasks->isEmpty())
                    @foreach ($doingTasks as $doing)
                    <a href="/task/check/{{ $doing->task_id }}">
                        <div class="doing-task m-2 rounded p-2">
                            <p class="text-left">{{ $doing->task_name }}</p>
                            <small class="text-right">締め切り：{{ $doing->deadline }}</small>
                            <small class="text-right">担当者：{{ $doing->user_name }}</small>
                        </div>
                    </a>
                    @endforeach
                    @else
                    <img src="{{ asset('images/end_task.png') }}" class="d-block mx-auto w-50" />
                    <p class="text-center">実行中のタスクはありません！</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endsection
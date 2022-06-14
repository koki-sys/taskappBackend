@extends("layouts.common")

@section("content")
<h3>ダッシュボード</h3>
<div class="row mt-3">
    <div class="col-md-4">
        <div class="app-card p-3 shadow-sm">
            <h5>アプリ</h5>
            <div class="d-flex flex-row">
                <a href="http://draw.io" class="ml-2 mr-2">
                    <img class="rounded" src="{{ asset('images/sample.png') }}" width="50" />
                </a>
                <a href="#" class="ml-2 mr-2">
                    <img class="rounded" src="{{ asset('images/sample.png') }}" width="50" />
                </a>
            </div>
        </div>
        <div class="dashboard-task-card p-3 mt-5 shadow-sm">
            <div>
                <h5 class="float-left">タスク</h5>
                <a href="/task" class="text-decoration-none text-reset">
                    <i class="fas fa-external-link-alt fa-lg float-right"></i>
                </a>
            </div>
            @if (!$task_overview->isEmpty())
            <!-- これ四回繰り返す -->
            @foreach ($task_overview as $task)
            <div class="task p-2 rounded bg-light mt-1 mb-1">{{ $task->name }}</div>
            @endforeach
            @else
            <img src="{{ asset('images/end_task.png') }}" class="d-block mx-auto w-50" />
            <p class="text-center">実行中のタスクはありません！</p>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <!-- listgroup使う -->
        <div class="post-card p-3 mt-5 shadow-sm">
            <h5>最近の投稿</h5>
            <!-- これ四回繰り返す -->
            <ul class="list-group list-group-flush">
                <li class="post-item">An item</li>
                <li class="post-item">A second item</li>
                <li class="post-item">A third item</li>
                <li class="post-item">A fourth item</li>
                <li class="post-item">And a fifth one</li>
            </ul>
        </div>
    </div>
    <div class="col-md-4">
        <!-- listgroup使う -->
        <div class="box-card p-3 mt-5 shadow-sm">
            <h5>意見ボックス</h5>
            <!-- これ四回繰り返す -->
            <li class="box-item">An item</li>
            <li class="box-item">A second item</li>
            <li class="box-item">A third item</li>
            <li class="box-item">A fourth item</li>
            <li class="box-item">And a fifth one</li>
        </div>
    </div>
</div>
@endsection
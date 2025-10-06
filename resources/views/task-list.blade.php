@extends('comm.header')


@section('content')

@extends('comm.innerheader')


<div class="main-content">
    <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary">
        <a href="/tasks" class="d-flex align-items-center flex-shrink-0 p-3 link-body-emphasis text-decoration-none border-bottom">
            <i class="fas fa-tasks"></i>
            <span class="fs-5 fw-bold task-text ">My Tasks</span>
        </a>
        <div class="list-group list-group-flush border-bottom scrollarea">
            @foreach($tasks as $task)
            <a href="/task/{{ $task->id }} " class="list-group-item list-group-item-action py-3 lh-sm list-group-item-update" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <strong class="mb-1">{{ $task->task_name }}</strong>
                </div>
                <div class="col-10 mb-1 small">
                    <small>Created by : {{ $task->owner }}</small>
                </div>
                <div class="d-flex w-100 justify-content-between">
                    Visit for : {{ $task->visit_purpose }}
                    <br>
                    Ref. : {{ $task->ref_info }}

                </div>

                <small>Task Start : {{ $task->created_at }} <br> Task End : {{ $task->end_at }}</small>
                <br>
                <small>Status : {{ $task->status }}</small>
            </a>
            @endforeach
            
        </div>

    </div>
</div>

@endsection
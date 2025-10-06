@extends('comm.header')


@section('content')

@extends('comm.innerheader')


<div class="main-content">
    <h1>Dashboard</h1>
     
    <a href="/tasks" class="text-decoration-none">
    <p class="fw-medium"> <i class="fas fa-tasks me-3"></i>Your Pending Tasks <span>
            <i class="fa fa-info-circle" aria-hidden="true"></i>
        </span></p></a>
    <hr class="dashboard-hr">
    <div class="list-group list-group-flush border-bottom scrollarea">
            @foreach($tasks as $task)
            <a href="/task/{{ $task->id }} " class="list-group-item list-group-item-action py-3 lh-sm list-group-item-update" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <strong class="mb-1">{{ $task->task_name }}</strong>
                </div>
                <div class="d-flex w-100 justify-content-between">
                    Visit for : {{ $task->visit_purpose }}
                </div>
                @if($task->status !== "Closed")
                    <small class="text-danger"><b>Status : {{ $task->status }}</b></small>
                @else
                    <small><b>Status : {{ $task->status }}</b></small>
                @endif
            </a>
            @endforeach

        </div>

    <div>
        <x-calender />
    </div>

</div>


@endsection
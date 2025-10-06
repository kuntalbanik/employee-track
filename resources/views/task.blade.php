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
            <form action="/update/{{ $task->id }}" method="post">
                @csrf

                <div class="d-flex w-100 justify-content-between">
                    <strong class="mb-1">{{ $task->task_name }}</strong>
                </div>
                <div class="col-10 mb-1 small">
                    Owner : {{ $task->owner }}
                </div>
                <div class="d-flex w-100 justify-content-between">
                    Visit for : {{ $task->visit_purpose }}
                    <br>
                    Ref. : {{ $task->ref_info }}
                </div>
                <div class="col-10 mb-1 small">
                    Start Address : {{ $task->start_addr }}
                </div>
                <div class="col-10 mb-1 small">
                    End Address : {{ $task->end_addr }}
                </div>
                <div class="col-10 mb-1 small">
                    Start Position : {{ $task->start_lng_lat }}
                </div>
                <div class="col-10 mb-1 small">
                    End Position : {{ $task->end_lng_lat }}
                </div>
                <small>Task Start : {{ $task->created_at }}<br> Task End : {{ $task->end_at }}</small>
                <div class="mb-3">
                @if($task->status !== "Closed")
                    <select class="form-select" aria-label="Default select example" name="status" id="status" onclick="getLocation()" required>
                        <option value="Open">Open</option>
                        <option value="Closed">Closed</option>
                    </select>
                    </div>
                    <input type="text" id="loc" name="loc" hidden>
                    <button type="submit" class="btn btn-primary rounded-5 btn-lg w-100">Update Task</button>
                @else
                    <small><b>Status : {{ $task->status }}</b></small>
                @endif
            </form>

            @endforeach
        </div>

    </div>
</div>

@endsection
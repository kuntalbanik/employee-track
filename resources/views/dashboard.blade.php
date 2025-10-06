@extends('comm.header')


@section('content')

@extends('comm.innerheader')


<div class="main-content">
    <h1>Dashboard</h1>
    <a href="/create-task" class="z-0 position-absolute top-10  btn btn-info">Add Quick task</a>
    
    @foreach($tasks as $task)
        <h4>{{ $task->task_name }}</h4>


     @endforeach
    <div>
        <x-calender />
    </div>

</div>


@endsection
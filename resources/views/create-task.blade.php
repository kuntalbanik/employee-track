@extends('comm.header')


@section('content')

@extends('comm.innerheader')


    <div class="main-content">
        <h3>Task Add</h3>


        <form action="create-task" method="post">
            @csrf
            <div class="mb-3">
              <label for="task_name" class="form-label">Task Name</label>
              <input type="text" class="form-control form-control-lg" id="task_name" name="task_name" 
              placeholder="Task Name" onkeypress="getLocation()" required autocomplete="off" />
            </div>
            <input type="text" id="loc" name="loc" hidden>
            <button type="submit" class="btn btn-primary rounded-5 btn-lg w-100">Add Task</button>
        </form>
    </div>


@endsection
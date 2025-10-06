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
        <div class="mb-3">
            <label for="visit_purpose" class="form-label">Visit Purpose</label>
            <select class="form-select form-select-lg" aria-label="Default select example" name="visit_purpose" id="visit_purpose" required>
                <option selected>-</option>
                <option value="O&M">O&M</option>
                <option value="Supervision of E&C">Supervision of E&C</option>
                <option value="E&C">E&C</option>
                <option value="AMC">AMC</option>
                <option value="ASC">ASC</option>
                <option value="Others">Others</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ref_info" class="form-label">Reference</label>
            <input type="text" class="form-control form-control-lg" id="ref_info" name="ref_info"
                placeholder="SO no./Any others/NA" required autocomplete="off" />
        </div>
        <input type="text" id="loc" name="loc" hidden>
        <button type="submit" class="btn btn-primary rounded-5 btn-lg w-100">Add Task</button>
    </form>
</div>


@endsection
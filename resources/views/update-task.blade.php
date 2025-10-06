@extends('comm.header')


@section('content')

@extends('comm.innerheader')


    <div class="main-content">
        <h3>Update Task</h3>


        <form action="" method="post">
            @csrf
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Username" required />
            </div>
        </form>
    </div>


@endsection
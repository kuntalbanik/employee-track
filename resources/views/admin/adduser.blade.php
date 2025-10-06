
@extends('comm.header')


@section('content')

@extends('comm.innerheader')

<div class="main-content">
    
    <h1>Add new user</h1>

    <form action="/admin/adduser" method="post">
    <!-- <form action="adduser" method="post"> -->
        <!--  -->
        <!-- If need to update date through put method then process it -->
        <!--  -->
        <!-- <input type="hidden" name="_method" value="PUT" id=""> -->


        @csrf
        <div class="input-wrapper">
            <input type="text" name="name" id="" placeholder="Enter username">
        </div>
        <div class="input-wrapper">
            <input type="email" name="email" id="" placeholder="Enter email">
        </div>
        <div class="input-wrapper">
            <input type="password" name="password" id="" placeholder="Enter password">
        </div>

        <div class="input-wrapper">
            <button>Add new user</button>
        </div>
    </form>
</div>


@endsection
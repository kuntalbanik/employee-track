@extends('comm.header')

@section('title', 'Home Page')

@section('content')
    <div class="background-welcome">
        <img class="img-fluid welcome-logo" src="../../images/logo.png" alt="">
        <h4 class="text-center">
            Welcome <br>to<br>Company name
        </h4>
    
    
        <script type="text/javascript">
            setTimeout(function() {
                window.location.href = "login/"; // Replace with your desired URL
            }, 2000); // 3000 milliseconds = 3 seconds
        </script>
    </div>
@endsection












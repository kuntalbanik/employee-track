@extends('comm.header')


@section('content')


@if (Auth::check())
        <script>
            // Redirects the user immediately to the specified URL
            window.location.href = "{{ url('dashboard/') }}"; 
        </script>
    @endif

<div class="login">
  <div class="row justify-content-center">
    <div class="col-md-6 col-sm-8 col-lg-5">
      <div class="card">
        <div class="card-header text-center">
            <h4>Login</h4>
        </div>
        <div class="card-body">
          <form action="login" method="post">

            @csrf
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input
                type="email"
                class="form-control form-control-lg"
                id="email"
                name="email"
                placeholder="Username"
                required
              />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input
                type="password"
                class="form-control form-control-lg"
                id="password"
                name="password"
                placeholder="********"
                required
              />
            </div>
            <button type="submit" class="btn btn-primary rounded-5 btn-lg w-100">Login</button>
          </form>
          <p class="social-text"><a href="" class="text-left">Forget Password?</a></p>
            
          <!-- <p class="text-center social-text">Connect with us...</p> -->
          <div class="social">
              <a href=""><img src="../../images/linkedin.svg" class="rounded social-icon" alt="..."></a>
              <a href=""><img src="../../images/facebook.svg" class="rounded social-icon" alt="..."></a>
              <a href=""><img src="../../images/instagram.svg" class="rounded social-icon" alt="..."></a>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@extends('layouts.layouts')
@section('content')
<style>

  .divider:after,
  .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
  }
  </style>
<section style="background-color: #eee;">
  <div class="container py-5 d-flex justify-content-center ">    
      <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
              <form action="{{ route('auth.session') }}" method="POST">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="email">Email address</label>
                  <input type="email" id="email" name="email" class="form-control form-control-lg" />
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="password">Password</label>
                  <input type="password" id="password" name="password" class="form-control form-control-lg" />
                </div>
      
                <div class="d-flex justify-content-around align-items-center mb-4">
                  <!-- Checkbox -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                  </div>
                  <a href="#!">Forgot password?</a>
                </div>
      
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-lg btn-block w-100">Sign in</button>
      
                <div class="divider d-flex align-items-center my-4">
                  <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                </div>
      
                <a href="{{ route('login.google') }}" class="btn btn-lg btn-block btn-primary w-100" style="background-color: #dd4b39;"
                ><i class="fab fa-google me-2"></i>Continue with Google</a>
                <a href="{{ route('login.facebook') }}" class="btn btn-primary btn-lg btn-block w-100 my-2" style="background-color: #3b5998"
                  role="button">
                  <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
                </a>
      
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
</section>
@endsection
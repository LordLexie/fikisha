@extends('layouts.login')

@section('content')

<div class="login-box">
  <div class="login-logo">
    <a href="/">Fikisha App</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login to Continue</p>
      

      <form action="{{route('login')}}" method="post" >
      @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name = "email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name = "password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
                    <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

        <!--
      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
     -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

@endsection
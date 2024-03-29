<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MapBirdy Sign In</title>
   <link href="{{ asset('public/frontend/css/login.css') }}" rel="stylesheet" type="text/css">
   <link rel="shortcut icon" href="{{ asset('public/frontend/images/Favocon.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
    .checkbox-container{
        display: flex !important;
    }
    .chekbox{
        width:50px !important;
        padding: 0px !important;
        margin:2px !important;
    }
</style>
</head>
<body>

<!--  -->
<div class="container">
      <div class="logo">
        <h3>MapBirdy</h3>
        <p>See what's happening in your area</p>
      </div>
      <p>Sign In</p>
      <form id="login-form"  action="{{ route('login_post') }}" method="post">
      @csrf
      <div class="form-group">
          <input
          type="email" class="form-control"  placeholder="Email" id="singin-email" name="email"
          />
          <span class="text-danger">@error('email'){{ $message }}@enderror</span>
        </div>
        <div class="form-group">
          <input
          type="password" class="form-control" id="singin-password" name="password" placeholder="Password"
          /> <span class="text-danger">@error('password'){{ $message }}@enderror</span>

        </div>
        <div class="form-group">
        <label class="checkbox-container">
            <input class="chekbox" type="checkbox" name="remember"  />Remember me
          </label>
          <a class="forget-password"  href="forgotPassword" >Forgot Password?</a>
        </div>
        <div class="form-group">
          <button class="login" type="submit">Sign In</button>
        </div>
        <div class="text"> OR </div>
        <div class="form-group social-login">
          <a href="{{url('/g_login')}}" class="google" onclick="loginWithGoogle()"><i class="bi bi-google" style="margin-right: 10px;"></i>Continue  with Google</a>
          <a href="{{url('/fb_login')}}" class="facebook" onclick="loginWithFacebook()"><i class="bi bi-facebook" style="margin-right: 10px;"></i>Continue  with  Facebook </a>
        </div>
        <div class="account-exist">
          <p>Don't have an account?
          <a class="registration" href="registration"><b>Sign Up</b></a></p>
          <br />
          <a   href="{{url('/contact')}}"><b>Contact us</b></a>
          <p>Made in Sydney, Australia</p>
        </div>
      </form>
    </div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
      @if (Session::get('msg'))
$(document).ready(function(){
    var txt ="<?php echo Session::get('msg');?> ";
    var alert ="<?php echo Session::get('alert');?>";
    swal("",txt, alert)
}); @endif
</script>
</body>
</html>

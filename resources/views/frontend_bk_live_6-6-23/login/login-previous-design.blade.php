<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MapBirdy Sign In</title>
   <link rel="shortcut icon" href="{{ asset('public/frontend/images/Favocon.png') }}" type="image/x-icon">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <link href="{{ asset('public/frontend/css/login.css') }}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
    /* .checkbox-container{
        display: flex !important;
    }
    .chekbox{
        width:50px !important;
        padding: 0px !important;
        margin:2px !important;
    } */
</style>
</head>
<body>

<!--  -->
<div class="container pt-6">
      <div class="logo">
        <h3>MapBirdy</h3>
        <p>See what's happening in your area</p>
      </div>

      <form class="form"  action="{{ route('login_post') }}" method="post">
        <p class="text-white">Sign In</p>
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
        <div class="form-check">
  <input class="form-check-input" type="checkbox" name="remember"  id="flexCheckDefault">
  <label class="form-check-label text-white" for="flexCheckDefault">
  Remember me
  </label>
  <a class="forget-password"  href="forgotPassword" >Forgot Password?</a>
</div>
        <!-- <div class="form-group">
        <label class="checkbox-container">Remember me</label>
            <input class="chekbox form-control" type="checkbox" name="remember"  />


        </div> -->
        <div class="form-group">
          <button class="login" type="submit">Sign In</button>
        </div>
        <div class="text"> OR </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 text-center p-2">
<a href="{{url('/g_login')}}" class=" google" onclick="loginWithGoogle()"><i class="bi bi-google" style="margin-right: 10px;"></i>Continue  with Google</a>

            </div>
            <div class="col-lg-6 col-md-12 text-center p-2">
<a href="{{url('/fb_login')}}" class="facebook" onclick="loginWithFacebook()"><i class="bi bi-facebook" style="margin-right: 10px;"></i>Continue  with  Facebook </a>

            </div>
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
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MapBirdy Sign Up</title>
    <link rel="shortcut icon" href="{{ asset('public/frontend/images/Favocon.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   
  <link href="{{ asset('public/frontend/css/login.css') }}" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BJ03FN4K68"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BJ03FN4K68');
</script>
</head>
    <body>
    <div class="container pt-6">
      <div class="logo">
        <h3>MapBirdy</h3>
        <p>See what's happening in your area</p>
      </div>

      <form class="form" action="{{url('/registration_post')}}" name="add_user" id="add_user" method="POST" >
        <p>Sign Up</p>
      @csrf
      <div class="form-group">
<input type="text" name="name" value="{{ old('name') }}" placeholder="Username" class="form-control">
         <span class="text-danger"> @error('name') {{ $message }} @enderror </span>

        </div>
        <div class="form-group">
	    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control">
        <span class="text-danger"> @error('email') {{ $message }} @enderror </span>

        </div>
        <div class="form-group">
          <input class="form-control" id="password" type="password" name="new_password" placeholder="Password" value="" autocomplete="off">
       <span class="text-danger">@error('new_password') {{ $message }} @enderror</span>


        </div>
        <div class="form-group">
          <input class="form-control" id="cnew_password" type="password" name="cnew_password" placeholder="Confirm Password" value="" autocomplete="off">

        </div>

        <div class="form-group">
          <button class="login" type="submit">Sign Up</button>
          <p class="terms">
            By signing up, you accept the <b>Term of Service</b> and
            <b>Privacy Policy.</b>
          </p>
        </div>
        <div class="text">OR</div>
        <div class="row">
            <div class="col-lg-6 col-md-12 text-center p-2">
<a href="{{url('/g_login')}}" class=" google" onclick="loginWithGoogle()"><i class="bi bi-google" style="margin-right: 10px;"></i>Sign Up with Google</a>

            </div>
            <div class="col-lg-6 col-md-12 text-center p-2">
<a href="{{url('/fb_login')}}" class="facebook" onclick="loginWithFacebook()"><i class="bi bi-facebook" style="margin-right: 10px;"></i>Sign Up with Facebook </a>

            </div>
            </div>

        <div class="account-exist">
          <p>Already have an account? <a class="" href="{{ url('/') }}"><b>Sign In</b></a></p>
          <br />
          <a class="" href="{{url('/contact')}}"><b>Contact us</b></a>
          <p>Made in Sydney, Australia</p>
        </div>
      </form>
    </div>

    </body>
</html>

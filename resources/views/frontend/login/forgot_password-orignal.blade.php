<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MapBirdy Forgot Password</title>
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
        <!-- <img src="{{ asset('public/frontend/images/mainLOGO.png') }}" alt="" srcset=""> -->
      </div>

      <form class="form" action="{{ url('forgotPasswordProcess') }}" method="post">
         <p>Forgot Password</p>
      @csrf
        <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" >
                                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>

        </div>

        <div class="form-group">
          <button class="login" type="submit">Submit</button>

        </div>
        <div class="text">OR</div>
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
          <!-- <br /> -->
          <p>Already have an account?
          <a class="registration" href="{{url('/')}}"><b>Sign In</b></a></p>
          <a class="" href="{{url('/contact')}}"><b>Contact us</b></a>
          <p>Made in Sydney, Australia</p>
        </div>

      </form>
    </div>
    </body>
</html>

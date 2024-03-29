<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MapBirdy Sign In</title>
    <link rel="shortcut icon" href="{{ asset('public/frontend/images/Favocon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body{
            background-color: rgb(1, 178, 255) !important;
            font-family: "Nunito Sans", sans-serif;
            font-size: 13px;
            color: #fff;
            
        }
        .container {
            max-width: 400px;
            margin-top: 100px;
        }
        .he{

            margin: 0;
    font-size: 40px;
    font-family: "Cloudy with a chance of love";
    text-align: center;
    color: #fff;

        }
        .pp{
            margin: 0px;
    font-size: 14px;
    text-align: center;
    color: #fff;
    margin: top -10px;
        }

        .butt {
            max-width: 400px;
            margin-top: 10px;
           
           
         
        }

        .buttons-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            font-size: 15px;
            padding: 20px;
            

           

        }

        .google-btn,
        .facebook-btn {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
             color: #ffffff;
            border-radius: 5px;
            text-decoration: none;
            width:120px;
        
            
        }

        .google-btn {
            background-color: #dc4e41;
            margin-right: 5px;
            float:left;
           
        }

        .facebook-btn {
            background-color: #3b5998;
            margin-left: 5px;
            float:right;
        }
        .bbg{
            background-color: #390ec3;
        }

 


    </style>
</head>
<body>
    <div class="container">
        
        <h3 class="text-center mb-4 he">Map Birdy</h3>
        <p class="pp"> See what's happening in your area</p>
       

        <form class="form"  action="{{ route('login_post') }}" method="post">
        <p class="text-white">Sign In</p>
            @csrf
            <div class="mb-3">
                
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
            </div>
            <div class="mb-3">
                
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label text-white" for="flexCheckDefault">Remember me</label>
                <a class="forget-password text-white " style="float:right;"  href="forgotPassword" >Forgot Password?</a>
            </div>
            <button type="submit" class="bbg form-control text-white">Sign In</button>
            <br><br>
            <div class="text-center text-white"> OR </div>
            <div class="butt">
        <!-- Login form content here -->

        <div class="buttons-container">
            <a href="{{url('/g_login')}}" class="google-btn "onclick="loginWithGoogle()">
                <i class="bi bi-google" style="margin-right: 10px;"></i>
                Continue with Google
            </a>

            <a href="{{url('/fb_login')}}" class="facebook-btn onclick="loginWithFacebook()">
                <i class="bi bi-facebook" style="margin-right: 10px;"></i>
                Continue with Facebook
            </a>
        </div>
    </div>


        </form>
        <p class="text-center mt-3 text-white">Don't have an account? <a class="text-white" href="{{ url('/registration') }}">Sign Up</a></p>
      <a style="text-decoration:none;" href="{{url('/contact')}}">  <div class="text-center text-white"> contact us </div></a>
          <p class="text-white text-center">Made in Sydney, Australia</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>

    <script>
        @if (Session::get('msg'))
  $(document).ready(function(){
      var txt ="<?php echo Session::get('msg');?> ";
      var alert ="<?php echo Session::get('alert');?>";
      swal("",txt, alert)
  }); @endif
  </script
</body>
</html>

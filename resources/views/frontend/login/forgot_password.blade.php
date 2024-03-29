<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MapBirdy Sign In</title>
    <meta name="facebook-domain-verification" content="0zzjif0tgu2pg8uypm6v1cx22tfc2f" />
    <link rel="shortcut icon" href="{{ asset('public/frontend/images/Favocon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '955739205638611',
      xfbml      : true,
      version    : 'v17.0'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
    <style>
        body{
           
            font-family: "Nunito Sans", sans-serif;
            font-size: 13px;
          
            
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
           

        }
        .pp{
                margin: 0px;
                margin-top:-20px;
                font-size: 14px;
                text-align: center;
              
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
            padding:5px;
            
           
           
        }

        .facebook-btn {
            background-color: #3b5998;
            margin-left: 5px;
            float:right;
            
            
           
        }
        .bbg{
            width: 100%;
    padding: 8px;
    text-align: center;
    justify-content: center;
    background-color: #01b2ff;
    border: none;
    color: #fff;
    cursor: pointer;
    font-size: 14px;
    border-radius: 4px;
        }

        .buttons-container {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
    font-size: 14px;
    padding: 1px;
}
.bbg:hover {
    background-color: #cde4ce;
    color: rgb(1, 178, 255);
}
         
.td{
    text-decoration:none;
}



    </style>
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
    <div class="container">
        
    <img src="{{ asset('public/frontend/images/mainLOGO.png') }}" height="150px" width="503px" class="img-fluid" alt="MapBirdy">
       

        <form class="form" action="{{ url('forgotPasswordProcess') }}" method="post">
            
        <p></p>
            @csrf
            <div class="mb-3">
        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" >
                                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>

        </div>
     
          
            <button type="submit" class="bbg form-control">Reset Password</button>
            <br><br>
            <div class="text-center text-black"> OR </div>
            <div class="butt">
        <!-- Login form content here -->

        <div class="buttons-container">
            <a href="{{url('/g_login')}}" class="google-btn "onclick="loginWithGoogle()">
                <i class="bi bi-google" style="margin-right: 10px;"></i>
                Continue with Google
            </a>

            <a href="{{url('/fb_login')}}" class="facebook-btn" onclick="loginWithFacebook()">
                <i class="bi bi-facebook" style="margin-right: 10px;"></i>
                Continue with Facebook
            </a>
        </div>
    </div>
    <div class="account-exist text-center">
          <p>Don't have an account?
          <a class="registration text-black td" href="registration"><b>Sign Up</b></a></p>
          <!-- <br /> -->
          <p>Already have an account?
          <a class="registration text-black td" href="{{url('/')}}"><b>Sign In</b></a></p>
          <a class="text-black td" href="{{url('/contact')}}"><b>Contact us</b></a>
          <p>Made in Sydney, Australia</p>
        </div>

        </form>
      
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>


</body>
</html>

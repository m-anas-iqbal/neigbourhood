<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MapBirdy Sign Up</title>
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
.aa{
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
  <div class="row">
    <div class="com-md-3"></div>
    <div class="com-md-6">
    <img src="{{ asset('public/frontend/images/mainLOGO.png') }}" height="150px" width="503px" class="img-fluid" alt="MapBirdy">
    <form class="form" action="{{url('/registration_post')}}" name="add_user" id="add_user" method="POST" >
    <h6 class="text-black">Sign Up</h6>
    @csrf
    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Username">
    <span class="text-danger"> @error('name') {{ $message }} @enderror </span>
<br>
    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
    <span class="text-danger"> @error('name') {{ $message }} @enderror </span>
    <br>

    <input type="password" class="form-control"  id="password" name="new_password" placeholder="Password" value="" autocomplete="off">
    <span class="text-danger">@error('new_password') {{ $message }} @enderror</span>
    <br>
    <input class="form-control" id="cnew_password" type="password" name="cnew_password" placeholder="Confirm Password" value="" autocomplete="off">
  <br>
 <p class="text-center9">
        <a style="text-decoration:none; color:#000000" href="{{ URL('terms-and-condition') }}">
    By signing up, you agree to our <b> Terms of Service </b></a> and <a  style="text-decoration:none; color:#000000" href="{{ URL('privacy-policy') }}"><b>Privacy Policy</b></a>
</p>  
  
    <button class="login bbg form-control" type="submit">Sign Up</button>
    <br>
            <div class="text-center"> OR </div>

            <div class="butt">
 

 <div class="buttons-container">
     <a href="{{url('/g_login')}}" class="google-btn "onclick="loginWithGoogle()">
         <i class="bi bi-google" style="margin-right: 10px;"></i>
         Sign Up with Google
     </a>

    <?php /*<a href="{{url('/fb_login')}}" class="facebook-btn" onclick="loginWithFacebook()">
         <i class="bi bi-facebook" style="margin-right: 10px;"></i>
         Sign Up with Facebook
     </a>*/ ?>
 </div>
</div>
</form>

<p class="text-center">Already have an account? <a class="text-black aa" href="{{ url('/') }}"><b>Sign In</b></a></p>
  

<a style="text-decoration:none;" href="{{url('/contact')}}">  <div class="text-center text-black"> Contact us </div></a>
          <p class="text-black text-center">Made in Sydney, Australia</p>








    </div>
    <div class="com-md-3"></div>
  </div>
</div>
   
   

  
</body>
</html>

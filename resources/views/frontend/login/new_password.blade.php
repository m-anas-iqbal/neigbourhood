<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MapBirdy New Passeord</title>
    <link rel="shortcut icon" href="{{ asset('public/frontend/images/Favocon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
        .login {
            width: 100%;
            padding: 8px;
            text-align: center;
            justify-content: center;
            background-color:#01b2FF;
            border: none;
            color: #fff;
            cursor: pointer;
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

    <form class="form" action="{{ url('newPasswordProcess') }}" method="post">
        <p class="text-black">New Password</p>
      <input type='hidden' name="np_code" value="{{Request::segment(2)}}"/>
      @csrf
        <div class="form-group">
        <input class="form-control password" id="password" class="block mt-1 w-full" type="password" name="new_password" placeholder="New Password" value="{{ old('password') }}" autocomplete='off'/>

          <span class="text-danger">@error('new_password'){{ $message }}@enderror</span>

        </div>
        <br>
 <div class="form-group">
        <input class="form-control password" id="password" class="block mt-1 w-full" type="password" name="cnew_password" placeholder="Confirm Password" value="{{ old('password') }}" autocomplete='off'/>

        </div>
        <br>

        <div class="form-group">
          <button class="login" type="submit">Update Password</button>
        </div>

        <p style="text-align:center;" class="text-black">Made in Sydney, Australia</p>
      </form>
    </div>


    </div>
    <div class="com-md-3"></div>
  </div>
</div>
   
   

  
</body>
</html>
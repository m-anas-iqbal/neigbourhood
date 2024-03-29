<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MapBirdy Admin Sign In</title>
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


    </style>
</head>
<body>
<div class="container pt-6">
      <div class="logo">
      <img src="{{ asset('public/frontend/images/mainLOGO.png') }}" height="150px" width="503px" class="img-fluid" alt="MapBirdy">
      </div>

      <form class="form"  action="{{ url('admin/login_post') }}" method="post">
        <p class="text-black">Admin Sign In</p>
      @csrf
      <div class="form-group">
          <input
          type="email" class="form-control"  placeholder="Email" id="singin-email" name="email"
          />
          <span class="text-danger">@error('email'){{ $message }}@enderror</span>
        </div>
        <br>
        <div class="form-group">
          <input
          type="password" class="form-control" id="singin-password" name="password" placeholder="Password"
          /> <span class="text-danger">@error('password'){{ $message }}@enderror</span>

        </div>
        <br>
        <div class="form-check">
  <input class="form-check-input" type="checkbox" name="remember"  id="flexCheckDefault">
  <label class="form-check-label text-black" for="flexCheckDefault">
  Remember me
  </label>
</div>
        
        <div class="form-group">
          <button class="login" type="submit">Sign In</button>
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
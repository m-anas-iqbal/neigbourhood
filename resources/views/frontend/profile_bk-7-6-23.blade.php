<!doctype html>
<html lang="en">
  <head>
  <title> MapBirdy Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <link rel="shortcut icon" href="{{ asset('public/frontend/images/Favocon.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <!-- <link href="{{ asset('public/frontend/css/login.css') }}" rel="stylesheet" type="text/css"> -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>

body{
            background-color: rgb(1, 178, 255) !important;
            font-family: "Nunito Sans", sans-serif;
            font-size: 13px;
            color: #fff;
            margin-top:100px;
            
        }

.dropbtn {
  background-color:  white;
  color:rgb(1, 178, 255);
  padding: 3px;
  border-radius:50px;
  font-size: 0px;
  border: none;
  transition:0.5s ease-in;
}

.dropdown {
  position: absolute;
  right:5%;
  top:10px;
  display: inline-block;
}

.dropdown-content {
  display: none;
    left: -32px;
  position: absolute;
  background-color:white;
  color: rgb(1, 178, 255);

  min-width: 100px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 6px 8px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {
    color:white;
  background-color: rgb(1, 178, 255);
}


        .he{
            margin-top:30px;
            margin: 0;
            font-size: 40px;
            font-family: "Cloudy with a chance of love";
            text-align: center;
            color: #fff;

        }
        .pp{
                margin: 0px;
                margin-top:-20px;
                font-size: 14px;
                text-align: center;
                color: #fff;
                margin: top -10px;
        }
        .login {
            width: 100%;
            padding: 8px;
            text-align: center;
            justify-content: center;
            background-color: #390ec3;
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
}
.bbg:hover {
    background-color: #cde4ce;
    color: rgb(1, 178, 255);
}



</style>  
</head>
  <body>

  <?php
    $id = Auth::guard('users')->user()->id;
$name = Auth::guard('users')->user()->name;
$email = Auth::guard('users')->user()->email;
// print_r($email);
// die;
?>
<div class="dropdown">
  <button class="dropbtn"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg></button>
  <div class="dropdown-content">
    <h5 href="#" style="font-size: inherit;margin: 0px;color:black;font-weight: 700;text-transform: capitalize;border-bottom:1px solid black;padding:4px">{{ $name }}</h5>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('contact') }}">Contact Us</a>
    <a href="{{ route('logout') }}">Sign Out</a>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

        <h3 class="text-center mb-4 he">Map Birdy</h3>
        <p class="pp"> See what's happening in your area</p>

        <form class="form" action="{{url('/profile_post')}}" name="add_user" id="add_user" method="POST" >
      <h6>Profile</h6>
      @csrf
      <input type="hidden" name="id" value="{{ $id }}">
      <div class="form-group">
        <label for="">Name</label>
<input type="text"  name="name" value="@if(old('name') !=''){{ old('name') }}@else{{ $name }}@endif" placeholder="Name" class="form-control">
         <span class="text-danger"> @error('name') {{ $message }} @enderror </span>

        </div>
        <div class="form-group">
        <label for="">Email</label>
	    <input type="email" disabled name="email" value="{{ $email }}" placeholder="Email" class="form-control">
        <span class="text-danger"> </span>

        </div>
        <div class="form-group">

        <label for="">Password</label>
          <input class="form-control" id="password" type="password" name="password" placeholder="Password" value="" autocomplete="off">
       <span class="text-danger">@error('password') {{ $message }} @enderror</span>


        </div>
        <div class="form-group">

        <label for="">Confirm Password</label>
          <input class="form-control" id="cpassword" type="password" name="cpassword" placeholder="Confirm Password" value="" autocomplete="off">

        </div>

        <div class="form-group">
          <button class="login bbg" type="submit">Update Profile</button>

        </div>

        </div>
      </form>


        </div>
        <div class="col-md-3"></div>
    </div>
</div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
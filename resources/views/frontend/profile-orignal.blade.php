<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MapBirdy Profile</title>
    <link rel="shortcut icon" href="{{ asset('public/frontend/images/Favocon.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <link href="{{ asset('public/frontend/css/login.css') }}" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   <style>
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
    <div class="container pt-6">
      <div class="logo">
        <h3>MapBirdy</h3>
        <p>See what's happening in your area</p>
      </div>
      <form class="form" action="{{url('/profile_post')}}" name="add_user" id="add_user" method="POST" >
      <h4>Profile</h4>
      @csrf
      <input type="hidden" name="id" value="{{ $id }}">
      <div class="form-group">
        <label for="">Name</label>
<input type="text" name="name" value="@if(old('name') !=''){{ old('name') }}@else{{ $name }}@endif" placeholder="Name" class="form-control">
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
          <button class="login" type="submit">Update Profile</button>

        </div>

        </div>
      </form>
    </div>

    </body>
</html>

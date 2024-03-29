<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MapBirdy Contact Us</title>
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
      <form action="{{url('/contact_post')}}" class="form" name="contact_post" id="contact_post" method="POST" >
      <p>Contact Us</p>
      @csrf
      <div class="form-group">
<input type="text" name="name" value="{{ old('name') }}" placeholder="Name" class="form-control">
         <span class="text-danger"> @error('name') {{ $message }} @enderror </span>

        </div>
        <div class="form-group">
	    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control">
        <span class="text-danger"> @error('email') {{ $message }} @enderror </span>

        </div>
        <div class="form-group">
            <textarea class="form-control" name="description" placeholder="Type message..." id="description" cols="30" rows="10"></textarea>
       <span class="text-danger">@error('description') {{ $message }} @enderror</span>
        </div>

        <div class="form-group">
          <button class="login" type="submit">Submit</button>
        </div>
        <div class="account-exist">
          <p>Don't have an account?
          <a class="registration" href="registration"><b>Sign Up</b></a></p>
          <!-- <br /> -->
          <p>Already have an account?
          <a class="registration" href="{{url('/')}}"><b>Sign In</b></a></p>
          <p>Made in Sydney, Australia</p>
        </div>
      </form>
    </div>

    </body>
</html>

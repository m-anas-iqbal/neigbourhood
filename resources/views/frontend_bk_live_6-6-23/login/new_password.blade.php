<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MapBirdy New Password</title>

   <link rel="shortcut icon" href="{{ asset('public/frontend/images/Favocon.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

   <link href="{{ asset('public/frontend/css/login.css') }}" rel="stylesheet" type="text/css">

</head>
    <body>
    <div class="container pt-6">
      <div class="logo">
        <h3>MapBirdy</h3>
        <p>See what's happening in your area</p>
      </div>

      <form class="form" action="{{ url('newPasswordProcess') }}" method="post">
        <p>New Password</p>
      <input type='hidden' name="np_code" value="{{Request::segment(2)}}"/>
      @csrf
        <div class="form-group">
        <input class="form-control password" id="password" class="block mt-1 w-full" type="password" name="new_password" placeholder="New Password" value="{{ old('password') }}" autocomplete='off'/>

          <span class="text-danger">@error('new_password'){{ $message }}@enderror</span>

        </div>
        <div class="form-group">
        <input class="form-control password" id="password" class="block mt-1 w-full" type="password" name="cnew_password" placeholder="Confirm Password" value="{{ old('password') }}" autocomplete='off'/>

        </div>

        <div class="form-group">
          <button class="login" type="submit">Update Password</button>
        </div>

        <p style="text-align:center;">Made in Sydney, Australia</p>
      </form>
    </div>

    </body>
</html>

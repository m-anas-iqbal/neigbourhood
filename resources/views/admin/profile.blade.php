@extends('admin.layout.master')
@section('mytitle', 'Profile')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

@endsection
@section('content')
<main class="content-wrapper">
<div class="container p-4 bg-white">
    <h3>Update Password</h3>
    <br>
    <div class="row">
    <form class="needs-validation" action="{{ url('/admin/profile_post') }}" method="POST"  novalidate>
@csrf
<div class="row">
<div class="col-md-12 mb-3">
      <label for="validationCustom01">New Password   <span class="text-danger">@error('password'){{ $message }}@enderror</span></label>
      <input type="password" class="form-control" name="password" id="validationCustom02" placeholder="New Password" value="" required>
      <div class="valid-feedback">

      </div>
    </div>
    <div class="col-md-12 mb-3">
      <label for="validationCustom01">Confirm Password   </label>
      <input type="password" class="form-control" name="cpassword" id="validationCustom01" placeholder="Confirm Password" value="" required>
      <div class="valid-feedback">

      </div>
    </div>

  </div>

  <button class="mdc-button mdc-button--raised" type="submit">Update Password</button>
</form>
    </div>
</div>


</main>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');

      }, false);
    });
  }, false);
})();
</script>
@endsection

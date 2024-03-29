@extends('admin.layout.master')
@section('mytitle', 'Add Question')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

@endsection
@section('content')
<main class="content-wrapper">
<div class="container p-4 bg-white">
    <h3>Add Question</h3>
    <br>
    <div class="row">
    <form class="needs-validation" action="{{ url('/admin/addquestion_post') }}" method="POST"  novalidate>
@csrf
<div class="row">
<div class="col-md-2 mb-3">
      <label for="validationCustom01">Question Order #</label>
      <input type="number" class="form-control" name="order_no" id="validationCustom02" placeholder="Question Order no" value="" required>
      <div class="valid-feedback">

      </div>
    </div>
    <div class="col-md-8 mb-3">
      <label for="validationCustom01">Question</label>
      <input type="text" class="form-control" name="question" id="validationCustom01" placeholder="Question" value="" required>
      <div class="valid-feedback">

      </div>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationCustom00">Status</label>
      <select class="form-control" name="status"  required id="validationCustom00">
      <option value="1" selected>Active</option>
      <option value="0">Deactive</option>
</select>
      <div class="valid-feedback">

      </div>
    </div>
  </div>
  <div class="row ">
    <div class="m-2 text-primary">Min 2, max 4 votes</div>
  <div class="col-md-3 mb-3">
      <label for="validationCustom03">Vote 1</label>
      <input type="text" class="form-control" name="opt1" id="validationCustom03" placeholder="Option #1" required>
      <div class="invalid-feedback">

      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom03">Vote 2</label>
      <input type="text" class="form-control" name="opt2" id="validationCustom06" placeholder="Option #2" required>
      <div class="invalid-feedback">

      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">Vote 3</label>
      <input type="text" class="form-control" name="opt3" id="validationCustom04" placeholder="Option #3" >
      <div class="invalid-feedback">

      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Vote 4</label>
      <input type="text" class="form-control" name="opt4" id="validationCustom05" placeholder="Option #4" >
      <div class="invalid-feedback">

      </div>
    </div>
  </div>
  <button class="mdc-button mdc-button--raised" type="submit">Submit Question</button>
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

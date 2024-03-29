@extends('admin.layout.master')
@section('mytitle', 'Question')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

@endsection
@section('content')
<main class="content-wrapper">
        <div class="mdc-layout-grid">
					<div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
							<div class="mdc-card">
								<section class="mdc-card__primary">
									<h1 class="mdc-card__title mdc-card__title--large">Questions </h1><div style="text-align:right;"><a href="{{ url('admin/addquestion') }}" class="mdc-button mdc-button--raised">
                      Add Question
                    </a> </div>
								</section>
                <div class="template-demo">
                  <table   id="myTable">
                    <thead>
                      <tr>
                        <th style="width:5%">Sno</th>
                        <th style="width:72%">Question</th>
                        <th style="width:5%">Status</th>
                        <th style="width:13%">Date</th>
                        <th style="width:5%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                          $questions = DB::table('question')->orderby('listing_order')->get();
                        ?>
                    @if($questions)
                        @foreach($questions as $question)

                        <tr>
                            <td>{{ $question->listing_order }}</td>
                            <td>{{ $question->question }}</td>
                            <td>@if($question->status == 1) {{ "Active" }} @else {{ "Deactive" }}     @endif</td>
                            <td>{{ date("Y-m-d" , strtotime($question->created_at)) }}</td>
                            <td><a href="{{ url('/admin/editquestion/'.$question->q_id) }}" style="color:black"><i class="bi bi-pencil-square"></i></a> | <span style="cursor: pointer;" onclick="delete_req({{ $question->q_id }})"   ><i class="bi bi-trash-fill"></i></span></td>
                        </tr>
                       @endforeach()
                    @endif
                    </tbody>
                  </table>
                </div>
							</div>
						</div>
          </main>

 @endsection


@section('js')

<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    let table = new DataTable('#myTable');

    function delete_req(id) {
    swal({
  title: "Are you sure?",
  text: "",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    let _token = "{{ csrf_token() }}";
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/admin/delquestion_post') }}",
                    data: {
                        _token: _token,
                        id: id,
                    },
                    dataType:'json',
                    success: function(data) {
    location.reload();
                    },
                    error:function(data){
                        console.log('error');
                        console.log(data.responseText);
                    }
                });


  }
});
}
</script>


@endsection

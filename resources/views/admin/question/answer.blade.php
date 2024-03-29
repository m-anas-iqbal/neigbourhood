@extends('admin.layout.master')
@section('mytitle', 'Comments')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<style>
    table {
  border-collapse:separate;
  border-spacing: 0 1em !important;
  background:#f6f6f6;
}
.mdc-card__primary {
    padding: 0px !important;
    padding-left: 20px !important;
}
</style>
@endsection
@section('content')
<main class="content-wrapper">
        <div class="mdc-layout-grid">
					<div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
							<div class="mdc-card">
								<section class="mdc-card__primary">
									<h1 class="mdc-card__title mdc-card__title--large">Comments</h1>
								</section>
                                <section class="mdc-card__primary">
                                    <form action="{{ url('/admin/comment_s') }}" method="post">
                                <div class="row ">
                                @csrf
  <div class="col-md-3 mb-1">
      <label for="validationCustom03">Min date</label>
      <input type="date" class="form-control" name="date" value="@if(isset($date)){{ date('Y-m-d' , strtotime($date)) }}@endif"  required>
    </div>
    <div class="col-md-3 mb-1">
      <label for="validationCustom03">Max date</label>
      <input type="date" class="form-control" name="date_to" value="@if(isset($date)){{ date('Y-m-d' , strtotime($date_to)) }}@endif" >

    </div>
    <div class="col-md-3 mb-1">
<button type="submit" class="mdc-button mdc-button--raised mt-4">Search</button>
    </div>
    <div class="col-md-3 mb-1">
<a href="{{ url('/admin/comment') }}" class="mdc-button mdc-button--raised mt-4">Reset</a>
    </div>
    </div>
</form>
                                </section>
                <div class="template-demo" >
                     <?php
                    if(!isset($comments)){
                       $comments = DB::table('comments as c')
                                            ->join('question as q','c.q_id','q.q_id')
                                            ->join('users as u', 'c.u_id', 'u.id')
                                            ->select('c.*','q.question as question','u.name as username')
                                            ->orderBy('c.c_id','desc')
                                            ->get();

                    }
                    //echo '<pre>';
                    //print_r($comments);
                    //die;
                       ?>
                  <table   id="myTable">
                    <thead>
                    <tr>
                        <th style="width:5%"></th>
                        <th style="width:80%">Question with Comment</th>
                        <th style="width:11%">Date</th>
                        <th style="width:4%"></th>
                      </tr>
                    </thead>
                    <tbody >

                   
                    @if($comments)
                        @foreach($comments as $comment)

                        <tr style="background:white;border-bottom:5px solid whitesmoke !important;">
                        <td>{{$comment->c_id}}</td>    
                        <td>
                        <div >
<div  style="color:#000;font-size:13px;font-weight: 600;margin-bottom: 4px;">{{ $comment->question }}</div>
<div style="color:#00a9f4;font-size:12px;font-weight: 600;margin-bottom: 8px;">{{ $comment->username }}</div>
<div  style="color:#000;font-size:12px;">{{ $comment->comment }}</div>

                        </div></td>
                        <td>
                        <div  style="color:#000;font-size:12px;">{{ date("d-m-Y" , strtotime($comment->created_at)) }}</div>
                        <div  style="color:#000;font-size:12px;"> {{ $comment->area_name }}</div>
                        </td>
                        <td style="text-align:right;  background:#f6f6f6;"><span  style="cursor: pointer;" onclick="delete_req({{ $comment->c_id }})" > <i class="bi bi-trash-fill"></i> </span></td>
                      </tr>
                       @endforeach()
                    @endif


                    </tbody>
                  </table>
                </div>
							</div>
						</div>
						</div>
						</div>
             </main>

 @endsection


@section('js')
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            order: [],
        });
    });
</script>  
<script>
    //let table = new DataTable('#myTable');
    function delete_req(id) {
    swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this Question!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    let _token = "{{ csrf_token() }}";
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/admin/delcomment') }}",
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

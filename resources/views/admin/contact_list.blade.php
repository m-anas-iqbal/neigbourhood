@extends('admin.layout.master')
@section('mytitle', 'Inbox')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<style>

table.dataTable tbody th, table.dataTable tbody td {
    /* padding: 0px !important; */
    /* font-size:12px */
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
									<h1 class="mdc-card__title mdc-card__title--large">User Contacts Messages</h1>
								</section>
                <div class="template-demo" >
                  <table   id="myTable">
                    <thead>
                    <tr>
                    <th >Name</th>
                    <th >Email</th>
                        <th >Message</th>
                        <th >Date</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody >

                    <?php
                    $contactus = DB::table('contactus')->orderby('created_at', 'DESC')->get();
                        ?>
                    @if($contactus)
                        @foreach($contactus as $contact)

                        <tr >
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->description }}</td>
                        <td>{{ date("d-m-Y" , strtotime($contact->created_at)) }}</td>
                        <td style="text-align:right; "><span  style="cursor: pointer;" onclick="delete_req({{ $contact->id }})" > <i class="bi bi-trash-fill"></i> </span></td>
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
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    let _token = "{{ csrf_token() }}";
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/admin/delcontact') }}",
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

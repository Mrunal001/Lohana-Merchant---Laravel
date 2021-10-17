@extends('admin.adminlayout')

@section('title', 'User Registration Details')

@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">


@endsection

@section('page_header')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Registration Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Registration Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
@endsection

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
    	<div class="card">
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              	<?php $count = 1 ?>
              <tr>
                <th>Sr No.</th>
                <th>Full name</th>
                <th>Birthdate</th>
                <th>Mobile no</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Country</th>
                <th>State</th>
                <th>City</th>
              	<th width="40px">Action</th>
              </tr>
              </thead>
              <tbody>
              	@foreach($user as $post)
              	<tr>
                    <td>{{$count++}}</td>
                    <td>{{$post['fullname']}}</td>
                    <td>{{$post['birthdate']}}</td>
                    <td>{{$post['mobileno']}}</td>
                    <td>{{$post['gender']}}</td>
                    <td>{{$post['email']}}</td>
                    <td>{{$post['country_name']}}</td>
                    <td>{{$post['state_name']}}</td>
                    <td>{{$post['city_name']}}</td>
                    <td>
                       <form action="{{action('Admin\UserRegistrationDetailsController@destroy', $post['id'])}}" method="post" class="delete_record_form">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete?');" type="submit"><i class="fa fa-trash"></i></button>
                          </form>
                      </td>
              	</tr>
	        	@endforeach
              </tbody>
            </table>
          </div>
         </div>
    	</div>
		</div>
	</div>
</section>
@endsection

@section('script')
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection


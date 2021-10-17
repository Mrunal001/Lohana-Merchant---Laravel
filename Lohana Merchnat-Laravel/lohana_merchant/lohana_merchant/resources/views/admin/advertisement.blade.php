@extends('admin.adminlayout')

@section('title', 'Advertisement')

@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  <!--Toggle Button -->
  <link href="{{ asset('css/bootstrap-toggle.min.css') }}" rel="stylesheet">

@endsection

@section('page_header')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Advertisement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advertisement</li>
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
                <th>Username</th>
                <th>Business Card</th>
                <th>Business Name</th>
                <th>Address</th>
                <th>Person Name</th>
                <th>Country</th>
                <th>State</th>
                <th width="70px">Status</th>
                <th>City</th>
                <th>Mobile No.</th>
              </tr>
              </thead>
              <tbody>
              	@foreach($advertisement as $post)
              	<tr>
                    <td>{{$count++}}</td>
                    <td>{{$post['fullname']}}</td>
                     <td>
                         <img style="display: block !important;" width=100 src="{{ url('uploads/AD/').'/'.$post['business_card']}}" ></td>
                    <td>{{$post['business_name']}}</td>
                    <td>{{$post['address']}}</td>
                    <td>{{$post['person_name']}}</td>
                    <td>{{$post['country_name']}}</td>
                    <td>{{$post['state_name']}}</td>
                    <td>
                        <input data-id="{{$post['advertise_id']}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Approve" data-off="DisApprove" {{ $post['status'] ? 'checked' : '' }}>
                    </td>
                    <td>{{$post['city_name']}}</td>
                    <td>{{$post['mobileno']}}</td>
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

<!--toogle switch -->
<script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "scrollX": true,
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

<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var advertise_id = $(this).attr('data-id'); 

        $.ajax({
            type: "POST",
           
            url:"{{ url('admin/ADchangeStatus') }}",
            data: {'status': status, 'advertise_id': advertise_id, _token: '{{csrf_token()}}'},
            success: function(data){
              console.log(data.success);
            }
        });
    })
  })
</script>
@endsection
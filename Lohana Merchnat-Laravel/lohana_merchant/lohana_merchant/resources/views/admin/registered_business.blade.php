@extends('admin.adminlayout')

@section('title', 'Registered Business')

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
            <h1>Registered Business</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Registered Business</li>
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
                <th>Business Title</th>
                <th>Contact Person</th>
                <th>Address</th>
                <th>Country</th>
                <th>State</th>
                <th width="70px">Status</th>
                <th>City</th>
                <th>Business Category</th>
                <th>Business Type</th>
                <th>Mode Of Payment</th>
                <th>Year Of Establishment</th>
                <th>Specialist In</th>
                <th>About Business</th>
                <th>Website</th>
                <th>Email</th>
                <th>Mobile No.</th>
              </tr>
              </thead>
              <tbody>
              	@foreach($registerd_business as $post)
              	<tr>
                    <td>{{$count++}}</td>
                    <td>{{$post['fullname']}}</td>
    				        <td>
                     <img width=100 src="{{ url('uploads/business_card/').'/'.$post['business_card']}}" > </td>
                    <td>{{$post['business_title']}}</td>
                    <td>{{$post['contact_person']}}</td>
                    <td>{{$post['address']}}</td>
                    <td>{{$post['country_name']}}</td>
                    <td>{{$post['state_name']}}</td>
                    <td>
                        <input data-id="{{$post['business_id']}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Approve" data-off="DisApprove" {{ $post['status'] ? 'checked' : '' }}>
                    </td>
                    <td>{{$post['city_name']}}</td>
                    <td>{{$post['category_name']}}</td>
                    <td>{{$post['business_type']}}</td>
                    <td>{{$post['mode_of_payment']}}</td>
                    <td>{{$post['year_of_establishment']}}</td>
                    <td>{{$post['specialist_in']}}</td>
                    <td>{{$post['about_business']}}</td>
                    <td>{{$post['website']}}</td>
                    <td>{{$post['email']}}</td>
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
        var business_id = $(this).attr('data-id'); 

        $.ajax({
            type: "POST",
           
            url:"{{ url('admin/changeStatus') }}",
            data: {'status': status, 'business_id': business_id, _token: '{{csrf_token()}}'},
            success: function(data){
              console.log(data.success);
            }
        });
    })
  })
</script>
@endsection
@extends('admin.adminlayout')

@section('title', 'Country')

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
            <h1>Country</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">country</li>
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
          <!-- left column -->
          <div class="col-md-6">
          	 @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        @if (\Session::get('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif      
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  <?php 
                    if(empty($country_object)){
                      echo 'Add Country';   
                    } else {
                      echo  'Edit Country'; 
                    }
                  ?>
                      
                    </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             @if(isset($country_object))
                 {!! Form::model($country_object,["method"=>"PATCH","action"=> ['Admin\CountryController@update',$country_object->country_id]]) !!}
              @else
                 {!! Form::open(["url"=> url('admin/country'),'method' => 'POST']) !!}
              @endif
              
                 {!! Form::token() !!}
                <div class="card-body">
                  <div class="form-group">
                     {!! Form::label('country_name', 'Country Name') !!}
                    
                    {!! Form::text('country_name',null,['class' => 'form-control', 'id' => 'country_name', 'placeholder' => 'Enter Country Name'])!!}
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">
                    <?php 
                    if(empty($country_object)){
                      echo 'Submit';   
                    } else {
                      echo  'Update'; 
                    }
                    ?>
                      
                    </button>
                </div>
              {!! Form::close() !!}
                </div>
              </form>

              
            </div>
            <!-- /.card -->

            
          </div>
          <!--/.col (right) -->
        </div>
        @if(empty($country_object))
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
	                    <th>Country Name</th>
	                    <th width="70px">Action</th>
	                  </tr>
	                  </thead>
	                  <tbody>
	                  	@foreach($country as $post)
	                  	<tr>
		                    <td>{{$count++}}</td>
	        				<td>{{$post['country_name']}}</td>
	        				<td><a href="{{action('Admin\CountryController@edit', $post['country_id'])}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
					       <form action="{{action('Admin\CountryController@destroy', $post['country_id'])}}" method="post" class="delete_record_form">
					            {{csrf_field()}}
					            <input name="_method" type="hidden" value="DELETE">
					            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');" type="submit"><i class="fa fa-trash"></i></button>
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
        @endif
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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

<!-- <script type="text/javascript">
$(document).ready(function() {
    oTable = $('#country_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('datatable.getposts') }}",
        "columns": [
            {data: 'country_id', name: 'country_id'},
            {data: 'country_name', name: 'country_name'}
            {data: 'action', name: 'action'}
        ],
        "order": [[ 1, 'asc' ]]
    });
});
</script> -->
@endsection
@extends('admin.adminlayout')

@section('title', 'City')

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
            <h1>City</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">city</li>
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
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  <?php 
                    if(empty($city_object)){
                      echo 'Add City';   
                    } else {
                      echo  'Edit City'; 
                    }
                    ?>
                      
                    </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               @if(isset($city_object))
                 {!! Form::model($city_object,["method"=>"PATCH","action"=> ['Admin\CityController@update',$city_object->city_id]]) !!}
              @else
                 {!! Form::open(["url"=> url('admin/city'),'method' => 'POST']) !!}
              @endif
              
                 {!! Form::token() !!}
                <div class="card-body">
                  <div class="form-group">
                 {!! Form::label('state_id', 'State Name') !!}

                 {!! Form::select('state_id',$state, null,["class"=>"form-control select2",'placeholder'=>"Select State"]) !!}           

                  </div>
                  <div class="form-group">
                    {!! Form::label('city_name', 'City Name') !!}
                    
                    {!! Form::text('city_name',null,['class' => 'form-control', 'id' => 'city_name', 'placeholder' => 'Enter City Name'])!!}
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">
                    <?php 
                    if(empty($city_object)){
                      echo 'Submit';   
                    } else {
                      echo  'Update'; 
                    }
                    ?></button>
                </div>
               {!! Form::close() !!}
            </div>
            <!-- /.card -->

            
          </div>
          <!--/.col (right) -->
        </div>
        @if(empty($city_object))
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
	                    <th>City Name</th>
                      <th>State Name</th>
	                    <th width="70px">Action</th>
	                  </tr>
	                  </thead>
	                  <tbody>
	                  	@foreach($city as $post)
	                  	<tr>
		                    <td>{{$count++}}</td>
      	        				<td>{{$post['city_name']}}</td>
                        <td>{{$post['state_name']}}</td>
      	        				<td><a href="{{action('Admin\CityController@edit', $post['city_id'])}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
      					       <form action="{{action('Admin\CityController@destroy', $post['city_id'])}}" method="post" class="delete_record_form">
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
@endsection
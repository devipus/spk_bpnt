@extends('layouts.layoutBaru')

@section('title')
 home
@endsection

@section('content')

<section class="content-header">
    <h1>
        Halaman Laporan
        <small>Silahkan Unggah File!</small>
    </h1>
      <ol class="breadcrumb">
        
      </ol>
</section>
    

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
      	<div class="box-body">
         <div class="panel-body">

				
					@if(session('success'))
						<div class="alert alert-success">
							<strong>{{ session('success') }}</strong>
						</div>
					@endif

					<div class="">
					<div class="row">
				        <div class="col-md-12">
				            <div class="panel panel-default">
				                <div class="panel-heading">
				                    <h4>Unggah File Laporan
				                        <a href="{{ route('formfile') }}" class="btn btn-success pull-right" style="margin-top:-8px"><i class="fa fa-upload"></i> Unggah File</a>
				                      
				                    </h4>
				                </div>
				                <div class="panel-body">
				                    <table id="" class="table table-striped">
				                        <thead>
				                            <tr>
				                                <th>Nama File</th>
				                                <th>Waktu Unggah</th>                                
				            
				                                <th>Action</th>
				                            </tr>

				                            @foreach($files as $file)
				                            	<tr>
				                            		<td>{{ $file->title }}</td>
				                            		<td>{{ $file->created_at->diffForHumans() }}</td>
				                            		<td><form action="{{ route('deletefile', $file->id) }}" method="post">
														{{ csrf_field() }} {{ method_field('DELETE') }}
														<button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"> </i> </button>
														<a href="{{ route('downloadfile', $file->id) }}" class="btn btn-success"><i class="fa fa-download"></i> </a>
													</form>
													</td>
				                            	</tr>
				                            @endforeach
				                        </thead>
				                        <tbody></tbody>
				                    </table>
				                </div>
				            </div>
				        </div>
				      
				     </div>
				</div>
			</div>
		</div>
	</div>
	</section>

					
@endsection
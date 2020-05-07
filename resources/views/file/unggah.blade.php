@extends('layouts.layoutBaru')

@section('title')
 home
@endsection

@section('content')
<section class="content-header">
    <h1>
        Halaman Unggah Laporan
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

				<div class="">
					<div class="row">
				        <div class="col-md-12">
				            <div class="panel panel-default">
				                <div class="panel-heading">
				                	<h4>Form Unggah File Laporan </h4>
				                </div>
				                <div class="panel-body">

									<form action="{{ route('unggahfile') }}" method="post" enctype="multipart/form-data">
										{{ csrf_field() }} {{ method_field('POST') }}

										<div class="form-group">
											<input type="file" name="file[]" multiple>
										</div>
										<button type="submit" class="btn btn-success">Unggah</button>
										<a href="{{ route('viewfile') }}" class="btn btn-default">Kembali</a>
									</form>
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
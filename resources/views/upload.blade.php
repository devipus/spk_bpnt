@extends('layouts.layoutBaru')

@section('title')
 home
@endsection

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan
        <small>Silahkan Upload File!</small>
      </h1>
      <ol class="breadcrumb">
        
      </ol>
    </section>
    

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Form Laporan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         <div class="panel-body">
                   
     <div class="">
      <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Data Laporan
                        
                    </h4>
                </div>
                <div class="panel-body">
                    <form action="/devi/public/uploadfile" class="form-horizontal" data-toggle="validator" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                      
     
                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Keterangan</label>
                          <div class="col-md-8">
                              <input type="text" name="ket" class="form-control" >
                              <span class="help-block with-errors"></span>
                          </div>
                        </div>
     
                        <div class="form-group">
                          <label for="" class="col-md-4 control-label">Pilih File</label>
                          <div class="col-md-8">
                              <input type="file" name="filename" class="form-control" >
                              <span class="help-block with-errors"></span>
                          </div>
                        </div>
                        
                        <div class="modal-footer">
                          <button name="submit" type="submit" class="btn btn-primary">Upload </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
      </div>

          
    </div>


                </div>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- Content Header (Page header) -->
@endsection    

@section('script')

@endsection

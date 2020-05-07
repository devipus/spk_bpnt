@extends('layouts.layoutBaru')

@section('title')
 home
@endsection

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        FORM Kriteria
        <small>Silahkan Isi Data!</small>
      </h1>
      <ol class="breadcrumb">
        
      </ol>
    </section>
    

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Form Kriteria</h3>

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
                    <h4>Data Bobot Kritera
                      
                        <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;"><i class="fa fa-plus"></i> Tambah</a>

                       
                    </h4>
                </div>
                <div class="panel-body">
                    <table id="pembobotanawal-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tahun</th>
                                <th>Penghasilan</th>           
                                <th>Pekerjaan</th>
                                <th>Pendidikan</th>           
                                <th>Aset</th>
                                <th>Luas Lantai</th> 
                                <th>Jenis Lantai</th>           
                                <th>Jenis Dinding</th>
                                <th>Sumber Penerangan</th>           
                                <th>Sumber Air</th>
                                <th>Fasilitas BAB</th>      

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>

          @include('form_pembobotanawal')
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
<script type="text/javascript">
 var table
$(document).ready(function() {



    table = $('#pembobotanawal-table').DataTable({
        processing: true,
        serverSide: true,
        bLengthChange: true,
        iDisplayLength: 5,
        responsive: true,

        ajax: "{{ route('api.pembobotanawal') }}",
        columns: [

            {
                data: 'tahun',
                name: 'tahun'
            },
              {
                data: 'penghasilan',
                name: 'penghasilan'
            },
              {
                data: 'pekerjaan',
                name: 'pekerjaan'
            },
              {
                data: 'pendidikan',
                name: 'pendidikan'
            },
              {
                data: 'aset',
                name: 'aset'
            },
             {
                data: 'luas_lantai',
                name: 'luas_lantai'
            },
            {
                data: 'jenis_lantai',
                name: 'jenis_lantai'
            },
              {
                data: 'jenis_dinding',
                name: 'jenis_dinding'
            },
              {
                data: 'sumber_penerangan',
                name: 'sumber_penerangan'
            },
              {
                data: 'sumber_air',
                name: 'sumber_air'
            },
             {
                data: 'fasil_bab',
                name: 'fasil_bab'
            },
            
            {
                data: 'action',
                name: 'action',
                searchable: false
            }
        ]
    });

    var validator= $('#modal-form form').validator();
        validator.on('submit', function(e) {
        if (!e.isDefaultPrevented()) {
            var id = $('#id_pembobotanawal').val();
            if (save_method == 'add') url = "{{ url('pembobotanawal') }}";
            else url = "{{ url('pembobotanawal') . '/' }}" + id;

            $.ajax({
                url: url,
                type: "POST",
                //                        data : $('#modal-form form').serialize(),
                data: new FormData($("#modal-form form")[0]),
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.error==1){
                        var dataError = data.data;
                        $('#modal-form .help-block').html('');
                        $.each(dataError, function(e,f){
                            $('#modal-form input[name="' +f.name+ '"]').parents('.form-group').addClass('has-error');
                            $('#modal-form input[name="' +f.name+ '"]').next('.help-block').html(f.message);
                        });
                    }else
                    {


                    $('#modal-form').modal('hide');
                    table.ajax.reload();
                    swal({
                        title: 'Success!',
                        text: '',
                        type: 'success',
                        timer: '1500'
                    });

                }
                },
                error: function(data) {
                    swal({
                        title: 'Oops...',
                        text: data.message,
                        type: 'error',
                        timer: '1500'
                    })
                }
            });
            return false;
        }
    });
});

function editForm(id) {
    save_method = 'edit';
    $('input[name=_method]').val('PATCH');
    $('#modal-form form')[0].reset();
    $.ajax({
        url: "{{ url('pembobotanawal') }}" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            console.log(data);
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Bobot Kriteria');
         
            $('#id_pembobotanawal').val(data.id_pembobotanawal);
            $('#tahun').val(data.tahun);
            $('#penghasilan').val(data.penghasilan);
            $('#pekerjaan').val(data.pekerjaan);
            $('#pendidikan').val(data.pendidikan);
            $('#aset').val(data.aset);
            $('#luas_lantai').val(data.luas_lantai);
            $('#jenis_lantai').val(data.jenis_lantai);
            $('#jenis_dinding').val(data.jenis_dinding);
            $('#sumber_penerangan').val(data.sumber_penerangan);
            $('#sumber_air').val(data.sumber_air);
            $('#fasil_bab').val(data.fasil_bab);
        },
        error: function() {
            alert("Nothing Data");
        }
    });
}



function addForm() {
      save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Tambah Bobot Kriteria');

}


function deleteData(id) {
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then(function() {
        $.ajax({
            url: "{{ url('pembobotanawal') }}" + '/' + id,
            type: "POST",
            data: {
                '_method': 'DELETE',
                '_token': csrf_token
            },
            success: function(data) {
                if (data.success == 1) {
                    table.ajax.reload();
                    swal({
                        title: 'Success!',
                        text: '',
                        type: 'success',
                        timer: '1500'
                    });
                } else {
                    var error = data.error;
                    if (error && error.length > 0) {
                        $.each(data.errors, function(a, b) {
                            $("[name='" + a + "']").parents('.');

                        });
                    } else {
                        swal({
                            title: 'Oops...',
                            text: data.message,
                            type: 'error',
                            timer: '1500'
                        });
                    }
                }
            },
            error: function() {
                swal({
                    title: 'Oops...',
                    text: data.message,
                    type: 'error',
                    timer: '1500'
                })
            }
        });
    });
}
            

</script>
@endsection

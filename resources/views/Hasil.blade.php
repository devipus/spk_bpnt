

@extends('layouts.layoutBaru')

@section('title')
 home
@endsection

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        FORM HASIL
        <small>Silahkan Cari Data</small>
      </h1>
      <ol class="breadcrumb">
        
      </ol>
    </section>
    

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <form id="form-contact" method="get" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" autocomplete="off">
                {{ csrf_field() }} {{ method_field('GET') }}
                   
     <div class="">
      <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            
                <div class="panel-body">
                    <div class="row">
             
               <div class="col-md-2">
               </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="" class="col-md-4 control-label">Tahun</label>
                            <div class="col-md-8">
                              <select id="tahun" name="tahun" class="form-control" >
                                <option value="">Pilih Tahun
                                <?php
                                  for($e = date('Y', strtotime('+ 2 year')); $e > date('Y', strtotime('-8 year')); $e--){
                                    echo "<option value='" . $e . "'>" .  $e;
                                  }
                                ?>
                              </select>
                              <span class="help-block with-errors"></span>
                            </div>
                    </div>

                
                </div>

                <button type="submit" class="btn btn-primary btn-save">Lihat</button>
                    
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
<script type="text/javascript">
 var table
$(document).ready(function() {



    table = $('#hasil-table').DataTable({
        processing: true,
        serverSide: true,
        Pagination: 10,
        iDisplayLength: 5,
        responsive: true,

        ajax: "{{ route('api.hasil') }}",
        columns: [

          
              {
                data: 'tahun',
                name: 'tahun'
            },
            {
                data: 'warga.nama_warga',
                name: 'warga.nama_warga'
            },
              {
                data: 'penghasilan.subkriteria.',
                name: 'penghasilan.subkriteria'
            },
              {
                data: 'pekerjaan.subkriteria',
                name: 'pekerjaan.subkriteria'
            },
              {
                data: 'pendidikan.subkriteria',
                name: 'pendidikan.subkriteria'
            },
              {
                data: 'aset.subkriteria',
                name: 'aset.subkriteria'
            },
             {
                data: 'luas_lantai.subkriteria',
                name: 'luas_lantai.subkriteria'
            },
               {
                data: 'jenis_lantai.subkriteria.',
                name: 'jenis_lantai.subkriteria'
            },
              {
                data: 'jenis_dinding.subkriteria',
                name: 'jenis_dinding.subkriteria'
            },
              {
                data: 'sumber_penerangan.subkriteria',
                name: 'sumber_penerangan.subkriteria'
            },
              {
                data: 'sumber_air.subkriteria',
                name: 'sumber_air.subkriteria'
            },
             {
                data: 'fasil_bab.subkriteria',
                name: 'fasil_bab.subkriteria'
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
            var id = $('#id_hasil').val();
            if (save_method == 'add') url = "{{ url('hasil') }}";
            else url = "{{ url('hasil') . '/' }}" + id;

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
        url: "{{ url('hasil') }}" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            console.log(data);
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Hasil');
         
            $('#id_hasil').val(data.id_hasil);
            $('#tahun').val(data.tahun);
            $('#id_warga').val(data.id_warga);
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
        $('.modal-title').text('Add Hasil');

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
            url: "{{ url('hasil') }}" + '/' + id,
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

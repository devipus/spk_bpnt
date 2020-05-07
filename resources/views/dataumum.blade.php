

@extends('layouts.layout')

@section('title')
 home
@endsection

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        FORM Dataumum
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
          <h3 class="box-title">Form Dataumum</h3>

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
                    <h4>Data Dataumum
                      
                        <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Add Dataumum</a>

                       
                    </h4>
                </div>
                <div class="panel-body">
                    <table id="dataumum-table" class="table table-striped">
                        <thead>
                            <tr>
 
                     <th>Provinsi</th>
                                  <th>Kab/Kota</th>
                                  <th>Kec</th>
                                  <th>Kel</th>
                                  <th>RW</th>
                                  <th>RT</th>
                                  <th>Luas Sk</th>
                                  <th>Luas Verifikasi</th>
                                  <th>Jml Pembangunan</th>
                                  <th>Jml penduduk</th>
                                  <th>Jml KK</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>

          @include('form_dataumum')
    </div>


                </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- Content Header (Page header) -->
@endsection    

@section('script')
<script type="text/javascript">
 var table;

 class Geo{
    constructor(){
        this.region=$('#geo-region');
        this.city=$('#geo-city');
        this.district=$('#geo-district');
        this.village=$('#geo-village');
        this.dataRegion='';
        this.dataCity='';
        this.dataDistrict='';
        this.dataVillage='';

        this.select(this.region);
        this.select(this.city);
        this.select(this.district);
        this.select(this.village);
    }

    select(el){
        var t=this;
        el.select2({
            ajax:{
                url: el.data('url'),
                dataType:'JSON',
                //delay: 300,
                quietMillis: 100,
                data: function(params){
                    var red={
                         q:params.term 

                    };
                    // console.log(el.selector);
                   if(el.selector=='#geo-city'){
                        red['region']=t.dataRegion;
                   }
                    if(el.selector=='#geo-district'){
                        red['region']=t.dataRegion;
                        red['city']=t.dataCity;
                   }
                    if(el.selector=='#geo-village'){
                         red['region']=t.dataRegion;
                        red['city']=t.dataCity;;
                        red['district']=t.dataDistrict;
                   }
                  return red;
                },
                processResults:function(data,params){
                    return {
                        results:data

                    };
                },
                cache:false

            },
            placeholder: el.data('placeholder'),
              escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
              minimumInputLength: 0,
              templateResult: formatRepo,
              templateSelection: formatRepoSelection,
              selectOnBlur:false,
              multiple:false,
              allowClear:true,


        }).on('select2:select', function(e){
            var data=e.params.data;
            if(this.id=='geo-region'){
                t.dataRegion=data.code;
                t.city.val(null).trigger('change').removeAttr('disabled');
                t.district.val(null).trigger('change').attr('disabled','disabled');
                t.village.val(null).trigger('change').attr('disabled','disabled');
            }
            if(this.id=='geo-city'){

                t.dataCity=data.code;
                t.district.val(null).trigger('change').removeAttr('disabled');
                t.village.val(null).trigger('change').attr('disabled','disabled');


            }
            if(this.id=='geo-district'){

                t.dataDistrict=data.code;
                t.village.val(null).trigger('change').removeAttr('disabled');
            }
        }).on('select2:unselect', function(e){
            var data=e.params.data;
            if(this.id=='geo-region'){
                t.dataRegion='';
                t.city.val(null).trigger('change').attr('disabled','disabled');
                t.district.val(null).trigger('change').attr('disabled','disabled');
                t.village.val(null).trigger('change').attr('disabled','disabled');
            }
            if(this.id=='geo-city'){

                t.dataCity='';
                t.district.val(null).trigger('change').attr('disabled','disabled');
                t.village.val(null).trigger('change').attr('disabled','disabled');


            }
            if(this.id=='geo-district'){

                t.dataDistrict='';
                t.village.val(null).trigger('change').attr('disabled','disabled');
            }



        });


        function formatRepo (repo) {
                  if (repo.loading) {
                    return repo.text;
                  }

                  var markup = "<div class='select2-result-repository clearfix'>" +
                    "<div class='select2-result-repository__meta'>" +
                      "<div class='select2-result-repository__title'>" + repo.name + "</div>";

          return markup;
        }

        function formatRepoSelection (repo) {
          return repo.name || repo.text;
        }
    }

 }
 new Geo();


$(document).ready(function() {



    table = $('#dataumum-table').DataTable({
        processing: true,
        serverSide: true,
        bLengthChange: true,
        iDisplayLength: 5,
        responsive: true,
         "scrollX": true,

        ajax: "{{ route('api.dataumum') }}",
        columns: [
                
               
            {
                data: 'regions.name',
                name: 'regions.name'
            },
            {
                data: 'cities.name',
                name: 'cities.name'
            },
            {
                data: 'districts.name',
                name: 'districts.name'
            },
            {
                data: 'villages.name',
                name: 'villages.name'
            },
              {
                data: 'rt',
                name: 'rt'
            },
             {
                data: 'rw',
                name: 'rw'
            },
             {
                data: 'luassk',
                name: 'luassk'
            },
              {
                data: 'luasverifikasi',
                name: 'luasverifikasi'
            },
             {
                data: 'jumlahbangunan',
                name: 'jumlahbangunan'
            },
             {
                data: 'jumlahpenduduk',
                name: 'jumlahpenduduk'
            },
             {
                data: 'jumlahkk',
                name: 'jumlahkk'
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
            var id = $('#id_dataumum').val();
            if (save_method == 'add') url = "{{ url('dataumum') }}";
            else url = "{{ url('dataumum') . '/' }}" + id;

            $.ajax({
                url: url,
                type: "POST",
                data: new FormData($("#modal-form form")[0]),
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#modal-form').modal('hide');
                    table.ajax.reload();
                    swal({
                        title: 'Success!',
                        text: '',
                        type: 'success',
                        timer: '1500'
                    });
                    table.ajax.reload();
                },
                error: function(data) {
                    console.log(data.responseJSON);
                    if (data.responseJSON.errors){
                        var dataError = data.responseJSON.errors;
                        $('#modal-form .help-block').html('');
                        $.each(dataError, function(e,f){
                            $('#modal-form input[name="' +e+ '"], #modal-form select[name="' +e+ '"]').parents('.form-group').addClass('has-error');
                            $('#modal-form input[name="' +e+ '"], #modal-form select[name="' +e+ '"]').next('.help-block').html(f[0]);
                        });
                    }else{
                        swal({
                            title: 'Oops...',
                            text: 'Tampaknya ada kesalahan, silahkan muat ulang laman',
                            type: 'error',
                            timer: '1500'
                        });
                    }
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
        url: "{{ url('dataumum') }}" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            console.log(data);
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Dataumum');
         
       
            $('#id_dataumum').val(data.id_dataumum);
            $('#geo-region').val(data.id_provinsi);
            $('#geo-city').val(data.id_kabkota);
            $('#geo-district').val(data.id_kec);
            $('#geo-village').val(data.id_kel);
            $('#rt').val(data.rt);
            $('#rw').val(data.rw);
            $('#luassk').val(data.luassk);
            $('#luasverifikasi').val(data.luasverifikasi);
            $('#jumlahbangunan').val(data.jumlahbangunan);
            $('#jumlahpenduduk').val(data.jumlahpenduduk);
            $('#jumlahkk').val(data.jumlahkk);

           

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
        $('.modal-title').text('Add Dataumum');
        numberinput();


}
function numberinput(){
    $('.numeric').on('keypress', function(e){

        if (!/^[0-9]+$/.test(String.fromCharCode(e.which))){
            e.preventDefault();
            return false;
        }
    });
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
            url: "{{ url('dataumum') }}" + '/' + id,
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

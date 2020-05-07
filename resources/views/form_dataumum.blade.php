


<div class="modal" id="modal-form" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-contact" autocomplete="off" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>
   
                <div class="modal-body">
                    <input type="hidden" id="id_dataumum" name="id_dataumum">
                    

            <div class="row">
             
               <div class="col-md-2">
               </div>
                <div class="col-md-4">
                      <div class="form-group">
                      <label for="" class="col-md-4 control-label">Provinsi</label>
                      <div class="col-md-8">
                           <select class="form-control"  style="width:100%" id="geo-region" name="id_provinsi" data-url="{{route('geo.region')}}" data-placeholder="Cari Provinsi">

                                    </select>
                             <span class="help-block with-errors"></span>
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="" class="col-md-4 control-label">Kab/Kota</label>
                      <div class="col-md-8">
                           <select class="form-control"  style="width:100%" id="geo-city" name="id_kabkota" data-url="{{route('geo.cities')}}" data-placeholder="Cari Kab/Kota" disabled="disabled">
                                

                                    </select>
                             <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-md-4 control-label">Kecamatan</label>
                      <div class="col-md-8">
                           <select class="form-control"  style="width:100%" id="geo-district" name="id_kec" data-url="{{route('geo.districts')}}"data-placeholder="Cari Kecamatan" disabled="disabled">
                          </select>
                           <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-md-4 control-label">Kelurahan</label>
                      <div class="col-md-8">
                           <select  class="form-control"  style="width:100%" id="geo-village" name="id_kel" data-url="{{route('geo.villages')}}"data-placeholder="Cari Kelurahan" disabled="disabled">
    
                                    </select>
                             <span class="help-block with-errors"></span>
                      </div>
                    </div>


                      <div class="form-group">
                      <label for="" class="col-md-4 control-label">RW</label>
                      <div class="col-md-8">
                          <input type="text" id="rw" name="rw" class="form-control numeric" >
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>
                                            <div class="form-group">
                      <label for="" class="col-md-4 control-label">RT</label>
                      <div class="col-md-8">
                          <input type="text" id="rt" name="rt" class="form-control numeric" >
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>
                </div>
             
                <div class="col-md-4">
               <!--  'rt','luassk','luasverifikasi','jumlahbangunan','jumlahpenduduk','jumlahkk');
 -->
                  
                     <div class="form-group">
                      <label for="" class="col-md-4 control-label">Luas Sk</label>
                      <div class="col-md-8">
                          <input type="text" id="luassk" name="luassk" class="form-control numeric" >
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="" class="col-md-4 control-label">Luas verifikasi</label>
                      <div class="col-md-8">
                          <input type="text" id="luasverifikasi" name="luasverifikasi" class="form-control numeric" >
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="" class="col-md-4 control-label">Jumlah Bangunan</label>
                      <div class="col-md-8">
                          <input type="text" id="jumlahbangunan" name="jumlahbangunan" class="form-control numeric" >
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>
                      <div class="form-group">
                      <label for="" class="col-md-4 control-label">Jumlah penduduk</label>
                      <div class="col-md-8">
                          <input type="text" id="jumlahpenduduk" name="jumlahpenduduk" class="form-control numeric" >
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="" class="col-md-4 control-label">Jumlah KK</label>
                      <div class="col-md-8">
                          <input type="text" id="jumlahkk" name="jumlahkk" class="form-control numeric" >
                          <span class="help-block with-errors"></span>
                      </div>
                     

              </div> 
              <div class="col-md-2">
                          
                 
                </div>

                  
                    
                      


              </div>

            </div>    
           </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</div>




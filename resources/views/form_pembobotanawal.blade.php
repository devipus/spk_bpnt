<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-contact" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data"  autocomplete="off">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id_pembobotanawal" name="id_pembobotanawal">
                    

            <div class="row">
             
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="" class="col-md-4 control-label">Tahun</label>
                        <div class="col-md-8">
                          <select id="tahun" name="tahun" class="form-control" >
                            <option value="">-- Pilih Tahun --
                            <?php
                              for($e = date('Y', strtotime('+ 2 year')); $e > date('Y', strtotime('-2 year')); $e--){
                                echo "<option value='" . $e . "'>" .  $e;
                              }
                            ?>
                          </select>
                          <span class="help-block with-errors"></span>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-md-4 control-label">Penghasilan</label>
                      <div class="col-md-8">
                          <input type="text" id="penghasilan" name="penghasilan" class="form-control" >
                          <span class="help-block with-errors"></span>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-md-4 control-label">Pekerjaan</label>
                      <div class="col-md-8">
                          <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" >
                          <span class="help-block with-errors"></span>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-md-4 control-label">Pendidikan</label>
                      <div class="col-md-8">
                          <input type="text" id="pendidikan" name="pendidikan" class="form-control" >
                          <span class="help-block with-errors"></span>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-md-4 control-label">Aset</label>
                      <div class="col-md-8">
                          <input type="text" id="aset" name="aset" class="form-control" >
                          <span class="help-block with-errors"></span>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-md-4 control-label">Luas Lantai</label>
                      <div class="col-md-8">
                          <input type="text" id="luas_lantai" name="luas_lantai" class="form-control" >
                          <span class="help-block with-errors"></span>
                      </div>
                  </div>
                </div>

                <div class="col-md-6">

                  <div class="form-group">
                    <label for="" class="col-md-4 control-label">Jenis Lantai</label>
                      <div class="col-md-8">
                          <input type="text" id="jenis_lantai" name="jenis_lantai" class="form-control" >
                          <span class="help-block with-errors"></span>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-md-4 control-label">Jenis Dinding</label>
                      <div class="col-md-8">
                          <input type="text" id="jenis_dinding" name="jenis_dinding" class="form-control" >
                          <span class="help-block with-errors"></span>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-md-4 control-label">Sumber Penerangan</label>
                      <div class="col-md-8">
                          <input type="text" id="sumber_penerangan" name="sumber_penerangan" class="form-control" >
                          <span class="help-block with-errors"></span>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-md-4 control-label">Sumber Air</label>
                      <div class="col-md-8">
                          <input type="text" id="sumber_air" name="sumber_air" class="form-control" >
                          <span class="help-block with-errors"></span>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-md-4 control-label">Fasilitas BAB</label>
                      <div class="col-md-8">
                          <input type="text" id="fasil_bab" name="fasil_bab" class="form-control" >
                          <span class="help-block with-errors"></span>
                      </div>
                  </div>  
                </div> 

              </div>

              <div class="modal-footer">
                  <button type="submit" class="btn btn-warning btn-save">Simpan</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              </div>

            </form>
        </div>
    </div>
</div>




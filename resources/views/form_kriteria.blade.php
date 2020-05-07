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
                    <input type="hidden" id="id_kriteria" name="id_kriteria">

            <div class="row">
             
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="col-md-4 control-label">Jenis Kriteria</label>
                      <div class="col-md-8">
                         <select id="kriteria" name="kriteria" class="form-control">
                          <option value="">-- Pilih Kriteria --</option>
                          <option value="penghasilan">Penghasilan</option>
                          <option value="pekerjaan">Pekerjaan</option>
                          <option value="pendidikan">Pendidikan</option>
                          <option value="aset">Aset</option>
                          <option value="luas_lantai">Luas lantai</option>
                          <option value="jenis_lantai">Jenis lantai</option>
                          <option value="jenis_dinding">Jenis dinding</option>
                          <option value="sumber_penerangan">Sumber penerangan</option>
                          <option value="sumber_air">Sumber air</option>
                          <option value="fasil_bab">Fasilitas bab</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-md-4 control-label">Sub Kriteria</label>
                      <div class="col-md-8">
                          <input type="text" id="subkriteria" name="subkriteria" class="form-control" >
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-md-4 control-label">Nilai</label>
                      <div class="col-md-8">
                          <input type="text" id="nilai" name="nilai" class="form-control" >
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
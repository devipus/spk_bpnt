<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-contact" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id_penilaian" name="id_penilaian">
                      
                    <div class="row">
                        <div class="col-md-4">

                            <div class="form-group">
                              <label for="" class="col-md-4 control-label">Tahun</label>
                                    <div class="col-md-8">
                                          <select id="tahun" name="tahun" class="form-control" >
                                            <option value="">--Pilih Tahun--
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
                                <label for="" class="col-md-4 control-label">Nama Warga</label>
                                  <div class="col-md-8">
                                       <select id="id_warga" name="id_warga">
                                            <option value="">--Pilih Warga--</option>
                                            <?php 
                                                foreach ($warga  as $key => $value) {
                                                    echo '<option value="'.$value->id_warga.'">'.$value->nama_warga.'</option>';
                                                }
                                            ?>       
                                        </select>
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Penghasilan</label>
                                  <div class="col-md-8">
                                       <select id="penghasilan" name="penghasilan">
                                            <option value="">-- Penghasilan --</option>
                                            <?php 
                                                foreach ($penghasilan1  as $key => $value) {
                                                    echo '<option value="'.$value->id_kriteria.'">'.$value->kriteria.'</option>';
                                                }
                                            ?>       
                                        </select>
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Pekerjaan</label>
                                  <div class="col-md-8">
                                       <select id="pekerjaan" name="pekerjaan">
                                            <option value="">-- Pekerjaan --</option>
                                            <?php 
                                                foreach ($pekerjaan1  as $key => $value) {
                                                    echo '<option value="'.$value->id_kriteria.'">'.$value->kriteria.'</option>';
                                                }
                                            ?>       
                                        </select>
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Pendidikan</label>
                                  <div class="col-md-8">
                                       <select id="pendidikan" name="pendidikan">
                                            <option value="">-- Pendidikan --</option>
                                            <?php 
                                                foreach ($pendidikan1  as $key => $value) {
                                                    echo '<option value="'.$value->id_kriteria.'">'.$value->kriteria.'</option>';
                                                }
                                            ?>       
                                        </select>
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Aset</label>
                                  <div class="col-md-8">
                                       <select id="aset" name="aset">
                                            <option value="">-- Aset --</option>
                                            <?php 
                                                foreach ($aset1  as $key => $value) {
                                                    echo '<option value="'.$value->id_kriteria.'">'.$value->kriteria.'</option>';
                                                }
                                            ?>       
                                        </select>
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Luas Lantai</label>
                                  <div class="col-md-8">
                                       <select id="luas_lantai" name="luas_lantai">
                                            <option value="">-- Luas Lantai --</option>
                                            <?php 
                                                foreach ($luas_lantai1  as $key => $value) {
                                                    echo '<option value="'.$value->id_kriteria.'">'.$value->kriteria.'</option>';
                                                }
                                            ?>       
                                        </select>
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Jenis Lantai</label>
                                  <div class="col-md-8">
                                       <select id="jenis_lantai" name="jenis_lantai">
                                            <option value="">-- Jenis Lantai --</option>
                                            <?php 
                                                foreach ($jenis_lantai1  as $key => $value) {
                                                    echo '<option value="'.$value->id_kriteria.'">'.$value->kriteria.'</option>';
                                                }
                                            ?>       
                                        </select>
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Jenis Dinding</label>
                                  <div class="col-md-8">
                                       <select id="jenis_dinding" name="jenis_dinding">
                                            <option value="">-- Jenis Dinding --</option>
                                            <?php 
                                                foreach ($jenis_dinding1  as $key => $value) {
                                                    echo '<option value="'.$value->id_kriteria.'">'.$value->kriteria.'</option>';
                                                }
                                            ?>       
                                        </select>
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Sumber Penerangan</label>
                                  <div class="col-md-8">
                                       <select id="sumber_penerangan" name="sumber_penerangan">
                                            <option value="">-- Sumber Penerangan --</option>
                                            <?php 
                                                foreach ($sumber_penerangan1  as $key => $value) {
                                                    echo '<option value="'.$value->id_kriteria.'">'.$value->kriteria.'</option>';
                                                }
                                            ?>       
                                        </select>
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Sumber Air</label>
                                  <div class="col-md-8">
                                       <select id="sumber_air" name="sumber_air">
                                            <option value="">-- Sumber Air --</option>
                                            <?php 
                                                foreach ($sumber_air1  as $key => $value) {
                                                    echo '<option value="'.$value->id_kriteria.'">'.$value->kriteria.'</option>';
                                                }
                                            ?>       
                                        </select>
                                  </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Fasilitas BAB</label>
                                  <div class="col-md-8">
                                       <select id="fasil_bab" name="fasil_bab">
                                            <option value="">-- Fasilitas BAB --</option>
                                            <?php 
                                                foreach ($fasil_bab1  as $key => $value) {
                                                    echo '<option value="'.$value->id_kriteria.'">'.$value->kriteria.'</option>';
                                                }
                                            ?>       
                                        </select>
                                  </div>
                            </div>

                            
  
                        <div class="col-md-4">
                        </div>
                    </div>
                </div>    

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save">Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>

            </form>

        </div>
    </div>
</div>

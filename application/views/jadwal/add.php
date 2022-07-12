<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Tambah Jadwal</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                echo form_open('jadwal/add', 'role="form" class="form-horizontal"');
            ?>

                <div class="box-body">
                  
                  <input type="hidden" name="semester" value="<?php echo get_tahun_akademik('semester'); ?>" />

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Kelas</label>

                      <div class="col-sm-5">
                        <?php
                          echo cmb_dinamis('kelas', 'tbl_kelas', 'nama_kelas', 'kd_kelas');
                        ?>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Mata Kuliah</label>

                      <div class="col-sm-5">
                        <?php
                          echo cmb_dinamis('mapel', 'tbl_mapel', 'nama', 'kd_mapel');
                        ?>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Dosen</label>

                      <div class="col-sm-5">
                        <?php
                          $dropdownItems = [];
                          foreach ($list_dosen->result() as $dosen) {
                            $dropdownItems[$dosen->id] = $dosen->nama_lengkap;
                          }
                          echo form_dropdown('dosen', $dropdownItems, null, "class='form-control'");
                        ?>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Ruangan</label>

                      <div class="col-sm-5">
                        <?php
                          echo cmb_dinamis('ruangan', 'tbl_ruangan', 'nama_ruangan', 'kd_ruangan');
                        ?>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Jam</label>

                      <div class="col-sm-9">
                        <input type="text" name="jam" class="form-control" placeholder="Masukkan Jam">
                        <span style="font-size: 12px; color: gray;">Contoh: 10.00 - 10.45</span>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Hari</label>

                      <div class="col-sm-5">
                        <?php
                          $dropdownItems = [
                            'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu',
                          ];
                          echo form_dropdown('hari', $dropdownItems, null, "class='form-control'");
                        ?>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label"></label>

                      <div class="col-sm-1">
                        <button type="submit" name="submit" class="btn btn-primary btn-flat">Simpan</button>
                      </div>

                      <div class="col-sm-1">
                        <?php
                          echo anchor('jadwal', 'Kembali', array('class'=>'btn btn-danger btn-flat'));
                        ?>
                      </div>
                  </div>

                </div>
                <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

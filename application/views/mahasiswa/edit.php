<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Edit Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                echo form_open_multipart('mahasiswa/edit', 'role="form" class="form-horizontal"');
            ?>

                <div class="box-body">
                  
                  <input type="hidden" value="<?php echo $mahasiswa['id']; ?>" name="id" class="form-control">

                  <div class="form-group">
                      <label class="col-sm-2 control-label">NIM</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $mahasiswa['nim']; ?>" name="nim" class="form-control" placeholder="Masukkan NIM">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $mahasiswa['nama_lengkap']; ?>" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Tempat, Tgl Lahir</label>

                      <div class="col-sm-5">
                        <input type="text" value="<?php echo $mahasiswa['tmpt_lahir']; ?>" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                      </div>

                      <div class="col-sm-2">
                        <input type="date" value="<?php echo $mahasiswa['tgl_lahir']; ?>" name="tanggal_lahir" class="form-control">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Gender</label>

                      <div class="col-sm-5">
                        <?php
                          echo form_dropdown('gender', array('Pilih Gender', 'P'=>'Laki-Laki', 'W'=>'Perempuan'), $mahasiswa['gender'], "class='form-control'");
                        ?>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Agama</label>

                      <div class="col-sm-5">
                        <?php
                          echo cmb_dinamis('agama', 'tbl_agama', 'nama_agama', 'kd_agama', $mahasiswa['kd_agama']);
                        ?>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Foto</label>

                      <div class="col-sm-5">
                        <img src="<?php echo base_url()."uploads/".$mahasiswa['foto']; ?>" width="150px" style="display:block;"><br>
                        <input type="file" name="userfile">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Kelas</label>

                      <div class="col-sm-5">
                        <?php
                          echo cmb_dinamis('kelas', 'tbl_kelas', 'nama_kelas', 'kd_kelas', $mahasiswa['kd_kelas']);
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
                          echo anchor('mahasiswa', 'Kembali', array('class'=>'btn btn-danger btn-flat'));
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
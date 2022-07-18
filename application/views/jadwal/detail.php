<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title">Detail Jadwal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <tr>
                  <th>Mata Kuliah</th>
                  <td><?php echo $jadwal['nama_matkul'] ?></td>
                </tr>
                <tr>
                  <th>Kode Mata Kuliah</th>
                  <td><?php echo $jadwal['kd_mapel'] ?></td>
                </tr>
                <tr>
                  <th>Dosen</th>
                  <td><?php echo $jadwal['nama_dosen'] ?></td>
                </tr>
                <tr>
                  <th>Jurusan</th>
                  <td><?php echo $jadwal['nama_jurusan'] ?></td>
                </tr>
                <tr>
                  <th>Kelas</th>
                  <td><?php echo $jadwal['kd_kelas'] ?></td>
                </tr>
                <tr>
                  <th>Jumlah SKS</th>
                  <td><?php echo $jadwal['sks'] ?></td>
                </tr>
                <tr>
                  <th>Hari</th>
                  <td><?php echo $jadwal['hari'] ?></td>
                </tr>
                <tr>
                  <th>Jam</th>
                  <td><?php echo $jadwal['jam'] ?></td>
                </tr>
                <tr>
                  <th>Ruangan</th>
                  <td><?php echo $jadwal['nama_ruangan'] ?></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title">List Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <!-- button add -->
            <?php
              if ($id_level_user == 1) {
                echo anchor('jadwal/list_mahasiswa/'.$jadwal['id'], '<button class="btn bg-navy btn-flat margin">Tambah Data</button>');
              }
            ?>
            <!-- button view absensi -->
            <?php
              if (in_array($id_level_user, array(1,3,5))) {
                echo anchor('absensi?jadwal='.$jadwal['id'], '<button class="btn btn-success bg-navy btn-flat margin">Lihat Absensi</button>');
              }
            ?>

              <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIM</th>
                        <th>NAMA</th>
                        <th>GENDER</th>
                        <th>KELAS</th>
                        <th>ANGKATAN</th>
                        <?php
                          if ($id_level_user == 1) {
                            echo "<th>Aksi</th>";
                          }
                        ?>
                    </tr>
                </thead>
                <?php
                    if (!empty($mahasiswa)) {                      
                      $no = 1;
                      $id_jadwal = $jadwal['id'];
                      foreach ($mahasiswa->result() as $row) {
                        $row->gender = $row->gender == 'P' ? 'Laki-Laki' : 'Perempuan';
                        $tr = "<tr>
                              <td>$no</td>
                              <td>$row->nim</td>
                              <td>$row->nama_lengkap</td>
                              <td>$row->gender</td>
                              <td>$row->kd_kelas</td>
                              <td>$row->angkatan</td>
                        ";
  
                        if ($id_level_user == 1) {
                          $tr .= "
                            <td>
                              <a href='/jadwal/delete_mahasiswa/$row->id?id_jadwal=$id_jadwal' class='btn btn-xs btn-danger' data-placement='top'><i class='fa fa-edit'>Delete</i></a>
                            </td>
                          ";
                        }

                        $tr .= "</tr>";
                        echo $tr;
                        $no++;
                      }
                    }
                ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

<!-- punya lama -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/jquery.dataTables.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script> -->

<!-- baru tapi cdn -->
<!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"> -->

<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

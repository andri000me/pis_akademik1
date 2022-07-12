<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title">Data Table Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <!-- button add -->
            <?php
              if ($this->session->userdata('id_level_user') == 1) {
                echo anchor('mahasiswa/add', '<button class="btn bg-navy btn-flat margin">Tambah Data</button>');
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
                          if ($this->session->userdata('id_level_user') == 1) {
                            echo "<th>AKSI</th>";
                          }
                        ?>
                    </tr>
                </thead>
                <?php
                    $no = 1;
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
                      
                      if ($this->session->userdata('id_level_user') == 1) {
                        $tr = $tr . "
                          <td>
                            <a href='/mahasiswa/edit/$row->id' class='btn btn-xs btn-primary' data-placement='top'><i class='fa fa-edit'>Edit</i></a>
                            <a href='/mahasiswa/delete/$row->id' class='btn btn-xs btn-danger' data-placement='top'><i class='fa fa-edit'>Delete</i></a>
                          </td>
                        ";
                      }

                      $tr = $tr . "</tr>";
                      
                      echo $tr;

                      $no++;
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

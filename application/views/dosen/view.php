<?php
  if ($err) {
    echo "<script>alert('"+$err+"')</script>";
  }
?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title">Data Table Dosen</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <!-- button add -->
            <?php
              if ($id_level_user == 1) {
                echo anchor('dosen/add', '<button class="btn bg-navy btn-flat margin">Tambah Data</button>');
              }
            ?>

              <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIDN</th>
                        <th>NAMA DOSEN</th>
                        <th>GENDER</th>
                        <th>JURUSAN</th>
                        <?php 
                          if ($this->session->userdata('id_level_user') == 1) {
                            echo "<th>AKSI</th>";
                          }
                        ?>
                    </tr>
                </thead>

                <?php
                    $no = 1;
                    foreach ($dosen->result() as $row) {
                      $tr = "<tr>
                                <td>$no</td>
                                <td>$row->nidn</td>
                                <td>$row->nama_lengkap</td>
                                <td>$row->gender</td>
                                <td>$row->jurusan</td>
                            </tr>";
                      if ($this->session->userdata('id_level_user') == 1) {
                        $tr = $tr . "
                          <td>
                              <a href='/dosen/edit/$row->id' class='btn btn-xs btn-primary' data-placement='top'><i class='fa fa-edit'>Edit</i></a>
                              <a href='/dosen/delete/$row->id' class='btn btn-xs btn-danger' data-placement='top'><i class='fa fa-edit'>Delete</i></a>
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



<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title">Data Table User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <!-- button add -->
            <?php
                echo anchor('user/add', '<button class="btn bg-navy btn-flat margin">Tambah Data</button>');
                echo anchor('user/rule', '<button class="btn btn-danger btn-flat margin">Rule User</button>');
            ?>

              <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA LENGKAP</th>
                        <th>LEVEL</th>
                        <th>AKSI</th>
                    </tr>
                </thead>

                <?php
                    $no = 1;
                    foreach ($user->result() as $row) {
                       echo "<tr>
                                <td>$no</td>
                                <td>$row->nama_lengkap</td>
                                <td>$row->nama_level</td>
                                <td>
                                    <a href='/user/edit/$row->id_user' class='btn btn-xs btn-primary' data-placement='top'><i class='fa fa-edit'>Edit</i></a>
                                    <a href='/user/delete/$row->id_user' class='btn btn-xs btn-danger' data-placement='top'><i class='fa fa-edit'>Delete</i></a>
                                </td>
                            </tr>";
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
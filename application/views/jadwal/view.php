<section class="content">
    <div class="row">

        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header  with-border">
                <table class="table table-bordered">
                <tr>
                    <td width="200">Tahun Akademik</td>
                    <td> : <?php echo get_tahun_akademik('tahun_akademik'); ?></td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td> : <?php echo get_tahun_akademik('semester'); ?></td>
                </tr>
                </table>
            </div>
            </div>
        </div>

        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title">Daftar Jadwal Perkuliahan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- button add -->
                <?php
                    if ($id_level_user == 1) {
                        echo anchor('jadwal/add', '<button class="btn bg-navy btn-flat margin">Tambah Data</button>');
                    }
                ?>

                <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Kode</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Dosen</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Ruang</th>
                        </tr>
                    </thead>

                    <?php
                        $no = 1;
                        foreach ($jadwal->result() as $row) {
                        echo "<tr>
                                    <td>$no</td>
                                    <td>$row->kd_kelas</td>
                                    <td>$row->nama_jurusan</td>
                                    <td>$row->kd_mapel</td>
                                    <td>$row->nama_matkul</td>
                                    <td>$row->sks</td>
                                    <td>$row->nama_dosen</td>
                                    <td>$row->hari</td>
                                    <td>$row->jam</td>
                                    <td>$row->nama_ruangan</td>
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
<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title">Daftar Hadir</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- button add -->
                <?php
                    if ($id_level_user == 3) {
                        echo anchor('absensi/add?jadwal='.$id_jadwal, '<button class="btn bg-navy btn-flat margin">Absen</button>');
                    }
                ?>

                <table id="mytable" class="table table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th rowspan="2" colspan="1">NIM</th>
                            <th rowspan="2" colspan="1">Nama Mahasiswa</th>
                            <th rowspan="1" colspan="17">Pertemuan</th>
                        </tr>
                        <tr>
                            <?php
                                for ($i=1; $i < 18; $i++) { 
                                    echo '<th>'.$i.'</th>';
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($mahasiswa as $m) {
                                $bg_color =  $m->id_mahasiswa == $id_mhs ? '#3B8DBC' : ''
                        ?>
                            <tr bgcolor="<?php echo $bg_color ?>">
                                <td>
                                    <?php echo $m->nim; ?>
                                </td>
                                <td>
                                    <?php echo $m->nama_lengkap ?>
                                </td>
                                <?php
                                    if (!empty($absensi)) {    
                                        $data = $absensi[$m->id_mahasiswa];
                                    }

                                    for ($i=1; $i < 18; $i++) {
                                        if (!empty($absensi) && array_key_exists($i, $data)) {
                                            $keterangan = $data[$i]->keterangan;
                                            if ($keterangan == 1) {
                                                echo '<td>ok</td>';
                                            } elseif ($keterangan == 2) {
                                                echo '<td>i</td>';
                                            } else {
                                                echo '<td>-</td>';
                                            }
                                        } else {
                                            echo '<td>-</td>';
                                        }
                                    }
                                ?>
                            </tr>
                        <?php } ?>
                    </tbody>
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
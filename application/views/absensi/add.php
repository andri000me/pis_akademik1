<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title">Absensi Pertemuan Ke <?php echo $jadwal['pertemuan_ke'] ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <!-- button add -->
              <button 
                class="btn bg-navy btn-flat margin" 
                onclick="simpan(<?php echo $jadwal['id'] ?>); return false;"
              >Simpan</button>

              <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIM</th>
                        <th>NAMA</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <?php
                    if (!empty($list_mahasiswa)) {                      
                      $no = 1;
                      $pertemuan = $jadwal['pertemuan_ke'];
                      $id_jadwal = $jadwal['id'];

                      foreach ($list_mahasiswa->result() as $row) {
                        $row->gender = $row->gender == 'P' ? 'Laki-Laki' : 'Perempuan';

                        echo "<tr>
                              <td>$no</td>
                              <td>$row->nim</td>
                              <td>$row->nama_lengkap</td>
                              <td class='action'>
                                  <a href='#'
                                    onclick='absen(this, $id_jadwal, $pertemuan, $row->id_mahasiswa, 1); return false;'
                                    class='btn btn-xs btn-success' data-placement='top'
                                  > Hadir </a>
                                  <a href='#'
                                    onclick='absen(this, $id_jadwal, $pertemuan, $row->id_mahasiswa, 2); return false;'
                                    class='btn btn-xs btn-warning' data-placement='top'
                                  > Izin </a>
                                  <a href='#'
                                    onclick='absen(this, $id_jadwal, $pertemuan, $row->id_mahasiswa, 3); return false;'
                                    class='btn btn-xs btn-danger' data-placement='top'
                                  > Tidak Ada Keterangan </a>
                              </td>
                          </tr>
                        ";
  
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
<script>
  let daftarHadir = [];

  function absen(el, idJadwal, pertemuan, idMhs, flag) {
    var keterangan;
    switch (flag) {
      case 1:
        keterangan = 'Hadir';
        break;
      case 2:
        keterangan = 'Izin';
        break;
      case 3:
        keterangan = 'Tidak Ada Keterangan';
        break;
    }
    $(el).closest('td.action').html(`
      <p>${keterangan}</p>
      <a href='#'
        onclick='batalkanAbsen(this, ${idJadwal}, ${pertemuan}, ${idMhs}); return false;'
        class='btn btn-xs btn-danger' data-placement='top'
      >Batal</a>
    `);

    daftarHadir.push({
      'id_jadwal': idJadwal,
      'id_mahasiswa': idMhs,
      'pertemuan': pertemuan,
      'keterangan': flag,
    });
    console.log(daftarHadir);
  }

  function batalkanAbsen(el, idJadwal, pertemuan, idMhs) {
    $(el).closest('td.action').html(`
      <a href="#"
        onclick="absen(this, ${idJadwal}, ${pertemuan}, ${idMhs}, 1); return false;"
        class="btn btn-xs btn-success" data-placement="top"
      > Hadir </a>
      <a href="#"
        onclick="absen(this, ${idJadwal}, ${pertemuan}, ${idMhs}, 2); return false;"
        class="btn btn-xs btn-warning" data-placement="top"
      > Izin </a>
      <a href="#"
        onclick="absen(this, ${idJadwal}, ${pertemuan}, ${idMhs}, 3); return false;"
        class="btn btn-xs btn-danger" data-placement="top"
      > Tidak Ada Keterangan </a>
    `);

    var index = daftarHadir.findIndex(o => o.id_mahasiswa == idMhs);
    if (index !== -1) {
      daftarHadir.splice(index, 1);
    }
  }

  async function simpan(id_jadwal) {
    let base_url = window.location.origin;
    let url = `${base_url}/absensi/save`;

    try {      
      const response = await fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        },
        body: JSON.stringify(daftarHadir),
      })

      console.log(response);

      const body = await response.text();
      console.log(body);

      window.location.replace(`${base_url}/absensi?jadwal=${id_jadwal}`);
    } catch (error) {
      console.log(error);
    }

  }
</script>
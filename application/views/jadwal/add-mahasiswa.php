<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title">Tambah Mahasiswa Ke Jadwal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <!-- button add -->
              <button 
                class="btn bg-navy btn-flat margin" 
                onclick="simpan(<?php echo $id_jadwal ?>); return false;"
              >Simpan</button>

              <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIM</th>
                        <th>NAMA</th>
                        <th>GENDER</th>
                        <th>KELAS</th>
                        <th>ANGKATAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <?php
                    if (!empty($list_mahasiswa)) {                      
                      $no = 1;
                      foreach ($list_mahasiswa->result() as $row) {
                        $row->gender = $row->gender == 'P' ? 'Laki-Laki' : 'Perempuan';
                        echo "<tr>
                              <td>$no</td>
                              <td>$row->nim</td>
                              <td>$row->nama_lengkap</td>
                              <td>$row->gender</td>
                              <td>$row->kd_kelas</td>
                              <td>$row->angkatan</td>
                              <td class='action'>
                                  <a href='#'
                                    onclick='pilihMahasiswa(this, $row->id); return false;'
                                    class='btn btn-xs btn-success' data-placement='top'
                                  >
                                    <i class='fa fa-edit'>Pilih</i>
                                  </a>
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
  let choosen = [];
  function pilihMahasiswa(el, idMhs) {
    $(el).closest('td.action').html(`
      <p>Dipilih</p>
      <a href='#'
        onclick='batalkanMahasiswa(this, ${idMhs}); return false;'
        class='btn btn-xs btn-danger' data-placement='top'
      >Batal</a>
    `);

    console.log(idMhs);
    choosen.push(idMhs);
    console.log(choosen);
  }

  function batalkanMahasiswa(el, idMhs) {
    $(el).closest('td.action').html(`
      <a href='#'
        onclick='pilihMahasiswa(this, ${idMhs}); return false;'
        class='btn btn-xs btn-success' data-placement='top'
      >
        <i class='fa fa-edit'>Pilih</i>
      </a>
    `);

    console.log(idMhs);
    var index = choosen.indexOf(idMhs);
    if (index !== -1) {
      choosen.splice(index, 1);
    }
  }

  async function simpan(id_jadwal) {
    let base_url = window.location.origin;
    let url = `${base_url}/jadwal/add_mahasiswa`;

    let data = {
      'id_jadwal' : id_jadwal,
      'list_mahasiswa': choosen,
    };

    try {      
      const response = await fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
      })

      if (response.status != 200) {
        console.log("Error");
        return;
      }

      window.location.replace(`${base_url}/jadwal/detail/${id_jadwal}`);
    } catch (error) {
      console.log(error);
    }

  }
</script>
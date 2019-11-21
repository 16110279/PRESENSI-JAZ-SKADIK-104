  <?php
    if (validation_errors()) : ?>
      <div class="alert alert-danger" role="alert">
          <?= validation_errors(); ?>
      </div>
  <?php endif; ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


      <div class="card shadow mb-4">

          <div class="card-body">
              <div class="table-responsive">
                  <div class="text-center">
                      <img src="../../assets/img/member/<?= $member['id_member'] . ".jpg" ?>" alt="    Foto " id="avatar" name="avatar" width="175px">
                      <br>
                      <br>
                      <?php echo $member['nama_member']; ?> <br>
                      Jabatan : <?php echo $member['jabatan_member']; ?> <br>
                      Jenis : <?php echo $member['jenis_member']; ?> <br>
                      Status : <?php echo $member['status_member']; ?> <br>
                      Tempat Tanggal Lahir : <?php echo $member['tempat_lahir_member'] . ", " . $member['tgl_lahir_member']; ?> <br>
                      Alamat : <?php echo $member['alamat_member']; ?> <br>
                  </div>
              </div>
          </div>
      </div>

      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Catatan Kunjungan</h6>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <!-- <th scope="col">ID Member</th> -->
                              <th scope="col">Keperluan</th>
                              <th scope="col">Catatan</th>
                              <th scope="col">Masuk</th>
                              <th scope="col">Keluar</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $this->load->model('member_model', 'member'); ?>
                          <?php $rec = $this->member->showRecordbyNama($nama['nama_member']); ?>
                          <?php $i = 1 ?>
                          <?php foreach ($rec as $r) : ?>
                              <tr>
                                  <td> <?= $i;  ?></td>
                                  <td><?= $r['nama_keperluan']; ?></td>
                                  <td><?= $r['catatan']; ?></td>
                                  <td><?= $r['waktu_masuk']; ?></td>
                                  <td><?= $r['waktu_keluar']; ?></td>
                              </tr>
                              <?php $i++; ?>

                          <?php endforeach; ?>

                      </tbody>



                  </table>

              </div>
          </div>
      </div>

  </div>
  <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->
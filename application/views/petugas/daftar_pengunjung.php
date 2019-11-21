   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
       <br>

       <!-- DataTales Example -->
       <div class="card shadow mb-4">
           <!-- Card Header - Dropdown -->
           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <form method="get">
                   <input type="date" name="tanggal" value="<?= $this->input->get('tanggal'); ?>">
                   <input type="submit" class="btn btn-sm btn-primary tombolDaftarPengunjung" value="Tampilkan">
               </form>

               <div class="dropdown no-arrow">


                   <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                   </a>
                   <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                       <a class="dropdown-item" href="<?= base_url('petugas/pengunjung'); ?>">Hari Ini</a>
                   </div>
               </div>
           </div>


           <div class="card-body">
               <div class="table-responsive">
                   <?php
                    if (validation_errors()) : ?>
                       <div class="alert alert-danger" role="alert">
                           <?= validation_errors(); ?>
                       </div>
                   <?php endif; ?>

                   <?=
                        $this->session->flashdata('message');
                    ?>

                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       <thead>
                           <tr>
                               <th scope="col">#</th>
                               <!-- <th scope="col">ID Member</th> -->
                               <th scope="col">Nama</th>
                               <th scope="col">Keperluan</th>
                               <th scope="col">Masuk</th>
                               <th scope="col">Keluar</th>
                               <th scope="col">Action</th>
                           </tr>
                       </thead>
                       <tbody>

                           <?php $i = 1; ?>
                           <?php foreach ($record_pengunjung as $rp) : ?>
                               <tr>
                                   <th scope="row"><?= $i; ?></th>
                                   <!-- <td><?= $rp['id_member']; ?></td> -->
                                   <td><?= $rp['nama_member']; ?></td>
                                   <td><?= $rp['nama_keperluan']; ?></td>
                                   <td><?= $rp['waktu_masuk']; ?></td>
                                   <td><?=
                                                $this->petugas->waktu_keluar($rp['waktu_keluar']); ?></td>
                                   <td>
                                       <div class="dropdown mb-4">
                                           <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                               <i class="fas fa-arrow-right"></i>

                                           </button>
                                           <div class="dropdown-menu animated--fade-in" aria-labell(edby="dropdownMenuButton">
                                               <a class="dropdown-item" href="#">Lihat Detail</a>
                                               <a class="dropdown-item" href="<?= base_url('petugas/keluarkan_record/') . $rp['id'] . ('/') . $rp['waktu_keluar']; ?>" onclick="return confirm('Yakin ?');">Keluar</a>

                                               <a class="dropdown-item" href="#">Edit</a>
                                           </div>
                                       </div>
                                   </td>
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


   <!-- Modal -->
   <!-- <div class="modal fade" id="modalKeperluan" tabindex="-1" role="dialog" aria-labelledby="modalKeperluanLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="modalKeperluanLabel">Add New Menu</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <form action="<?= base_url('petugas/tambahKeperluan'); ?>" method="post">

                       <div class="form-group">
                           <input type="text" class="form-control" id="id_keperluan" name="id_keperluan" placeholder="ID Keperluan" hidden>
                       </div>
                       <div class="form-group">
                           <input type="text" class="form-control" id="nama_keperluan" name="nama_keperluan" placeholder="Keperluan">
                       </div>
                       <div class="form-group">
                           <select name="is_active" id="is_active" class="form-control">
                               <option value="">Select Menu
                               </option>
                               <?php foreach ($status as $s) : ?>
                                   <option value="<?= $s['id']; ?>">
                                       <?= $s['alias']; ?>
                                   <?php endforeach; ?>
                           </select>
                       </div>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                   <button type="submit" class="btn btn-primary">Tambah</button>
               </div>
               </form>
           </div>
       </div>
   </div> -->
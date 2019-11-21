   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
       <br>

       <!-- DataTales Example -->
       <div class="card shadow mb-4">
           <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Daftar Keperluan</h6>
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
                               <th scope="col">Keperluan</th>
                               <th scope="col">Status</th>
                               <th scope="col">Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php $i = 1; ?>
                           <?php foreach ($keperluan as $k) : ?>
                               <tr>
                                   <th scope="row"><?= $i; ?></th>
                                   <td><?= $k['nama_keperluan'] ?></td>
                                   <td><?= $this->public->konversi_status_aktif($k['is_active']); ?></td>
                                   <td>
                                       <button type="button" class="badge badge-success modalUbahKeperluan" data-toggle="modal" data-target="#modalKeperluan" data-id="<?= $k['id_keperluan']; ?>"> Edit </button>
                                       <a href="<?= base_url('menu/hapus/') . $k['id_keperluan']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');">Delete</a>
                                   </td>
                               </tr>
                               <?php $i++; ?>
                           <?php endforeach; ?>


                       </tbody>
                   </table>
               </div>
           </div>
       </div>
       <div class="float-right">
           <button type="button" class="btn btn-primary mb-3 tombolTambahData" data-toggle="modal" data-target="#modalKeperluan">Tambah Keperluan</button>
       </div>
   </div>
   <!-- /.container-fluid -->





   </div>
   <!-- End of Main Content -->


   <!-- Modal -->
   <div class="modal fade" id="modalKeperluan" tabindex="-1" role="dialog" aria-labelledby="modalKeperluanLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="modalKeperluanLabel">Tambah Keperluan</h5>
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
                               <option value="">Pilih Menu
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
   </div>
   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
       <br>

       <!-- DataTales Example -->
       <div class="card shadow mb-4">
           <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Daftar Member</h6>
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
                               <th scope="col">ID</th>
                               <th scope="col">Nama</th>
                               <th scope="col">Jabatan</th>
                               <th scope="col">Status</th>
                               <th scope="col">Jenis</th>
                               <th scope="col">Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php $i = 1; ?>
                           <?php foreach ($member as $sm) : ?>
                               <tr>
                                   <th scope="row"><?= $i; ?></th>
                                   <td><?= $sm['id_member'] ?></td>
                                   <td><?= $sm['nama_member'] ?></td>
                                   <td><?= $sm['jabatan_member'] ?></td>
                                   <td><?= $sm['status_member'] ?></td>
                                   <td><?= $sm['jenis_member'] ?></td>
                                   <td> <a href="<?= base_url('member/detail/') . $sm['id']; ?>" class="badge badge-danger">Lihat</a></td>


                               </tr>
                               <?php $i++; ?>
                           <?php endforeach; ?>

                       </tbody>

                   </table>
               </div>
           </div>
       </div>
       <div class="float-right">

           <a href="" class="btn btn-primary mb-3 buttonTambahSubmenu" data-toggle="modal" data-target="#memberModal"> + </a>
       </div>
   </div>
   <!-- /.container-fluid -->





   </div>
   <!-- End of Main Content -->

   <!-- Modal -->
   <div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="formModalMemberLabel">Tambah Member Baru</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <form action="<?= base_url('menu/tambahSubMenu') ?>" method="post">

                       <div class="form-group">
                           <input type="text" class="form-control" id="id_member" name="id_member" placeholder="ID Member">
                       </div>
                       <div class="form-group">
                           <input type="text" class="form-control" id="nama_member" name="nama_member" placeholder="Nama">
                       </div>
                       <div class="form-group">
                           <input type="text" class="form-control" id="alamat_member" name="alamat_member" placeholder="Alamat">
                       </div>
                       <div class="form-group">
                           <input type="text" class="form-control" id="tempat_lahir_member" name="tempat_lahir_member" placeholder="Tempat Lahir">
                       </div>
                       <div class="form-group">
                           <input type="date" class="form-control" id="tanggal_lahir_member" name="tanggal_lahir_member" placeholder="Tangganl Lahir">
                       </div>
                       <div class="form-group">
                           <select name="jabatan_member" id="jabatan_member" class="form-control">
                               <option value="">Jabatan
                               </option>
                               <?php foreach ($jabatan_member as $jb) : ?>
                                   <option value="<?= $jb; ?>">
                                       <?= $jb; ?>
                                   <?php endforeach; ?>
                           </select>
                       </div>

                       <div class="form-group">
                           <select name="jenis_member" id="jenis_member" class="form-control">
                               <option value="">Jenis
                               </option>
                               <?php foreach ($jenis_member as $jn) : ?>
                                   <option value="<?= $jn; ?>">
                                       <?= $jn; ?>
                                   <?php endforeach; ?>
                           </select>
                       </div>

                       <div class="form-group">
                           <select name="status_member" id="status_member" class="form-control">
                               <option value="">Status
                               </option>
                               <?php foreach ($status_member as $s) : ?>
                                   <option value="<?= $s; ?>">
                                       <?= $s; ?>
                                   <?php endforeach; ?>
                           </select>
                       </div>


               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary">Add</button>
               </div>
               </form>
           </div>
       </div>
   </div>
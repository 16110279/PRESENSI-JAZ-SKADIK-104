   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
       <br>

       <!-- DataTales Example -->
       <div class="card shadow mb-4">
           <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Daftar Submenu</h6>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <?php
                    if (validation_errors()) : ?>
                       <div class="alert alert-danger fade in">
                           <?= validation_errors(); ?>
                       </div>
                   <?php endif; ?>

                   <?=
                        $this->session->flashdata('message');
                    ?>
                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       <thead>
                           <tr>
                               <th>#</th>
                               <th>Username</th>
                               <th>Nama</th>
                               <th>Role</th>
                               <th>Status</th>
                               <th>Action</th>
                           </tr>
                       </thead>

                       <tbody>
                           <tr>
                               <?php $i = 1; ?>
                               <?php foreach ($alluser as $all) : ?>

                                   <td><?= $i; ?></td>
                                   <td><?= $all['username']; ?></td>
                                   <td><?= $all['name']; ?></td>

                                   <td><?= $all['role']; ?></td>
                                   <td><?php
                                            if ($all['is_active'] == 1) {
                                                echo 'Aktif';
                                            }
                                            if ($all['is_active'] == 0) {
                                                echo 'Tidak';
                                            }

                                            ?></td>
                                   <td> <button type="button" class="badge badge-success ubahManageUserModal" data-toggle="modal" data-target="#manageUserModal" data-id="<?= $all['id']; ?>"> Edit </button></td>

                           </tr>
                           <?php $i++; ?>
                       <?php endforeach; ?>

                       </tbody>

                   </table>
               </div>
           </div>
       </div>
       <div class="float-right">

           <a href="" class="btn btn-primary mb-3 buttonTambahSubmenu" data-toggle="modal" data-target="#manageUserModal"> Add New Submenu </a>
       </div>
   </div>
   <!-- /.container-fluid -->





   </div>
   <!-- End of Main Content -->

   <!-- Modal -->
   <div class="modal fade" id="manageUserModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="formModalSubmenuLabel">Buat User Baru</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <form action="<?= base_url('menu/tambahSubMenu') ?>" method="post">

                       <div class="form-group">
                           <input type="text" class="form-control" id="id" name="id" placeholder="ID User" hidden>
                       </div>
                       <div class="form-group">
                           <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                       </div>
                       <div class="form-group">
                           <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                       </div>
                       <div class="form-group">
                           <select name="role" id="role" class="form-control">
                               <option value="">Select Role
                               </option>
                               <?php foreach ($role as $r) : ?>
                                   <option value="<?= $r['id']; ?>">
                                       <?= $r['role']; ?>
                                   <?php endforeach; ?>
                           </select>
                       </div>

                       <div class="form-group">
                           <select name="is_active" id="is_active" class="form-control">
                               <option value="">Status</option>
                               <option value="1">Aktif</option>
                               <option value="0">Tidak Aktif</option>

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
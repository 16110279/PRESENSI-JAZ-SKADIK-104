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
                               <th scope="col">#</th>
                               <th scope="col">Title</th>
                               <th scope="col">Menu</th>
                               <th scope="col">Url</th>
                               <th scope="col">Icon</th>
                               <th scope="col">Active</th>
                               <th scope="col">Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php $i = 1; ?>
                           <?php foreach ($subMenu as $sm) : ?>
                               <tr>
                                   <th scope="row"><?= $i; ?></th>
                                   <td><?= $sm['title'] ?></td>
                                   <td><?= $sm['menu'] ?></td>
                                   <td><?= $sm['url'] ?></td>
                                   <td><?= $sm['icon'] ?></td>
                                   <td><?php
                                            if ($sm['is_active'] == 1) {
                                                echo 'Aktif';
                                            }

                                            if ($sm['is_active'] == 0) {
                                                echo 'Tidak aktif';
                                            }
                                            ?></td>
                                   <td>
                                       <button type="button" class="badge badge-success ubahSubmenuModal" data-toggle="modal" data-target="#newSubMenuModal" data-id="<?= $sm['id']; ?>"> Edit </button>
                                       <a href="<?= base_url('menu/hapusSubmenu/') . $sm['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');">Delete</a>

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

           <a href="" class="btn btn-primary mb-3 buttonTambahSubmenu" data-toggle="modal" data-target="#newSubMenuModal"> Add New Submenu </a>
       </div>
   </div>
   <!-- /.container-fluid -->





   </div>
   <!-- End of Main Content -->

   <!-- Modal -->
   <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="formModalSubmenuLabel">Add New Menu</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <form action="<?= base_url('menu/tambahSubMenu') ?>" method="post">

                       <div class="form-group">
                           <input type="text" class="form-control" id="id" name="id" placeholder="ID Submenu" hidden>
                       </div>
                       <div class="form-group">
                           <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                       </div>
                       <div class="form-group">
                           <select name="menu_id" id="menu_id" class="form-control">
                               <option value="">Select Menu
                               </option>
                               <?php foreach ($menu as $m) : ?>
                                   <option value="<?= $m['id']; ?>">
                                       <?= $m['menu']; ?>
                                   <?php endforeach; ?>
                           </select>
                       </div>
                       <div class="form-group">
                           <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                       </div>
                       <div class="form-group">
                           <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
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
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary">Add</button>
               </div>
               </form>
           </div>
       </div>
   </div>
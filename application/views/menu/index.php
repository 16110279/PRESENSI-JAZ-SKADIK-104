   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
       <br>

       <!-- DataTales Example -->
       <div class="card shadow mb-4">
           <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Daftar Menu</h6>
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
                               <th scope="col">Menu</th>
                               <th scope="col">Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php $i = 1; ?>
                           <?php foreach ($menu as $m) : ?>
                               <tr>
                                   <th scope="row"><?= $i; ?></th>
                                   <td><?= $m['menu'] ?></td>
                                   <td>
                                       <button type="button" class="badge badge-success tampilModalUbah" data-toggle="modal" data-target="#newMenuModal" data-id="<?= $m['id']; ?>"> Edit </button>
                                       <a href="<?= base_url('menu/hapus/') . $m['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');">Delete</a>
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
           <button type="button" class="btn btn-primary mb-3 tombolTambahData" data-toggle="modal" data-target="#newMenuModal"> Add New Menu </button>
       </div>
   </div>
   <!-- /.container-fluid -->





   </div>
   <!-- End of Main Content -->


   <!-- Modal -->
   <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="formModalLabel">Add New Menu</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <form action="<?= base_url('menu/tambah'); ?>" method="post">

                       <div class="form-group">
                           <input type="text" class="form-control" id="id" name="id" placeholder="ID Menu" hidden>
                       </div>
                       <div class="form-group">
                           <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama Menu">
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
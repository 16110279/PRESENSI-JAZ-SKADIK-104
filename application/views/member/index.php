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

   </div>
   <!-- /.container-fluid -->





   </div>
   <!-- End of Main Content -->
<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 hidden"><?= $welcome; ?></h1>
    <!-- Content Row -->
    <?php
    if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <?=
        $this->session->flashdata('message');
    ?>
    <div class="row">




        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Non Member</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="<?= base_url('petugas/'); ?>">Member</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <form action="simpan_record_non" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="id" name="id" placeholder="No KTP">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <select name="keperluan" id="keperluan" class="form-control">
                                    <option value="">Keperluan
                                    </option>
                                    <?php foreach ($keperluan as $k) : ?>
                                        <option value="<?= $k['nama_keperluan']; ?>">
                                            <?= $k['nama_keperluan']; ?>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan"></textarea>
                            </div>

                            <div class="float-right">
                                <div class="form-group">
                                    <input type="submit" value="Simpan" class="btn btn-primary px-5">
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
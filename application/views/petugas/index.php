<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $welcome; ?></h1>
    <!-- Content Row -->
    <?=
        $this->session->flashdata('message');
    ?>
    <div class="row">


        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Member Area</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="<?= base_url('petugas/non_member'); ?>">Non Member</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <form action="simpan_record" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="id_member" name="id_member" placeholder="ID Member">
                            </div>
                            <div class="form-group">
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" hidden>
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
                                    <input type="submit" value="Simpan" class="btn btn-primary px-5 ">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->


        <div class="card col-4 shadow mb-4">

            <div class="card-body">
                <!-- Card Body -->
                <div class="chart-area">

                    <div class="text-center">
                        <img src="<?= 'assets/img/profile/default.jpg'; ?>" alt="    Foto " id="avatar" name="avatar" width="175px">
                    </div>
                    <br>
                    <div class="text-center">
                        <p id="location" name="location">Nama</p>
                        <p id="jenis" name="jenis">Jenis</p>
                        <p id="jabatan" name="jabatan">Jabatan</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url('assets/'); ?>js/jquery.js"></script>
<script>
    console.log('a');

    $(document).ready(function() {
        $('#id_member').on('input', function() {

            var id_member = $(this).val();
            $.ajax({
                type: "POST",
                url: "http://localhost/jaz/petugas/get_barang",
                dataType: "JSON",
                data: {
                    id_member: id_member
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(id_member, nama_member, alamat_member, foto_member) {

                        $('[name="nama"]').val(data.nama_member);
                        $('[name="location"]').text(data.nama_member);
                        $('[name="jenis"]').text(data.jenis_member);
                        $('[name="jabatan"]').text(data.jabatan_member);
                        $('[name="avatar"]').attr('src', data.foto_member);


                    });

                    console.log(data);

                }
            });
            return false;
        });

    });
</script>
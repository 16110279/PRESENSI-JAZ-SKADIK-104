<?php
	include 'class_lib.php';
    include 'koneksi.php';
    
    $nopol = $_POST['nopol'];
  //  $jenis = $_POST['jenis'];
    $SWDKLLJ = $_POST['SWDKLLJ'];
    $PKB = $_POST['PKB'];
    $berlakusampai = $_POST['berlakusampai'];


    echo $nopol;
    echo "<br>";
  //  echo $jenis;
    echo "<br>";
    echo $SWDKLLJ;
    echo "<br>";
    echo $PKB;
    echo "<br>";
    echo $berlakusampai;

    $ekstensi_diperbolehkan	= array('png','jpg','pdf');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];	

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070){			
            move_uploaded_file($file_tmp, 'file/'.$nama);
            $query = mysqli_query($koneksi,"update kendaraan set berkas_kendaraan='$nama' where no_polisi_kendaraan='$nopol'");
            if($query){
                echo 'FILE BERHASIL DI UPLOAD';
            }else{
                echo 'GAGAL MENGUPLOAD GAMBAR';
            }
        }else{
            echo 'UKURAN FILE TERLALU BESAR';
        }
    }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }




    $kendaraan_tony =  new kendaraan;
    $kendaraan_tony->set_id_pemilik(1);
    $kendaraan_tony->info_pemilik($koneksi);
    $kendaraan_tony->set_nopol("G 3761 SC");
    $kendaraan_tony->set_jenis("SEPEDA MOTOR");
    $kendaraan_tony->set_berlakusampai("2017-12-3");
    $kendaraan_tony->set_SWDKLLJ(130000);
    $kendaraan_tony->set_PKB(40000);
//	$kendaraan_tony->hitung_telat();
 //   $kendaraan_tony->show();
//		$kendaraan_tony->simpan_ke_database($koneksi);
    echo "<br>";


    ?>

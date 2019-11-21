<?php
include 'koneksi.php';
$id = $_GET['idmember'];
$query = mysqli_query($koneksi, "select * from member where id_member='$id'");
$mahasiswa = mysqli_fetch_array($query);
$data = array(
    'nama'      =>  $mahasiswa['nama_member'],
    'foto'   =>  $mahasiswa['id_member'] . ".jpg"
);
echo json_encode($data);

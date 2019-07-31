<?php
include 'koneksi.php';
include 'class_lib.php';


?>

<!DOCTYPE html>
<html>
<head>
	<title>Show</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
	
 
</head>
<body>


	<center><h2>
	<br>
	
	<?php
	$query = "select * from pemilik where id_pemilik=1";
	$sql = mysqli_query($koneksi, $query);
	while($row = mysqli_fetch_array($sql))
	{
		echo "Nama pemilik : " .$row['nama_pemilik'];
	}
	?>
	</h2>
	</center>
	
	
	<br>

		<form>
		<table class="table table-hover">
		  <thead class="thead">
			<tr>
				<th>#</th>
				<th>Jenis</th>
				<th>No Polisi</th>
				<th>Pajak</th>
				</td>
			</tr>
		</thead>

		<?php
			$nomer = 1;
			$sql = mysqli_query($koneksi,"select * from kendaraan where id_pemilik='1'");
			while ($arow = mysqli_fetch_array($sql)) {

		?>

		<tbody>
			<tr>
				<td><?php echo $nomer++; ?></td>
				<td><?php echo $arow['jenis_kendaraan']; ?></td>
				<td><?php echo $arow['no_polisi_kendaraan']; ?></td>
				<td><?php echo $arow['totalpajak_kendaraan']; ?></td>
				
			</tr>

		</tbody>
		<?php
	}
		?>
        		</table>

		</form>		

	</div>

<center>
<?php

$new_info_umum = new info_umum_from_db;
echo "Total pajak yang harus dibayarkan : Rp. " .$new_info_umum->total_pajak();


?>
</center>


<a href="print.php" target="_BLANK">TES PRINT</a>


</body>
</html>
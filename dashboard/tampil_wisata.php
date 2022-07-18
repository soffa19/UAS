<?php
  // periksa apakah user sudah login, cek kehadiran session name
  // jika tidak ada, redirect ke login.php
  session_start();
  if (!isset($_SESSION["nama"])) {
     header("Location: login.php");
  }
?>

<?php
//memasukkan file connection.php
include('../connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container" style="margin-top:20px">
		<center><font size="6">Data Wisata</font></center>
		<hr>
		<a href="index.php?page=tambah_wisata"><button class="btn btn-dark right">Tambah Data Wisata</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>ID Wisata</th>
					<th>Nama Wisata</th>
					<th>Deskripsi</th>
					<th>Gambar</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel wisata urut berdasarkan id yang paling kecil
				$sql = mysqli_query($koneksi, "SELECT * FROM wisata ORDER BY id_wisata ASC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['id_wisata'].'</td>
							<td>'.$data['nama_wisata'].'</td>
							<td>'.$data['deskripsi'].'</td>
							<td>'.$data['gambar'].'</td>
							<td>
								<a href="index.php?page=edit_wisata&id_wisata='.$data['id_wisata'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="index.php?page=delete_wisata&id_wisata='.$data['id_wisata'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
  				// tutup koneksi dengan database mysql
 				mysqli_close($koneksi);
				?>
			<tbody>
		</table>
		</div>
	</div>
</body>
</html>


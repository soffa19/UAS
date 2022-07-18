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
		<center><font size="6">Tambah Data Wisata</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Idw		 = $_POST['id_wisata'];
			$Nama_Wisata = $_POST['nama_wisata'];
			$Deskripsi	 = $_POST['deskripsi'];
			$error = $_FILES["file_upload"]["error"];
			$cek = mysqli_query($koneksi, "SELECT * FROM wisata WHERE id_wisata='$Idw'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0 || $error != 0){
				$nama_folder="images";
				$tmp = $_FILES["gambar"]["tmp_name"];
				$Gambar = $_FILES["gambar"]["name"];
				move_uploaded_file($tmp, "$nama_folder/$Gambar");
				$sql = mysqli_query($koneksi, "INSERT INTO wisata (id_wisata, nama_wisata, deskripsi, gambar) 
				VALUES ('$Idw', '$Nama_Wisata', '$Deskripsi', '$Gambar')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_wisata";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, ID sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_wisata" method="post" enctype="multipart/form-data">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID Wisata</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="id_wisata" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Wisata</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_wisata" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi</label>
				<div class="col-md-6 col-sm-6 ">
					<textarea name="deskripsi" rows="8" class="form-control" required></textarea>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Gambar</label>
				<div class="col-md-6 col-sm-6">
					<input type="file" name="gambar" class="form-control-file" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
</body>
</html>
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
		<center><font size="6">Edit Data Wisata</font></center>
		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_wisata'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$Idw = $_GET['id_wisata'];

			//query ke database SELECT tabel wisata berdasarkan id
			$select = mysqli_query($koneksi, "SELECT * FROM wisata WHERE id_wisata='$Idw'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$Nama_Wisata = $_POST['nama_wisata'];
			$Deskripsi	 = $_POST['deskripsi'];
			$nama_folder="images";
			$tmp = $_FILES["gambar"]["tmp_name"];
			$Gambar = $_FILES["gambar"]["name"];

			move_uploaded_file($tmp, "$nama_folder/$Gambar");
			$sql = mysqli_query($koneksi, "UPDATE wisata SET nama_wisata='$Nama_Wisata', deskripsi='$Deskripsi', gambar='$Gambar' WHERE id_wisata='$Idw'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_wisata";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_wisata&id_wisata=<?php echo $Idw; ?>" method="post"  enctype="multipart/form-data">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID Wisata</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id_wisata" class="form-control" value="<?php echo $data['id_wisata']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Wisata</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_wisata" class="form-control" value="<?php echo $data['nama_wisata']; ?>" required>
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
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_wisata" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
</body>
</html>

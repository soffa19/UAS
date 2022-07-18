<?php
  // periksa apakah user sudah login, cek kehadiran session name
  // jika tidak ada, redirect ke login.php
  session_start();
  if (!isset($_SESSION["nama"])) {
     header("Location: login.php");
  }
?>

<?php
//include file connection.php
include('../connection.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['id_wisata'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$Idw = $_GET['id_wisata'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM wisata WHERE id_wisata='$Idw'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		unlink("images/".mysqli_fetch_array($cek)['gambar']);
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM wisata WHERE id_wisata='$Idw'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=tampil_wisata";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=tampil_wisata";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php?page=tampil_wisata";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php?page=tampil_wisata";</script>';
}

// tutup koneksi dengan database mysql
mysqli_close($koneksi);
?>
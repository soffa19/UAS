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

//jika benar mendapatkan GET username dari URL
if(isset($_GET['username'])){
	//membuat variabel $username yang menyimpan nilai dari $_GET['username']
	$username= $_GET['username'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki username yang sama dengan variabel $username
	$cek = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi username=$username
		$del = mysqli_query($koneksi, "DELETE FROM admin WHERE username='$username'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=tampil_user";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=tampil_user";</script>';
		}
	}else{
		echo '<script>alert("Username tidak ditemukan di database."); document.location="index.php?page=tampil_user";</script>';
	}
}else{
	echo '<script>alert("Username tidak ditemukan di database."); document.location="index.php?page=tampil_user";</script>';
}

// tutup koneksi dengan database mysql
mysqli_close($koneksi);
?>


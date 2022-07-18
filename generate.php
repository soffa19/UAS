<?php
  // buat koneksi dengan database mysql
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $koneksi   = mysqli_connect($dbhost,$dbuser,$dbpass);

  //periksa koneksi, tampilkan pesan kesalahan jika gagal
  if(!$koneksi){
    die ("Koneksi dengan database gagal: ".mysqli_connect_errno().
         " - ".mysqli_connect_error());
  }

  //buat database kuningankab jika belum ada
  $query = "CREATE DATABASE IF NOT EXISTS kuningankab";
  $result = mysqli_query($koneksi, $query);

  if(!$result){
    die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
  }
  else {
    echo "Database <b>'kuningankab'</b> berhasil dibuat... <br>";
  }

  //pilih database kuningankab
  $result = mysqli_select_db($koneksi, "kuningankab");

  if(!$result){
    die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
  }
  else {
    echo "Database <b>'kuningankab'</b> berhasil dipilih... <br>";
  }

// cek apakah tabel admin sudah ada. jika ada, hapus tabel
  $query = "DROP TABLE IF EXISTS admin";
  $hasil_query = mysqli_query($koneksi, $query);

  if(!$hasil_query){
    die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
  }
  else {
    echo "Tabel <b>'admin'</b> berhasil dihapus... <br>";
  }

  // buat query untuk CREATE tabel admin
  $query  = "CREATE TABLE admin (id INT(5) AUTO_INCREMENT, username VARCHAR(50), password CHAR(40), PRIMARY KEY (id))";
  $hasil_query = mysqli_query($koneksi, $query);

  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
  }
  else {
    echo "Tabel <b>'admin'</b> berhasil dibuat... <br>";
  }

  // buat username dan password untuk admin
  $username = "admin";
  $password = sha1("kuningan123");

  // buat query untuk INSERT data ke tabel admin
  $query  = "INSERT INTO admin VALUES ('','$username','$password')";

  $hasil_query = mysqli_query($koneksi, $query);

  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
  }
  else {
    echo "Tabel <b>'admin'</b> berhasil diisi... <br>";
  }

  
  // cek apakah tabel wisata sudah ada. jika ada, hapus tabel
  $query = "DROP TABLE IF EXISTS wisata";
  $hasil_query = mysqli_query($koneksi, $query);

  if(!$hasil_query){
    die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
  }
  else {
    echo "Tabel <b>'wisata'</b> berhasil dihapus... <br>";
  }

  // buat query untuk CREATE tabel wisata
  $query  = "CREATE TABLE wisata (id_wisata CHAR(10), nama_wisata VARCHAR(50), ";
  $query .= "deskripsi VARCHAR(500), gambar VARCHAR(50), PRIMARY KEY (id_wisata))";

  $hasil_query = mysqli_query($koneksi, $query);

  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
  }
  else {
    echo "Tabel <b>'wisata'</b> berhasil dibuat... <br>";
  }

  // buat query untuk INSERT data ke tabel wisata
  $query  = "INSERT INTO wisata VALUES ";
  $query .= "('190101', 'LINGGARJATI INDAH', 'Linggarjati indah adalah salah satu tempat rekreasi keluarga yang terletak di Desa Linggarjati, Kecamatan Cilimus berjarak  ± 14km dari kota Kuningan kearah utara, atau ± 26km dari kota Cirebon kearah Selatan. Areal wisata seluas ± 11,5ha ini terbagi menjadi kolam renang anak dan dewasa standar nasional, kolam renang, kolam pemancingan, villa, area outbond, dan wahana permainan anak-anak.', '190101.jpg'), ";
  $query .= "('190102', 'BUMI PERKEMAHAN PALUTUNGAN', 'Bumi perkemahan (Buper) Palutunngan terletak di kawasan Gunung Ciremai, tepatnya didusun Malaram, Desa Cisantana, Kecmatan Cigugur, dengan jarak 9km dari kota Kuningan kearah Barat. Letak areal yang berada di kawasan pegunungan memberikan keistimewaan bagi Buper Palutungan yaitu udara yang sejuk, segar dan air yang jernih sehingga cocok untuk berkemah atau hikig. Sekitar Buper Palutungan terdapat Curug Ciputri dan Curug Landung yang menyajikan keindahan air terjun alami.', '190102.jpg'), ";
  $query .= "('190103', 'SANGKANHURIP ALAM', 'Tempat  pemandian ini terletak dikawasan wisata sehingga dapat dijangkau dari hotel-hotel yang ada diwilayah desa Sangkanhurip Kecamatan Cigandamekar, termasuk hotel-hotel yang memilih fasilitas SPA. Disekitar lokasi terdapat Restoran yang menyajikan menu khas yaitu ikan bakar, kios jajanan, dan dilengkapi pasilitas parkir yang memadai.', '190103.jpg'), ";
  $query .= "('190104', 'KOLAM IKAN CIGUGUR', 'Kolam ikan cigugur terletak dikelurahan Cigugur ± 3km dari kota kuningan kearah Barat dan terletak dipinggir jalan raya Cirebon-Kuningan-Ciamis. Fasilitas yang tersedia adalah kolam renag dewasa dan anak-anak, kios jajanan, mushola dan areal parkir. Saat ini, dikolam cigugur pengunjung bisa menikmati terapi ikan yang bisa dilakukan sambil duduk santai selama 20 menit. Terapi ini dipercaya bisa melancarkan peredaran darah.', '190104.jpg'), ";
  $query .= "('190105', 'TIRTA AGUNG MAS', 'Wahana olahraga dan Rekreasi keluarga Tirta Agung Mas Luragung-Kuningan dengan jarak tempuh ±30kms Kearah Timur dari Kota kuningan. Sebuah objek dan daya tarik wisata yang menawarkan berbagai atraksi wisata menarik seperti ATF, arena outbond yang lengkap, kolam renang standar Nasioal, fitnes center, kolam pemancingan, rumah makan serta sarana anak yang dilengkapi oleh waterboom yang aman dan menarrik untuk dikunjungi.', '190105.jpg')";

  $hasil_query = mysqli_query($koneksi, $query);

  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
  }
  else {
    echo "Tabel <b>'wisata'</b> berhasil diisi... <br>";
  }

  // tutup koneksi dengan database mysql
  mysqli_close($koneksi);
?>

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 05:42 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuningankab`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '63a50e3d5548503a2ad7ba1c8290c70a29446e01');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` char(10) NOT NULL,
  `nama_wisata` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama_wisata`, `deskripsi`, `gambar`) VALUES
('190101', 'LINGGARJATI INDAH', 'Linggarjati indah adalah salah satu tempat rekreasi keluarga yang terletak di Desa Linggarjati, Kecamatan Cilimus berjarak  Â± 14km dari kota Kuningan kearah utara, atau Â± 26km dari kota Cirebon kearah Selatan. Areal wisata seluas Â± 11,5ha ini terbagi menjadi kolam renang anak dan dewasa standar nasional, kolam renang, kolam pemancingan, villa, area outbond, dan wahana permainan anak-anak.', '190101.jpg'),
('190102', 'BUMI PERKEMAHAN PALUTUNGAN', 'Bumi perkemahan (Buper) Palutunngan terletak di kawasan Gunung Ciremai, tepatnya didusun Malaram, Desa Cisantana, Kecmatan Cigugur, dengan jarak 9km dari kota Kuningan kearah Barat. Letak areal yang berada di kawasan pegunungan memberikan keistimewaan bagi Buper Palutungan yaitu udara yang sejuk, segar dan air yang jernih sehingga cocok untuk berkemah atau hikig. Sekitar Buper Palutungan terdapat Curug Ciputri dan Curug Landung yang menyajikan keindahan air terjun alami.', '190102.jpg'),
('190103', 'SANGKANHURIP ALAM', 'Tempat  pemandian ini terletak dikawasan wisata sehingga dapat dijangkau dari hotel-hotel yang ada diwilayah desa Sangkanhurip Kecamatan Cigandamekar, termasuk hotel-hotel yang memilih fasilitas SPA. Disekitar lokasi terdapat Restoran yang menyajikan menu khas yaitu ikan bakar, kios jajanan, dan dilengkapi pasilitas parkir yang memadai.', '190103.jpg'),
('190104', 'KOLAM IKAN CIGUGUR', 'Kolam ikan cigugur terletak dikelurahan Cigugur Â± 3km dari kota kuningan kearah Barat dan terletak dipinggir jalan raya Cirebon-Kuningan-Ciamis. Fasilitas yang tersedia adalah kolam renag dewasa dan anak-anak, kios jajanan, mushola dan areal parkir. Saat ini, dikolam cigugur pengunjung bisa menikmati terapi ikan yang bisa dilakukan sambil duduk santai selama 20 menit. Terapi ini dipercaya bisa melancarkan peredaran darah.', '190104.jpg'),
('190105', 'TIRTA AGUNG MAS', 'Wahana olahraga dan Rekreasi keluarga Tirta Agung Mas Luragung-Kuningan dengan jarak tempuh Â±30kms Kearah Timur dari Kota kuningan. Sebuah objek dan daya tarik wisata yang menawarkan berbagai atraksi wisata menarik seperti ATF, arena outbond yang lengkap, kolam renang standar Nasioal, fitnes center, kolam pemancingan, rumah makan serta sarana anak yang dilengkapi oleh waterboom yang aman dan menarrik untuk dikunjungi.', '190105.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

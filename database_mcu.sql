-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2024 pada 10.44
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--
CREATE DATABASE IF NOT EXISTS `akademik` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `akademik`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` varchar(15) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `JKel` varchar(10) NOT NULL,
  `Alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Nama`, `JKel`, `Alamat`) VALUES
('012345', 'SUPARMIN', 'L', 'REMBANG'),
('012346', 'BIBI', 'P', 'JEMBER'),
('012347', 'CHOLIS', 'L', 'BLITAR'),
('012348', 'AGIS', 'L', 'TRENGGALEK');
--
-- Database: `data_pasien`
--
CREATE DATABASE IF NOT EXISTS `data_pasien` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `data_pasien`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pasien`
--

CREATE TABLE `data_pasien` (
  `nik` int(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lhr` varchar(25) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `alamat` text NOT NULL,
  `status_pernikahan` tinyint(1) NOT NULL,
  `agama` tinyint(1) NOT NULL,
  `pedidikan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD PRIMARY KEY (`nik`);
--
-- Database: `db_puskesmas`
--
CREATE DATABASE IF NOT EXISTS `db_puskesmas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_puskesmas`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`id`, `nama`, `alamat`, `no_telp`) VALUES
(4, 'PARMIN', 'REMBANG', '081112233'),
(5, 'AGISTRA', 'TRENGGALEK', '082334455'),
(6, 'CHOLIS', 'BLITAR', '085334455'),
(7, 'CAHYA', 'LAMONGAN', '098989898'),
(9, 'BAROT', 'PEKOLONGAN', '081223348'),
(10, 'CHERLIN', 'KUPANG', '08766555');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Database: `latihanjavadatabase`
--
CREATE DATABASE IF NOT EXISTS `latihanjavadatabase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `latihanjavadatabase`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jabatan` varchar(40) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `no_tlp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `jabatan`, `alamat`, `email`, `no_tlp`) VALUES
('123456688', 'akulina', 'PJ Pelaporan ', 'kupang NTT', 'inna@gmail.com', '08124669267'),
('12345673', 'ain', 'Penanggung Jawab Pendaftaran', 'makasar', 'ain@yahoo.com', '08977777'),
('123456782', 'dinda', 'PJ Pendaftaran', 'jember jawa timur', 'dinda@gmail.com', '087111111'),
('3315333333333', 'cherlin', 'Penanggung Jawab Pendaftaran', 'kupang ', 'cherlin@gmail.com', '08988888888'),
('331709010878002', 'm mubarot isa', 'Pelaksana', 'ds wiradesa pekalongan', 'barot@yahoo.com', '08122321233xx'),
('537122333', 'akulina', 'Penanggung Jawab Pendaftaran', 'kupang NTT', 'ina@gmail.com', '081246669267');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('suparmin', 'suparmin'),
('akulina', 'akulina'),
('amalia', 'amalia'),
('akulina', 'akulina'),
('nurfitri', 'nurfitri'),
('cherlyn', 'cherlyn');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);
--
-- Database: `mcu`
--
CREATE DATABASE IF NOT EXISTS `mcu` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mcu`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar`
--

CREATE TABLE `daftar` (
  `id` int(8) NOT NULL,
  `ktp` varchar(20) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `kawin` varchar(20) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `hp` varchar(18) NOT NULL,
  `reg` varchar(20) NOT NULL,
  `reservasi` date NOT NULL,
  `tgl_mcu` date NOT NULL,
  `namapaket` varchar(20) NOT NULL,
  `bayar` varchar(20) NOT NULL,
  `perusahaan` varchar(150) NOT NULL,
  `aprove` varchar(2) NOT NULL,
  `pendaftar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar`
--

INSERT INTO `daftar` (`id`, `ktp`, `user_name`, `tgl_lahir`, `kelamin`, `agama`, `kawin`, `pekerjaan`, `alamat`, `hp`, `reg`, `reservasi`, `tgl_mcu`, `namapaket`, `bayar`, `perusahaan`, `aprove`, `pendaftar`) VALUES
(1, '123456789023', 'Puji Riyanto', '1993-06-06', 'laki-laki', 'islam', 'kawin', 'pns', 'jakarta', '085733551998', 'REG20230704000001', '2004-07-23', '2023-07-06', 'mcu dasar I', 'perusahaan', '', '0', ''),
(2, '19990823456001', 'Nur Cholis Abdulrohman', '1999-09-09', 'laki-laki', 'islam', 'belum kawin', 'ikut ortu', 'blitar', '085727009030', 'REG20230704000002', '2004-07-23', '2023-07-10', 'mcu dasar IV', 'perusahaan', '', '0', ''),
(3, '19780808002001', 'Dwi Nur Setyowati', '1978-08-08', 'perempuan', 'islam', 'kawin', 'pns', 'pati', '081359191356', 'REG20230704000003', '2004-07-23', '2023-07-09', 'Pemeriksaan jantung', 'asuransi', '', '0', ''),
(4, '33170108781011', 'suparmin', '1978-08-01', 'laki-laki', 'islam', 'kawin', 'PNS', 'ds wiroto rt 04 rw 02 kec kaliori kab rembang', '082327670229', 'REG20240104000001', '2004-01-24', '2024-01-05', 'kesehatan jiwa', 'bayar sendiri', '', '0', ''),
(5, '3317142809770002', 'Muhammad Luthfi  Thomafi', '1977-09-28', 'laki-laki', 'islam', 'kawin', 'PNS', 'ds.Ngeplak , Kec. Lasem Kab. Rembang Jawa Tengah', '08132767119', 'REG20240126000004', '2024-01-26', '2024-01-29', 'mcu dasar I', 'bayar sendiri', '-', '-', 'Muhammad'),
(6, '53453254325454444', 'nur cholis', '2024-01-25', 'perempuan', 'Kristen ', 'belum kawin', 'Wiraswasta', 'rewtrtrewterwt', '54354325435', 'REG20240128000005', '2024-01-28', '2024-01-31', 'mcu dasar III', 'bayar sendiri', '-', '-', 'Muhammad'),
(7, '3317091017820002', 'Dewi Setiawati', '1982-10-17', 'perempuan', 'islam', 'kawin', 'PNS', 'Desa Wiroto 04/02 Kec Kaliori Kab Rembang', '085225933547', 'REG20240129000006', '2024-01-29', '2024-01-30', 'mcu dasar I', 'bayar sendiri', '-', '-', 'Dewi'),
(8, '3317091017820002', 'Dewi Setiawati', '1982-10-17', 'perempuan', 'islam', 'kawin', 'PNS', 'Desa Wiroto 04/02 Kec Kaliori Kab Rembang', '085225933547', 'REG20240129000007', '2024-01-29', '2024-01-31', 'mcu dasar II', 'perusahaan', '-', '-', 'Dewi'),
(9, '33181811830001', 'dewa bujana', '1983-11-18', 'laki-laki', 'islam', 'kawin', 'belum kerja', 'ds maguan 01/02 kec kaliori kab rembang', '08139999222', 'REG20240129000008', '2024-01-29', '2024-01-30', 'Pemeriksaan jantung', 'perusahaan', 'PT holimina', '-', 'Dewi'),
(10, '33170109880001', 'agus budiman', '1988-09-01', 'laki-laki', 'islam', 'kawin', 'Karyawan Swasta', 'de meteseh 02/02 kec kaliori kab rembang', '08222334455', 'REG20240129000009', '2024-01-29', '2024-01-30', 'Pemeriksaan jantung', 'perusahaan', 'pt holimina', '-', 'Dewi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id` int(8) NOT NULL,
  `kodedokter` varchar(20) NOT NULL,
  `namadokter` varchar(250) NOT NULL,
  `spesialis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id`, `kodedokter`, `namadokter`, `spesialis`) VALUES
(2, '1', 'dr.Mulyadi Subarjo,Sp.P', 'Spesialis Paru'),
(3, '2', 'dr.Hang Gunawan A.Sp.KJ', 'Spesialis Kejiwaan'),
(4, '3', 'dr. Titis Hadiati,Sp.KJ', 'Spesialis Kejiwaan'),
(5, '4', 'dr.Ayu Mekar Sumila Sp.KJ', 'Spesialis Kejiwaan'),
(6, '5', 'dr. Dina Wimala Sp.KJ', 'Spesialis Kejiwaan'),
(7, '6', 'dr.Syamsul Huda', 'Umum'),
(8, '7', 'dr. Faris Wahyu Nugroho,Sp.Jp', 'Spesialis jantung'),
(9, '8', 'dr. Eka Prasetya Budi,Sp.Jp', 'Spesialis jantung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_mcu`
--

CREATE TABLE `paket_mcu` (
  `id` int(8) NOT NULL,
  `kodepaket` varchar(8) NOT NULL,
  `namapaket` varchar(200) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket_mcu`
--

INSERT INTO `paket_mcu` (`id`, `kodepaket`, `namapaket`, `harga`) VALUES
(1, 'MCU01', 'mcu dasar I', '96550'),
(2, 'MCU02', 'mcu dasar II', '306850'),
(3, 'MCU03', 'mcu dasar III', '418000'),
(4, 'MCU04', 'mcu dasar IV', '448000'),
(5, 'MCU05', 'Pemeriksaan Paru', '633000'),
(6, 'MCU06', 'Pemeriksaan jantung', '1007850'),
(7, 'MCU07', 'kesehatan jiwa', '731000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(8) NOT NULL,
  `ktp` varchar(20) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `user_status` int(11) NOT NULL,
  `hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `ktp`, `user_name`, `username`, `user_password`, `level`, `user_status`, `hp`) VALUES
(3, '', 'suparmin', 'suparmin', '1234', 'super admin', 1, ''),
(4, '', 'Mubarot Isa', 'barot', '1234', 'operator', 1, ''),
(12, '3317142809770002', 'Muhammad Luthfi  Thomafi', 'baba', '1234', 'pengunjung', 1, '08132767119'),
(13, '0000000000', 'nur cholis', 'nur', '1234', 'kepala rm', 1, '09875'),
(14, '3317091017820002', 'Dewi Setiawati', 'dewi', '1234', 'pengunjung', 1, '085225933547');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periksa`
--

CREATE TABLE `periksa` (
  `id` int(8) NOT NULL,
  `kodepaket` varchar(8) NOT NULL,
  `namapaket` varchar(50) NOT NULL,
  `layanan` varchar(500) NOT NULL,
  `harga` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `periksa`
--

INSERT INTO `periksa` (`id`, `kodepaket`, `namapaket`, `layanan`, `harga`) VALUES
(1, 'MCU01', 'mcu dasar I', 'Pemeriksaan dokter umum', 24000),
(2, 'MCU01', 'mcu dasar I', 'Hematologi Rutin', 44500),
(3, 'MCU01', 'mcu dasar I', 'Urin Rutin', 19400),
(4, 'MCU01', 'mcu dasar I', 'Administrasi', 8650),
(5, 'MCU02', 'mcu dasar II', 'Pemeriksaan dokter umum', 24000),
(6, 'MCU02', 'mcu dasar II', 'Hematologi Rutin', 44500),
(7, 'MCU02', 'mcu dasar II', 'Urin Rutin', 19400),
(8, 'MCU02', 'mcu dasar II', 'GDP', 19500),
(9, 'MCU02', 'mcu dasar II', 'Pemeriksaan Lemak (HDL, LDL,CHOL total, TG)', 164800),
(10, 'MCU02', 'mcu dasar II', 'Asam Urat', 26000),
(11, 'MCU02', 'mcu dasar II', 'Administrasi', 8650),
(12, 'MCU03', 'mcu dasar III', 'Pemeriksaan dokter umum', 24000),
(13, 'MCU03', 'mcu dasar III', 'Hematologi Lengkap', 49650),
(14, 'MCU03', 'mcu dasar III', 'Urin Rutin', 19400),
(15, 'MCU03', 'mcu dasar III', 'GDP', 19500),
(16, 'MCU03', 'mcu dasar III', 'Analisa Lemak (HDL, LDL,CHOL total, TG)', 164800),
(17, 'MCU03', 'mcu dasar III', 'Asam Urat', 26000),
(18, 'MCU03', 'mcu dasar III', 'Rongen thorax', 106000),
(19, 'MCU03', 'mcu dasar III', 'Administrasi', 8650),
(20, 'MCU04', 'mcu dasar IV', 'Pemeriksaan dokter umum', 24000),
(21, 'MCU04', 'mcu dasar IV', 'Hematologi Lengkap', 49650),
(22, 'MCU04', 'mcu dasar IV', 'Urin Rutin', 19400),
(23, 'MCU04', 'mcu dasar IV', 'GDP', 19500),
(24, 'MCU04', 'mcu dasar IV', 'Analisa Lemak (HDL, LDL,CHOL total, TG)', 164800),
(25, 'MCU04', 'mcu dasar IV', 'Asam Urat', 26000),
(26, 'MCU04', 'mcu dasar IV', 'Rongen thorax', 106000),
(27, 'MCU04', 'mcu dasar IV', 'EKG Jantung', 30000),
(28, 'MCU04', 'mcu dasar IV', 'Administrasi', 8650),
(29, 'MCU05', 'Pemeriksaan Paru', 'Pemeriksaan dokter umum', 24000),
(30, 'MCU05', 'Pemeriksaan Paru', 'Pemeriksaan dokter Spesialis Paru', 34000),
(31, 'MCU05', 'Pemeriksaan Paru', 'Hematologi Lengkap', 49650),
(32, 'MCU05', 'Pemeriksaan Paru', 'Urin Rutin', 19400),
(33, 'MCU05', 'Pemeriksaan Paru', 'GDP', 19500),
(34, 'MCU05', 'Pemeriksaan Paru', 'Analisa Lemak (HDL, LDL,CHOL total, TG)', 164800),
(35, 'MCU05', 'Pemeriksaan Paru', 'Ureum', 21400),
(36, 'MCU05', 'Pemeriksaan Paru', 'Creatinin', 21400),
(37, 'MCU05', 'Pemeriksaan Paru', 'SGOT', 21900),
(38, 'MCU05', 'Pemeriksaan Paru', 'SGPT', 21900),
(39, 'MCU05', 'Pemeriksaan Paru', 'Asam Urat', 26000),
(40, 'MCU05', 'Pemeriksaan Paru', 'HbSHg', 33000),
(41, 'MCU05', 'Pemeriksaan Paru', 'Rongen thorax', 106000),
(42, 'MCU05', 'Pemeriksaan Paru', 'BTA', 31400),
(43, 'MCU05', 'Pemeriksaan Paru', 'Spirometri', 30000),
(44, 'MCU05', 'Pemeriksaan Paru', 'Administrasi', 8650),
(45, 'MCU06', 'Pemeriksaan jantung', 'Pemeriksaan dokter umum', 24000),
(46, 'MCU06', 'Pemeriksaan jantung', 'Pemeriksaan dokter Spesialis Jantung', 34000),
(47, 'MCU06', 'Pemeriksaan jantung', 'Hematologi Lengkap', 49650),
(48, 'MCU06', 'Pemeriksaan jantung', 'Urin Rutin', 19400),
(49, 'MCU06', 'Pemeriksaan jantung', 'GDP', 19500),
(50, 'MCU06', 'Pemeriksaan jantung', 'Analisa Lemak (HDL, LDL,CHOL total, TG)', 164800),
(51, 'MCU06', 'Pemeriksaan jantung', 'Ureum', 24000),
(52, 'MCU06', 'Pemeriksaan jantung', 'Creatinin', 21400),
(53, 'MCU06', 'Pemeriksaan jantung', 'SGOT', 21900),
(54, 'MCU06', 'Pemeriksaan jantung', 'SGPT', 21900),
(55, 'MCU06', 'Pemeriksaan jantung', 'Asam Urat', 26000),
(56, 'MCU06', 'Pemeriksaan jantung', 'HbSHg', 33000),
(57, 'MCU06', 'Pemeriksaan jantung', 'Rongen thorax', 106000),
(58, 'MCU06', 'Pemeriksaan jantung', 'EKG Jantung', 40000),
(59, 'MCU06', 'Pemeriksaan jantung', 'Echo Cardiografi', 245000),
(60, 'MCU06', 'Pemeriksaan jantung', 'Troponin T', 151250),
(61, 'MCU06', 'Pemeriksaan jantung', 'Administrasi', 8650),
(62, 'MCU07', 'kesehatan jiwa', 'Pemeriksaan dokter umum', 24000),
(63, 'MCU07', 'kesehatan jiwa', 'Pemeriksaan dokter Spesialis Jiwa', 34000),
(64, 'MCU07', 'kesehatan jiwa', 'NAPZA', 202500),
(65, 'MCU07', 'kesehatan jiwa', 'Surat Keterangan Sehat jiwa', 15000),
(66, 'MCU07', 'kesehatan jiwa', 'Surat Keterangan Bebas Narkoba', 15000),
(67, '<br />\r\n', 'kesehatan jiwa', 'Mimpi', 440500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profiletamu`
--

CREATE TABLE `profiletamu` (
  `id` int(8) NOT NULL,
  `ktp` varchar(20) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kelamin` varchar(15) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `kawin` varchar(15) NOT NULL,
  `pekerjaan` varchar(15) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profiletamu`
--

INSERT INTO `profiletamu` (`id`, `ktp`, `user_name`, `tgl_lahir`, `kelamin`, `agama`, `kawin`, `pekerjaan`, `alamat`, `hp`) VALUES
(4, '', 'Mubarot Isa', '2000-10-10', 'laki-laki', 'islam', 'belum kawin', 'PNS', 'pekalongan', ''),
(12, '3317142809770002', 'Muhammad Luthfi  Thomafi', '1977-09-28', 'laki-laki', 'islam', 'kawin', 'PNS', 'ds.Ngeplak , Kec. Lasem Kab. Rembang Jawa Tengah', '08132767119'),
(14, '3317091017820002', 'Dewi Setiawati', '1982-10-17', 'perempuan', 'islam', 'kawin', 'PNS', 'Desa Wiroto 04/02 Kec Kaliori Kab Rembang', '085225933547');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket_mcu`
--
ALTER TABLE `paket_mcu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profiletamu`
--
ALTER TABLE `profiletamu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `paket_mcu`
--
ALTER TABLE `paket_mcu`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `profiletamu`
--
ALTER TABLE `profiletamu`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Database: `mcu_soetrasno`
--
CREATE DATABASE IF NOT EXISTS `mcu_soetrasno` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mcu_soetrasno`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(20) NOT NULL,
  `kodedokter` varchar(20) NOT NULL,
  `foto_dokter` varchar(100) DEFAULT NULL,
  `namadokter` varchar(250) NOT NULL,
  `spesialis` varchar(100) NOT NULL,
  `dokter_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `kodedokter`, `foto_dokter`, `namadokter`, `spesialis`, `dokter_active`) VALUES
(4, '198503042010120002', '1.jpg', 'dr. Titis Hadiati, Sp Kj', 'Spesialis Kejiwaan', 1),
(6, '198003032010120001', '1715216272DR MULYADI.jpg', 'dr. Mulyadi Subarjo, Sp. P', 'Spesialis Paru', 1),
(7, '197909022006021012', '1715216346DR FARIS.jpg', 'dr. Faris Wahyu Nugroho, Sp. JP', 'Spesialis Jantung', 1),
(8, '198812102005011011', '1715216756dr eka.jpg', 'dr. Eka Prasetya Budi, Sp.JP', 'Spesialis Jantung', 1),
(9, '198007092010021001', '1715216855DR KRIS.jpg', 'dr. Kristanto Budi Wibowo, Sp. Rad', 'Spesialis Radiologi', 1),
(41, '197801087820051001', 'doctors-4.jpg', 'dr. Sutamti, Sp. PK', 'Sp Patologi Klinik', 1),
(53, '198807042010120002', '1715755865dr ully.jpg', 'dr.Ayu Mekar Sumila Sp.KJ', 'Spesialis Kejiwaan', NULL),
(54, '331709010878001111', '1715755884DR DINDA.jpg', 'dr Rossalia Sp KK', 'Spesialis Kulit dan Kelamin', NULL),
(55, '121211111111111111', 'default.jpg', 'dr sari', 'sp mata', 1),
(57, '123456789999990000', 'default.jpg', 'dr eko', 'sp bedah', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_rs`
--

CREATE TABLE `galeri_rs` (
  `id_galeri` int(11) NOT NULL,
  `nama_galeri` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri_rs`
--

INSERT INTO `galeri_rs` (`id_galeri`, `nama_galeri`) VALUES
(1, '1716949598Akreditasi.jpg'),
(2, 'galeri2.jpeg'),
(3, 'galeri3.jpeg'),
(4, 'galeri4.jpeg'),
(5, 'galeri5.jpeg'),
(6, 'galeri6.jpeg'),
(7, 'galeri7.jpeg'),
(8, 'gallery-1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_mcu`
--

CREATE TABLE `paket_mcu` (
  `id_paket` int(20) NOT NULL,
  `no_urut` int(20) NOT NULL,
  `kodepaket` varchar(50) NOT NULL,
  `kdpaket` varchar(50) NOT NULL,
  `namapaket` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket_mcu`
--

INSERT INTO `paket_mcu` (`id_paket`, `no_urut`, `kodepaket`, `kdpaket`, `namapaket`) VALUES
(1, 1, 'MCU01', 'MCU01', 'MCU Dasar'),
(2, 2, 'MCU02', 'MCU02', 'MCU Standar'),
(3, 3, 'MCU03', 'MCU03', 'MCU Calon Haji'),
(4, 4, 'MCU04', 'MCU04', 'MCU Calon DPR'),
(5, 5, 'MCU05', 'MCU05', 'MCU Calon PNS/ASN/PPPK'),
(6, 6, 'MCU06', 'MCU06', 'MCU Pemeriksaan Paru'),
(7, 7, 'MCU08', 'MCU08', 'MCU Pemeriksaan Jiwa'),
(8, 8, 'MCU07', 'MCU07', 'MCU Pemeriksaan Jantung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien_mcu`
--

CREATE TABLE `pasien_mcu` (
  `id` int(11) NOT NULL,
  `nik_pasien` varchar(16) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `tmpt_lahir` varchar(20) NOT NULL,
  `tglahir_pasien` date NOT NULL,
  `jk_pasien` varchar(15) NOT NULL,
  `goldar` varchar(15) NOT NULL,
  `agama_pasien` varchar(15) NOT NULL,
  `kawin_pasien` varchar(15) NOT NULL,
  `pekerjaan_pasien` varchar(30) NOT NULL,
  `alamat_pasien` varchar(255) NOT NULL,
  `telp_pasien` varchar(16) NOT NULL,
  `pnddk_terakhir` varchar(15) NOT NULL,
  `id_pembuat` int(11) NOT NULL,
  `tgl_dibuat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien_mcu`
--

INSERT INTO `pasien_mcu` (`id`, `nik_pasien`, `nama_pasien`, `tmpt_lahir`, `tglahir_pasien`, `jk_pasien`, `goldar`, `agama_pasien`, `kawin_pasien`, `pekerjaan_pasien`, `alamat_pasien`, `telp_pasien`, `pnddk_terakhir`, `id_pembuat`, `tgl_dibuat`) VALUES
(4, '33170108780001', 'Suparmin PM Nga', 'rembang', '1978-08-01', 'Laki-Laki', 'O', 'Islam', 'Menikah', 'PNS', 'Desa Wiroto Rt 04 Rw 02 Kec Kaliori Kab Rembang', '082327670229', 'D3', 3, '2024-02-02 19:36:55'),
(5, '4413451710800001', 'yoyok supriyono', 'pati', '1979-02-14', 'Perempuan', 'A', 'Islam', 'Menikah', 'wiraswasta', 'Ds Kuniran 01/01 Kec Batangan Kab Pati', '098700561221', 'SMA', 1, '2024-02-21 17:30:48'),
(6, '0123456789012345', 'Yayuk Kustini', 'Rembang', '1988-10-16', 'Perempuan', 'AB', 'Kepercayaan', 'Menikah', 'swasta', 'Ds Maguan 10/11 Kec Kaliori Kab Rembang', '0812334455667', 'S3', 1, '2024-02-21 17:32:01'),
(7, '331709010888000r', 'Agus Siswanto', 'Pati', '1979-09-02', 'Laki-Laki', 'A', 'Islam', 'Menikah', 'PNS', 'Gunung Sari 05/03 Batangan Pati', '081233445566', 'S1', 1, '2024-02-25 23:06:35'),
(8, '3333333333333333', 'Agus Samsuri', 'Rembang', '1980-03-24', 'Laki-Laki', 'B', 'Kepercayaan', 'Menikah', 'BLUD', 'Desa Meteseh', '082324332333', 'D2', 25, '2024-02-26 22:41:09'),
(9, '1234567890123456', 'syamsuri', 'rembang', '1878-02-01', 'Laki-Laki', 'B', 'Kepercayaan', 'Menikah', 'swasta', 'ds meteseh 04/03 kec kaliori kab rembang', '098977654321', 'SMA', 25, '2024-02-26 23:32:31'),
(10, '3243243243242343', 'agus supriyono', 'rembang', '2000-02-01', 'Laki-Laki', 'AB', 'Islam', 'Menikah', 'wiraswasta', 'Desa Maguan RT 02 RW 04 Kec Kaliori Kab Rembang', '2343243432432', 'SMP', 24, '2024-02-29 01:43:52'),
(11, '1234567890123456', 'wahyu setiawan', 'rembang', '2000-02-11', 'Laki-Laki', 'AB', 'Islam', 'Belum Menikah', 'swasta', 'Desa Wiroto RT 05 RW 02 Kec Kaliori Kab Rembang', '0987654321212', 'D4', 26, '2024-02-29 10:46:54'),
(12, '3317091209900002', 'agus supriyono', 'pati', '1980-12-11', 'Laki-Laki', 'O', 'Islam', 'Menikah', 'swasta', 'ds maguan 03/02 kec kaliori kab rembang', '0823342309977', 'SMP', 1, '2024-03-25 11:40:47'),
(13, '3331576878313143', 'yuni astuti wulandari', 'rembang', '2002-02-02', 'Perempuan', 'A', 'Islam', 'Menikah', 'irt', 'desa wiroto rt 05 rw 02 kec kaliori kab rembang', '0980931413144', 'D3', 26, '2024-03-27 07:45:53'),
(14, '3317095710820002', 'Dewi Sandra', 'Rembang', '1982-10-17', 'Perempuan', 'O', 'Islam', 'Menikah', 'ASNNNN', 'Ds Wiroto RT04 RW02 Kec Kaliori Kab Rembang', '085225933547', 'D3', 1, '2024-05-05 12:09:32'),
(15, '3317084010820002', 'Dewi Setyawati', 'Rembang', '1982-10-17', 'Perempuan', 'O', 'Islam', 'Menikah', 'ASN', 'Desa Wiroto RT 04 RW 02 Kec Kaliori Kab Rembang', '085225933547', 'D3', 30, '2024-05-14 09:17:04'),
(16, '3317092404201100', 'Muhammad Fahrudin Y', 'Rembang', '2011-04-24', 'Laki-Laki', 'O', 'Islam', 'Belum Menikah', 'pelajar', 'Desa Wiroto RT 04 RW 02 Kec Kaliori Kab Rembang', '0812233445566', 'SD', 30, '2024-05-14 09:20:38'),
(17, '3317092233229990', 'Ngasimin', 'Rembang', '1945-01-01', 'Laki-Laki', 'A', 'Islam', 'Menikah', 'Petani', 'Desa Wiroto RT 02 RW 04 Kec Kaliori Kab Rembang', '0813224456788', 'SD', 30, '2024-05-14 09:25:13'),
(18, '3317098887788778', 'Warsini', 'Rembang', '1955-01-01', 'Perempuan', 'AB', 'Islam', 'Menikah', 'Ibu Rumah Tangga', 'Desa Wiroto RT 02 RW04 Kec Kaliori Kab Rembang', '0980009090909', 'SD', 30, '2024-05-14 09:26:34'),
(19, '3317090108780001', 'Suparmin', 'Rembang', '1978-08-01', 'Laki-Laki', 'O', 'Islam', 'Menikah', 'ASN', 'Desa Wiroto RT 04 RW 02 Kec Kaliori Kab Rembang ', '082327670229', 'D3', 30, '2024-05-14 09:28:25'),
(20, '3318101012990001', 'Agistra Alvin Ganestia', 'Trenggalek', '1999-08-06', 'Laki-Laki', 'A', 'Islam', 'Belum Menikah', 'mahasiswa', 'Desa Karang Soko RT12 RW03 Kec/Kab Trenggalek', '085745692040', 'D3', 31, '2024-05-14 21:43:11'),
(21, '3318101220000111', 'Alfan Alfaritzi', 'Bondowoso', '2000-12-12', 'Laki-Laki', 'A', 'Islam', 'Belum Menikah', 'Mahasiswa', 'Desa Wringin RT 04 RW 10 Kec Wringin Kab Bondowoso', '0890034545444', 'D4', 31, '2024-05-14 21:51:00'),
(22, '4555121222000111', 'Ain Azam Izulhaq', 'Bantaeng', '2000-10-10', 'Laki-Laki', 'A', 'Islam', 'Belum Menikah', 'Mahasiswa', 'Desa Magersari RT01 RW01 Kec Salaman Kab Bantaeng', '0871112211675', 'D3', 31, '2024-05-14 21:56:34'),
(23, '4412121010200001', 'Fadel Muharam', 'Makasar', '1999-05-11', 'Laki-Laki', 'A', 'Islam', 'Belum Menikah', 'Mahasiswa', 'Masaran RT15 RW07 Kec Maesan Kota Makasar', '0851234567890', 'D3', 31, '2024-05-14 21:58:38'),
(24, '3322445566778899', 'Alafian Agung', 'Jember', '2000-02-01', 'Laki-Laki', 'A', 'Islam', 'Belum Menikah', 'wiraswasta', 'Perum Mastrib Blok D NO 12 Jember', '0897766554433', 'S1', 32, '2024-05-15 07:44:44'),
(25, '3322114455667788', 'Arya Anggara', 'jember', '2002-02-02', 'Laki-Laki', 'B', 'Islam', 'Belum Menikah', 'wiraswasta', 'Perum Mastrip Blok A No 33 Jember', '081234567890', 'S1', 32, '2024-05-15 07:46:16'),
(26, '3500445566221111', 'Aulia Mandalika', 'Jember', '2004-03-03', 'Perempuan', 'AB', 'Islam', 'Belum Menikah', 'wiraswasta', 'Perum Mastrip Blok A No 44 Jember', '0784455332211', 'S1', 32, '2024-05-15 07:47:40'),
(27, '3318090000909090', 'Mudafiq Riyan Pratama', 'Jember', '2000-02-01', 'Laki-Laki', 'A', 'Islam', 'Menikah', 'ASN', 'Jember', '0890000000000', 'S2', 33, '2024-05-15 14:26:35'),
(30, '1234567890123456', 'wahyu setiawan', 'rembang', '2000-02-12', 'Laki-Laki', 'A', 'Islam', 'Belum Menikah', 'pelajar', 'meteseh kaliori rembang', '08977667755222', 'D2', 26, '2024-05-28 08:14:49'),
(31, '3310100989780001', 'agus supriyono', 'rembang', '1980-03-01', 'Laki-Laki', 'A', 'Islam', 'Belum Menikah', 'petani', 'mojowarno kaliori rembang', '089700883356', 'SMA', 24, '2024-05-28 08:35:43'),
(32, '1233322222222222', 'anak alngasi', 'rembang', '1978-08-01', 'Laki-Laki', 'O', 'Islam', 'Menikah', 'asn', 'wiroto kaliori rembang', '082327670229', 'D3', 34, '2024-05-29 07:40:57'),
(33, '1234567890000000', 'andri permana', 'jember', '1999-02-01', 'Laki-Laki', 'A', 'Islam', 'Menikah', 'asn', 'jember', '09090000000000', 'S2', 36, '2024-05-29 09:37:22'),
(34, '3317102310830003', 'BAYU EKO WAHYUDI', 'Rembang', '1983-10-23', 'Laki-Laki', 'A', 'Islam', 'Menikah', 'pns', 'kabongan kidul - rembang', '082322224446', 'D3', 37, '2024-06-15 08:17:58'),
(35, '1234561234567890', 'huda', 'rembang', '1993-10-12', 'Laki-Laki', 'O', 'Islam', 'Menikah', 'swasta', 'lasem', '085747096784', 'S1', 38, '2024-06-15 09:58:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(20) NOT NULL,
  `ktp` varchar(20) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `username` varchar(150) NOT NULL,
  `user_password` varchar(225) NOT NULL,
  `level` varchar(20) NOT NULL,
  `user_status` int(11) NOT NULL,
  `hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `ktp`, `user_name`, `email_pelanggan`, `username`, `user_password`, `level`, `user_status`, `hp`) VALUES
(1, '3317142809770002', 'Muhammad Luthfi  Thomafi', 'muhammad@gmail.com', 'baba', '$2y$10$es4Ztrcvbk3.3evlhfScpuOsfMw9cfRFyUNOD0IC1JGOWDjxT.UQO', 'pengunjung', 1, '081327671198'),
(2, '0000000', 'nur cholis', 'nurcho@ssss', 'nur', '$2y$10$.qAFC6Q02XcyjO4mu4/apeIJUZMe/uTo2Hyu.1cguf9wJeijoTPlG', 'kepala rm', 1, '38243243'),
(3, '3317090108780001', 'suparmin', 'zu_parmin@yahoo.com', 'suparmin', '$2y$10$es4Ztrcvbk3.3evlhfScpuOsfMw9cfRFyUNOD0IC1JGOWDjxT.UQO', 'administrator', 1, '082327670229'),
(4, '3333333333333333', 'Mubarot Isa', '333@33', 'barot', '$2y$10$es4Ztrcvbk3.3evlhfScpuOsfMw9cfRFyUNOD0IC1JGOWDjxT.UQO', 'petugas', 1, '11111111111111'),
(20, '1111111111111111', 'nur cholis abdul rohman', 'nurcholis@abdul.rohman.com', 'abdulrohman', '$2y$10$es4Ztrcvbk3.3evlhfScpuOsfMw9cfRFyUNOD0IC1JGOWDjxT.UQO', 'pengunjung', 1, '88499938888888'),
(21, '1111111111111111', 'nurcholis', '1111@222', 'nurcho', '$2y$10$md1X/j9Z4bsZZ4OKk67FqOzWF8k1duTpdMZnzvlnFZUUun/A4KFfW', 'administrator', 0, '33333333333333'),
(24, '3310100989780001', 'agus supriyono', 'kiyahonzu@gmail.com', 'agus', '$2y$10$H5VKqgS8Xeh2wX.gL5Skue/OO6hdSvsLEuCb5y95fPIUCk70n/cee', 'pengunjung', 1, '089700883356'),
(25, '2232123214543333', 'Ahmadun Munajib', 'ahmad@gmai.com', 'ahmad', '$2y$10$mpMDKtgHmowceE38EmY8NuowQb55oBMRODL8FdwVR4V2S8Eie7i82', 'pengunjung', 1, '0816577732477'),
(26, '1234567890123456', 'wahyu setiawan', 'kiyahonzu@gmail.com', 'wahyu', '$2y$10$5PD6wXIJlejv/xtuQRFLTeGNrq9WF1Z0zaTvl2ouxR1oBxvh16Z5O', 'pengunjung', 1, '08977667755222'),
(28, '3317101203880002', 'Hiky Widyaningrum', 'hikyw@gmail.com', 'hiky w', '$2y$10$UXgbh9r7.c8XNCLJvGjZ4OhKTUrsg9pHM18w3CSQUMhPKG8zXj5Wa', 'petugas', 1, '08977733345543'),
(30, '3317094010820002', 'Dewi Setyawati', 'dewisetya@gmai.com', 'dewisetya', '$2y$10$.uxHVI2K6TL1T7wjz6BiteHr0CQvrSXaCiGL2qcxKLOIZPaOABnBu', 'pengunjung', 1, '085225933547'),
(31, '3318080809990001', 'Agistra Alvin Ganestia', 'agistra@gmail.com', 'agistra', '$2y$10$djSrKXujRjfS071DiMKBBewxonb/9WlvAqHWpezGA9CGCRkJMWXca', 'pengunjung', 1, '08566557788999'),
(32, '3318778711778888', 'Alfian Agung', 'alfian@gmail.com', 'alfian', '$2y$10$kxTFu55m.4ZiayFcSx2tcO8CrzXL/T.P8Hcto95JW.FPj9q7xhNhe', 'pengunjung', 1, '08900011122233'),
(33, '1234567890123456', 'Mudafiq Riyan Pratama', 'mudafiq.polije@polije.ac.id', 'mudafiq', '$2y$10$AiMahG.vIsWftgTn28eC1eYFzuIABFZ.FJrsB749LSbHYplixRXDS', 'pengunjung', 1, '08977711122334'),
(34, '1233322222222222', 'anak alngasi', 'kiyahonzu@gmail.com', 'anak alngasi', '$2y$10$G7xW0yUz.FcNSeKofs.4HOJyIFMW6zC0roGcoH0bwtq7KXHaGxX.m', 'pengunjung', 1, '082327670229'),
(35, '12345678901111', 'andri permana', 'andri_permana@polije.ac.id', 'andri permmana', '$2y$10$rw4whgFrzyhlwMWw2dSucOcNRzjBdhC8EinGz0C/ZBwLDy92J1gIq', 'pengunjung', 1, '08977777777777'),
(36, '1234567890000000', 'andri permana', 'andri_permana@polije.ac.id', 'andri p', '$2y$10$k3SpOIiMHuuBVLcHspBLEumQNLdBHLApu7NXJaeUUizraD82SvH/K', 'pengunjung', 1, '09090000000000'),
(37, '3317102310830003', 'BAYU EKO WAHYUDI', 'salmamufidatun090107@gmail.com', '@bayoe_wahyudi', '$2y$10$s9uPkdHg5zjne6erX/NKvOe56hnJSobhQLNA25tlHNx.Ubhoi8sli', 'pengunjung', 1, '082322224446'),
(38, '1234561234567890', 'huda', 'mishbahulh@gmail.com', 'huda123', '$2y$10$xy7zBQ21pvbguQ.9wgpuP.drjLCFMdulGb/ZKCe.YRh4M3P7WjJYu', 'pengunjung', 1, '085747096784');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `order_id` int(50) NOT NULL,
  `transaction_id` varchar(225) NOT NULL,
  `kodepaket` varchar(30) NOT NULL,
  `gross_amount` int(30) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `transaction_time` datetime NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`order_id`, `transaction_id`, `kodepaket`, `gross_amount`, `payment_type`, `transaction_time`, `id_pelanggan`) VALUES
(44067530, 'a33ee888-7e0a-486a-827e-e245c3835c66', 'MCU03', 904650, 'bank_transfer', '2024-05-05 12:16:09', 1),
(58495076, '416e4d51-52f4-49bc-a394-8b63d7d7a92c', 'MCU02', 613700, 'bank_transfer', '2024-02-25 23:25:51', 1),
(112148836, '0e8a3b47-6c1f-45d0-a4cc-6810853c6457', 'MCU03', 452325, 'echannel', '2024-06-15 10:00:32', 38),
(312922831, 'd090110d-650e-4b06-a418-f998fd4030ce', 'MCU07', 2495700, 'qris', '2024-05-15 14:43:18', 31),
(434200732, '23b5e67c-82d0-4cf9-9882-127ebd48ab85', 'MCU01', 785400, 'qris', '2024-05-15 07:56:05', 1),
(470935547, '5d9e9e78-7141-456f-88cd-caa09da3c099', 'MCU02', 613700, 'qris', '2024-02-26 12:21:08', 1),
(484070534, 'c7f01ba6-abec-48dc-9ef5-bc4388e7c444', 'MCU04', 535350, 'cstore', '2024-02-29 14:29:09', 26),
(507128313, '157c3f24-bed5-4f44-b029-3398410936f9', 'MCU06', 1010450, 'qris', '2024-02-26 22:46:31', 25),
(588002471, '95f65584-1718-4424-97fa-c185f2d91ab8', 'MCU07', 3743550, 'cstore', '2024-05-15 07:50:35', 32),
(635482322, '014876de-d05f-4d6b-be1f-57855d12de94', 'MCU03', 2261625, 'bank_transfer', '2024-05-14 09:31:07', 30),
(696055960, 'd178ca0d-c802-460f-bb89-e92860622765', 'MCU03', 904650, 'bank_transfer', '2024-03-25 11:44:55', 1),
(789646463, '7554e75b-5c9c-4621-af0e-9209a2871973', 'MCU01', 96550, 'bank_transfer', '2024-02-26 15:36:12', 1),
(927470070, 'bdeae884-e271-4eb3-9fe3-d3d4af7984bf', 'MCU01', 392700, 'bank_transfer', '2024-06-15 08:21:49', 37),
(1083920806, '297c3c55-1e6a-4019-b0dc-1073beb4bd7e', 'MCU03', 452325, 'cstore', '2024-02-29 01:45:09', 24),
(1106904052, 'eeed869c-0d8f-4aa6-a731-5290ab9ab53c', 'MCU07', 290500, 'echannel', '2024-02-26 12:31:43', 1),
(1127325227, '3c047c8f-0f64-4f8c-938f-d40675baade5', 'MCU02', 306850, 'echannel', '2024-02-26 12:27:11', 1),
(1130342606, '7d6a0d24-cb9d-4e6f-92ad-3c2e212bba5b', 'MCU01', 392700, 'qris', '2024-03-24 19:43:49', 1),
(1181360659, '088da3f9-a633-4e1f-a538-44eb64ac7eb2', 'MCU01', 392700, 'bank_transfer', '2024-05-29 09:37:46', 36),
(1185157395, '9925e4ca-0991-4055-b76a-85d744dbf23a', 'MCU07', 581000, 'bank_transfer', '2024-02-26 23:36:07', 25),
(1194373471, '305ff807-dc79-4369-a252-2bc4e545f8b6', 'MCU03', 452325, 'qris', '2024-03-26 00:58:47', 24),
(1235251612, 'd2200296-6abc-492d-8807-bb2cfe72be10', 'MCU01', 785400, 'bank_transfer', '2024-05-28 08:16:19', 26),
(1346249845, '071a300e-f5cd-4892-b9fa-24e43cf4601d', 'MCU05', 604600, 'bank_transfer', '2024-05-29 07:42:07', 34),
(1355860809, '919830bf-cb6e-4f1f-9651-43750fbadc79', 'MCU01', 785400, 'qris', '2024-03-27 07:48:50', 26),
(1474459151, 'dcc39be1-d803-4cb8-9f95-aa7d7f79e408', 'MCU06', 786650, 'bank_transfer', '2024-05-15 07:54:22', 32),
(1497824356, '5dcaf0db-e759-40a3-b003-c2a122c5e498', 'MCU07', 581000, 'bank_transfer', '2024-02-25 13:11:56', 1),
(1530950371, 'f6d92619-39e1-4037-bcfa-19317aa716b7', 'MCU05', 604600, 'bank_transfer', '2024-02-29 10:50:10', 26),
(1831106721, '3bbba353-e8e2-4d83-a694-7502204a2a72', 'MCU03', 452325, 'bank_transfer', '2024-05-15 14:33:39', 33),
(1846005116, 'a1a135c5-ec4a-49a3-b3a0-75642ef24877', 'MCU01', 289650, 'qris', '2024-02-26 13:03:46', 1),
(1855322391, 'f20ebbe9-01c3-45a9-a1c0-4569918925f5', 'MCU01', 1570800, 'qris', '2024-05-14 22:02:49', 31),
(1926107032, '7bdf5735-5abc-4411-9669-2e8a8aa38847', 'MCU02', 499775, 'qris', '2024-05-28 08:36:54', 24),
(1968459685, 'f85075b9-a760-4850-9117-6966dc71eeb4', 'MCU04', 448000, 'echannel', '2024-02-29 01:50:55', 24),
(2038088972, '950b0e4a-a86e-4764-ad41-a97a194eb415', 'MCU03', 452325, 'bank_transfer', '2024-06-15 10:05:57', 38);

-- --------------------------------------------------------

--
-- Struktur dari tabel `periksa`
--

CREATE TABLE `periksa` (
  `id_periksa` int(20) NOT NULL,
  `kodepaket` varchar(50) NOT NULL,
  `namapaket` varchar(50) NOT NULL,
  `layanan` varchar(500) NOT NULL,
  `harga` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `periksa`
--

INSERT INTO `periksa` (`id_periksa`, `kodepaket`, `namapaket`, `layanan`, `harga`) VALUES
(1, 'MCU01', 'MCU Dasar', 'Pendaftaran dan Pemeriksaan Dokter Umum', 75000),
(2, 'MCU01', 'MCU Dasar', 'Hematologi Rutin', 50075),
(3, 'MCU01', 'MCU Dasar', 'Urin Rutin', 48425),
(4, 'MCU01', 'MCU Dasar', 'GDP', 20900),
(5, 'MCU02', 'MCU Standar', 'Pendaftaran dan pemeriksaan dokter umum', 75000),
(6, 'MCU02', 'MCU Standar', 'Hematologi Lengkap', 49650),
(7, 'MCU02', 'MCU Standar', 'Urin Rutin', 48425),
(8, 'MCU02', 'MCU Standar', 'GDP', 20900),
(9, 'MCU02', 'MCU Standar', 'Pemeriksaan Lemak (HDL, LDL,CHOL total, TG)', 170900),
(10, 'MCU02', 'MCU Standar', 'Asam Urat', 27400),
(11, 'MCU02', 'MCU Standar', 'Ronsen Thorax', 107500),
(12, 'MCU03', 'MCU Calon Haji', 'Pendaftaran dan Pemeriksaan Dokter Umum', 75000),
(13, 'MCU03', 'MCU Calon Haji', 'Pemeriksaan EKG', 50000),
(14, 'MCU03', 'MCU Calon Haji', 'Pemeriksaan Rontgen Thorax', 107500),
(15, 'MCU03', 'MCU Calon Haji', 'Glokolysis Hb/Hba1c', 164600),
(16, 'MCU03', 'MCU Calon Haji', 'Hematologi Lengkap', 55225),
(20, 'MCU04', 'MCU Calon DPR', 'Pendaftaran dan pemeriksaan dokter umum', 75000),
(21, 'MCU04', 'MCU Calon DPR', 'Hematologi Lengkap', 55225),
(22, 'MCU04', 'MCU Calon DPR', 'Urin Rutin', 48425),
(23, 'MCU04', 'MCU Calon DPR', 'GDP', 20900),
(24, 'MCU04', 'MCU Calon DPR', 'Analisa Lemak (HDL, LDL,CHOL total, TG)', 170900),
(25, 'MCU04', 'MCU Calon DPR', 'Asam Urat', 27400),
(26, 'MCU04', 'MCU Calon DPR', 'Rongen thorax', 107500),
(27, 'MCU04', 'MCU Calon DPR', 'EKG Jantung', 30000),
(29, 'MCU05', 'MCU Calon PNS/ASN/PPPK', 'Pendaftaran dan Pemeriksaan Dokter Umum', 75000),
(30, 'MCU05', 'MCU Calon PNS/ASN/PPPK', 'Surat Keterangan Sehat', 50000),
(31, 'MCU05', 'MCU Calon PNS/ASN/PPPK', 'Pemeriksaan Laborat Narkoba', 143600),
(32, 'MCU05', 'MCU Calon PNS/ASN/PPPK', 'Pemeriksaan Jiwa (MMPI)', 336000),
(45, 'MCU06', 'MCU Pemeriksaan Paru', 'Pemeriksaan Dokter Umum', 50000),
(46, 'MCU06', 'MCU Pemeriksaan Paru', 'Pemeriksaan Dokter Spesialis Paru', 75000),
(47, 'MCU06', 'MCU Pemeriksaan Paru', 'Hematologi Lengkap', 49650),
(48, 'MCU06', 'MCU Pemeriksaan Paru', 'Urin Rutin', 48425),
(49, 'MCU06', 'MCU Pemeriksaan Paru', 'GDP', 20900),
(50, 'MCU06', 'MCU Pemeriksaan Paru', 'Analisa Lemak (HDL, LDL,CHOL total, TG)', 164800),
(51, 'MCU06', 'MCU Pemeriksaan Paru', 'Ureum', 23075),
(52, 'MCU06', 'MCU Pemeriksaan Paru', 'Creatinin', 23075),
(53, 'MCU06', 'MCU Pemeriksaan Paru', 'SGOT', 23575),
(54, 'MCU06', 'MCU Pemeriksaan Paru', 'SGPT', 23575),
(55, 'MCU06', 'MCU Pemeriksaan Paru', 'Asam Urat', 27400),
(56, 'MCU06', 'MCU Pemeriksaan Paru', 'HbSHg', 35200),
(57, 'MCU06', 'MCU Pemeriksaan Paru', 'Rontgen Thorax', 107500),
(58, 'MCU06', 'MCU Pemeriksaan Paru', 'BTA', 34475),
(59, 'MCU06', 'MCU Pemeriksaan Paru', 'Spirometri', 55000),
(61, 'MCU06', 'MCU Pemeriksaan Paru', 'Administrasi Pendaftaran', 25000),
(62, 'MCU07', 'MCU Pemeriksaan Jantung', 'Pendaftaran dan Pemeriksaan Dokter Umum', 75000),
(63, 'MCU07', 'MCU Pemeriksaan Jantung', 'Pemeriksaan Dokter Spesialis Jantung', 75000),
(64, 'MCU07', 'MCU Pemeriksaan Jantung', 'Hemtologi Lengkap', 55225),
(65, 'MCU07', 'MCU Pemeriksaan Jantung', 'Urin Rutin', 48425),
(66, 'MCU07', 'MCU Pemeriksaan Jantung', 'GDP', 20900),
(74, 'MCU08', 'MCU Pemeriksaan Jiwa', 'Pendaftaran dan Pemeriksaan Dokter Umum', 75000),
(78, 'MCU01', 'MCU Dasar', 'Analisa Lemak (HDL, LDL, CHOL Total, TG)', 170900),
(79, 'MCU01', 'MCU Dasar', 'Asam Urat', 27400),
(80, 'MCU07', 'MCU Pemeriksaan Jantung', 'Analisa Lemak (HDL, LDL, CHOL Total, TG)', 170900),
(81, 'MCU07', 'MCU Pemeriksaan Jantung', 'Ureum', 23075),
(82, 'MCU07', 'MCU Pemeriksaan Jantung', 'Creatinin', 23075),
(83, 'MCU07', 'MCU Pemeriksaan Jantung', 'SGOT', 23575),
(84, 'MCU07', 'MCU Pemeriksaan Jantung', 'SGPT', 23575),
(85, 'MCU07', 'MCU Pemeriksaan Jantung', 'Asam Urat', 27400),
(86, 'MCU07', 'MCU Pemeriksaan Jantung', 'HBSAG', 35200),
(87, 'MCU07', 'MCU Pemeriksaan Jantung', 'Ronsen Thorax', 107500),
(88, 'MCU07', 'MCU Pemeriksaan Jantung', 'EKG Jantung', 50000),
(89, 'MCU07', 'MCU Pemeriksaan Jantung', 'Echo Cardiografi', 405000),
(90, 'MCU07', 'MCU Pemeriksaan Jantung', 'Troponin T', 84000),
(91, 'MCU08', 'MCU Pemeriksaan Jiwa', 'Pemeriksaan Dokter Spesialis Jiwa', 75000),
(92, 'MCU08', 'MCU Pemeriksaan Jiwa', 'Laboratorium Napza', 143600),
(93, 'MCU08', 'MCU Pemeriksaan Jiwa', 'MMPI', 336000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profiletamu`
--

CREATE TABLE `profiletamu` (
  `id_profil` int(20) NOT NULL,
  `foto_prof` varchar(225) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tmpt_lahir_prof` varchar(30) NOT NULL,
  `tgl_lahir_prof` date NOT NULL,
  `jk_prof` varchar(15) NOT NULL,
  `goldar_prof` varchar(10) NOT NULL,
  `agama_prof` varchar(15) NOT NULL,
  `kawin_prof` varchar(15) NOT NULL,
  `pekerjaan_prof` varchar(15) NOT NULL,
  `alamat_prof` varchar(500) NOT NULL,
  `pnddk_terakhir_prof` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profiletamu`
--

INSERT INTO `profiletamu` (`id_profil`, `foto_prof`, `id_pelanggan`, `tmpt_lahir_prof`, `tgl_lahir_prof`, `jk_prof`, `goldar_prof`, `agama_prof`, `kawin_prof`, `pekerjaan_prof`, `alamat_prof`, `pnddk_terakhir_prof`) VALUES
(14, '1711228979Assassins-Creed-All-Character.jpg', 2, 'Blitar', '1999-10-24', 'Laki-Laki', 'A', 'Islam', 'Belum Menikah', 'Mahasiswa', 'Jl Yos Sudarso', 'D3'),
(15, '1715217924aq.jpg', 3, 'rembang', '1978-08-01', 'Laki-Laki', 'O', 'Islam', 'Menikah', 'PNS', 'Desa Wiroto RT 04 RW 02 Kec Kaliori Kab Rembang', 'D3'),
(17, 'default.jpg', 26, 'rembang', '2000-02-12', 'Laki-Laki', 'A', 'Islam', 'Belum Menikah', 'pelajar', 'meteseh kaliori rembang', 'D2'),
(18, 'default.jpg', 24, 'rembang', '1980-03-01', 'Laki-Laki', 'A', 'Islam', 'Belum Menikah', 'petani', 'mojowarno kaliori rembang', 'SMA'),
(19, 'default.jpg', 34, 'rembang', '1978-08-01', 'Laki-Laki', 'O', 'Islam', 'Menikah', 'asn', 'wiroto kaliori rembang', 'D3'),
(20, 'default.jpg', 36, 'jember', '1999-02-01', 'Laki-Laki', 'A', 'Islam', 'Menikah', 'asn', 'jember', 'S2'),
(21, 'default.jpg', 37, 'Rembang', '1983-10-23', 'Laki-Laki', 'A', 'Islam', 'Menikah', 'pns', 'kabongan kidul - rembang', 'D3'),
(22, 'default.jpg', 38, 'rembang', '1993-10-12', 'Laki-Laki', 'O', 'Islam', 'Menikah', 'swasta', 'lasem', 'S1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(100) NOT NULL,
  `no_reg` varchar(50) NOT NULL,
  `id_pasien` int(30) NOT NULL,
  `tgl_kedatangan` date NOT NULL,
  `no_antri` varchar(30) NOT NULL,
  `kode_paket` varchar(30) NOT NULL,
  `id_order` int(50) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `status_pasien` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `no_reg`, `id_pasien`, `tgl_kedatangan`, `no_antri`, `kode_paket`, `id_order`, `id_pelanggan`, `status_pasien`) VALUES
(1, 'MCU202403010001', 5, '2024-03-01', '0001', 'MCU07', 1497824356, 1, '1'),
(2, 'MCU202403010002', 6, '2024-03-01', '0002', 'MCU07', 1497824356, 1, '1'),
(3, 'MCU202403090001', 7, '2024-03-09', '0001', 'MCU02', 58495076, 1, '1'),
(4, 'MCU202403090002', 5, '2024-03-09', '0002', 'MCU02', 58495076, 1, '1'),
(5, 'MCU202402270001', 5, '2024-02-27', '0001', 'MCU02', 470935547, 1, '0'),
(6, 'MCU202402270002', 6, '2024-02-27', '0002', 'MCU02', 470935547, 1, '0'),
(7, 'MCU202402280001', 7, '2024-02-28', '0001', 'MCU02', 1127325227, 1, '0'),
(8, 'MCU202403010003', 6, '2024-03-01', '0003', 'MCU07', 1106904052, 1, '1'),
(9, 'MCU202402290001', 5, '2024-02-29', '0001', 'MCU01', 1846005116, 1, '1'),
(10, 'MCU202402290002', 6, '2024-02-29', '0002', 'MCU01', 1846005116, 1, '0'),
(11, 'MCU202402290003', 7, '2024-02-29', '0003', 'MCU01', 1846005116, 1, '0'),
(12, 'MCU202403270001', 5, '2024-03-27', '0001', 'MCU01', 789646463, 1, '1'),
(13, 'MCU202403260001', 8, '2024-03-26', '0001', 'MCU06', 507128313, 25, '1'),
(14, 'MCU202402280002', 8, '2024-02-28', '0002', 'MCU07', 1185157395, 25, '0'),
(15, 'MCU202402280003', 9, '2024-05-28', '0002', 'MCU07', 1185157395, 25, '1'),
(16, 'MCU202403020001', 10, '2024-03-02', '0001', 'MCU03', 1083920806, 24, '0'),
(17, 'MCU202403030001', 10, '2024-03-03', '0001', 'MCU04', 1968459685, 24, '0'),
(18, 'MCU202403020002', 11, '2024-03-02', '0002', 'MCU05', 1530950371, 26, '1'),
(19, 'MCU202403020003', 11, '2024-03-02', '0003', 'MCU04', 484070534, 26, '0'),
(20, 'MCU202404160001', 6, '2024-04-16', '0001', 'MCU01', 1130342606, 1, '0'),
(21, 'MCU202403270002', 7, '2024-03-27', '0002', 'MCU03', 696055960, 1, '1'),
(22, 'MCU202403270003', 5, '2024-03-27', '0003', 'MCU03', 696055960, 1, '0'),
(23, 'MCU202403280001', 10, '2024-03-28', '0001', 'MCU03', 1194373471, 24, '0'),
(24, 'MCU202403290001', 11, '2024-03-29', '0001', 'MCU01', 1355860809, 26, '1'),
(25, 'MCU202403290002', 13, '2024-03-29', '0002', 'MCU01', 1355860809, 26, '0'),
(26, 'MCU202405070001', 14, '2024-05-07', '0001', 'MCU03', 44067530, 1, '0'),
(27, 'MCU202405070002', 12, '2024-05-07', '0002', 'MCU03', 44067530, 1, '0'),
(28, 'MCU202405160001', 15, '2024-05-16', '0001', 'MCU03', 635482322, 30, '1'),
(29, 'MCU202405160002', 16, '2024-05-16', '0002', 'MCU03', 635482322, 30, '1'),
(30, 'MCU202405160003', 17, '2024-05-16', '0003', 'MCU03', 635482322, 30, '1'),
(31, 'MCU202405160004', 18, '2024-05-16', '0004', 'MCU03', 635482322, 30, '1'),
(32, 'MCU202405160005', 19, '2024-05-16', '0005', 'MCU03', 635482322, 30, '0'),
(33, 'MCU202405160006', 20, '2024-05-16', '0006', 'MCU01', 1855322391, 31, '1'),
(34, 'MCU202405160007', 21, '2024-05-16', '0007', 'MCU01', 1855322391, 31, '1'),
(35, 'MCU202405160008', 22, '2024-05-16', '0008', 'MCU01', 1855322391, 31, '1'),
(36, 'MCU202405160009', 23, '2024-05-16', '0009', 'MCU01', 1855322391, 31, '1'),
(37, 'MCU202405170001', 24, '2024-05-17', '0001', 'MCU07', 588002471, 32, '1'),
(38, 'MCU202405170002', 25, '2024-05-17', '0002', 'MCU07', 588002471, 32, '1'),
(39, 'MCU202405170003', 26, '2024-05-17', '0003', 'MCU07', 588002471, 32, '1'),
(40, 'MCU202405170004', 26, '2024-05-17', '0004', 'MCU06', 1474459151, 32, '1'),
(41, 'MCU202405170005', 6, '2024-05-17', '0005', 'MCU01', 434200732, 1, '1'),
(42, 'MCU202405170006', 5, '2024-05-17', '0006', 'MCU01', 434200732, 1, '1'),
(43, 'MCU202405170007', 27, '2024-05-17', '0007', 'MCU03', 1831106721, 33, '1'),
(44, 'MCU202405170008', 20, '2024-05-17', '0008', 'MCU07', 312922831, 31, '1'),
(45, 'MCU202405170009', 21, '2024-05-17', '0009', 'MCU07', 312922831, 31, '0'),
(46, 'MCU202405300001', 30, '2024-05-30', '0001', 'MCU01', 1235251612, 26, '0'),
(47, 'MCU202405300002', 13, '2024-05-30', '0002', 'MCU01', 1235251612, 26, '0'),
(48, 'MCU202405300003', 10, '2024-05-30', '0003', 'MCU02', 1926107032, 24, '0'),
(49, 'MCU202405310001', 32, '2024-05-31', '0001', 'MCU05', 1346249845, 34, '0'),
(50, 'MCU202405310002', 33, '2024-05-31', '0002', 'MCU01', 1181360659, 36, '0'),
(51, 'MCU202406180001', 34, '2024-06-15', '0001', 'MCU01', 927470070, 37, '1'),
(52, 'MCU202407150001', 35, '2024-07-15', '0001', 'MCU03', 112148836, 38, '0'),
(53, 'MCU202406170001', 35, '2024-06-15', '0002', 'MCU03', 2038088972, 38, '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `galeri_rs`
--
ALTER TABLE `galeri_rs`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `paket_mcu`
--
ALTER TABLE `paket_mcu`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `pasien_mcu`
--
ALTER TABLE `pasien_mcu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id_periksa`);

--
-- Indeks untuk tabel `profiletamu`
--
ALTER TABLE `profiletamu`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `galeri_rs`
--
ALTER TABLE `galeri_rs`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `paket_mcu`
--
ALTER TABLE `paket_mcu`
  MODIFY `id_paket` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pasien_mcu`
--
ALTER TABLE `pasien_mcu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id_periksa` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `profiletamu`
--
ALTER TABLE `profiletamu`
  MODIFY `id_profil` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- Database: `mik_plj`
--
CREATE DATABASE IF NOT EXISTS `mik_plj` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mik_plj`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'suparmin', '12345');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data untuk tabel `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"registrasi\",\"table\":\"buku_tamu\"},{\"db\":\"registrasi\",\"table\":\"pasien\"},{\"db\":\"data_pasien\",\"table\":\"data_pasien\"}]');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data untuk tabel `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2022-10-10 04:02:49', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"id\"}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indeks untuk tabel `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indeks untuk tabel `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indeks untuk tabel `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indeks untuk tabel `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indeks untuk tabel `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indeks untuk tabel `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indeks untuk tabel `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indeks untuk tabel `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indeks untuk tabel `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indeks untuk tabel `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `registrasi`
--
CREATE DATABASE IF NOT EXISTS `registrasi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `registrasi`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id_buku_tamu` int(5) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku_tamu`
--

INSERT INTO `buku_tamu` (`id_buku_tamu`, `nama`, `alamat`, `pesan`) VALUES
(1, 'suparmin', 'rembangan', 'semangat mazeee');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id_buku_tamu`);
--
-- Database: `rekam_medis`
--
CREATE DATABASE IF NOT EXISTS `rekam_medis` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `rekam_medis`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(25) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `foto`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Suparmin', 'LOg.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(25) NOT NULL,
  `nama` varchar(230) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `jumlah` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(25) NOT NULL,
  `nik` varchar(250) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kelamin` varchar(210) NOT NULL,
  `alamat` varchar(230) NOT NULL,
  `nomor` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `nik`, `nama`, `kelamin`, `alamat`, `nomor`) VALUES
(1, '123456', 'ain', 'laki-laki', 'Lapporo', '085757223312');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekammedis`
--

CREATE TABLE `rekammedis` (
  `id` int(25) NOT NULL,
  `nama_pasien` varchar(230) NOT NULL,
  `nama_tenaga` varchar(250) NOT NULL,
  `tanggal` varchar(240) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `diagnosa` varchar(240) NOT NULL,
  `obat` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenagamedis`
--

CREATE TABLE `tenagamedis` (
  `id` int(25) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(239) NOT NULL,
  `nomor` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekammedis`
--
ALTER TABLE `rekammedis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tenagamedis`
--
ALTER TABLE `tenagamedis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rekammedis`
--
ALTER TABLE `rekammedis`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tenagamedis`
--
ALTER TABLE `tenagamedis`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2024 pada 10.51
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
-- Database: `mcu_soetrasno`
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 01:25 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pis_akademik1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_menu`
--

CREATE TABLE `tabel_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(25) NOT NULL,
  `is_main_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_menu`
--

INSERT INTO `tabel_menu` (`id`, `nama_menu`, `link`, `icon`, `is_main_menu`) VALUES
(1, 'Data Mahasiswa', 'siswa', 'fa fa-users', 0),
(2, 'Data Dosen', 'dosen', 'fa fa-user-circle', 0),
(3, 'Data Master', '#', 'fa fa-bars', 0),
(4, 'Matakuliah', 'mapel', 'fa fa-book', 3),
(5, 'Ruangan Kelas', 'ruangan', 'fa fa-building', 3),
(6, 'Tingkatan Semester', 'tingkatan', 'fa fa-sitemap', 3),
(7, 'Jurusan', 'jurusan', 'fa fa-th-large', 3),
(8, 'Tahun Akademik', 'tahunakademik', 'fa fa-calendar-check-o', 3),
(9, 'Kelas', 'kelas', 'fa fa-cubes', 3),
(10, 'Kurikulum', 'kurikulum', 'fa fa-list', 3),
(11, 'Jadwal Matakuliah', 'jadwal', 'fa fa-calendar-plus-o', 0),
(12, 'Peserta Didik', 'siswa/siswa_aktif', 'fa fa-users', 0),
(13, 'Dosen wali', 'walikelas', 'fa fa-user-plus', 0),
(14, 'Pengguna Sistem', 'user', 'fa fa-id-badge', 0),
(15, 'Menu', 'menu', 'fa fa-list', 0),
(16, 'Form Pembayaran', 'pembayaran', 'fa fa-dollar', 0),
(17, 'Nilai', 'nilai', 'fa fa-archive', 0),
(18, 'Laporan Nilai', 'laporan_nilai', 'fa fa-file-pdf-o', 0),
(19, 'Dashboard', 'tampilan_utama', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agama`
--

CREATE TABLE `tbl_agama` (
  `kd_agama` int(2) NOT NULL,
  `nama_agama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_agama`
--

INSERT INTO `tbl_agama` (`kd_agama`, `nama_agama`) VALUES
(1, 'ISLAM'),
(2, 'KRISTEN/ PROTESTAN'),
(3, 'KATHOLIK'),
(4, 'HINDU'),
(5, 'BUDHA'),
(6, 'KHONG HU CHU'),
(99, 'LAIN LAIN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nidn` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id`, `id_user`, `nidn`) VALUES
(1, 11, 'N111921136'),
(3, 13, 'N123456788'),
(2, 12, 'N123456789');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `kd_jurusan` varchar(5) NOT NULL,
  `kd_tingkatan` varchar(5) NOT NULL,
  `kd_kelas` varchar(5) NOT NULL,
  `kd_mapel` varchar(5) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `jam` varchar(30) NOT NULL,
  `kd_ruangan` varchar(10) NOT NULL,
  `hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id`, `id_tahun_akademik`, `semester`, `kd_jurusan`, `kd_tingkatan`, `kd_kelas`, `kd_mapel`, `id_dosen`, `jam`, `kd_ruangan`, `hari`) VALUES
(1, 1, 'ganjil', 'TI', '01', 'IF-6K', '0001', 1, '07.15 - 08.00', '01', 'Senin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `kd_jurusan` varchar(5) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`kd_jurusan`, `nama_jurusan`) VALUES
('AK', 'Akuntansi'),
('J1123', 'Teknik Mesin'),
('TI', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `kd_kelas` varchar(5) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `kd_tingkatan` varchar(5) NOT NULL,
  `kd_jurusan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`kd_kelas`, `nama_kelas`, `kd_tingkatan`, `kd_jurusan`) VALUES
('IF-2K', 'IF-2K', '01', 'TI'),
('IF-6K', 'IF-6K', '01', 'TI'),
('IF-6C', 'IF-6C', '01', 'TI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurikulum`
--

CREATE TABLE `tbl_kurikulum` (
  `id_kurikulum` int(11) NOT NULL,
  `nama_kurikulum` varchar(30) NOT NULL,
  `is_aktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kurikulum`
--

INSERT INTO `tbl_kurikulum` (`id_kurikulum`, `nama_kurikulum`, `is_aktif`) VALUES
(1, 'Kurikulum 2013 (K13)', 'Y'),
(2, 'Kurikulum 2006 (KTSP)', 'N'),
(3, 'Kurikulum 2004 (KBK)', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurikulum_detail`
--

CREATE TABLE `tbl_kurikulum_detail` (
  `id_kurikulum_detail` int(11) NOT NULL,
  `id_kurikulum` int(11) NOT NULL,
  `kd_mapel` varchar(5) NOT NULL,
  `kd_jurusan` varchar(5) NOT NULL,
  `kd_tingkatan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kurikulum_detail`
--

INSERT INTO `tbl_kurikulum_detail` (`id_kurikulum_detail`, `id_kurikulum`, `kd_mapel`, `kd_jurusan`, `kd_tingkatan`) VALUES
(1, 1, '0001', 'TI', '01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level_user`
--

CREATE TABLE `tbl_level_user` (
  `id_level_user` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level_user`
--

INSERT INTO `tbl_level_user` (`id_level_user`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Walikelas'),
(3, 'Guru'),
(4, 'Keuangan'),
(5, 'mahasiswa'),
(6, 'Prodi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `kd_mapel` varchar(5) NOT NULL,
  `sks` int(1) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`kd_mapel`, `sks`, `nama`) VALUES
('0001', 3, 'Proyek 2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mhs`
--

CREATE TABLE `tbl_mhs` (
  `id` int(11) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `kd_agama` int(2) NOT NULL,
  `foto` text NOT NULL,
  `kd_kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mhs`
--

INSERT INTO `tbl_mhs` (`id`, `nim`, `nama`, `gender`, `tanggal_lahir`, `tempat_lahir`, `kd_agama`, `foto`, `kd_kelas`) VALUES
(1, 'D111921129', 'Muhammad Athallah Zuhryo', 'L', '2022-06-04', 'Banda Aceh', 1, '', 'IF-6K'),
(0, 'D111921127', 'Adit Rizky Muhidin Al Faris', 'L', '2000-06-06', 'Bandung', 1, '', 'IF-6K'),
(0, 'D111921140', 'Agus', 'L', '1999-02-02', 'Bandung', 1, '', 'IF-6K'),
(0, 'D111921127', 'Asep', 'L', '1998-01-26', 'Cimahi', 1, '', 'IF-6K'),
(0, 'D111921125', 'Wildan', 'L', '1999-01-26', 'Cimahi', 1, '2.jpeg', 'IF-6K'),
(0, 'D111921127', 'wdwd', 'L', '2022-06-27', 'dw', 1, '', 'IF-2K');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `id_jadwal`, `nim`, `nilai`) VALUES
(1, 1, '18SI1000', 100),
(9, 1, 'D111921142', 89);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayat_kelas`
--

CREATE TABLE `tbl_riwayat_kelas` (
  `id_riwayat` int(11) NOT NULL,
  `kd_kelas` varchar(5) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_riwayat_kelas`
--

INSERT INTO `tbl_riwayat_kelas` (`id_riwayat`, `kd_kelas`, `nim`, `id_tahun_akademik`) VALUES
(1, '7-A1', '18SI1000', 1),
(2, '7-A1', '18SI1001', 1),
(3, '7-A1', '18SI1002', 1),
(4, '7-A1', '18SI1003', 1),
(5, '7-A1', '18TI2000', 1),
(6, '7-A1', '18TI2001', 1),
(7, '7-A1', '18TI2002', 1),
(8, '7-A1', '18TI2003', 1),
(9, '7-A1', '', 1),
(10, '8-A1', '14.12.8199', 1),
(11, '8-B1', '14.12.8198', 1),
(12, 'IF-6K', 'D111921142', 5),
(0, 'IF-6K', 'D111921128', 5),
(0, 'IF-6K', 'D111921140', 5),
(0, 'IF-6K', 'D111921127', 5),
(0, 'IF-6K', 'D111921125', 5),
(0, 'IF-2K', 'D111921127', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `kd_ruangan` varchar(10) NOT NULL,
  `nama_ruangan` varchar(30) NOT NULL,
  `kapasitas` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`kd_ruangan`, `nama_ruangan`, `kapasitas`) VALUES
('01', 'LabKom-01', 30),
('02', 'LabKOm-02', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nim` varchar(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `kd_agama` int(2) NOT NULL,
  `foto` text NOT NULL,
  `kd_kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nim`, `nama`, `gender`, `tanggal_lahir`, `tempat_lahir`, `kd_agama`, `foto`, `kd_kelas`) VALUES
('18SI1000', 'Muhammad Athallah Zuhry', 'L', '1996-12-19', 'Banda Aceh', 1, 'user-siluet.jpg', 'IF-6K'),
('D111921142', 'Wildan', '', '2001-01-12', 'Bandung', 1, '', 'IF-6K');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tahun_akademik`
--

CREATE TABLE `tbl_tahun_akademik` (
  `id_tahun_akademik` int(11) NOT NULL,
  `tahun_akademik` varchar(10) NOT NULL,
  `is_aktif` enum('Y','N') NOT NULL,
  `semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tahun_akademik`
--

INSERT INTO `tbl_tahun_akademik` (`id_tahun_akademik`, `tahun_akademik`, `is_aktif`, `semester`) VALUES
(1, '2018/2019', 'N', 'ganjil'),
(2, '2017/2018', 'N', 'genap'),
(5, '2019/2020', 'Y', 'genap');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tingkatan_kelas`
--

CREATE TABLE `tbl_tingkatan_kelas` (
  `kd_tingkatan` varchar(5) NOT NULL,
  `nama_tingkatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tingkatan_kelas`
--

INSERT INTO `tbl_tingkatan_kelas` (`kd_tingkatan`, `nama_tingkatan`) VALUES
('01', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `id_level_user` int(11) NOT NULL,
  `gender` enum('P','W') DEFAULT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_lengkap`, `username`, `password`, `id_level_user`, `gender`, `foto`) VALUES
(1, 'Taufik Hidayat', 'taufik', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL, 'user-siluet2.jpg'),
(2, 'Muhammad Mulvi', 'mulvi', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL, 'user-siluet1.jpg'),
(3, 'Ika Nurul Fadhila', 'ika', 'e10adc3949ba59abbe56e057f20f883e', 4, NULL, 'user-siluet3.jpg'),
(10, 'Adit', 'adit', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL, ''),
(11, 'Eriawan Hidayat', 'eri', 'e10adc3949ba59abbe56e057f20f883e', 3, 'P', ''),
(12, 'Dosen Satu S.T', 'dosensatu', 'e10adc3949ba59abbe56e057f20f883e', 3, 'P', ''),
(13, 'Dosen Dua S.T', 'dosendua', 'e10adc3949ba59abbe56e057f20f883e', 3, 'W', ''),
(15, 'Adit Rizky Muhidin Al Faris', 'Husky', 'e10adc3949ba59abbe56e057f20f883e', 5, 'P', ''),
(27, 'Wildan Hidayat', 'wildan', 'e10adc3949ba59abbe56e057f20f883e', 6, NULL, ''),
(0, 'd', 'dd', '77963b7a931377ad4ab5ad6a9cd718aa', 3, 'P', ''),
(0, 'amar', 'amar123', 'd01b8c6ea1a64ba2510df7cee1e4d604', 3, 'P', ''),
(0, 'amar', 'amar', 'e10adc3949ba59abbe56e057f20f883e', 3, 'P', ''),
(0, 'amar', 'amar', 'e10adc3949ba59abbe56e057f20f883e', 3, 'P', ''),
(0, 'd', 'f', 'e10adc3949ba59abbe56e057f20f883e', 3, 'W', ''),
(0, 'd', 'f', 'e10adc3949ba59abbe56e057f20f883e', 3, 'W', ''),
(0, 'sdf', 'sdf', 'e10adc3949ba59abbe56e057f20f883e', 3, 'P', ''),
(0, 'sdf', 'sdf', 'e10adc3949ba59abbe56e057f20f883e', 3, 'P', ''),
(0, 'asdf', 'sdf', 'e10adc3949ba59abbe56e057f20f883e', 3, 'P', ''),
(0, 'sasdf', 'asdf', 'e10adc3949ba59abbe56e057f20f883e', 3, 'P', ''),
(0, 'd', 'wdwd', 'cfb5c361ec839820002b2986ca0e9c27', 3, 'P', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_rule`
--

CREATE TABLE `tbl_user_rule` (
  `id_rule` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_rule`
--

INSERT INTO `tbl_user_rule` (`id_rule`, `id_menu`, `id_level_user`) VALUES
(1, 16, 4),
(2, 1, 1),
(3, 2, 1),
(4, 3, 1),
(6, 5, 1),
(7, 7, 1),
(8, 8, 1),
(9, 11, 1),
(10, 6, 1),
(11, 14, 1),
(12, 15, 1),
(15, 10, 1),
(17, 11, 3),
(19, 17, 3),
(21, 12, 3),
(23, 4, 1),
(0, 11, 5),
(0, 12, 5),
(25, 19, 6),
(0, 1, 6),
(0, 2, 6),
(0, 3, 6),
(0, 11, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_walikelas`
--

CREATE TABLE `tbl_walikelas` (
  `id_walikelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `kd_kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_walikelas`
--

INSERT INTO `tbl_walikelas` (`id_walikelas`, `id_guru`, `id_tahun_akademik`, `kd_kelas`) VALUES
(1, 0, 2, 'IF-6K'),
(3, 0, 1, '7-B1'),
(4, 0, 1, '7-B2'),
(5, 0, 1, '8-A1'),
(6, 0, 1, '8-A2'),
(7, 0, 1, '8-B1'),
(8, 0, 1, '8-B2'),
(9, 0, 1, '9-A1'),
(10, 0, 1, '9-A2'),
(11, 0, 1, '9-B1'),
(12, 0, 1, '9-B2');

-- --------------------------------------------------------

--
-- Table structure for table `view_user`
--

CREATE TABLE `view_user` (
  `id_user` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(40) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `id_level_user` int(11) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `nama_level` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD UNIQUE KEY `nidn` (`nidn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2022 pada 06.33
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pis_akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_menu`
--

CREATE TABLE `tabel_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(25) NOT NULL,
  `is_main_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_menu`
--

INSERT INTO `tabel_menu` (`id`, `nama_menu`, `link`, `icon`, `is_main_menu`) VALUES
(1, 'Data Mahasiswa', 'mahasiswa', 'fa fa-users', 0),
(2, 'Data Dosen', 'dosen', 'fa fa-user-circle', 0),
(3, 'Data Master', '#', 'fa fa-bars', 0),
(4, 'Matakuliah', 'mapel', 'fa fa-book', 0),
(5, 'Ruangan Kelas', 'ruangan', 'fa fa-building', 0),
(6, 'Tingkatan Semester', 'tingkatan', 'fa fa-sitemap', 3),
(7, 'Jurusan', 'jurusan', 'fa fa-th-large', 0),
(8, 'Tahun Akademik', 'tahunakademik', 'fa fa-calendar-check-o', 3),
(9, 'Kelas', 'kelas', 'fa fa-cubes', 0),
(10, 'Kurikulum', 'kurikulum', 'fa fa-list', 3),
(11, 'Jadwal Matakuliah', 'jadwal', 'fa fa-calendar-plus-o', 0),
(12, 'Peserta Didik', 'siswa/siswa_aktif', 'fa fa-users', 0),
(13, 'Dosen wali', 'walikelas', 'fa fa-user-plus', 0),
(14, 'Pengguna Sistem', 'user', 'fa fa-id-badge', 0),
(15, 'Menu', 'menu', 'fa fa-list', 0),
(16, 'Form Pembayaran', 'pembayaran', 'fa fa-dollar', 0),
(17, 'Nilai', 'nilai', 'fa fa-archive', 0),
(18, 'Laporan Nilai', 'laporan_nilai', 'fa fa-file-pdf-o', 0),
(19, 'Dashboard', 'tampilan_utama', '', 0),
(20, 'Absensi', 'absensi', '', 0),
(21, 'Kelas', 'kelas', 'fa fa-cubes', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `id` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `pertemuan` int(11) NOT NULL,
  `keterangan` tinyint(1) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`id`, `id_jadwal`, `id_mahasiswa`, `pertemuan`, `keterangan`, `tanggal`) VALUES
(29, 1, 2, 1, 1, '2022-07-18'),
(30, 1, 5, 1, 1, '2022-07-18'),
(31, 1, 2, 2, 1, '2022-07-18'),
(32, 1, 5, 2, 3, '2022-07-18'),
(33, 1, 2, 3, 1, '2022-07-18'),
(34, 1, 5, 3, 1, '2022-07-18'),
(35, 1, 2, 4, 2, '2022-07-18'),
(36, 1, 5, 4, 1, '2022-07-18'),
(37, 1, 7, 5, 1, '2022-07-24'),
(38, 1, 5, 5, 1, '2022-07-24'),
(39, 1, 2, 5, 1, '2022-07-24'),
(40, 1, 5, 6, 3, '2022-07-24'),
(41, 1, 7, 6, 1, '2022-07-24'),
(42, 1, 2, 6, 1, '2022-07-24'),
(43, 4, 8, 1, 1, '2022-07-24'),
(44, 4, 9, 1, 1, '2022-07-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_agama`
--

CREATE TABLE `tbl_agama` (
  `kd_agama` int(2) NOT NULL,
  `nama_agama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_agama`
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
-- Struktur dari tabel `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nidn` varchar(11) NOT NULL,
  `kd_jurusan` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id`, `id_user`, `nidn`, `kd_jurusan`) VALUES
(1, 11, 'N111921136', 'TI'),
(2, 12, 'N123456789', 'TI'),
(3, 13, 'N123456788', 'TI'),
(4, 51, 'N123400912', 'UMUM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
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
  `hari` varchar(10) NOT NULL,
  `pertemuan_ke` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id`, `id_tahun_akademik`, `semester`, `kd_jurusan`, `kd_tingkatan`, `kd_kelas`, `kd_mapel`, `id_dosen`, `jam`, `kd_ruangan`, `hari`, `pertemuan_ke`) VALUES
(1, 5, 'genap', 'TI', '01', 'IF-6K', '0001', 1, '07.15 - 08.00', '01', 'Senin', 7),
(2, 5, 'genap', 'TI', '01', 'IF-2K', '0003', 2, '10.00 - 10.45', '02', 'Rabu', 1),
(4, 5, 'genap', 'TI', '01', 'IF-6E', '0002', 1, '10.00 - 10.45', '01', 'Jumat', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal_mahasiswa`
--

CREATE TABLE `tbl_jadwal_mahasiswa` (
  `id` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jadwal_mahasiswa`
--

INSERT INTO `tbl_jadwal_mahasiswa` (`id`, `id_mahasiswa`, `id_jadwal`) VALUES
(2, 2, 1),
(3, 5, 1),
(4, 7, 1),
(5, 7, 2),
(6, 4, 2),
(7, 8, 4),
(8, 9, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id` int(11) NOT NULL,
  `kd_jurusan` varchar(5) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id`, `kd_jurusan`, `nama_jurusan`) VALUES
(1, 'AK', 'Akuntansi'),
(2, 'J1123', 'Teknik Mesin'),
(3, 'TI', 'Teknik Informatika'),
(4, 'UMUM', 'Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id` int(11) NOT NULL,
  `kd_kelas` varchar(5) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `kd_tingkatan` varchar(5) NOT NULL,
  `kd_jurusan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id`, `kd_kelas`, `nama_kelas`, `kd_tingkatan`, `kd_jurusan`) VALUES
(1, 'IF-2K', 'IF-2K', '01', 'TI'),
(2, 'IF-6K', 'IF-6K', '01', 'TI'),
(3, 'IF-6C', 'IF-6C', '01', 'TI'),
(4, 'IF-6E', 'IF-6E', '01', 'TI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_level_user`
--

CREATE TABLE `tbl_level_user` (
  `id_level_user` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_level_user`
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
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tmpt_lahir` varchar(30) NOT NULL,
  `kd_agama` int(11) NOT NULL,
  `kd_kelas` varchar(5) NOT NULL,
  `angkatan` varchar(4) NOT NULL DEFAULT '2022'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id`, `nim`, `id_user`, `tgl_lahir`, `tmpt_lahir`, `kd_agama`, `kd_kelas`, `angkatan`) VALUES
(2, 'D111921133', 49, '1998-01-03', 'Bandung', 1, 'IF-6K', '2019'),
(3, 'D111921135', 50, '1999-11-25', 'Bandung', 1, 'IF-2K', '2021'),
(4, 'D111921120', 58, '1998-01-01', 'Bandung', 1, 'IF-2K', '2021'),
(5, 'D111921101', 59, '1997-01-13', 'Jakarta', 1, 'IF-6K', '2019'),
(6, 'D111921181', 58, '1998-11-08', 'Bandung', 1, 'IF-6K', '2019'),
(7, 'D111921189', 62, '1997-10-15', 'Bandung', 1, 'IF-6K', '2019'),
(8, 'D111921190', 63, '2000-10-16', 'Bandung', 1, 'IF-6E', '2019'),
(9, 'D111921184', 64, '1994-06-14', 'Bandung', 1, 'IF-6E', '2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id` int(11) NOT NULL,
  `kd_mapel` varchar(5) NOT NULL,
  `sks` int(1) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id`, `kd_mapel`, `sks`, `nama`) VALUES
(1, '0001', 3, 'Proyek 2'),
(2, '0002', 3, 'Cloud Computing'),
(3, '0003', 2, 'Matematika Diskrit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `id_jadwal`, `nim`, `nilai`) VALUES
(1, 1, '18SI1000', 100),
(9, 1, 'D111921142', 89);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kd_jurusan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id`, `id_user`, `kd_jurusan`) VALUES
(2, 57, 'TI'),
(3, 60, 'TI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayat_kelas`
--

CREATE TABLE `tbl_riwayat_kelas` (
  `id_riwayat` int(11) NOT NULL,
  `kd_kelas` varchar(5) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_riwayat_kelas`
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
(0, 'IF-2K', 'D111921127', 5),
(0, 'IF-6K', 'D111921136', 5),
(0, 'IF-6K', 'D111921136', 5),
(0, 'IF-2K', 'D111921135', 5),
(0, 'IF-2K', 'D111921120', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id` int(11) NOT NULL,
  `kd_ruangan` varchar(10) NOT NULL,
  `nama_ruangan` varchar(30) NOT NULL,
  `kapasitas` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`id`, `kd_ruangan`, `nama_ruangan`, `kapasitas`) VALUES
(1, '01', 'LabKom-01', 30),
(2, '02', 'LabKOm-02', 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tahun_akademik`
--

CREATE TABLE `tbl_tahun_akademik` (
  `id_tahun_akademik` int(11) NOT NULL,
  `tahun_akademik` varchar(10) NOT NULL,
  `is_aktif` enum('Y','N') NOT NULL,
  `semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tahun_akademik`
--

INSERT INTO `tbl_tahun_akademik` (`id_tahun_akademik`, `tahun_akademik`, `is_aktif`, `semester`) VALUES
(1, '2018/2019', 'N', 'ganjil'),
(2, '2017/2018', 'N', 'genap'),
(5, '2019/2020', 'Y', 'genap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tingkatan_kelas`
--

CREATE TABLE `tbl_tingkatan_kelas` (
  `id` int(11) NOT NULL,
  `kd_tingkatan` varchar(5) NOT NULL,
  `nama_tingkatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tingkatan_kelas`
--

INSERT INTO `tbl_tingkatan_kelas` (`id`, `kd_tingkatan`, `nama_tingkatan`) VALUES
(1, '01', '2019'),
(2, '02', '2020'),
(3, '03', '2021'),
(4, '04', '2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
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
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_lengkap`, `username`, `password`, `id_level_user`, `gender`, `foto`) VALUES
(1, 'Taufik Hidayat', 'taufik', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL, 'user-siluet2.jpg'),
(2, 'Muhammad Mulvi', 'mulvi', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL, 'user-siluet1.jpg'),
(3, 'Ika Nurul Fadhila', 'ika', 'e10adc3949ba59abbe56e057f20f883e', 4, NULL, 'user-siluet3.jpg'),
(10, 'Adit', 'adit', '14e1b600b1fd579f47433b88e8d85291', 1, NULL, 'foto_eri5.jpg'),
(11, 'Eriawan Hidayat', 'eri', 'e10adc3949ba59abbe56e057f20f883e', 3, 'P', ''),
(12, 'Dosen Satu S.T', 'dosensatu', 'e10adc3949ba59abbe56e057f20f883e', 3, 'P', ''),
(13, 'Dosen Dua S.T', 'dosendua', 'e10adc3949ba59abbe56e057f20f883e', 3, 'W', ''),
(15, 'Adit Rizky Muhidin Al Faris', 'Husky', 'e10adc3949ba59abbe56e057f20f883e', 5, 'P', ''),
(49, 'Raisa', 'raisa', 'e10adc3949ba59abbe56e057f20f883e', 5, 'W', 'jujur-removebg-preview1.png'),
(50, 'Opik Kun', 'opik', 'e10adc3949ba59abbe56e057f20f883e', 5, 'P', '1200px-Svelte_Logo_svg3.png'),
(51, 'Dosen Umum', 'dosenumum', 'e10adc3949ba59abbe56e057f20f883e', 3, 'W', ''),
(57, 'Wildan Miftahudin', 'wili', 'e10adc3949ba59abbe56e057f20f883e', 6, NULL, ''),
(58, 'Firman Mardianto', 'firman', 'e10adc3949ba59abbe56e057f20f883e', 5, 'P', ''),
(59, 'Bill To Gate', 'bill', 'e10adc3949ba59abbe56e057f20f883e', 5, '', ''),
(60, 'Devi Oktaviani', 'oktavian', 'e10adc3949ba59abbe56e057f20f883e', 6, NULL, 'pp.jfif'),
(62, 'M Fauzan Hilmi', 'hilmi', 'e10adc3949ba59abbe56e057f20f883e', 5, 'P', 'foto_eri5.jpg'),
(63, 'Moch Firas Al Faris', 'firas', 'e10adc3949ba59abbe56e057f20f883e', 5, 'P', 'foto_eri51.jpg'),
(64, 'Ilham Lutfi', 'ilham', 'e10adc3949ba59abbe56e057f20f883e', 5, 'P', 'foto_eri52.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_rule`
--

CREATE TABLE `tbl_user_rule` (
  `id_rule` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_rule`
--

INSERT INTO `tbl_user_rule` (`id_rule`, `id_menu`, `id_level_user`) VALUES
(1, 16, 4),
(2, 1, 1),
(3, 2, 1),
(7, 7, 1),
(9, 11, 1),
(11, 14, 1),
(17, 11, 3),
(23, 4, 1),
(0, 11, 5),
(0, 1, 6),
(0, 2, 6),
(0, 1, 3),
(0, 1, 5),
(0, 5, 1),
(0, 9, 6),
(0, 11, 6),
(0, 4, 6),
(0, 9, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_walikelas`
--

CREATE TABLE `tbl_walikelas` (
  `id_walikelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `kd_kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_walikelas`
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
-- Struktur dari tabel `view_user`
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
-- Indeks untuk tabel `tabel_menu`
--
ALTER TABLE `tabel_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nidn` (`nidn`);

--
-- Indeks untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_jadwal_mahasiswa`
--
ALTER TABLE `tbl_jadwal_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_jurusan` (`kd_jurusan`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_kelas` (`kd_kelas`);

--
-- Indeks untuk tabel `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  ADD PRIMARY KEY (`id_level_user`);

--
-- Indeks untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_mhs_nim` (`nim`);

--
-- Indeks untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_mapel` (`kd_mapel`);

--
-- Indeks untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_ruangan` (`kd_ruangan`);

--
-- Indeks untuk tabel `tbl_tahun_akademik`
--
ALTER TABLE `tbl_tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indeks untuk tabel `tbl_tingkatan_kelas`
--
ALTER TABLE `tbl_tingkatan_kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_tingkatan` (`kd_tingkatan`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_menu`
--
ALTER TABLE `tabel_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal_mahasiswa`
--
ALTER TABLE `tbl_jadwal_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  MODIFY `id_level_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_tahun_akademik`
--
ALTER TABLE `tbl_tahun_akademik`
  MODIFY `id_tahun_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_tingkatan_kelas`
--
ALTER TABLE `tbl_tingkatan_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

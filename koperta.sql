-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 13 Des 2019 pada 03.26
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `anggota_id` int(11) NOT NULL,
  `koperasi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `no_ktp` int(11) NOT NULL,
  `alamat_lengkap` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `perkawinan_ke` int(11) NOT NULL,
  `jumlah_anak` int(11) NOT NULL,
  `kk` varchar(100) NOT NULL,
  `ktp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`anggota_id`, `koperasi_id`, `user_id`, `name`, `dob`, `no_ktp`, `alamat_lengkap`, `status`, `perkawinan_ke`, `jumlah_anak`, `kk`, `ktp`) VALUES
(1, 13, 30, 'sihombing', '2019-11-30', 12312312, 'sitoluama', 'jomblo', 99, 72, '', ''),
(6, 16, 56, 'coba', '2019-11-30', 12233, '123', 'menikah', 123, 123, 'Hummingbird_by_Shu_Le.jpg', 'Overlooking_by_Lance_Asper.jpg'),
(7, 19, 59, 'cintya', '1896-12-17', 0, 'medan kota', 'menikah', 9, 15, 'Autumn_in_Kanas_by_Wang_Jinyu.jpg', 'Hummingbird_by_Shu_Le.jpg'),
(8, 21, 62, 'haha', '2019-11-13', 12, 'asdf', 'menikah', 3, 3, 'Balloon_by_Matt_Benson.jpg', 'Balloon_by_Matt_Benson.jpg'),
(9, 22, 64, 'Mesra Simanjuntak', '2019-11-19', 1234441234, 'Sitluama', 'belum menikah', 0, 2, 'Beach_by_Samuel_Scrimshaw.jpg', 'Overlooking_by_Lance_Asper.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `custom_simpan_pinjam`
--

CREATE TABLE `custom_simpan_pinjam` (
  `simpan_pinjam_id` int(11) NOT NULL,
  `tanah_bangunan` tinyint(1) NOT NULL,
  `tanah` int(11) NOT NULL,
  `jenis_kendaraan` tinyint(1) NOT NULL,
  `surat_keterangan` tinyint(1) NOT NULL,
  `koperasi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `custom_simpan_pinjam`
--

INSERT INTO `custom_simpan_pinjam` (`simpan_pinjam_id`, `tanah_bangunan`, `tanah`, `jenis_kendaraan`, `surat_keterangan`, `koperasi_id`) VALUES
(1, 0, 0, 0, 0, 13),
(2, 1, 1, 1, 0, 16),
(3, 1, 0, 1, 0, 19),
(4, 0, 0, 0, 0, 19),
(5, 0, 0, 0, 0, 20),
(6, 1, 0, 1, 0, 21),
(7, 1, 0, 1, 0, 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `file_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jaminan_kendaraan`
--

CREATE TABLE `jaminan_kendaraan` (
  `jaminan_kendaraan_id` int(11) NOT NULL,
  `nama_pemilik` varchar(11) NOT NULL,
  `no_polisi` int(11) NOT NULL,
  `merk` char(250) NOT NULL,
  `tahun_pembuatan` int(11) NOT NULL,
  `warna` char(250) NOT NULL,
  `nilai_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jaminan_kendaraan`
--

INSERT INTO `jaminan_kendaraan` (`jaminan_kendaraan_id`, `nama_pemilik`, `no_polisi`, `merk`, `tahun_pembuatan`, `warna`, `nilai_harga`) VALUES
(1, '0', 0, 'gkljh', 0, 'hklj', 0),
(2, '1', 2, '3', 4, '5', 6),
(3, 'cintya', 9869879, 'kijang Inova', 1945, 'pink', 500000000),
(4, 'asdf', 12, 'asdf', 2019, 'asd', 123),
(5, '6', 6, '6', 6, '66', 6),
(6, '6', 6, '6', 6, '66', 6),
(7, '6', 6, '6', 6, '66', 6),
(8, '6', 6, '6', 6, '6', 6),
(9, '6', 6, '6', 6, '6', 6),
(10, '6', 6, '6', 6, '6', 6),
(11, '6', 6, '6', 6, '6', 6),
(12, '6', 6, '6', 6, '6', 6),
(13, '7', 7, '7', 7, '7', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jaminan_tanah`
--

CREATE TABLE `jaminan_tanah` (
  `jaminan_tanah_id` int(11) NOT NULL,
  `nama_pemilik` varchar(45) NOT NULL,
  `no` int(11) NOT NULL,
  `status_hak_milik` varchar(45) NOT NULL,
  `luas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jaminan_tanah`
--

INSERT INTO `jaminan_tanah` (`jaminan_tanah_id`, `nama_pemilik`, `no`, `status_hak_milik`, `luas`) VALUES
(1, '6', 6, '6', 6),
(2, '6', 6, '6', 6),
(3, '6', 6, '6', 6),
(4, '9', 9, '9', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jaminan_tanah_bangunan`
--

CREATE TABLE `jaminan_tanah_bangunan` (
  `jaminan_tanah_bangunan_id` int(11) NOT NULL,
  `nama_pemilik` varchar(250) NOT NULL,
  `no` int(11) NOT NULL,
  `status_hak_milik` varchar(250) NOT NULL,
  `luas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jaminan_tanah_bangunan`
--

INSERT INTO `jaminan_tanah_bangunan` (`jaminan_tanah_bangunan_id`, `nama_pemilik`, `no`, `status_hak_milik`, `luas`) VALUES
(1, '6', 6, '6', 6),
(2, '6', 6, '6', 6),
(3, 'jh', 0, 'hjk', 0),
(4, 'jh', 0, 'kjh', 0),
(5, 'lkj', 0, 'lk', 0),
(6, 'lkj', 0, 'lk', 0),
(7, '7', 8, '9', 10),
(8, 'lkj', 0, 'lk', 0),
(9, '7', 8, '9', 10),
(10, 'cintya', 1, 'milik', 40),
(11, 'asdf', 2, 'asdf', 0),
(12, '6', 6, '6', 6),
(13, '6', 6, '6', 6),
(14, '6', 6, '6', 6),
(15, '6', 6, '6', 6),
(16, '6', 6, '6', 6),
(17, '6', 6, '6', 6),
(18, '6', 6, '6', 6),
(19, '6', 6, '6', 6),
(20, '7', 7, '7', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `koperasi`
--

CREATE TABLE `koperasi` (
  `koperasi_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `tanggal_berdiri` varchar(45) NOT NULL,
  `tipe_koperasi_id` int(11) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `deskripsi` text NOT NULL,
  `kode_pos` varchar(45) NOT NULL,
  `provinsi` varchar(45) NOT NULL,
  `kabupaten` varchar(45) NOT NULL,
  `kecamatan` varchar(45) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `koperasi`
--

INSERT INTO `koperasi` (`koperasi_id`, `name`, `tanggal_berdiri`, `tipe_koperasi_id`, `alamat`, `deskripsi`, `kode_pos`, `provinsi`, `kabupaten`, `kecamatan`, `status`) VALUES
(0, 'default', '2019-11-21', 1, 'default', 'default', 'default', 'default', 'default', 'default', 0),
(12, 'asdf', '2019-Nov-06', 1, 'sadf', 'sadf', 'sadf', 'sadf', 'asdf', 'asdf', 1),
(13, 'Koperasi Mangarahon', '2019-Nov-01', 1, 'jl. Politeknik Del', 'koperasi simpan pinjam', '22881', 'sumatera utara', 'Toba Samosir', 'Laguboti', 1),
(14, 'Ko33', '2019-Nov-20', 1, 'eewew34', '34434fff', 'rrrrtrrerrr', '3444', '444', '4444', 1),
(15, 'Ko33', '2019-Nov-20', 1, 'eewew34', '34434fff', '23212', '3444', '444', '4444', 0),
(16, 'Mangarahon', '2019-Nov-25', 2, '44343', '4434', 'gdfgfdg', '43', '333', '33', 1),
(17, 'andre', '2019-Nov-13', 1, 'jln jalan', 'ngak tau ', '22452', 'sumut', 'taput', 'sipoholin', 0),
(18, 'andre', '2019-Nov-13', 1, 'jln jalan', 'ngak tau ', '22452', 'sumut', 'taput', 'sipoholin', 1),
(19, 'mangarahon', '2019-Nov-22', 1, 'amerika', 'ntah apa', '22452', 'sumatera utara', 'Toba Samosir', 'sipoholon', 1),
(20, 'Sumber Uang', '2019-Nov-30', 1, 'dfg', 'dafasdfasdf', '1231', 'sumatera utara', 'Tobasa', 'sipoholon', 1),
(21, 'mangarahon', '2019-Nov-21', 1, 'sitol', 'sitol', '22881', 'sumatera utara', 'Toba Samosir', 'Laguboti', 1),
(22, 'Mangarahon', '2019-Nov-20', 1, 'Sitoluama', 'Mangarahon.....', '22881', 'sumatera utara', 'Tobasa', 'Laguboti', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1574235936),
('m130524_201442_init', 1574235954),
('m190124_110200_add_verification_token_column_to_user_table', 1574235954);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjaman_id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `koperasi_id` int(11) NOT NULL,
  `tujuan_kredit` text NOT NULL,
  `nilai_permohonan` int(11) NOT NULL,
  `angsuran_kredit` int(11) NOT NULL,
  `total_angsuran` int(11) NOT NULL,
  `pekerjaan_utama` varchar(250) NOT NULL,
  `pekerjaan_sampingan` varchar(250) NOT NULL,
  `pendapatan_sampingan` int(11) NOT NULL,
  `total_pendapatan_kotor` int(11) NOT NULL,
  `biaya_lainnya` varchar(500) NOT NULL,
  `biaya_pengeluaran` int(11) NOT NULL,
  `pendapatan_bersih` int(11) NOT NULL,
  `jaminan_tanah_bangunan_id` int(11) DEFAULT NULL,
  `jaminan_kendaraan_id` int(11) DEFAULT NULL,
  `jaminan_tanah_id` int(11) NOT NULL,
  `jaminan_sk_id` int(11) DEFAULT NULL,
  `banyak_pinjaman` int(11) NOT NULL,
  `plafon_terakhir` int(11) NOT NULL,
  `tanggal_pelunasan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman_id`, `anggota_id`, `koperasi_id`, `tujuan_kredit`, `nilai_permohonan`, `angsuran_kredit`, `total_angsuran`, `pekerjaan_utama`, `pekerjaan_sampingan`, `pendapatan_sampingan`, `total_pendapatan_kotor`, `biaya_lainnya`, `biaya_pengeluaran`, `pendapatan_bersih`, `jaminan_tanah_bangunan_id`, `jaminan_kendaraan_id`, `jaminan_tanah_id`, `jaminan_sk_id`, `banyak_pinjaman`, `plafon_terakhir`, `tanggal_pelunasan`) VALUES
(13, 7, 16, '7', 7, 7, 7, '7', '7', 7, 7, '7', 76, 7, 20, 13, 4, NULL, 7, 7, '2019-12-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyimpanan`
--

CREATE TABLE `penyimpanan` (
  `penyimpanan_id` int(11) NOT NULL,
  `koperasi_id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `tipe_penyimpanan_id` int(11) NOT NULL,
  `nilai_transaksi` double NOT NULL,
  `petugas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyimpanan`
--

INSERT INTO `penyimpanan` (`penyimpanan_id`, `koperasi_id`, `anggota_id`, `tgl_transaksi`, `tipe_penyimpanan_id`, `nilai_transaksi`, `petugas_id`) VALUES
(5, 16, 6, '2019-11-29 09:58:40', 2, 1, 1),
(6, 16, 1, '2019-12-05 20:44:37', 1, 1000000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `petugas_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`petugas_id`, `user_id`, `name`) VALUES
(1, 30, 'Admin'),
(2, 33, 'Kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `tanggal_lahir` varchar(45) DEFAULT NULL,
  `koperasi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`profile_id`, `nama`, `alamat`, `tanggal_lahir`, `koperasi_id`, `user_id`) VALUES
(11, 'andre reynaldo sihombing', 'Jln sisingamagaraja', '2019-Nov-23', 16, 30),
(16, 'admin', 'sipoholon', NULL, 0, 57),
(17, 'itok', 'medan', '2019-Nov-22', 19, 58),
(18, 'premi', 'premi123', NULL, 20, 60),
(19, 'leni', 'medan', NULL, 21, 61),
(20, 'mangarahon', 'Sitoluama', NULL, 22, 63);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_koperasi`
--

CREATE TABLE `tipe_koperasi` (
  `tipe_koperasi_id` int(11) NOT NULL,
  `tipe` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_koperasi`
--

INSERT INTO `tipe_koperasi` (`tipe_koperasi_id`, `tipe`) VALUES
(1, 'Simpan Pinjam'),
(2, 'Usaha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_penyimpanan`
--

CREATE TABLE `tipe_penyimpanan` (
  `tipe_penyimpanan_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_penyimpanan`
--

INSERT INTO `tipe_penyimpanan` (`tipe_penyimpanan_id`, `name`) VALUES
(1, 'Setoran'),
(2, 'Tarikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`, `role`) VALUES
(30, 'andre', 'sTNSkT_6zV2xbCLwupu626ybx0fK8fiW', '$2y$13$uvuzMfjWbbEJuDX81gwfSuovWX1Kf2O9uhw8bPbKR9hqLsmpYdlYy', NULL, 'andre@gmail.com', 10, 1574343449, 1574343449, 'g-O9fSVcaPhIIydOIHFLWLNNzTlwBO8V_1574343449', 1),
(56, 'coba30112019', 'VZWmvPORVJ2WUDTNUaTzUvx6bnqZYGgE', '$2y$13$f4xvm6ewDV2eJFZI.Vk5Cev2H4CatePVs6DoSs0ZHMiPmAnVQDOxa', NULL, 'coba@gmail.com', 9, 1574990834, 1574990834, 'EsQgObaZ_lc19mOTKmGTdH8u1A5IH594_1574990834', 1),
(57, 'admin', 'Fdol5kN8pGya816Ed1gkNJocrs4ye5NI', '$2y$13$7Fz1JY0pInSFVBbdcqiLLOs8KK9igJzCe9FVT3v8qz.AfvEPTp1Xa', NULL, 'admin@gmail.com', 10, 1574991003, 1574991003, 'DSwz1Pk6iiKycbRHiFvlAaJMOVQRVake_1574991003', 1),
(58, 'itok', 'axburF6eSUsVBhrAs2u4h7QpVQ0xfGP9', '$2y$13$/PmxXdwP7b2LLwuFXMw0M..lnZC8ZhkXBT5szTsVElcVmlwD5WpQS', NULL, 'itok@gmail.com', 10, 1574991938, 1574991938, 'aFfO_ryVW7CzSkk166HQ4l9mrDeIyLSW_1574991938', 1),
(59, 'cintya17121896', 'mKSdiIjmOp-Kr2H4m9jPOyLkfnhpWmG0', '$2y$13$uRV73PYQlpJNq/h8sCH7ouEvWyHUzoghRoq/tyPB9VPmXrKc.noAW', NULL, 'cintya@gmail.com', 9, 1574992400, 1574992400, 'vfE_q8SoSJTeqZn8N_K2dHEMofQ6dCRy_1574992400', 1),
(60, 'premi', 'z0R3IUyQWDNELwHIFLvj70Wo7TbKaonj', '$2y$13$bCyqMkt2r7R8BvsNHmOtsOblwGZJelN6uVE4HfrfAluCOZyUjNka.', NULL, 'premi@mail.com', 10, 1574993190, 1574993190, 'e8WVvA---navrMHF_rrmZGVueDvQKoKj_1574993190', 1),
(61, 'leni', 'DFqAuaINMlbupowcgsEaIIOjSeujohRU', '$2y$13$QPSVm/CakTGiVM5LZy5u0.kuOH/LHG/L5RcJC5hoDJ6//GFn7NFam', NULL, 'leni@gmail.com', 10, 1574996891, 1574996891, 'YIA2_plhB_ni0vYLJsbxZr9NehU_rrTh_1574996891', 1),
(62, 'haha13112019', 'tdPTu7PvIjdXrhHX_CAWDcwOBg-bcLng', '$2y$13$vIXugLy9.MzAyC8j3jJfPOyYzaVMsbDJvtkrI8oFAVCL5wYtr/a3.', NULL, 'haha@gmail.com', 9, 1574997228, 1574997228, 'iCwEzQobkrCF1o0B10rA61wPWw4jvY6i_1574997228', 1),
(63, 'mangarahon', 'dgvmWxZOUWRUw_Th6kJ2YDme4iAYwVXi', '$2y$13$XbZ/HVtyVWRrnR91ti/yLOpDOrv.rrp0fVONaVScdYebbOUDbtYy2', NULL, 'mangarahon@gmail.com', 10, 1574999262, 1574999262, 'OodE-MmSMAL-jG2LeK6Dp_LpIinlfWs6_1574999262', 1),
(64, 'mesra19112019', 'gwEJfB_DkihZLO7j1r2C9r5TXqISGC1b', '$2y$13$c.cxDxSCExvM/9CiHGD/zO6NKg88NTL8Wg52I.7Y9rz8ba83/lAqq', NULL, '-', 9, 1574999870, 1574999870, 'CjHmJNJM1xO4BqPvfw2hihEj9NtfJ9bB_1574999870', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`anggota_id`),
  ADD KEY `anggota_koperasi` (`koperasi_id`);

--
-- Indeks untuk tabel `custom_simpan_pinjam`
--
ALTER TABLE `custom_simpan_pinjam`
  ADD PRIMARY KEY (`simpan_pinjam_id`);

--
-- Indeks untuk tabel `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`file_id`);

--
-- Indeks untuk tabel `jaminan_kendaraan`
--
ALTER TABLE `jaminan_kendaraan`
  ADD PRIMARY KEY (`jaminan_kendaraan_id`);

--
-- Indeks untuk tabel `jaminan_tanah`
--
ALTER TABLE `jaminan_tanah`
  ADD PRIMARY KEY (`jaminan_tanah_id`);

--
-- Indeks untuk tabel `jaminan_tanah_bangunan`
--
ALTER TABLE `jaminan_tanah_bangunan`
  ADD PRIMARY KEY (`jaminan_tanah_bangunan_id`);

--
-- Indeks untuk tabel `koperasi`
--
ALTER TABLE `koperasi`
  ADD PRIMARY KEY (`koperasi_id`),
  ADD KEY `koperasi_tipekoperasi` (`tipe_koperasi_id`);

--
-- Indeks untuk tabel `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjaman_id`),
  ADD KEY `pinjaman_jaminan_tanah_bangunan` (`jaminan_tanah_bangunan_id`),
  ADD KEY `pinjaman_jaminan_kendaraan` (`jaminan_kendaraan_id`),
  ADD KEY `anggota_peminjam` (`anggota_id`),
  ADD KEY `fk_jaminan_tanah` (`jaminan_tanah_id`);

--
-- Indeks untuk tabel `penyimpanan`
--
ALTER TABLE `penyimpanan`
  ADD PRIMARY KEY (`penyimpanan_id`),
  ADD KEY `fk_anggota` (`anggota_id`),
  ADD KEY `fk_koperasi` (`koperasi_id`),
  ADD KEY `fk_petugas` (`petugas_id`),
  ADD KEY `fk_tipe` (`tipe_penyimpanan_id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`petugas_id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `koperasi_profil` (`koperasi_id`),
  ADD KEY `user_profil` (`user_id`);

--
-- Indeks untuk tabel `tipe_koperasi`
--
ALTER TABLE `tipe_koperasi`
  ADD PRIMARY KEY (`tipe_koperasi_id`);

--
-- Indeks untuk tabel `tipe_penyimpanan`
--
ALTER TABLE `tipe_penyimpanan`
  ADD PRIMARY KEY (`tipe_penyimpanan_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `anggota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `custom_simpan_pinjam`
--
ALTER TABLE `custom_simpan_pinjam`
  MODIFY `simpan_pinjam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jaminan_kendaraan`
--
ALTER TABLE `jaminan_kendaraan`
  MODIFY `jaminan_kendaraan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `jaminan_tanah`
--
ALTER TABLE `jaminan_tanah`
  MODIFY `jaminan_tanah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jaminan_tanah_bangunan`
--
ALTER TABLE `jaminan_tanah_bangunan`
  MODIFY `jaminan_tanah_bangunan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `koperasi`
--
ALTER TABLE `koperasi`
  MODIFY `koperasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `penyimpanan`
--
ALTER TABLE `penyimpanan`
  MODIFY `penyimpanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `petugas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tipe_koperasi`
--
ALTER TABLE `tipe_koperasi`
  MODIFY `tipe_koperasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tipe_penyimpanan`
--
ALTER TABLE `tipe_penyimpanan`
  MODIFY `tipe_penyimpanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_koperasi` FOREIGN KEY (`koperasi_id`) REFERENCES `koperasi` (`koperasi_id`);

--
-- Ketidakleluasaan untuk tabel `koperasi`
--
ALTER TABLE `koperasi`
  ADD CONSTRAINT `koperasi_tipekoperasi` FOREIGN KEY (`tipe_koperasi_id`) REFERENCES `tipe_koperasi` (`tipe_koperasi_id`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `anggota_peminjam` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`anggota_id`),
  ADD CONSTRAINT `fk_jaminan_kendaraan` FOREIGN KEY (`jaminan_kendaraan_id`) REFERENCES `jaminan_kendaraan` (`jaminan_kendaraan_id`),
  ADD CONSTRAINT `fk_jaminan_tanah` FOREIGN KEY (`jaminan_tanah_id`) REFERENCES `jaminan_tanah` (`jaminan_tanah_id`),
  ADD CONSTRAINT `fk_peminjaman_anggota` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`anggota_id`),
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`jaminan_tanah_bangunan_id`) REFERENCES `jaminan_tanah_bangunan` (`jaminan_tanah_bangunan_id`),
  ADD CONSTRAINT `pinjaman_jaminan_kendaraan` FOREIGN KEY (`jaminan_kendaraan_id`) REFERENCES `jaminan_kendaraan` (`jaminan_kendaraan_id`),
  ADD CONSTRAINT `pinjaman_jaminan_tanah_bangunan` FOREIGN KEY (`jaminan_tanah_bangunan_id`) REFERENCES `jaminan_tanah_bangunan` (`jaminan_tanah_bangunan_id`);

--
-- Ketidakleluasaan untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `koperasi_profil` FOREIGN KEY (`koperasi_id`) REFERENCES `koperasi` (`koperasi_id`),
  ADD CONSTRAINT `user_profil` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

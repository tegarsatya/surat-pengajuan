-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2019 at 07:10 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_divisi`
--

CREATE TABLE `mst_divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_divisi`
--

INSERT INTO `mst_divisi` (`id_divisi`, `nama_divisi`) VALUES
(2, 'Keuangan dan Akunting'),
(3, 'Administrasi'),
(4, 'Pemasaran'),
(5, 'Sekretariat'),
(6, 'Customer Service');

-- --------------------------------------------------------

--
-- Table structure for table `mst_jabatan`
--

CREATE TABLE `mst_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_jabatan`
--

INSERT INTO `mst_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(2, 'Staf Operasional'),
(3, 'Staf Administrasi'),
(4, 'Staf Pemasaran'),
(5, 'Staf Sekretariat'),
(6, 'Staf Akunting'),
(7, 'Staf CS');

-- --------------------------------------------------------

--
-- Table structure for table `mst_kat_surat`
--

CREATE TABLE `mst_kat_surat` (
  `id_kat_surat` int(11) NOT NULL,
  `kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_kat_surat`
--

INSERT INTO `mst_kat_surat` (`id_kat_surat`, `kategori`) VALUES
(1, 'Surat Intern'),
(2, 'Surat Ekstern');

-- --------------------------------------------------------

--
-- Table structure for table `mst_surat`
--

CREATE TABLE `mst_surat` (
  `id_surat` int(11) NOT NULL,
  `kode_surat` text NOT NULL,
  `kategori_surat` text NOT NULL,
  `jenis_surat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_surat`
--

INSERT INTO `mst_surat` (`id_surat`, `kode_surat`, `kategori_surat`, `jenis_surat`) VALUES
(1, 'SUR-102019001', 'Surat Intern', 'Pemberitahuan'),
(3, 'SUR-102019002', 'Surat Intern', 'Peringatan'),
(4, 'SUR-102019003', 'Surat Intern', 'Dinas'),
(5, 'SUR-102019004', 'Surat Ekstern', 'Undangan');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE `mst_user` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `level` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`id`, `nama`, `email`, `username`, `password`, `level`, `image`, `date_created`, `is_active`) VALUES
(9, 'Donny Kurniawan', 'ata.adonia@gmail.com', 'admin', '$2y$10$Fu4wp6uWIOdEPOIpkSXxouzwI1syhygCmFMqedNI1baUxrPJ2LHRC', 'Admin', 'avatar55.png', '2019-08-06', 1),
(21, 'Adonia Vincent N', 'adonia_ata@yahoo.com', 'user', '$2y$10$etiFa08mC.qXGT9cyUJrTubWcJzwERdrHSbMvF1/VBagCUXU57meO', 'User', 'avatar043.png', '2019-10-10', 1),
(35, 'Ratna Damayanti', 'admin@gmail.com', 'maya', '$2y$10$bPFrhPwKbNU1Cy5lVY5h.OkZKKzSRwVeKYkum39ASGBmpzWr/eZc2', 'User', 'default.jpg', '2019-10-27', 1),
(36, 'Arnold Jumangin', 'adonia_ata@yahoo.com', 'arnold', '$2y$10$fXqAtNC0sXp79yeM18Yk0utkZdX0Q.soIABNPDQ.UbHwRIWXV6z8C', 'User', 'avatar31.png', '2019-10-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkas`
--

CREATE TABLE `tb_berkas` (
  `id_berkas` int(11) NOT NULL,
  `sess_id` int(11) NOT NULL,
  `kd_berkas` text NOT NULL,
  `tuj_berkas` text NOT NULL,
  `nama_berkas` text NOT NULL,
  `tgl_berkas` date NOT NULL,
  `pesan` text NOT NULL,
  `file_upload` varchar(250) NOT NULL,
  `status_berkas` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_berkas`
--

INSERT INTO `tb_berkas` (`id_berkas`, `sess_id`, `kd_berkas`, `tuj_berkas`, `nama_berkas`, `tgl_berkas`, `pesan`, `file_upload`, `status_berkas`) VALUES
(1, 21, 'FILES-27102019-001', 'Keuangan dan Akunting', 'Berkas Penting -edit', '2019-10-13', 'Data pembayaran Hutang', 'profile.docx', 0),
(3, 36, 'FILES/27102019/002', 'Keuangan dan Akunting', 'Berkas Pengajuan Uang transportasi', '2019-10-28', 'Tes Saja - Edit', 'Weekly_chore_schedule1.xlsx', 0),
(4, 35, 'FILES/27102019/003', 'Administrasi', 'Amfrah Kursi dan Meja', '2019-10-28', 'Ditunggu secepatnya', 'profile1.docx', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_struktural`
--

CREATE TABLE `tb_struktural` (
  `id_struktur` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kode_pegawai` text NOT NULL,
  `nama_pegawai` text NOT NULL,
  `jabatan_nm` text NOT NULL,
  `divisi_nm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_struktural`
--

INSERT INTO `tb_struktural` (`id_struktur`, `user_id`, `kode_pegawai`, `nama_pegawai`, `jabatan_nm`, `divisi_nm`) VALUES
(1, 9, '1020190001', 'Donny Kurniawan', 'Staf Administrasi', 'Administrasi'),
(3, 21, '1020190002', 'Adonia Vincent N', 'Staf Administrasi', 'Administrasi'),
(4, 35, '1020190003', 'Ratna Damayanti', 'Staf Akunting', 'Keuangan dan Akunting'),
(5, 36, '1020190004', 'Arnold Jumangin', 'Staf Pemasaran', 'Pemasaran');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_tb_surat` int(11) NOT NULL,
  `sess_id` int(11) NOT NULL,
  `jns_surat` text NOT NULL,
  `kd_surat` text NOT NULL,
  `no_surat` text NOT NULL,
  `tuj_surat` text NOT NULL,
  `tgl_surat` date NOT NULL,
  `isi_surat` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat`
--

INSERT INTO `tb_surat` (`id_tb_surat`, `sess_id`, `jns_surat`, `kd_surat`, `no_surat`, `tuj_surat`, `tgl_surat`, `isi_surat`, `status`) VALUES
(1, 21, 'Pemberitahuan', '26102019-001', '12/KU/2019/001', 'Keuangan dan Akunting', '2019-10-07', 'Tes Kirim-edit', 0),
(3, 21, 'Pemberitahuan', '27102019/002', '12/KU/2019/003', 'Administrasi', '2019-10-28', 'Akan diadakan lomba maranthon', 0),
(4, 35, 'Dinas', '27102019/003', '12/KU/2019/003', 'Administrasi', '2019-10-28', 'Perjalanan Dinas', 0),
(5, 36, 'Dinas', '27102019/004', '14/002/KU/006', 'Keuangan dan Akunting', '2019-10-28', 'Pengajuan Uang Transportasi untuk dinas ke Semarang sebesar Rp 150.000', 0),
(6, 36, 'Pemberitahuan', '27102019/005', '17/KPU/2009/0001', 'Administrasi', '2019-10-28', 'Akan diadakan Sosialisasi Kesehatan - Edit', 0),
(7, 21, 'Dinas', '27102019/006', '12/KU/2019/001', 'Pemasaran', '2019-10-21', 'Cek lagi', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_divisi`
--
ALTER TABLE `mst_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `mst_jabatan`
--
ALTER TABLE `mst_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `mst_kat_surat`
--
ALTER TABLE `mst_kat_surat`
  ADD PRIMARY KEY (`id_kat_surat`);

--
-- Indexes for table `mst_surat`
--
ALTER TABLE `mst_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `tb_struktural`
--
ALTER TABLE `tb_struktural`
  ADD PRIMARY KEY (`id_struktur`);

--
-- Indexes for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_tb_surat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_divisi`
--
ALTER TABLE `mst_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mst_jabatan`
--
ALTER TABLE `mst_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mst_kat_surat`
--
ALTER TABLE `mst_kat_surat`
  MODIFY `id_kat_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mst_surat`
--
ALTER TABLE `mst_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_struktural`
--
ALTER TABLE `tb_struktural`
  MODIFY `id_struktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id_tb_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

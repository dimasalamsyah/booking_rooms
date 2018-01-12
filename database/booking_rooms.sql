-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 Jan 2018 pada 12.24
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_rooms`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daemons`
--

CREATE TABLE `daemons` (
  `Start` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `kode_dosen` varchar(50) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `tanggal_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`kode_dosen`, `nama_dosen`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `no_tlp`, `pic`, `tanggal_update`) VALUES
('KD001', 'Dimas Alamsyah', '2016-04-19', 'jakarta', 'bekasi', '6543', 'dimas', '2016-04-10'),
('KD002', 'Alamsyah', '2016-05-19', 'jakarta', 'bogor', '876543', 'dimas', '2016-04-26'),
('KD003', 'anggit', '2016-03-23', 'bekasi', 'bekasi', '08977666', 'dimas', '2016-03-31'),
('KD004', 'hadi', '2016-03-29', 'jakarta', 'bekasi', '0897988', 'dimas', '2016-03-31'),
('KD005', 'nisa', '2016-03-22', 'padang', 'bekasi', '09876', 'dimas', '2016-03-31'),
('KD020', 'dimas', '2016-04-19', 'd', 'd', '2', 'dimas', '2016-04-26'),
('KD021', 'Dian yuliana', '2016-04-19', 'bekasi', 'bekasi', '+628979598672', 'dimas', '2016-04-26'),
('KD022', 'hadi saputra', '2016-04-12', 'bekasi', 'bekasi', '09876789098', 'dimas', '2016-04-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id`, `nama`, `ukuran`, `tipe`, `username`) VALUES
(19, 'default.jpg', 1, 'image/jpeg', ''),
(22, 'jerman away 2016.jpg', 39846, 'image/jpeg', 'DIMAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gammu`
--

CREATE TABLE `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `gammu`
--

INSERT INTO `gammu` (`Version`) VALUES
(13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `inbox`
--

INSERT INTO `inbox` (`UpdatedInDB`, `ReceivingDateTime`, `Text`, `SenderNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `RecipientID`, `Processed`) VALUES
('2016-06-20 02:37:08', '2016-06-20 01:37:06', '0042006F006F006B0069006E00670023003200300037002300310035002E00300030002300320031002D00300036002D003200300031003600230079006500790079', '+628979598671', 'Default_No_Compression', '', '+628964011092', -1, 'Booking#207#15.00#21-06-2016#yeyy', 163, '', 'true'),
('2016-06-20 02:58:09', '2016-06-20 02:57:48', '0042006F006F006B0069006E00670023003200300037002300310034002E00300030002300320031002D00300036002D003200300031003600230079006500790079', '+628979598671', 'Default_No_Compression', '', '+628964011092', -1, 'Booking#207#14.00#21-06-2016#yeyy', 164, '', 'true'),
('2016-06-20 03:22:51', '2016-06-20 03:21:20', '005400650073', '+6285880544933', 'Default_No_Compression', '', '+62816124', -1, 'Tes', 165, '', 'true'),
('2016-06-19 13:47:34', '2016-06-19 13:47:10', '0062006F006F006B0069006E00670023003200300032002300310030002E00300030002300320032002D00300036002D00320030003100360023007000650073', '+6289616796793', 'Default_No_Compression', '', '+628964011092', -1, 'booking#202#10.00#22-06-2016#pes', 150, '', 'true'),
('2016-06-19 13:54:21', '2016-06-19 13:52:36', '00450064006900740062006F006F006B0069006E00670023004B005200300031003200310030002E00300030003200320030003600320030003100360023003200300031002300310030002E00300030002300320032002D00300036002D00320030003100360023007000650073', '+6289616796793', 'Default_No_Compression', '', '+628964011092', -1, 'Editbooking#KR01210.0022062016#201#10.00#22-06-2016#pes', 151, '', 'true'),
('2016-06-19 14:05:50', '2016-06-19 14:05:33', '00450064006900740062006F006F006B0069006E00670023004B005200300030003700300038002E00300030003200300030003600320030003100360023003200300031002300310030002E00300030002300320032002D00300036002D00320030003100360023007000650073', '+6289616796793', 'Default_No_Compression', '', '+628964011092', -1, 'Editbooking#KR00708.0020062016#201#10.00#22-06-2016#pes', 152, '', 'true'),
('2016-06-19 14:08:04', '2016-06-19 14:07:27', '0042004F004F004B0049004E00470023003200300037002300300038002E00300030002300320030002D00300036002D0032003000310036002300610070006100200061006A006100200062006F006C00650068', '+6289616796793', 'Default_No_Compression', '', '+628964011092', -1, 'BOOKING#207#08.00#20-06-2016#apa aja boleh', 153, '', 'true'),
('2016-06-19 14:09:52', '2016-06-19 14:09:38', '00450064006900740062006F006F006B0069006E00670023004B005200300030003700300038002E00300030003200300030003600320030003100360023003200300031002300300038002E00300030002300310039002D00300036002D00320030003100360023007000650073', '+6289616796793', 'Default_No_Compression', '', '+628964011092', -1, 'Editbooking#KR00708.0020062016#201#08.00#19-06-2016#pes', 154, '', 'true'),
('2016-06-19 14:10:54', '2016-06-19 14:10:38', '00450064006900740062006F006F006B0069006E00670023004B005200300030003700300038002E00300030003200300030003600320030003100360023003200300037002300300038002E00300030002300310039002D00300036002D00320030003100360023007000650073', '+6289616796793', 'Default_No_Compression', '', '+628964011092', -1, 'Editbooking#KR00708.0020062016#207#08.00#19-06-2016#pes', 155, '', 'true'),
('2016-06-19 14:13:18', '2016-06-19 14:12:55', '0042004F004F004B0049004E00470023003200300037002300300038002E00300030002300320031002D00300036002D0032003000310036002300610070006100200061006A006100200062006F006C00650068', '+6289616796793', 'Default_No_Compression', '', '+628964011092', -1, 'BOOKING#207#08.00#21-06-2016#apa aja boleh', 156, '', 'true'),
('2016-06-19 14:15:16', '2016-06-19 14:15:05', '00450064006900740062006F006F006B0069006E00670023004B005200300030003700300038002E00300030003200310030003600320030003100360023003200300037002300300038002E00300030002300320032002D00300036002D00320030003100360023007000650073', '+6289616796793', 'Default_No_Compression', '', '+628964011092', -1, 'Editbooking#KR00708.0021062016#207#08.00#22-06-2016#pes', 157, '', 'true'),
('2016-06-19 14:17:14', '2016-06-19 14:16:59', '00450064006900740062006F006F006B0069006E00670023004B005200300030003700300038002E00300030003200320030003600320030003100360023003200300031002300300038002E00300030002300310039002D00300036002D00320030003100360023007000650073', '+6289616796793', 'Default_No_Compression', '', '+628964011092', -1, 'Editbooking#KR00708.0022062016#201#08.00#19-06-2016#pes', 158, '', 'true'),
('2016-06-19 14:20:57', '2016-06-19 14:18:33', '00430061006E00630061006C0062006F006F006B0069006E00670023004B005200300030003700300038002E0030003000320032003000360032003000310036', '+6289616796793', 'Default_No_Compression', '', '+628964011092', -1, 'Cancalbooking#KR00708.0022062016', 159, '', 'true'),
('2016-06-19 14:20:16', '2016-06-19 14:19:51', '00430061006E00630065006C0062006F006F006B0069006E00670023004B005200300030003700300038002E0030003000320032003000360032003000310036', '+6289616796793', 'Default_No_Compression', '', '+628964011092', -1, 'Cancelbooking#KR00708.0022062016', 160, '', 'true'),
('2016-06-20 02:10:26', '2016-06-20 02:10:08', '0042006F006F006B0069006E00670023003200300037002300300039002E00300030002300320031002D00300036002D0032003000310036002300660075007400730061006C', '+628979598671', 'Default_No_Compression', '', '+628964011092', -1, 'Booking#207#09.00#21-06-2016#futsal', 161, '', 'true'),
('2016-06-20 02:12:40', '2016-06-20 02:12:20', '00450064006900740062006F006F006B0069006E00670023004B005200300030003700300039002E00300030003200310030003600320030003100360023003200300037002300310033002E00300030002300320034002D00300036002D003200300031003600230062006500720068006100730069006C', '+628979598671', 'Default_No_Compression', '', '+628964011092', -1, 'Editbooking#KR00709.0021062016#207#13.00#24-06-2016#berhasil', 162, '', 'true');

--
-- Trigger `inbox`
--
DELIMITER $$
CREATE TRIGGER `inbox_timestamp` BEFORE INSERT ON `inbox` FOR EACH ROW BEGIN
    IF NEW.ReceivingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.ReceivingDateTime = CURRENT_TIMESTAMP();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_sms`
--

CREATE TABLE `info_sms` (
  `id_info` int(11) NOT NULL,
  `kode_pembooking` varchar(30) NOT NULL,
  `nama_pembooking` varchar(50) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `pesan` text NOT NULL,
  `tgl_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(30) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info_sms`
--

INSERT INTO `info_sms` (`id_info`, `kode_pembooking`, `nama_pembooking`, `jabatan`, `no_tlp`, `pesan`, `tgl_pesan`, `status`, `user`) VALUES
(49, 'KK001', 'Qomar', 'karyawan', '121', 'sss', '2016-05-06 16:37:06', 'Tolak', ''),
(50, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Tes', '2016-05-07 01:44:34', 'Tolak', ''),
(51, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Booking#KR018#2016-05-06#KJ11#booking bem.', '2016-05-07 02:00:03', 'Terima', ''),
(52, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Ffh', '2016-05-07 02:09:57', 'Tolak', ''),
(53, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Booking#KR018#2016-05-08#KJ11#bimbingan.', '2016-05-07 02:24:56', 'Terima', 'DIMAS'),
(54, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Booking#KR018#2016-05-08#KJ11#bimbingan.', '2016-05-07 02:59:16', 'Tolak', 'DIMAS'),
(55, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Booking#KR018#2016-05-08#KJ11#bimbingan.', '2016-05-07 02:29:17', 'Terima', 'DIMAS'),
(56, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Booking#KR018#2016-05-08#KJ11#bimbingan aja', '2016-05-07 02:55:47', 'Terima', 'DIMAS'),
(57, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Booking#KR018#2016-05-08#KJ11#bimbingan aja', '2016-05-07 02:56:35', 'Terima', 'DIMAS'),
(58, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Booking#KR018#2016-05-08#KJ11#bimbingan.', '2016-05-07 02:58:03', 'Tolak', 'DIMAS'),
(59, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Booking#KR018#2016-05-08#KJ11#bimbingan.', '2016-05-07 02:59:58', 'Tolak', 'DIMAS'),
(60, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Booking#KR018#2016-05-09#KJ11#dddd', '2016-05-07 03:03:07', 'Terima', 'DIMAS'),
(61, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Booking#KR018#2016-05-09#KJ08#dddd', '2016-05-07 03:04:41', 'Terima', 'DIMAS'),
(62, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Booking#KR018#2016-05-09#KJ08#dddd', '2016-05-07 03:07:23', 'Tolak', 'DIMAS'),
(63, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Booking#KR018#2016-05-09#KJ08#gg', '2016-05-07 09:55:42', 'Terima', 'DIMAS'),
(64, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Tes', '2016-05-07 11:59:10', 'Tolak', 'DIMAS'),
(65, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Tesq', '2016-05-07 12:01:43', 'Tolak', 'DIMAS'),
(66, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Booking#KR018#2016-05-09#KJ08#gg', '2016-05-07 12:05:49', 'Tolak', 'DIMAS'),
(67, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Booking#KR018#2016-05-09#KJ11#gg', '2016-05-07 12:09:28', 'Tolak', 'DIMAS'),
(68, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Booking#KR018#2016-05-09#KJ11#gg', '2016-05-07 12:08:10', 'pending', 'DIMAS'),
(69, '5323', 'dimas', 'mahasiswa', '+628979598671', 'Booking#KR018#2016-05-09#KJ11#gg', '2016-05-07 12:08:55', 'pending', 'DIMAS'),
(70, 'KK012', 'nisa elqisti', 'karyawan', '+6289691502440', 'Tes', '2016-05-07 12:53:18', 'Tolak', 'DIMAS'),
(71, 'KK012', 'nisa elqisti', 'karyawan', '+6289691502440', 'Tes2', '2016-05-07 13:22:49', 'Tolak', 'DIMAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam`
--

CREATE TABLE `jam` (
  `kode_jam` varchar(50) NOT NULL,
  `jam` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jam`
--

INSERT INTO `jam` (`kode_jam`, `jam`) VALUES
('KJ08', '08.00'),
('KJ09', '09.00'),
('KJ10', '10.00'),
('KJ11', '11.00'),
('KJ12', '12.00'),
('KJ13', '13.00'),
('KJ14', '14.00'),
('KJ15', '15.00'),
('KJ16', '16.00'),
('KJ17', '17.00'),
('KJ18', '18.00'),
('KJ19', '19.00'),
('KJ20', '20.00'),
('KJ21', '21.00'),
('KJ22', '22.00'),
('KJ23', '23.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `kode_karyawan` varchar(50) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`kode_karyawan`, `nama_karyawan`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `no_tlp`, `username`, `password`, `level`) VALUES
('KK001', 'Qomar', '2016-03-08', 'bogor', 'bekasi', '08979598674', '', '', ''),
('KK002', 'Devina', '2016-03-15', 'jakrta', 'bekasi', '9876rr', '', '', ''),
('KK003', 'yuliadi', '2016-04-15', 'bekasi', 'bekasi', '966789', '', '', ''),
('KK004', 'dika', '2016-04-14', 'bekasi', 'bekasi', '9756789', '', '', ''),
('KK005', 'Zulham', '2016-04-28', 'bekasi', 'beksi', '098767890987', '', '', ''),
('KK006', 'merry', '2016-04-20', 'bekasi', 'bekasi', '09898808080', '', '', ''),
('KK007', 'awan', '2016-04-27', 'bekasi', 'bekasi', '0909909', '', '', ''),
('KK008', 'yasir', '2016-04-20', 'bekasi', 'bekasi', '990909', '', '', ''),
('KK009', 'desy', '2016-04-26', 'bekasi', 'bekasi', '08808', '', '', ''),
('KK012', 'nisa elqisti', '2016-05-07', 'padang', 'bekasi', '089691502440', 'nisa', '8046e184484c7a03bc57f88199cbaf49', 'user'),
('KK013', 'Dani', '2016-06-14', 'bekasi', 'bekasi', '089009', 'dimas', '35a94fa08b88992885257e40526d83ff', 'super user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `tingkat` int(11) NOT NULL,
  `shift` varchar(50) NOT NULL,
  `pa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `tingkat`, `shift`, `pa`) VALUES
(1, 'TI058', 1, 'Sore', 'KK003'),
(3, 'BA311', 1, 'Pagi', 'KK003'),
(4, 'TI057', 2, 'Sabtu Minggu', 'KK001'),
(5, 'BA312', 1, 'Pagi', 'KK003'),
(8, 'TISM311', 3, 'Sabtu Minggu', 'KK003'),
(9, 'PR311', 1, 'Pagi', 'KK001'),
(10, 'PR312', 2, 'Sore', 'KK003'),
(11, 'KA311', 2, 'Sore', 'KK004'),
(13, 'KA220', 3, 'Pagi', 'KK001'),
(14, 'PR122', 1, 'Pagi', 'KK007');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kelas` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `tlp` varchar(30) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `id_kelas`, `jurusan`, `tlp`, `pic`, `last_update`) VALUES
('1111', 'Wahyu Dani S', '5', 'Administrasi Bisnis', '+6289696093176', 'dimas', '2016-04-26'),
('222', 'Ilham', '1', 'Administrasi Bisnis', '', 'dimas', '2016-04-26'),
('3211', 'robby', '5', 'Komputerisasi Akuntansi', '', 'dimas', '2016-04-26'),
('33', 'tes', '1', 'Administrasi Bisnis', '008980099', 'dimas', '2016-04-26'),
('333', 'Devina', '1', 'Hubungan Masyarakat', '', 'dimas', '2016-04-26'),
('44', 'hadi', '1', 'Administrasi Bisnis', '+6289653518514', 'DIMAS', '2016-05-05'),
('444', 'Anggit', '1', 'Manajemen Informatika', '+6283806230517', 'dimas', '2016-04-26'),
('4555', 'Meinandi', '3', 'Komputerisasi Akuntansi', '', 'dimas', '2016-04-26'),
('5323', 'dimas', '1', 'Manajemen Informatika', '08979598674', 'dimas', '2016-04-26'),
('55', 'salomo', '1', 'Hubungan Masyarakat', '', 'dimas', '2016-04-09'),
('56656', 'Kuncoro', '5', 'Administrasi Bisnis', '2323232323232', 'dimas', '2016-04-26'),
('7777', 'isak', '4', 'Manajemen Informatika', '9876568790', 'DIMAS', '2016-05-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(11) NOT NULL,
  `mata_kuliah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `mata_kuliah`) VALUES
(1, 'Visual Basic 6.0'),
(2, 'Akuntansi'),
(3, 'Database'),
(4, 'Kewirausahaan'),
(5, 'Pancasila'),
(6, ' Design'),
(9, 'Visual Basic'),
(10, 'Web Design'),
(11, 'Dreamweaver'),
(12, 'Photoshop'),
(15, 'Networking'),
(16, 'tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox`
--

CREATE TABLE `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendBefore` time NOT NULL DEFAULT '23:59:59',
  `SendAfter` time NOT NULL DEFAULT '00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Trigger `outbox`
--
DELIMITER $$
CREATE TRIGGER `outbox_timestamp` BEFORE INSERT ON `outbox` FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.SendingDateTime = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingTimeOut = '0000-00-00 00:00:00' THEN
        SET NEW.SendingTimeOut = CURRENT_TIMESTAMP();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox_multipart`
--

CREATE TABLE `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text,
  `ID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbk`
--

CREATE TABLE `pbk` (
  `ID` int(11) NOT NULL,
  `GroupID` int(11) NOT NULL DEFAULT '-1',
  `Name` text NOT NULL,
  `Number` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbk_groups`
--

CREATE TABLE `pbk_groups` (
  `Name` text NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesan`
--

CREATE TABLE `pemesan` (
  `kode_pemesan` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `no_tlp` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesan`
--

INSERT INTO `pemesan` (`kode_pemesan`, `password`, `nama_pemesan`, `jabatan`, `tgl_lahir`, `tempat_lahir`, `no_tlp`, `alamat`) VALUES
('12001', '', 'anggit', 'mahasiswa', '2016-05-22', 'bekasi', '089877890', 'bekasi'),
('13', '', 'd', 'mahasiswa', '2016-05-17', 'bekasi', '0908789', 'bekasi'),
('13000333', '', 'fahmi', 'mahasiswa', '2016-06-28', 'bekasi', '082298813402', 'bekasi'),
('1301', '', 'Kuncoro', 'mahasiswa', '2016-05-11', 'bekaksi', '09090', 'bekasi'),
('1302', '', 'Melisa', 'dosen', '2016-05-18', 'bekasi', '0890', 'bekasi'),
('1303', '', 'hadi', 'mahasiswa', '2016-05-19', 'jakarta', '089653518514', 'jakarta'),
('1304', '', 'Salomo', 'karyawan', '2016-05-26', 'bekasi', '08980', 'bekasi'),
('1305', '', 'yoga', 'karyawan', '2016-05-12', 'jakarta', '080', 'bekasi'),
('130975664', '', 'rido', 'mahasiswa', '2016-06-16', 'bekasi', '089616796793', 'bekasi'),
('333444', '', 'joko', 'mahasiswa', '2016-06-07', 'bekasi', '085880544933', 'bekasi'),
('e', '', 'd', 'dosen', '2016-05-18', 'jakarta', '089798', 'bekasi'),
('ede', 'ede', 'dimas', 'mahasiswa', '2016-05-18', 'dd', '08979598671', 'dd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_detail`
--

CREATE TABLE `pemesanan_detail` (
  `id` int(11) NOT NULL,
  `kode_pembooking` varchar(50) NOT NULL,
  `nama_pembooking` varchar(50) NOT NULL,
  `posisi` varchar(30) NOT NULL,
  `kode_ruangan` varchar(50) NOT NULL,
  `kode_jam` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL,
  `pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan_detail`
--

INSERT INTO `pemesanan_detail` (`id`, `kode_pembooking`, `nama_pembooking`, `posisi`, `kode_ruangan`, `kode_jam`, `tgl`, `ket`, `pic`) VALUES
(36, '130975664', 'rido', 'mahasiswa', 'KR007', 'KJ10', '2016-06-22', 'PES', 'bysms'),
(37, '130975664', 'rido', 'mahasiswa', 'KR018', 'KJ08', '2016-06-19', 'PES', 'bysms'),
(38, 'ede', 'dimas', 'mahasiswa', 'KR007', 'KJ13', '2016-06-24', 'BERHASIL', 'bysms'),
(40, '333444', 'joko', 'mahasiswa', 'KR018', 'KJ10', '2016-06-23', 'BEM', ''),
(42, 'ede', 'dimas', 'mahasiswa', 'KR018', 'KJ09', '2018-01-12', 'ubah', ''),
(43, 'ede', 'dimas', 'mahasiswa', 'KR007', 'KJ08', '2018-01-11', 'KET', ''),
(44, 'ede', 'dimas', 'mahasiswa', 'KR010', 'KJ08', '2018-01-11', 'KET', ''),
(45, 'ede', 'dimas', 'mahasiswa', 'KR008', 'KJ08', '2018-01-11', 'KET', ''),
(46, 'ede', 'dimas', 'mahasiswa', 'KR018', 'KJ08', '2018-01-11', 'keterangan', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_header`
--

CREATE TABLE `pemesanan_header` (
  `id` int(11) NOT NULL,
  `kode_pembooking` varchar(50) NOT NULL,
  `last_update` date NOT NULL,
  `pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan_header`
--

INSERT INTO `pemesanan_header` (`id`, `kode_pembooking`, `last_update`, `pic`) VALUES
(1, '7777', '2016-05-14', 'DIMAS'),
(2, '222', '2016-05-14', 'DIMAS'),
(3, '33', '2016-05-14', 'DIMAS'),
(4, 'KD002', '2016-05-23', 'DIMAS'),
(5, 'ede', '2016-05-25', 'DIMAS'),
(6, '033', '2016-05-25', 'DIMAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjadwalan_detail`
--

CREATE TABLE `penjadwalan_detail` (
  `kode_transaksi` int(11) NOT NULL,
  `kode_dosen` varchar(50) NOT NULL,
  `kode_ruangan` varchar(50) NOT NULL,
  `kode_kelas` varchar(50) NOT NULL,
  `kode_matakuliah` varchar(50) NOT NULL,
  `kode_jam` varchar(50) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `mulai` date NOT NULL,
  `habis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjadwalan_detail`
--

INSERT INTO `penjadwalan_detail` (`kode_transaksi`, `kode_dosen`, `kode_ruangan`, `kode_kelas`, `kode_matakuliah`, `kode_jam`, `hari`, `mulai`, `habis`) VALUES
(68, '1302', 'KR018', '3', '2', 'KJ08', 'Senin', '2016-06-07', '2016-09-25'),
(69, 'e', 'KR018', '5', '4', 'KJ09', 'Selasa', '2016-06-07', '2016-09-25'),
(70, '1302', 'KR018', '8', '3', 'KJ08', 'Rabu', '2016-06-07', '2016-09-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjadwalan_tahunajaran`
--

CREATE TABLE `penjadwalan_tahunajaran` (
  `id` int(11) NOT NULL,
  `tahun_ajaran_mulai` date NOT NULL,
  `tahun_ajaran_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjadwalan_tahunajaran`
--

INSERT INTO `penjadwalan_tahunajaran` (`id`, `tahun_ajaran_mulai`, `tahun_ajaran_akhir`) VALUES
(9, '2016-04-30', '2017-04-29'),
(10, '2016-06-07', '2016-09-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `kode_petugas` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `pic` varchar(50) NOT NULL,
  `tanggal_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`kode_petugas`, `username`, `password`, `jabatan`, `tanggal`, `pic`, `tanggal_update`) VALUES
('KP001', 'DIMAS', '35a94fa08b88992885257e40526d83ff', 'User', '2016-03-16', 'dimas', '2016-03-17'),
('KP002', 'ANGGIT', '35a94fa08b88992885257e40526d83ff', 'Super User', '2016-04-27', 'dimas', '2016-04-27'),
('KP003', 'KUNCORO', '35a94fa08b88992885257e40526d83ff', 'Super User', '2016-04-27', 'dimas', '2016-04-27'),
('KP004', 'C', '92eb5ffee6ae2fec3ad71c777531578f', 'User', '2016-04-27', 'dimas', '2016-04-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `phones`
--

CREATE TABLE `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TimeOut` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT '-1',
  `Signal` int(11) NOT NULL DEFAULT '-1',
  `Sent` int(11) NOT NULL DEFAULT '0',
  `Received` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `phones`
--

INSERT INTO `phones` (`ID`, `UpdatedInDB`, `InsertIntoDB`, `TimeOut`, `Send`, `Receive`, `IMEI`, `Client`, `Battery`, `Signal`, `Sent`, `Received`) VALUES
('', '2016-05-26 14:31:52', '2016-05-26 14:00:03', '2016-05-26 14:32:02', 'yes', 'yes', '356356042098380', 'Gammu 1.32.0, Windows Server 2007, GCC 4.7, MinGW 3.11', 0, 51, 0, 1),
('', '2016-06-20 03:37:43', '2016-06-20 02:40:06', '2016-06-20 03:37:53', 'yes', 'yes', '867749011573601', 'Gammu 1.32.0, Windows Server 2007, GCC 4.7, MinGW 3.11', 0, 36, 3, 2);

--
-- Trigger `phones`
--
DELIMITER $$
CREATE TRIGGER `phones_timestamp` BEFORE INSERT ON `phones` FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.TimeOut = '0000-00-00 00:00:00' THEN
        SET NEW.TimeOut = CURRENT_TIMESTAMP();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `kode_ruangan` varchar(50) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  `jenis_ruangan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `pic` varchar(50) NOT NULL,
  `tanggal_update` date NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`kode_ruangan`, `nama_ruangan`, `jenis_ruangan`, `tanggal`, `pic`, `tanggal_update`, `status`) VALUES
('KR001', '203', 'kelas', '2016-06-19', 'DIMAS', '2016-06-19', 'Aktif'),
('KR002', 'LAB C', 'lab', '2016-04-28', 'DIMAS', '2016-04-28', 'Aktif'),
('KR003', 'LAB B', 'lab', '2016-06-19', 'DIMAS', '2016-06-19', 'Aktif'),
('KR007', '207', 'kelas', '2016-06-19', 'DIMAS', '2016-06-19', 'Aktif'),
('KR008', '304', 'kelas', '2016-04-28', 'DIMAS', '2016-04-28', 'Aktif'),
('KR010', 'LAB J', 'lab', '2016-06-19', 'DIMAS', '2016-06-19', 'Aktif'),
('KR011', 'LAB A', 'lab', '2016-04-28', 'DIMAS', '2016-04-28', 'Aktif'),
('KR012', '202', 'kelas', '2016-06-19', 'DIMAS', '2016-06-19', 'Aktif'),
('KR013', '302', 'kelas', '2016-04-28', 'DIMAS', '2016-04-28', 'Aktif'),
('KR014', 'MEETING', 'lab', '2016-05-01', 'DIMAS', '2016-05-01', 'Aktif'),
('KR016', '301', 'kelas', '2016-04-28', 'DIMAS', '2016-04-28', 'Aktif'),
('KR017', 'LAB D', 'lab', '2016-04-28', 'DIMAS', '2016-04-28', 'Nonaktif'),
('KR018', '201', 'kelas', '2016-04-28', 'DIMAS', '2016-04-28', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sentitems`
--

CREATE TABLE `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT '-1',
  `TPMR` int(11) NOT NULL DEFAULT '-1',
  `RelativeValidity` int(11) NOT NULL DEFAULT '-1',
  `CreatorID` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `sentitems`
--

INSERT INTO `sentitems` (`UpdatedInDB`, `InsertIntoDB`, `SendingDateTime`, `DeliveryDateTime`, `Text`, `DestinationNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `SenderID`, `SequencePosition`, `Status`, `StatusError`, `TPMR`, `RelativeValidity`, `CreatorID`) VALUES
('2016-06-20 03:23:19', '2016-06-20 03:22:51', '2016-06-20 03:23:19', NULL, '00530061006C0061006800200046006F0072006D00610072002C0062006F006F006B0069006E0067003A0042004F004F004B0049004E00470023003200300031002300300038002E00300030002300310032002D00300035002D0032003000310036002C0065006400690074003A00450044004900540042004F004F004B0049004E00470023004B005200300031003800300038002E00300030003100320030003500320030003100360023003200300032002300300038002E00300030002300310032002D00300035002D0032003000310036002C00630061006E00630065006C003A00430041004E00430045004C0042004F004F004B0049004E00470023004B005200300031003800300038002E0030003000310032003000350032003000310036', '085880544933', 'Default_No_Compression', '', '+6289644000001', -1, 'Salah Formar,booking:BOOKING#201#08.00#12-05-2016,edit:EDITBOOKING#KR01808.0012052016#202#08.00#12-05-2016,cancel:CANCELBOOKING#KR01808.0012052016', 187, '', 1, 'SendingOKNoReport', -1, 179, 255, ''),
('2016-06-20 02:10:50', '2016-06-20 02:10:26', '2016-06-20 02:10:50', NULL, '00730065006C0061006D0061007400200062006F006F006B0069006E006700200062006500720068006100730069006C0020006A0061006400770061006C00200031002C0020006B006F00640065002000700065006D006500730061006E0061006E003A0020004B005200300030003700300039002E0030003000320031003000360032003000310036', '08979598671', 'Default_No_Compression', '', '+6289644000001', -1, 'selamat booking berhasil jadwal 1, kode pemesanan: KR00709.0021062016', 183, '', 1, 'SendingOKNoReport', -1, 172, 255, ''),
('2016-06-20 02:13:01', '2016-06-20 02:12:40', '2016-06-20 02:13:01', NULL, '00730065006C0061006D006100740020007500700064006100740065002000700065006D006500730061006E0061006E00200062006500720068006100730069006C00200032002C0020006B006F00640065002000700065006D006500730061006E0061006E003A0020004B005200300030003700310033002E0030003000320034003000360032003000310036', '08979598671', 'Default_No_Compression', '', '+6289644000001', -1, 'selamat update pemesanan berhasil 2, kode pemesanan: KR00713.0024062016', 184, '', 1, 'SendingOKNoReport', -1, 173, 255, ''),
('2016-06-20 02:40:11', '2016-06-20 02:37:08', '2016-06-20 02:40:11', NULL, '00730065006C0061006D0061007400200062006F006F006B0069006E006700200062006500720068006100730069006C0020006A0061006400770061006C00200031002C0020006B006F00640065002000700065006D006500730061006E0061006E003A0020004B005200300030003700310035002E0030003000320031003000360032003000310036', '08979598671', 'Default_No_Compression', '', '+6289644000001', -1, 'selamat booking berhasil jadwal 1, kode pemesanan: KR00715.0021062016', 185, '', 1, 'SendingOKNoReport', -1, 177, 255, ''),
('2016-06-20 02:58:31', '2016-06-20 02:58:09', '2016-06-20 02:58:31', NULL, '004D006100610066002000700065006D006500730061006E0061006E0020007200750061006E00670061006E00200074006900640061006B0020006400690074006500720069006D0061002E', '+628979598671', 'Default_No_Compression', '', '+6289644000001', -1, 'Maaf pemesanan ruangan tidak diterima.', 186, '', 1, 'SendingOKNoReport', -1, 178, 255, ''),
('2016-06-19 14:11:11', '2016-06-19 14:10:54', '2016-06-19 14:11:11', NULL, '004D006100610066002C0020006B006F00640065002000700065006D006500730061006E0061006E00200074006900640061006B0020007400650072006400610066007400610072', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'Maaf, kode pemesanan tidak terdaftar', 177, '', 1, 'SendingOKNoReport', -1, 163, 255, ''),
('2016-06-19 14:13:51', '2016-06-19 14:13:18', '2016-06-19 14:13:51', NULL, '00730065006C0061006D0061007400200062006F006F006B0069006E006700200062006500720068006100730069006C0020006A0061006400770061006C00200031002C0020006B006F00640065002000700065006D006500730061006E0061006E003A0020004B005200300030003700300038002E0030003000320031003000360032003000310036', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'selamat booking berhasil jadwal 1, kode pemesanan: KR00708.0021062016', 178, '', 1, 'SendingOKNoReport', -1, 164, 255, ''),
('2016-06-19 14:15:30', '2016-06-19 14:15:16', '2016-06-19 14:15:30', NULL, '00730065006C0061006D006100740020007500700064006100740065002000700065006D006500730061006E0061006E00200062006500720068006100730069006C00200032002C0020006B006F00640065002000700065006D006500730061006E0061006E003A0020004B005200300030003700300038002E0030003000320032003000360032003000310036', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'selamat update pemesanan berhasil 2, kode pemesanan: KR00708.0022062016', 179, '', 1, 'SendingOKNoReport', -1, 165, 255, ''),
('2016-06-19 14:17:39', '2016-06-19 14:17:14', '2016-06-19 14:17:39', NULL, '004D006100610066002C0020007200750061006E00670061006E00200074006900640061006B002000740065007200730065006400690061', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'Maaf, ruangan tidak tersedia', 180, '', 1, 'SendingOKNoReport', -1, 166, 255, ''),
('2016-06-19 14:20:46', '2016-06-19 14:20:16', '2016-06-19 14:20:46', NULL, '00430061006E00630065006C00200062006F006F006B0069006E006700200062006500720068006100730069006C', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'Cancel booking berhasil', 181, '', 1, 'SendingOKNoReport', -1, 167, 255, ''),
('2016-06-19 14:21:21', '2016-06-19 14:20:57', '2016-06-19 14:21:21', NULL, '004D006100610066002000700065006D006500730061006E0061006E0020007200750061006E00670061006E00200074006900640061006B0020006400690074006500720069006D0061002E', '+6289616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'Maaf pemesanan ruangan tidak diterima.', 182, '', 1, 'SendingOKNoReport', -1, 168, 255, ''),
('2016-06-19 14:06:15', '2016-06-19 14:05:50', '2016-06-19 14:06:15', NULL, '004D006100610066002C0020006B006F00640065002000700065006D006500730061006E0061006E00200074006900640061006B0020007400650072006400610066007400610072', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'Maaf, kode pemesanan tidak terdaftar', 174, '', 1, 'SendingOKNoReport', -1, 160, 255, ''),
('2016-06-19 14:08:22', '2016-06-19 14:08:04', '2016-06-19 14:08:22', NULL, '00730065006C0061006D0061007400200062006F006F006B0069006E006700200062006500720068006100730069006C0020006A0061006400770061006C00200031002C0020006B006F00640065002000700065006D006500730061006E0061006E003A0020004B005200300030003700300038002E0030003000320030003000360032003000310036', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'selamat booking berhasil jadwal 1, kode pemesanan: KR00708.0020062016', 175, '', 1, 'SendingOKNoReport', -1, 161, 255, ''),
('2016-06-19 14:10:04', '2016-06-19 14:09:52', '2016-06-19 14:10:04', NULL, '004D006100610066002C0020007200750061006E00670061006E00200074006900640061006B002000740065007200730065006400690061', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'Maaf, ruangan tidak tersedia', 176, '', 1, 'SendingOKNoReport', -1, 162, 255, ''),
('2016-06-19 13:54:38', '2016-06-19 13:54:21', '2016-06-19 13:54:38', NULL, '00730065006C0061006D006100740020007500700064006100740065002000700065006D006500730061006E0061006E00200062006500720068006100730069006C00200034002C0020006B006F00640065002000700065006D006500730061006E0061006E003A0020004B005200300031003800310030002E0030003000320032003000360032003000310036', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'selamat update pemesanan berhasil 4, kode pemesanan: KR01810.0022062016', 173, '', 1, 'SendingOKNoReport', -1, 159, 255, ''),
('2016-06-19 13:42:53', '2016-06-19 13:42:20', '2016-06-19 13:42:53', NULL, '004D006100610066002C0020007200750061006E00670061006E00200074006900640061006B002000740065007200730065006400690061', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'Maaf, ruangan tidak tersedia', 170, '', 1, 'SendingOKNoReport', -1, 156, 255, ''),
('2016-06-19 13:45:59', '2016-06-19 13:45:45', '2016-06-19 13:45:59', NULL, '00730065006C0061006D0061007400200062006F006F006B0069006E006700200062006500720068006100730069006C0020006A0061006400770061006C00200031002C0020006B006F00640065002000700065006D006500730061006E0061006E003A0020004B005200300030003700300038002E0030003000320030003000360032003000310036', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'selamat booking berhasil jadwal 1, kode pemesanan: KR00708.0020062016', 171, '', 1, 'SendingOKNoReport', -1, 157, 255, ''),
('2016-06-19 13:48:09', '2016-06-19 13:47:34', '2016-06-19 13:48:09', NULL, '00730065006C0061006D0061007400200062006F006F006B0069006E006700200062006500720068006100730069006C0020006A0061006400770061006C00200031002C0020006B006F00640065002000700065006D006500730061006E0061006E003A0020004B005200300031003200310030002E0030003000320032003000360032003000310036', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'selamat booking berhasil jadwal 1, kode pemesanan: KR01210.0022062016', 172, '', 1, 'SendingOKNoReport', -1, 158, 255, ''),
('2016-06-19 13:31:57', '2016-06-19 13:31:40', '2016-06-19 13:31:57', NULL, '00730065006C0061006D0061007400200062006F006F006B0069006E006700200062006500720068006100730069006C0020006A0061006400770061006C00200031002C0020006B006F00640065002000700065006D006500730061006E0061006E003A0020004B005200300030003700300038002E0030003000320030003000360032003000310036', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'selamat booking berhasil jadwal 1, kode pemesanan: KR00708.0020062016', 168, '', 1, 'SendingOKNoReport', -1, 154, 255, ''),
('2016-06-19 13:40:14', '2016-06-19 13:39:40', '2016-06-19 13:40:14', NULL, '00730065006C0061006D006100740020007500700064006100740065002000700065006D006500730061006E0061006E00200062006500720068006100730069006C00200034002C0020006B006F00640065002000700065006D006500730061006E0061006E003A0020004B005200300031003800310030002E0030003000320032003000360032003000310036', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'selamat update pemesanan berhasil 4, kode pemesanan: KR01810.0022062016', 169, '', 1, 'SendingOKNoReport', -1, 155, 255, ''),
('2016-06-19 13:24:19', '2016-06-19 13:23:54', '2016-06-19 13:24:19', NULL, '00730065006C0061006D006100740020007500700064006100740065002000700065006D006500730061006E0061006E00200062006500720068006100730069006C00200032002C0020006B006F00640065002000700065006D006500730061006E0061006E003A0020004B005200300031003800310030002E0030003000320032003000360032003000310036', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'selamat update pemesanan berhasil 2, kode pemesanan: KR01810.0022062016', 167, '', 1, 'SendingOKNoReport', -1, 153, 255, ''),
('2016-06-19 13:20:24', '2016-06-19 13:19:50', '2016-06-19 13:20:24', NULL, '004D006100610066002C0020007200750061006E00670061006E00200074006900640061006B002000740065007200730065006400690061', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'Maaf, ruangan tidak tersedia', 165, '', 1, 'SendingOKNoReport', -1, 151, 255, ''),
('2016-06-19 13:22:32', '2016-06-19 13:22:07', '2016-06-19 13:22:32', NULL, '00730065006C0061006D006100740020007500700064006100740065002000700065006D006500730061006E0061006E00200062006500720068006100730069006C00200032002C0020006B006F00640065002000700065006D006500730061006E0061006E003A0020004B005200300031003800300039002E0030003000320030003000360032003000310036', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'selamat update pemesanan berhasil 2, kode pemesanan: KR01809.0020062016', 166, '', 1, 'SendingOKNoReport', -1, 152, 255, ''),
('2016-06-19 13:09:36', '2016-06-19 13:09:26', '2016-06-19 13:09:36', NULL, '00730065006C0061006D006100740020007500700064006100740065002000700065006D006500730061006E0061006E00200062006500720068006100730069006C002C0020006B006F00640065002000700065006D006500730061006E0061006E003A0020004B005200300031003800300038002E0030003000320030003000360032003000310036', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'selamat update pemesanan berhasil, kode pemesanan: KR01808.0020062016', 163, '', 1, 'SendingOKNoReport', -1, 149, 255, ''),
('2016-06-19 13:18:45', '2016-06-19 13:18:10', '2016-06-19 13:18:45', NULL, '00730065006C0061006D0061007400200062006F006F006B0069006E006700200062006500720068006100730069006C0020006A0061006400770061006C00200031002C0020006B006F00640065002000700065006D006500730061006E0061006E003A0020004B005200300030003700300038002E0030003000320030003000360032003000310036', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'selamat booking berhasil jadwal 1, kode pemesanan: KR00708.0020062016', 164, '', 1, 'SendingOKNoReport', -1, 150, 255, ''),
('2016-06-19 13:08:29', '2016-06-19 13:08:00', '2016-06-19 13:08:29', NULL, '00730065006C0061006D0061007400200062006F006F006B0069006E006700200062006500720068006100730069006C0020006A0061006400770061006C002C0020006B006F00640065002000700065006D006500730061006E0061006E003A0020004B005200300030003700300038002E0030003000320030003000360032003000310036', '089616796793', 'Default_No_Compression', '', '+6289644000001', -1, 'selamat booking berhasil jadwal, kode pemesanan: KR00708.0020062016', 162, '', 1, 'SendingOKNoReport', -1, 148, 255, '');

--
-- Trigger `sentitems`
--
DELIMITER $$
CREATE TRIGGER `sentitems_timestamp` BEFORE INSERT ON `sentitems` FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.SendingDateTime = CURRENT_TIMESTAMP();
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`kode_dosen`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `info_sms`
--
ALTER TABLE `info_sms`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`kode_jam`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`kode_karyawan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outbox`
--
ALTER TABLE `outbox`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  ADD KEY `outbox_sender` (`SenderID`);

--
-- Indexes for table `outbox_multipart`
--
ALTER TABLE `outbox_multipart`
  ADD PRIMARY KEY (`ID`,`SequencePosition`);

--
-- Indexes for table `pbk`
--
ALTER TABLE `pbk`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pbk_groups`
--
ALTER TABLE `pbk_groups`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`kode_pemesan`);

--
-- Indexes for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan_header`
--
ALTER TABLE `pemesanan_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjadwalan_detail`
--
ALTER TABLE `penjadwalan_detail`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `penjadwalan_tahunajaran`
--
ALTER TABLE `penjadwalan_tahunajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`kode_petugas`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`IMEI`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`kode_ruangan`);

--
-- Indexes for table `sentitems`
--
ALTER TABLE `sentitems`
  ADD PRIMARY KEY (`ID`,`SequencePosition`),
  ADD KEY `sentitems_date` (`DeliveryDateTime`),
  ADD KEY `sentitems_tpmr` (`TPMR`),
  ADD KEY `sentitems_dest` (`DestinationNumber`),
  ADD KEY `sentitems_sender` (`SenderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `outbox`
--
ALTER TABLE `outbox`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `pbk`
--
ALTER TABLE `pbk`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pbk_groups`
--
ALTER TABLE `pbk_groups`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pemesanan_header`
--
ALTER TABLE `pemesanan_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penjadwalan_detail`
--
ALTER TABLE `penjadwalan_detail`
  MODIFY `kode_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `penjadwalan_tahunajaran`
--
ALTER TABLE `penjadwalan_tahunajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

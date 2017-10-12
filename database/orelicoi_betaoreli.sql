-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Inang: localhost:3306
-- Waktu pembuatan: 13 Agu 2016 pada 20.26
-- Versi Server: 10.0.26-MariaDB
-- Versi PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `orelicoi_betaoreli`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `doku`
--

CREATE TABLE IF NOT EXISTS `doku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transidmerchant` varchar(125) NOT NULL,
  `totalamount` double NOT NULL,
  `words` varchar(200) NOT NULL,
  `statustype` varchar(1) NOT NULL,
  `response_code` varchar(50) NOT NULL,
  `approvalcode` char(6) NOT NULL,
  `trxstatus` varchar(50) NOT NULL,
  `payment_channel` int(2) NOT NULL,
  `paymentcode` int(8) NOT NULL,
  `session_id` varchar(48) NOT NULL,
  `bank_issuer` varchar(100) NOT NULL,
  `creditcard` varchar(16) NOT NULL,
  `payment_date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `verifyid` varchar(30) NOT NULL,
  `verifyscore` int(3) NOT NULL,
  `verifystatus` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data untuk tabel `doku`
--

INSERT INTO `doku` (`id`, `transidmerchant`, `totalamount`, `words`, `statustype`, `response_code`, `approvalcode`, `trxstatus`, `payment_channel`, `paymentcode`, `session_id`, `bank_issuer`, `creditcard`, `payment_date_time`, `verifyid`, `verifyscore`, `verifystatus`) VALUES
(1, '16000102', 0, '', '', '', '', 'Failed', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(2, '16000103', 0, '', '', '', '', 'Failed', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(3, '16000104', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(4, '16000105', 0, '', '', '', '', 'Failed', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(5, '16000106', 0, '', '', '', '', 'Failed', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(6, '16000107', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(7, '16000108', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(8, '16000109', 0, '', '', '', '', 'Failed', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(9, '16000110', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(10, '16000111', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(11, '16000112', 43800, '59378ef354ffaad59c7a4de55b08b8db3e5d46b9', 'P', '0000', '708793', 'SUCCESS', 15, 0, '8zqa23sx4w', 'PT. BANK CIMB NIAGA TBK.', '548117******3377', '2016-07-01 15:54:12', '', -1, 'NA'),
(12, '16000113', 0, '', '', '', '', 'Failed', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(13, '16000114', 43800, 'ed6033e12038d192e53ef5a3aebca0260c145706', 'P', '0000', '806827', 'SUCCESS', 4, 0, '396q3xzaws', 'CASH', '1189632633', '2016-07-01 16:13:27', '', -1, 'NA'),
(14, '16000115', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(15, '16000116', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(16, '16000117', 0, '', '', '', '', 'Failed', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(17, '16000119', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(18, '16000121', 390000, 'eef45badb48413784009e7119567dfb2234173fd', 'P', '0000', '313972', 'SUCCESS', 15, 0, 'qw2z46x9sa', 'Bank Mandiri', '413718******7467', '2016-07-02 18:16:29', '', -1, 'NA'),
(19, '16000122', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(20, '16000125', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(21, '16000126', 0, '', '', '', '', 'Failed', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(22, '16000127', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(23, '16000128', 282000, '9d3ffbbdb7aca929fb5c0375653e81a89ed03b4b', 'P', '0000', '092396', 'SUCCESS', 15, 0, '5sxz8waq52', 'Bank Mandiri', '413718******7467', '2016-07-22 14:40:51', '', -1, 'NA'),
(24, '16000137', 0, '', '', '', '', 'Failed', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bank`
--

CREATE TABLE IF NOT EXISTS `tbl_bank` (
  `id_bank` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` varchar(11) DEFAULT NULL,
  `nama_bank` varchar(40) DEFAULT NULL,
  `nomor_rekening` varchar(50) DEFAULT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `foto_tabungan` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tbl_bank`
--

INSERT INTO `tbl_bank` (`id_bank`, `id_customer`, `nama_bank`, `nomor_rekening`, `atas_nama`, `foto_tabungan`, `status`) VALUES
(3, 'oreli', 'BANK MANDIRI', '1640001695206', 'PT Toko Ritel Indonesia', '', 1),
(4, 'oreli', 'BANK BCA', '2045918899', 'PT Toko Ritel Indonesia', '', 1),
(5, 'MAT274', 'PT. BANK MANDIRI', '1310012310118', 'MUHAMMAD ADITYA TISNADINATA', 'rekening/MAT274_1310012310118.PNG', 0),
(6, 'ABD250', 'Mandiri', '1100004203839', 'Abdul Syukur', 'rekening/ABD250_1100004203839.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_banner`
--

CREATE TABLE IF NOT EXISTS `tbl_banner` (
  `id_banner` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(10) NOT NULL,
  `source` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tbl_banner`
--

INSERT INTO `tbl_banner` (`id_banner`, `jenis`, `source`, `url`) VALUES
(1, 'slide', 'images/slides/point.gif', 'https://oreli.co.id'),
(2, 'banner1', 'images/banner/big.gif', 'https://oreli.co.id'),
(3, 'banner2', 'images/banner/Lifetime.jpg', 'https://oreli.co.id/kebijakan/syarat_ketentuan/member'),
(4, 'banner2', 'images/banner/Lifetime2.jpg', 'https://oreli.co.id/kebijakan/syarat_ketentuan/member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id_customer` varchar(20) NOT NULL,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `jk` varchar(10) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `file_ktp` varchar(50) DEFAULT NULL,
  `npwp` varchar(22) DEFAULT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `referal` varchar(10) DEFAULT NULL,
  `tipe` varchar(10) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `nama_lengkap`, `jk`, `tempat_lahir`, `tgl_lahir`, `email`, `password`, `file_ktp`, `npwp`, `waktu`, `referal`, `tipe`, `status`) VALUES
('ABD140', 'ABDUL HARIS', 'L', 'JAKARTA', '1971-04-14', 'haris.doel@gmail.com', '663f7f996642849396a9853e379722ddc288e80d', '', '', '2016-07-25 01:24:57', 'YAS602', '3', '0'),
('ABD250', 'Abdul Syukur', 'L', 'Cirebon', '1981-08-25', 'kurimen8@gmail.com', 'd64838ab693c317676e7c75322964fab5f88f877', NULL, '096293949331000', '2016-05-11 03:11:49', 'admin', '3', 'terverifikasi'),
('ADE405', 'Adeliani Nurtin', 'P', 'Cirebon', '1982-05-04', 'adeliani.nurtin@gmail.com', 'b1e29a8e4b4ddc64232575feb8916213fb6bbc8f', '', '', '2016-07-04 03:16:48', 'ABD250', '3', 'terverifikasi'),
('AFI512', 'Afit arifitri', 'P', 'tangerang', '1978-12-05', 'afit.arifitri@gmail.com', '4281421a74477bf69b6b618b6baa628a2b37bd18', '', '', '2016-07-19 08:36:20', 'ABD250', '3', '0'),
('ARI121', 'ARIF MAHFUDIN FITRI', 'L', 'JAKARTA', '1975-10-12', 'arifmfitri@yahoo.com', 'a9c1ca759c71a6014ad955f1118a795f6b4d1d6f', '', '', '2016-07-26 01:19:51', 'YUL150', '3', '0'),
('BAY081', 'Bayu Nu''man Syifa', 'L', 'Bandung', '2016-05-11', 'bayu@oreli.co.id', '04933b951b31969ffe09be205f8e08ef9b60fd15', 'ktp/BAY081.jpg', '', '2016-05-11 20:30:18', 'ABD250', '1', '1'),
('BAY810', 'Bayu Numan Syifa', 'L', 'Bandung', '1996-10-08', 'bayunumansyifa@yahoo.com', '0f1c02329a53658f3690e78126aa34324069ea85', '', '', '2016-07-02 07:50:15', 'ABD250', '3', '0'),
('CIT702', 'Citra Fairuz Ghina', 'P', 'Bandung', '1998-02-07', 'citrafairuzghina@gmail.com', '0f1c02329a53658f3690e78126aa34324069ea85', '', '', '2016-07-04 04:56:11', 'BAY081', '3', '0'),
('DIY170', 'DIYAH RETNO', 'P', 'SURAKARTA', '1992-06-17', 'diyahretno22@gmail.com', 'bbd97d5e758b63f3f8627f51c8ee84d3537e07f7', '', '', '2016-07-16 11:15:25', 'ABD250', '3', '0'),
('DWI210', 'Dwi premonowati', 'P', 'solo', '1975-04-21', 'dwi_premonoap21@yahoo.com', 'd9973026b82bcd0880dc92280a601924b8bf8cbf', '', '', '2016-07-04 07:02:23', 'SRI280', '3', '0'),
('DYA140', 'Dyan', 'P', 'jakarta', '1979-05-14', 'ycnel14@gmail.com', '96c92b22bc976a8373dc773ab41183cbcce350a8', '', '', '2016-07-28 02:12:46', 'abd250', '3', '0'),
('EKA710', 'Eka Widy Hastuti', 'P', 'BANDUNG', '1981-10-07', 'eucalyptus.rainbow@gmail.com', 'db27e550ecec2379b0c441085ecfffc168d909b9', '', '', '2016-07-02 08:46:28', 'ABD250', '3', '0'),
('FLO240', 'Florentina Maria J', 'P', 'Palembang', '1967-06-24', 'flornt.mj@gmail.com', 'b7f4c8b5a63510b4615400d7bbd990d23a6aa227', '', '', '2016-07-22 10:26:38', 'ABD250', '3', '0'),
('JOK271', 'JOKO EKANTO', 'L', 'SUKOHARJO', '1972-12-27', 'jok_ek27@yahoo.co.id', 'e01d2d3973ced751d43a38ece4de8aee33fb2388', '', '', '2016-07-21 09:19:45', 'YUL150', '3', '0'),
('KAR210', 'Kartika sagala', 'P', 'medan', '1977-01-21', 'tikasagala@gmail.com', 'f368d5497cdf9a8b3ed8337264c56a46b87d52a5', '', '', '2016-07-15 09:06:21', 'ABD250', '3', '0'),
('KEM210', 'Kemala S.I.Z. Puti', 'P', 'Bogor', '1975-08-21', 'puti.zenky@gmail.com', 'fac6ef9a397c56eb17e4a020fbe19b55b6a8ed0b', '', '', '2016-07-28 07:41:10', 'KAR210', '3', '0'),
('LAE110', 'Laela Fitriani', 'P', 'Cirebon', '1980-08-11', 'laelafitriani02@gmail.com', '980ca529606e546ce1527187f1356f82b354df00', '', '', '2016-07-03 05:24:27', 'ABD250', '3', '0'),
('MAT274', 'Muhammad Aditya Tisnadinata', 'L', 'Bandung', '1996-04-27', 'tisnadinata@gmail.com', '9f746f373d5fa8ba9d2fa8c391e827e5ba77faaf', 'ktp/MUH274.jpg', '', '2016-05-09 11:32:30', 'ABD250', '2', 'terverifikasi'),
('MEL111', 'Melati Dara Ayu', 'P', 'Jakarta', '1984-11-11', 'mella.anwar@gmail.com', '681c69928acb634928e3a540391b6d5c0e9bb619', '', '', '2016-07-26 07:32:17', 'ABD250', '3', 'terverifikasi'),
('MUL805', 'MULYO SUTARTO', 'L', 'WONOGIRI', '1976-05-08', 'mulyosutarto76@gmail.com', 'f723aa838f994990099a2c20afa9543fd5a85abb', '', '', '2016-07-22 01:11:44', 'YUL150', '3', '0'),
('PUR903', 'Purno Murtopo', 'L', 'SUKOHARJO', '1979-03-09', 'murtopop@gmail.com', '8d66a656c4c7b4c1cc99229b46897452933a06da', '', '', '2016-08-02 04:39:22', 'YAS602', '3', '0'),
('RIF280', 'RIFDAH', 'P', 'JAKARTA', '1972-06-28', 'fatihicha@gmail.com', '4f083805a59548b23d1a8accca53a4ce4ca8c944', '', '', '2016-08-05 03:47:16', 'ABD250', '3', '0'),
('SAP180', 'Sapiih', 'L', 'Jakarta', '1973-08-18', '', '67a74306b06d0c01624fe0d0249a570f4d093747', '', '', '2016-07-28 04:07:26', 'ABD250', '3', '0'),
('SID311', 'Sidik kurniawan', 'L', 'Bandung', '1995-10-31', 'sidik351@gmail.com', 'c984b3854071a3b183b2b485a173b8ffe71908bd', NULL, NULL, '2016-06-05 06:56:08', 'ABD250', '3', '0'),
('SIT220', 'SITI', 'P', 'MAGELANG', '1974-05-22', 'pudjiistiyani@gmail.com', 'e6f084350bc47071dc08d9696c84d70021699884', '', '', '2016-07-15 01:28:18', 'abd250', '3', '0'),
('SRI280', 'Sri Haryani Setyowati', 'P', 'Karawang anyar', '1969-08-28', 'Ariani_69@yahoo.com', '42191103b825fae7a19c6882403a1d1bebd6b54b', '', '', '2016-07-02 09:13:43', 'ABD250', '3', '0'),
('SRI804', 'Sri acih', 'P', 'Cirebon', '1984-04-08', 'mikayla.gladis@gmail.com', 'e80e59365b90e3951b24c394998710ab0b085c29', '', '', '2016-07-06 11:27:41', 'ABD250', '3', '0'),
('SUC106', 'SUCIADENA DELIASIH', 'P', 'CIREBON', '1984-06-01', 'pyue_june@yahoo.com', 'ff54c8e0a9748ae04bec515c50cfc180ef5eca36', '', '', '2016-07-02 10:35:40', 'ABD250', '3', '0'),
('SUM140', 'SUMINAH', 'P', 'PURWOREJO', '1973-01-14', 'ummi.mpok@gmail.com', 'be1d064d08e9adc9111af9d53eebd7fa42430971', '', '', '2016-07-25 07:40:11', 'SIT220', '3', '0'),
('SUP130', 'Suparna Wijaya', 'L', 'Los Angeles', '1982-01-13', 'suparna.wijaya@gmail.com', 'd8e2ad72daf620774b3aaf16670c06df1d05f939', '', '', '2016-07-28 07:47:40', 'KAR210', '3', '0'),
('TED100', 'Tedy kurniawan', 'L', 'lampung', '1980-06-10', 'tedyfarel106@gmail.com', '558a20f033ef916e51fb426922a23dd881c8a45b', '', '', '2016-07-28 07:36:02', 'KAR210', '3', '0'),
('WIS110', 'Wisnu wibowo hendrianto', 'L', 'Cilacap', '1978-04-11', 'wisnu.wibowo.h@gmail.com', '6cd8c1c2edc501c7baf98cc453b3af9371f10b9e', '', '', '2016-07-02 06:10:16', 'ABD250', '3', 'terverifikasi'),
('YAS602', 'Yasti Miyarsih', 'P', 'Blora', '1974-02-06', 'yasti.miyarsih@gmail.com', '5e706f082ff9c7991da902b4809dd31b0e9c3132', '', '', '2016-07-15 08:39:11', 'ABD250', '3', '0'),
('YUL150', 'YULIANTI', 'P', 'Gunungkidul', '1978-07-15', 'yzefanya@gmail.com', 'cf5e5778764bbec04b4a26937996b193706bec2b', '', '', '2016-07-02 04:42:55', 'ABD250', '3', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customeralamat`
--

CREATE TABLE IF NOT EXISTS `tbl_customeralamat` (
  `id_alamat` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` varchar(20) NOT NULL,
  `nama_alamat` varchar(50) DEFAULT NULL,
  `nama_penerima` varchar(50) DEFAULT NULL,
  `alamat_penerima` varchar(50) DEFAULT NULL,
  `id_kota` int(11) DEFAULT NULL,
  `tel_rumah` varchar(15) DEFAULT NULL,
  `tel_handphone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_alamat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data untuk tabel `tbl_customeralamat`
--

INSERT INTO `tbl_customeralamat` (`id_alamat`, `id_customer`, `nama_alamat`, `nama_penerima`, `alamat_penerima`, `id_kota`, `tel_rumah`, `tel_handphone`) VALUES
(10, 'ABD250', 'Alamat Saya', 'Abdul Syukur', 'Jalan WR Supratman, Greenwoods Townhouse 1 Blok J3', 67087, '5250208', '081290008446'),
(25, 'MAT274', 'Alamat Saya', 'Muhammad Aditya Tisnadinata', 'Jalan Anggadireja No. 49 RT 09/10', 78137, '089655440395', '089655440395'),
(44, 'BAY081', 'Alamat Saya', 'Bayu Numan Syifa', 'Margahayu raya blok R2 No. 50', 40286, '081223459494', '081223459494'),
(51, 'BAY081', 'Rumah Baru', 'Prof. Bayu Numan Syifa', 'Margahayu Raya blok R2 No. 50', 70933, '081223459494', '081223459494'),
(53, 'SID311', 'Alamat Saya', 'sidik kurniawan', 'Jl.Babakan Sari 1', 51342, '081931480722', '081931480722'),
(58, 'MUH290', 'Alamat Saya', 'muhamm', 'zxzzx', 78143, '089655440395', '089655440395'),
(59, 'TES270', 'Alamat Saya', 'Tes Daftar Dengan Referal', 'Baleendah', 78143, '089655440395', '089655440395'),
(68, 'ASD101', 'Alamat Saya', 'asd', 'asd', 78137, '02292393377', '02292393377'),
(78, 'BAY810', 'Alamat Saya', 'Bayu Numan Syifa', 'Margahayu raya blok R2 No. 50', 70933, '081223459494', '081223459494'),
(79, 'SUC106', 'Alamat Saya', 'SUCIADENA DELIASIH', 'PERUMAHAN GERBANG HARAPAN JL. DAWRAWATI NO. 4 RT 1', 67087, '085759722929', '085759722929'),
(80, 'YUL150', 'Alamat Saya', 'YULIANTI', 'JL. SAGU GANG MUSHOLLA 2 RT. 07 RW. 05 NO. 11, JAG', 59204, '02178886533', '08128854574'),
(81, 'WIS110', 'Alamat Saya', 'Wisnu wibowo hendrianto', 'Jl Gunung Sahari XII No 15 RT 016 RW 003, JAKARTA ', 70933, '081944220522', '081944220522'),
(82, 'EKA710', 'Alamat Saya', 'Eka Widy Hastuti', 'Bumi sentosa blok D8 No. 16 RT 07 RW 09', 68432, '0215250208', '08568858494'),
(83, 'SRI280', 'Alamat Saya', 'Sri Haryani Setyowati', 'Komplek griya sarana Husada Kav. 48', 16512, '08980947887', '08980947887'),
(84, 'LAE110', 'Alamat Saya', 'Laela Fitriani', 'Jl.Kertasuta 1 no.1 Rt.001/Rw.001 Sutawinangun Ked', 53530, '0231248334', '08892327537'),
(87, 'DWI210', 'Alamat Saya', 'dwi premonowati', 'Cangakan rt 03 rw 06\r\nKaranganyar', 55068, '0000000000', '087836879105'),
(88, 'ADE405', 'Alamat Saya', 'Adeliani Nurtin', 'BTN Nusantara Jl.Bawean no. 75 Rt.4 Rw.2', 60635, '082213921982', '085724182453'),
(89, 'CIT702', 'Alamat Saya', 'Citra Fairuz Ghina', 'Margahayu raya Blok R2 No. 50', 70933, '081223459494', '081223459494'),
(90, 'SRI804', 'Alamat Saya', 'sri acih', 'Desa Kaliwedi KidulRT 16 RW 08 Nomor 12', 56253, '083823932219', '083823932219'),
(91, 'YAS602', 'Alamat Saya', 'Yasti Miyarsih', 'Jl. Bacang No.13 RT 03/RW 06 ', 68940, '0215250208', '0811945027'),
(92, 'KAR210', 'Alamat Saya', 'kartika sagala', 'Perumahan Prima Harapan Regency Blok L-1 No. 30', 74261, '0215250208', '081284542770'),
(93, 'SIT220', 'Alamat Saya', 'SITI', 'Jalan Palem Puri d/h Jalan Sarua Poncol, Perumahan', 67093, '0215250208', '08129514142'),
(94, 'DIY170', 'Alamat Saya', 'DIYAH RETNO', 'KOMPLEK TAMAN DUTA\r\nJL TERATAI VIII BLOK D2 NO 11\r', 67474, '0218718557', '087735002338'),
(95, '124.153.33.8', 'Alamat Tamu', 'Aditya', 'Baleendah ', NULL, '089655440395', '089655440395'),
(96, 'AFI512', 'Alamat Saya', 'afit arifitri', 'vila mutiara serpong blok F2 no.31', 18111, '0215250208', '081310080613'),
(97, 'JOK271', 'Alamat Saya', 'JOKO EKANTO', 'TAMAN MANGU INDAH BLOK D7 NO. 9 RT. 009/012\r\nJURAN', 26563, '0217314410', '08158734502'),
(98, 'MUL805', 'Alamat Saya', 'MULYO SUTARTO', 'Perum. Bulak Kapal Permai Blok C N0.26 RT 02/022 B', 74270, '0217198806', '085781198603'),
(99, 'FLO240', 'Alamat Saya', 'Florentina Maria J', 'PT Tempo Land\r\nJl.HR Raauna said Kav 3-4\r\nTempo Sc', NULL, '081314336108', '081314336108'),
(100, 'SUM140', 'Alamat Saya', 'SUMINAH', 'KOMPLEK DKI JOGLO BLOK O NO. 11 RT 13 04, KEL. JOG', 52475, '0215841326', '081310000106'),
(101, 'ABD140', 'Alamat Saya', 'ABDUL HARIS', 'PERMATA MEDITERANIA, JALAN DIAMOND RAYA NO.76 ', 52480, '0215870945', '0811820632'),
(102, 'ABD140', 'Alamat Saya', 'ABDUL HARIS', 'PERMATA MEDITERANIA, JALAN DIAMOND RAYA NO.76', 52480, '0215250208', '081288136363'),
(103, '139.255.137.205', '', NULL, NULL, NULL, NULL, NULL),
(104, 'ARI121', 'Alamat Saya', 'ARIF MAHFUDIN FITRI', 'VILA DAGO BLOK E NO 21 ', 31896, '0217192741', '081219759328'),
(105, 'MEL111', 'Alamat Saya', 'Melati Dara Ayu', 'Keraton At The Plaza\r\nJl. M.H. Thamrin Kav.15\r\n', 10303, '0000000000', '081908010909'),
(106, 'TED100', 'Alamat Saya', 'tedy kurniawan', 'Gedung A2 Lantai 6 Kanwil Khusus, Kompleks Kantor ', 53714, '0215250208', '087804515170'),
(107, 'KEM210', 'Alamat Saya', 'Kemala S.I.Z. Puti', 'Gedung A2 Lantai 6 Kanwil DJP Jakarta Khusus, Komp', 53714, '0215250208', '087769207112'),
(108, 'SUP130', 'Alamat Saya', 'Suparna Wijaya', 'Gedung A2 Lantai 6 Kanwil DJP Jakarta Khusus, Komp', 53714, '0215250208', '082220804168'),
(109, 'DYA140', 'Alamat Saya', 'dyan', 'Jl. Tomang Asli no.12 ', 32247, '0215250208', '081283830323'),
(110, 'SAP180', 'Alamat Saya', 'sapiih', '', NULL, '081297176186', '081297176186'),
(111, 'PUR903', 'Alamat Saya', 'Purno Murtopo', 'Komp. Pulogebang Permai Blok D 7 No. 2', 69321, '0214610733', '08159092003'),
(112, 'RIF280', 'Alamat Saya', 'RIFDAH', 'Kanwil DJP Jakarta Khusus, Jl. Gatot Subroto No. 4', 53714, '0215250208', '08129964424');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customerlog`
--

CREATE TABLE IF NOT EXISTS `tbl_customerlog` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL,
  `browser` varchar(50) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=352 ;

--
-- Dumping data untuk tabel `tbl_customerlog`
--

INSERT INTO `tbl_customerlog` (`id_log`, `id_customer`, `waktu`, `browser`, `ip`) VALUES
(1, 'mat274', '2016-06-04 20:17:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '223.255.230.8'),
(2, 'BAY081', '2016-06-04 20:18:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Geck', '223.255.230.8'),
(3, 'MUH104', '2016-06-04 21:36:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '139.228.7.176'),
(4, 'BAY081', '2016-06-04 22:21:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Geck', '139.228.7.176'),
(5, 'mat274', '2016-06-05 00:04:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '139.228.7.176'),
(6, 'MAT274', '2016-06-05 05:35:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '139.228.7.176'),
(7, 'MAT274', '2016-06-05 05:38:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '139.228.7.176'),
(8, 'MAT274', '2016-06-04 22:46:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '139.228.7.176'),
(9, 'MAT274', '2016-06-04 22:47:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '139.228.7.176'),
(10, 'MAT274', '2016-06-04 22:49:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '139.228.7.176'),
(11, 'MAT274', '2016-06-04 22:50:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '139.228.7.176'),
(12, 'MAT274', '2016-06-05 05:52:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '139.228.7.176'),
(13, 'MAT274', '2016-06-04 22:58:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '139.228.7.176'),
(14, 'MAT274', '2016-06-04 22:59:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '139.228.7.176'),
(15, 'MAT274', '2016-06-04 23:02:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '139.228.7.176'),
(16, 'BAY081', '2016-06-05 06:04:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Geck', '139.228.7.176'),
(17, 'MAT274', '2016-06-04 23:04:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '139.228.7.176'),
(18, 'MAT274', '2016-06-05 06:07:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '139.228.7.176'),
(19, 'MAT274', '2016-06-05 06:09:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '139.228.7.176'),
(20, 'SID311', '2016-06-05 07:00:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:46.0) Gecko', '139.228.7.176'),
(21, 'ABD250', '2016-06-05 07:18:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '114.121.132.87'),
(22, 'ABD250', '2016-06-05 07:29:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '114.121.132.87'),
(23, 'SID311', '2016-06-05 07:39:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:46.0) Gecko', '139.228.7.176'),
(24, 'SID311', '2016-06-05 07:40:00', 'Mozilla/5.0 (Linux; Android 4.4.4; HM 1S Build/KTU', '223.255.230.225'),
(25, 'ABD250', '2016-06-05 07:42:00', 'Mozilla/5.0 (Windows NT 6.1; rv:46.0) Gecko/201001', '139.228.7.176'),
(26, 'BAY081', '2016-06-06 09:47:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Geck', '114.79.53.135'),
(27, 'ABD250', '2016-06-07 08:04:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:46.0) Gecko', '202.61.126.62'),
(28, 'BAY081', '2016-06-08 22:35:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Geck', '140.0.126.66'),
(29, 'BAY081', '2016-06-09 04:06:44', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Geck', '140.0.126.66'),
(30, 'BAY081', '2016-06-09 11:06:12', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Geck', '140.0.126.66'),
(31, 'BAY081', '2016-06-10 09:06:04', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Geck', '114.79.48.117'),
(32, 'BAY081', '2016-06-12 22:06:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Geck', '140.0.126.66'),
(33, 'BAY081', '2016-06-15 21:06:42', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(34, 'BAY081', '2016-06-25 23:03:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(35, 'MAT274', '2016-06-26 08:55:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '36.72.127.3'),
(36, 'BAY081', '2016-06-26 21:06:49', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(37, 'MAT274', '2016-06-27 08:31:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '36.72.150.248'),
(38, 'BAY081', '2016-06-27 21:48:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '114.79.49.46'),
(39, 'BAY081', '2016-06-27 22:06:16', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '114.79.49.46'),
(40, 'MAT274', '2016-06-28 03:48:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '114.79.48.245'),
(41, 'MAT274', '2016-06-28 04:35:00', 'Mozilla/5.0 (Linux; Android 4.4.4; HM 1S Build/KTU', '139.228.7.176'),
(42, 'MAT274', '2016-06-28 08:01:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '139.228.7.176'),
(43, 'MAT274', '2016-06-28 08:29:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '139.228.7.176'),
(44, 'MAT274', '2016-06-28 08:52:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '139.228.7.176'),
(45, 'BAY081', '2016-06-28 12:06:26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(46, 'BAY081', '2016-06-29 23:06:26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(47, 'BAY081', '2016-06-30 23:06:25', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(48, 'BAY081', '2016-06-30 23:06:53', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(49, 'BAY081', '2016-07-01 00:07:06', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(50, 'BAY081', '2016-07-01 00:07:31', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(51, 'BAY081', '2016-07-01 00:07:11', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(52, 'BAY081', '2016-07-01 01:07:17', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(53, 'BAY081', '2016-07-01 02:07:41', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(54, 'BAY081', '2016-07-01 14:34:00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', '202.77.119.82'),
(55, 'BAY081', '2016-07-01 15:01:00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', '202.77.119.82'),
(56, 'MAT274', '2016-07-01 15:35:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '36.72.184.162'),
(57, 'ABD250', '2016-07-01 19:46:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.228.7.176'),
(58, 'BAY081', '2016-07-01 20:07:10', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(59, 'BAY081', '2016-07-01 20:07:02', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(60, 'BAY081', '2016-07-01 20:07:36', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(61, 'BAY081', '2016-07-01 20:07:02', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(62, 'BAY081', '2016-07-01 20:07:01', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(63, 'BAY081', '2016-07-02 05:07:47', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(64, 'BAY081', '2016-07-02 05:07:32', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(65, 'BAY081', '2016-07-02 05:07:03', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(66, 'BAY810', '2016-07-02 07:53:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(67, 'ABD250', '2016-07-02 08:07:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.228.7.176'),
(68, 'suc106', '2016-07-02 10:38:00', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53', '118.96.175.112'),
(69, 'BAY081', '2016-07-02 11:07:21', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_3 like Mac ', '114.124.6.107'),
(70, 'BAY081', '2016-07-02 11:07:23', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_3 like Mac ', '114.124.6.107'),
(71, 'BAY081', '2016-07-02 12:07:48', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(72, 'BAY081', '2016-07-02 14:07:52', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(73, 'BAY081', '2016-07-02 14:07:43', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(74, 'BAY081', '2016-07-02 14:07:54', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(75, 'BAY081', '2016-07-02 14:41:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(76, 'MAT274', '2016-07-02 14:43:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '36.72.111.116'),
(77, 'BAY081', '2016-07-02 15:07:32', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(78, 'BAY081', '2016-07-02 16:07:32', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(79, 'BAY081', '2016-07-02 17:52:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(80, 'YUL150', '2016-07-02 17:53:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '180.244.18.236'),
(81, 'WIS110', '2016-07-02 18:12:00', 'Mozilla/5.0 (Linux; Android 5.0.2; Mi 4i Build/LRX', '112.215.151.188'),
(82, 'BAY081', '2016-07-02 18:07:40', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_3 like Mac ', '139.228.7.176'),
(83, 'ABD250', '2016-07-02 18:49:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '139.228.7.176'),
(84, 'ABD250', '2016-07-02 18:53:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.228.7.176'),
(85, 'BAY081', '2016-07-02 18:07:16', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(86, 'BAY081', '2016-07-02 19:07:06', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(87, 'WIS110', '2016-07-02 19:21:00', 'Mozilla/5.0 (Linux; Android 5.0.2; Mi 4i Build/LRX', '112.215.45.208'),
(88, 'MAT274', '2016-07-02 20:33:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '36.72.111.116'),
(89, 'BAY081', '2016-07-02 20:07:27', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(90, 'BAY081', '2016-07-02 20:07:34', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '139.228.7.176'),
(91, 'EKA710', '2016-07-02 20:49:00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', '139.228.7.176'),
(92, 'ABD250', '2016-07-03 05:33:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '139.228.7.176'),
(93, 'ABD250', '2016-07-03 05:37:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.228.7.176'),
(94, 'Lae110', '2016-07-03 05:45:00', 'Mozilla/5.0 (Linux; Android 5.0.2; Andromax I46D1G', '115.178.193.181'),
(95, 'BAY081', '2016-07-03 12:07:48', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(96, 'ABD250', '2016-07-03 12:23:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.228.7.176'),
(97, 'ABD250', '2016-07-03 12:26:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.228.7.176'),
(98, 'ABD250', '2016-07-03 14:11:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '139.228.7.176'),
(99, 'MAT274', '2016-07-03 14:16:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '36.72.111.116'),
(100, 'MAt274', '2016-07-03 14:21:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '36.72.111.116'),
(101, 'MAt274', '2016-07-03 15:10:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '36.72.111.116'),
(102, 'YUL150', '2016-07-04 06:41:00', 'Mozilla/5.0 (Linux; Android 4.2.2; GT-I9082 Build/', '114.121.152.16'),
(103, 'ABD250', '2016-07-04 11:07:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '114.124.37.242'),
(104, 'SUC106', '2016-07-04 11:11:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '114.124.37.242'),
(105, 'SRI280', '2016-07-04 11:20:00', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-N9208 Build/', '180.253.134.75'),
(106, 'SUC106', '2016-07-04 11:25:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_3 like Mac ', '140.0.126.66'),
(107, 'SRI280', '2016-07-04 11:28:00', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-G925F Build/', '180.253.134.75'),
(108, 'MAT274', '2016-07-04 11:34:00', 'Mozilla/5.0 (Linux; Android 4.4.4; HM 1S Build/KTU', '36.72.111.116'),
(109, 'SUC106', '2016-07-04 11:54:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '114.124.37.242'),
(110, 'ABD250', '2016-07-04 12:00:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '114.124.37.242'),
(111, 'SUC106', '2016-07-04 12:08:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '36.72.111.116'),
(112, 'MAT274', '2016-07-04 12:16:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '36.72.111.116'),
(113, 'MAT274', '2016-07-04 12:20:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '36.72.111.116'),
(114, 'SUC106', '2016-07-04 14:13:00', 'Mozilla/5.0 (Android 4.4.2; Tablet; rv:47.0) Gecko', '114.124.34.106'),
(115, 'SUC106', '2016-07-04 14:16:00', 'Mozilla/5.0 (Android 4.4.2; Tablet; rv:47.0) Gecko', '114.124.34.106'),
(116, 'ABD250', '2016-07-04 14:27:00', 'Mozilla/5.0 (Android 4.4.2; Tablet; rv:47.0) Gecko', '114.124.34.63'),
(117, 'SUC106', '2016-07-04 14:35:00', 'Mozilla/5.0 (Android 4.4.2; Tablet; rv:47.0) Gecko', '114.124.37.254'),
(118, 'SUC106', '2016-07-04 14:36:00', 'Mozilla/5.0 (Android 4.4.2; Tablet; rv:47.0) Gecko', '114.124.37.254'),
(119, 'MAT274', '2016-07-04 14:36:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '36.72.111.116'),
(120, 'ABD250', '2016-07-04 14:39:00', 'Mozilla/5.0 (Android 4.4.2; Tablet; rv:47.0) Gecko', '114.124.37.254'),
(121, 'ABD250', '2016-07-04 14:48:00', 'Mozilla/5.0 (Android 4.4.2; Tablet; rv:47.0) Gecko', '114.124.37.254'),
(122, 'ABD250', '2016-07-04 14:53:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '114.121.155.158'),
(123, 'ADE405', '2016-07-04 15:18:00', 'Mozilla/5.0 (Linux; U; Android 4.4.4; en-us; 20148', '114.121.129.31'),
(124, 'ABD250', '2016-07-04 15:20:00', 'Mozilla/5.0 (Android 4.4.2; Tablet; rv:47.0) Gecko', '114.124.36.85'),
(125, 'SUC106', '2016-07-04 15:25:00', 'Mozilla/5.0 (Android 4.4.2; Tablet; rv:47.0) Gecko', '114.124.36.85'),
(126, 'MAT274', '2016-07-04 16:38:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/5', '36.72.111.116'),
(127, 'ABD250', '2016-07-04 16:39:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '114.121.155.158'),
(128, 'MAT274', '2016-07-04 16:40:00', 'Mozilla/5.0 (Linux; Android 4.4.4; HM 1S Build/KTU', '36.72.111.116'),
(129, 'ABD250', '2016-07-04 16:52:00', 'Mozilla/5.0 (Android 4.4.2; Tablet; rv:47.0) Gecko', '114.124.36.85'),
(130, 'SUC106', '2016-07-04 16:57:00', 'Mozilla/5.0 (Android 4.4.2; Tablet; rv:47.0) Gecko', '114.124.36.85'),
(131, 'BAY081', '2016-07-06 23:07:20', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '36.72.174.32'),
(132, 'ABD250', '2016-07-07 14:25:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '114.121.153.90'),
(133, 'ABD250', '2016-07-08 10:07:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '114.124.36.223'),
(134, 'BAY081', '2016-07-10 14:07:16', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '118.136.103.5'),
(135, 'ABD250', '2016-07-10 15:53:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '118.136.103.5'),
(136, 'YUL150', '2016-07-11 09:23:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '36.84.13.129'),
(137, 'BAY081', '2016-07-12 10:07:16', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '118.136.103.5'),
(138, 'EKA710', '2016-07-14 11:56:00', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:47.0) Gecko', '103.28.107.222'),
(139, 'ABD250', '2016-07-15 08:10:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '114.121.152.35'),
(140, 'YAS602', '2016-07-15 08:41:00', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (K', '114.121.132.42'),
(141, 'KAR210', '2016-07-15 09:08:00', 'Mozilla/5.0 (Windows NT 5.1; rv:47.0) Gecko/201001', '103.28.107.222'),
(142, 'ABD250', '2016-07-15 09:52:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '103.28.107.222'),
(143, 'SIT220', '2016-07-15 13:29:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '202.61.126.62'),
(144, 'DIY170', '2016-07-16 11:22:00', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (', '36.88.147.87'),
(145, 'BAY081', '2016-07-17 11:07:15', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '114.121.132.44'),
(146, 'BAY081', '2016-07-17 11:07:25', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '114.121.132.44'),
(147, 'YAS602', '2016-07-18 09:12:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '202.61.126.62'),
(148, 'ABD250', '2016-07-18 09:18:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '103.28.107.222'),
(149, 'BAY081', '2016-07-18 09:07:42', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(150, 'BAY081', '2016-07-18 09:07:30', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(151, 'ABD250', '2016-07-18 09:24:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '103.28.107.222'),
(152, 'BAY081', '2016-07-18 09:07:32', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '103.28.107.222'),
(153, 'ABD250', '2016-07-18 09:26:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '103.28.107.222'),
(154, 'BAY081', '2016-07-18 09:07:59', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '103.28.107.222'),
(155, 'ABD250', '2016-07-18 09:30:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '103.28.107.222'),
(156, 'ABD250', '2016-07-18 09:33:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '114.121.130.240'),
(157, 'BAY081', '2016-07-18 15:07:53', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(158, 'ABD250', '2016-07-18 15:37:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(159, 'ABD250', '2016-07-18 15:46:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '114.121.133.148'),
(160, 'ABD250', '2016-07-18 16:07:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(161, 'ABD250', '2016-07-18 16:08:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '114.121.133.148'),
(162, 'ABD250', '2016-07-18 16:11:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '114.121.133.148'),
(163, 'ABD250', '2016-07-18 16:17:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(164, 'SUC106', '2016-07-18 16:28:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(165, 'ABD250', '2016-07-18 16:51:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '114.121.133.148'),
(166, 'YAS602', '2016-07-18 16:52:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '202.61.126.62'),
(167, 'MAT274', '2016-07-18 18:49:00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', '36.72.171.152'),
(168, 'ABD250', '2016-07-18 20:25:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '39.248.158.178'),
(169, 'BAY081', '2016-07-18 20:07:39', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '39.248.158.178'),
(170, 'BAY081', '2016-07-18 20:07:45', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '39.248.158.178'),
(171, 'ABD250', '2016-07-18 21:02:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '39.248.158.178'),
(172, 'BAY081', '2016-07-18 21:07:26', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '39.248.158.178'),
(173, 'BAY081', '2016-07-18 21:07:02', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '39.248.158.178'),
(174, 'ABD250', '2016-07-18 21:25:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '39.248.158.178'),
(175, 'BAY081', '2016-07-18 21:07:30', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '39.248.158.178'),
(176, 'BAY081', '2016-07-18 21:07:33', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '39.248.158.178'),
(177, 'BAY081', '2016-07-18 21:07:02', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '39.248.158.178'),
(178, 'ABD250', '2016-07-18 21:39:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '39.248.158.178'),
(179, 'BAY081', '2016-07-18 21:07:13', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '39.248.158.178'),
(180, 'YAS602', '2016-07-19 07:31:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '202.61.126.62'),
(181, 'ABD250', '2016-07-19 08:02:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(182, 'AFI512', '2016-07-19 08:37:00', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:47.0) Gecko', '202.137.230.220'),
(183, 'ABD250', '2016-07-19 08:49:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(184, 'BAY081', '2016-07-19 08:07:08', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(185, 'BAY081', '2016-07-19 08:07:45', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(186, 'YUL150', '2016-07-19 09:11:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '180.252.110.231'),
(187, 'EKA710', '2016-07-19 15:15:00', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:47.0) Gecko', '103.28.107.222'),
(188, 'BAY081', '2016-07-19 21:07:14', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(189, 'BAY081', '2016-07-19 21:07:58', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(190, 'ABD250', '2016-07-20 07:11:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(191, 'AFI512', '2016-07-20 14:37:00', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:47.0) Gecko', '202.137.230.220'),
(192, 'YUL150', '2016-07-21 09:03:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '115.124.68.62'),
(193, 'YUL150', '2016-07-21 09:22:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '115.124.68.62'),
(194, 'BAY081', '2016-07-21 09:07:43', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(195, 'JOK271', '2016-07-21 09:29:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '115.124.68.62'),
(196, 'YUL150', '2016-07-22 12:28:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '180.252.145.41'),
(197, 'MUL805', '2016-07-22 13:13:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '180.252.145.41'),
(198, 'BAY081', '2016-07-22 13:07:03', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(199, 'ABD250', '2016-07-22 13:26:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(200, 'ABD250', '2016-07-22 13:26:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(201, 'BAY081', '2016-07-22 13:07:16', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(202, 'BAY081', '2016-07-22 13:07:31', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(203, 'JOK271', '2016-07-22 13:53:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '180.252.145.41'),
(204, 'ABD250', '2016-07-22 13:59:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(205, 'abd250', '2016-07-22 14:04:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(206, 'JOK271', '2016-07-22 14:07:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '180.252.145.41'),
(207, 'BAY081', '2016-07-22 14:07:25', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(208, 'BAY081', '2016-07-22 14:07:57', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(209, 'ABD250', '2016-07-22 14:21:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(210, 'JOK271', '2016-07-22 14:22:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '180.252.145.41'),
(211, 'BAY081', '2016-07-22 14:07:26', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(212, 'YUL150', '2016-07-22 14:28:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '180.252.145.41'),
(213, 'JOK271', '2016-07-22 14:30:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '180.252.145.41'),
(214, 'JOK271', '2016-07-22 14:35:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '180.252.145.41'),
(215, 'YUL150', '2016-07-22 14:43:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '180.252.145.41'),
(216, 'SIT220', '2016-07-22 15:01:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '202.61.126.62'),
(217, 'BAY081', '2016-07-22 15:07:01', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(218, 'BAY081', '2016-07-22 15:07:10', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(219, 'BAY081', '2016-07-22 15:07:53', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(220, 'ABD250', '2016-07-22 16:20:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(221, 'SIT220', '2016-07-22 16:44:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '202.61.126.62'),
(222, 'SIT220', '2016-07-22 16:45:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '202.61.126.62'),
(223, 'BAY081', '2016-07-23 07:07:45', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.255.137.205'),
(224, 'ABD250', '2016-07-23 07:51:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.255.137.205'),
(225, 'BAY081', '2016-07-23 14:07:42', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.255.137.205'),
(226, 'BAY081', '2016-07-23 14:07:36', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.255.137.205'),
(227, 'BAY081', '2016-07-23 14:07:48', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.255.137.205'),
(228, 'BAY081', '2016-07-23 17:07:33', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.255.137.205'),
(229, 'BAY081', '2016-07-23 18:07:23', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.255.137.205'),
(230, 'BAY081', '2016-07-23 18:07:55', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.255.137.205'),
(231, 'BAY081', '2016-07-23 18:07:46', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.255.137.205'),
(232, 'ABD250', '2016-07-24 07:25:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '139.255.137.205'),
(233, 'AFI512', '2016-07-24 10:23:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '118.136.244.206'),
(234, 'BAY081', '2016-07-24 16:07:06', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.255.137.205'),
(235, 'BAY081', '2016-07-24 16:07:07', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.255.137.205'),
(236, 'SUM140', '2016-07-25 07:42:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '103.28.106.55'),
(237, 'ABD140', '2016-07-25 08:00:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '202.137.230.220'),
(238, 'BAY081', '2016-07-25 08:07:42', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(239, 'YUL150', '2016-07-25 12:12:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '180.252.145.41'),
(240, 'BAY081', '2016-07-25 12:07:15', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(241, 'ABD140', '2016-07-25 13:25:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '202.137.230.220'),
(242, 'BAY081', '2016-07-25 16:07:23', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(243, 'BAY081', '2016-07-25 16:07:07', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(244, 'BAY081', '2016-07-25 16:07:41', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(245, 'ABD250', '2016-07-25 16:44:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(246, 'BAY081', '2016-07-25 22:07:08', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.255.137.205'),
(247, 'BAY081', '2016-07-25 22:07:56', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.255.137.205'),
(248, 'BAY081', '2016-07-25 22:07:01', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:4', '36.72.26.125'),
(249, 'ABD250', '2016-07-25 22:41:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.255.137.205'),
(250, 'BAY081', '2016-07-25 22:07:36', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.255.137.205'),
(251, 'BAY081', '2016-07-25 22:07:01', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.255.137.205'),
(252, 'ABD250', '2016-07-25 23:01:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.255.137.205'),
(253, 'BAY081', '2016-07-25 23:07:57', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.255.137.205'),
(254, 'BAY081', '2016-07-25 23:07:38', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.255.137.205'),
(255, 'YAS602', '2016-07-26 10:31:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '202.61.126.62'),
(256, 'AFI512', '2016-07-26 12:07:00', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:47.0) Gecko', '202.137.230.220'),
(257, 'MUL805', '2016-07-26 12:36:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '180.252.145.41'),
(258, 'MUL805', '2016-07-26 12:43:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '180.252.145.41'),
(259, 'BAY081', '2016-07-26 12:07:53', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '180.252.145.41'),
(260, 'MUL805', '2016-07-26 13:14:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '180.252.145.41'),
(261, 'ARI121', '2016-07-26 13:32:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '115.124.68.62'),
(262, 'YUL150', '2016-07-26 14:12:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '180.252.145.41'),
(263, 'AFI512', '2016-07-26 14:30:00', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:47.0) Gecko', '202.137.230.220'),
(264, 'BAY081', '2016-07-26 15:07:28', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(265, 'BAY081', '2016-07-26 16:07:40', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(266, 'MEL111', '2016-07-26 19:34:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '118.97.167.235'),
(267, 'MEL111', '2016-07-26 19:39:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '118.97.167.235'),
(268, 'MEL111', '2016-07-26 19:40:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '103.225.89.2'),
(269, 'MEL111', '2016-07-26 19:55:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '112.215.65.67'),
(270, 'ABD250', '2016-07-26 20:39:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '139.255.137.205'),
(271, 'ABD250', '2016-07-27 07:20:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(272, 'BAY081', '2016-07-27 07:07:42', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(273, 'BAY081', '2016-07-27 07:07:48', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(274, 'BAY081', '2016-07-27 07:07:15', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(275, 'BAY081', '2016-07-27 07:07:13', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(276, 'ABD250', '2016-07-27 07:26:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(277, 'KAR210', '2016-07-28 07:19:00', 'Mozilla/5.0 (Windows NT 5.1; rv:47.0) Gecko/201001', '103.28.106.55'),
(278, 'KAR210', '2016-07-28 07:27:00', 'Mozilla/5.0 (Windows NT 5.1; rv:47.0) Gecko/201001', '103.28.106.55'),
(279, 'TED100', '2016-07-28 08:27:00', 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/201001', '202.137.230.220'),
(280, 'EKA710', '2016-07-28 13:45:00', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:47.0) Gecko', '103.28.107.222'),
(281, 'EKA710', '2016-07-28 13:53:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '114.121.134.122'),
(282, 'dya140', '2016-07-28 14:13:00', 'Mozilla/5.0 (Linux; U; Android 4.2.2; en-us; PadFo', '114.124.31.175'),
(283, 'DYA140', '2016-07-28 14:19:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '36.66.72.140'),
(284, 'BAY081', '2016-07-28 15:07:23', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(285, 'ABD250', '2016-07-28 16:14:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(286, 'BAY081', '2016-07-28 16:07:11', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(287, 'BAY081', '2016-07-28 16:07:26', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(288, 'BAY081', '2016-07-28 16:07:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(289, 'BAY081', '2016-07-28 16:07:36', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(290, 'ABD250', '2016-07-28 16:45:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(291, 'ABD250', '2016-07-28 16:51:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(292, 'BAY081', '2016-07-28 16:07:38', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(293, 'ABD250', '2016-07-28 16:51:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(294, 'BAY081', '2016-07-28 16:07:26', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(295, 'BAY081', '2016-07-28 16:07:36', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(296, 'BAY081', '2016-07-28 16:07:06', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(297, 'ABD250', '2016-07-28 16:56:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(298, 'BAY081', '2016-07-28 16:07:29', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(299, 'ABD250', '2016-07-28 16:59:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(300, 'BAY081', '2016-07-28 17:07:14', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(301, 'AFI512', '2016-07-28 17:20:00', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:47.0) Gecko', '36.66.72.140'),
(302, 'ABD250', '2016-07-28 22:23:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '139.255.137.205'),
(303, 'BAY081', '2016-07-28 22:39:00', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(304, 'ABD250', '2016-07-29 07:39:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(305, 'ABD250', '2016-07-29 07:43:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(306, 'ABD250', '2016-07-29 07:44:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(307, 'ABD250', '2016-07-29 20:40:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '139.255.137.205'),
(308, 'MAT274', '2016-07-29 21:04:00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', '36.72.176.79'),
(309, 'ABD250', '2016-07-29 22:35:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '139.255.137.205'),
(310, 'BAY081', '2016-07-30 08:47:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_3 like Mac ', '140.0.126.66'),
(311, 'ABD250', '2016-07-30 14:36:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '139.194.206.159'),
(312, 'ABD250', '2016-07-31 07:51:00', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac ', '139.194.206.159'),
(313, 'BAY081', '2016-07-31 11:07:50', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.194.206.159'),
(314, 'BAY081', '2016-07-31 11:07:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.194.206.159'),
(315, 'BAY081', '2016-07-31 11:07:54', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.194.206.159'),
(316, 'BAY081', '2016-07-31 11:07:45', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.194.206.159'),
(317, 'BAY081', '2016-07-31 11:07:26', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.194.206.159'),
(318, 'BAY081', '2016-07-31 11:07:11', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.194.206.159'),
(319, 'ABD250', '2016-07-31 13:46:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.194.206.159'),
(320, 'ADE405', '2016-08-01 11:26:00', 'Mozilla/5.0 (Linux; U; Android 4.4.4; id-id; 20148', '139.194.206.159'),
(321, 'yas602', '2016-08-01 13:32:00', 'Mozilla/5.0 (Linux; U; Android 4.4.2; in-id; LG-D6', '114.124.30.74'),
(322, 'PUR903', '2016-08-02 16:42:00', 'Mozilla/5.0 (Windows NT 6.1; rv:24.0) Gecko/201001', '103.28.107.222'),
(323, 'YAS602', '2016-08-04 10:35:00', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (K', '202.61.126.62'),
(324, 'AFI512', '2016-08-04 14:06:00', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:47.0) Gecko', '202.137.230.220'),
(325, 'BAY081', '2016-08-05 08:08:27', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(326, 'RIF280', '2016-08-05 15:48:00', 'Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; r', '103.28.106.55'),
(327, 'BAY081', '2016-08-06 15:08:52', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.194.206.159'),
(328, 'BAY081', '2016-08-06 15:08:51', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.194.206.159'),
(329, 'BAY081', '2016-08-06 15:08:25', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.194.206.159'),
(330, 'BAY081', '2016-08-06 15:08:05', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.194.206.159'),
(331, 'BAY081', '2016-08-06 15:08:26', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '139.194.206.159'),
(332, 'SUP130', '2016-08-09 07:59:00', 'Mozilla/5.0 (Windows NT 5.1; rv:47.0) Gecko/201001', '103.28.106.55'),
(333, 'TED100', '2016-08-11 07:58:00', 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/201001', '202.137.230.220'),
(334, 'BAY081', '2016-08-11 13:08:32', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(335, 'BAY081', '2016-08-11 13:08:27', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(336, 'BAY081', '2016-08-11 13:08:21', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(337, 'KEM210', '2016-08-12 07:45:00', 'Mozilla/5.0 (Windows NT 5.1; rv:47.0) Gecko/201001', '103.28.106.55'),
(338, 'PUR903', '2016-08-12 08:01:00', 'Mozilla/5.0 (Windows NT 6.1; rv:24.0) Gecko/201001', '103.28.107.222'),
(339, 'BAY081', '2016-08-12 08:08:44', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(340, 'BAY081', '2016-08-12 08:08:33', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:47.0) Geck', '140.0.126.66'),
(341, 'BAY081', '2016-08-12 15:08:50', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(342, 'BAY081', '2016-08-12 15:08:42', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(343, 'BAY081', '2016-08-12 15:08:50', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(344, 'BAY081', '2016-08-12 15:08:25', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(345, 'BAY081', '2016-08-12 15:08:19', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(346, 'ABD250', '2016-08-12 15:33:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(347, 'BAY081', '2016-08-12 15:08:18', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(348, 'ABD250', '2016-08-12 15:42:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(349, 'BAY081', '2016-08-12 15:08:33', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(350, 'ABD250', '2016-08-12 15:55:00', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko', '202.61.126.62'),
(351, 'ABD250', '2016-08-13 15:24:00', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/201001', '114.121.133.190');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_emailguest`
--

CREATE TABLE IF NOT EXISTS `tbl_emailguest` (
  `id_emailguest` int(11) NOT NULL,
  `no_transaksi` int(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_emailguest`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_emailguest`
--

INSERT INTO `tbl_emailguest` (`id_emailguest`, `no_transaksi`, `email`) VALUES
(0, 16000101, 'tisnadinata@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(20) NOT NULL,
  `nama_kategori` varchar(20) DEFAULT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `kategori`, `nama_kategori`, `keterangan`) VALUES
(1, 'gender', 'men', 'keterangan produk'),
(2, 'gender', 'women', 'keterangan produk'),
(3, 'gender', 'unisex', 'keterangan produk'),
(4, 'jenis_produk', 'pants', 'keterangan produk'),
(5, 'jenis_produk', 'tshirt', 'keterangan produk'),
(6, 'jenis_produk', 'shirt', 'keterangan produk'),
(7, 'jenis_produk', 'jacket', 'keterangan produk'),
(8, 'jenis_produk', 'dress', 'keterangan produk'),
(9, 'jenis_produk', 'skirt', 'keterangan produk'),
(11, 'bahan', 'jeans', 'keterangan produk'),
(12, 'bahan', 'chinos', 'keterangan produk'),
(13, 'bahan', 'cotton', 'keterangan produk'),
(14, 'style', 'skinny', 'keterangan produk'),
(15, 'style', 'slim', 'keterangan produk'),
(16, 'style', 'reguler', 'keterangan produk'),
(17, 'efek', 'normal', 'keterangan produk'),
(18, 'efek', 'whiskers', 'keterangan produk'),
(19, 'efek', 'ripped', 'keterangan produk'),
(20, 'efek', 'destroy', 'keterangan produk'),
(21, 'ukuran', 'long', 'keterangan produk'),
(22, 'ukuran', 'short', 'keterangan produk'),
(23, 'jenis_produk', 'jumpsuit', ''),
(28, 'Warna', 'Blue Dark', ''),
(29, 'Warna', 'Blue Light', ''),
(30, 'Warna', 'Black', ''),
(31, 'Warna', 'Blue Light Scratch', ''),
(32, 'Warna', 'Blue Dark Scratch', ''),
(33, 'Warna', 'Blue Indigo', ''),
(34, 'Warna', 'Grey', ''),
(35, 'Warna', 'White', ''),
(36, 'Style', 'skinny super', ''),
(37, 'Warna', 'Blue Dark Whisker', ''),
(38, 'Warna', 'Blue Sky Ripped', ''),
(39, 'Warna', 'Brown Khaki', ''),
(40, 'Warna', 'Grey Dark', ''),
(41, 'Warna', 'Blue Navy', ''),
(42, 'Ukuran', 'short scratch', ''),
(43, 'Ukuran', 'long ripped', ''),
(44, 'Efek', 'scratch', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kupon`
--

CREATE TABLE IF NOT EXISTS `tbl_kupon` (
  `id_kupon` varchar(11) NOT NULL,
  `id_customer` varchar(11) DEFAULT NULL,
  `max_pemakaian` int(11) DEFAULT NULL,
  `tipe_kupon` varchar(50) DEFAULT NULL,
  `jumlah_potongan` int(11) DEFAULT NULL,
  `min_belanja` int(11) DEFAULT NULL,
  `kuota_tersedia` int(11) DEFAULT NULL,
  `tgl_berlaku` datetime DEFAULT NULL,
  `tgl_berakhir` datetime DEFAULT NULL,
  PRIMARY KEY (`id_kupon`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kupon`
--

INSERT INTO `tbl_kupon` (`id_kupon`, `id_customer`, `max_pemakaian`, `tipe_kupon`, `jumlah_potongan`, `min_belanja`, `kuota_tersedia`, `tgl_berlaku`, `tgl_berakhir`) VALUES
('BAJUBARU', 'all', 4, 'Rp', 30000, 200000, 4979, '2016-06-30 00:00:00', '2016-08-31 00:00:00'),
('PRBDI', 'all', 100, 'Rp', 120000, 200000, 1000, '2016-07-01 00:00:00', '2016-09-30 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mutasi`
--

CREATE TABLE IF NOT EXISTS `tbl_mutasi` (
  `id_mutasi` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_bank` int(11) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `saldo_masuk` float NOT NULL,
  `no_transaksi` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_mutasi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mutasiakun`
--

CREATE TABLE IF NOT EXISTS `tbl_mutasiakun` (
  `id_akun` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(20) DEFAULT NULL,
  `no_rek` varchar(100) DEFAULT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_akun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mutasidetail`
--

CREATE TABLE IF NOT EXISTS `tbl_mutasidetail` (
  `id_mutasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_bank` int(11) NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `berita_transfer` text NOT NULL,
  `saldo_awal` varchar(255) NOT NULL,
  `saldo_masuk` varchar(255) NOT NULL,
  `saldo_akhir` varchar(255) NOT NULL,
  PRIMARY KEY (`id_mutasi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `no_transaksi` int(25) NOT NULL,
  `id_customer` varchar(20) NOT NULL,
  `id_alamat` int(11) NOT NULL,
  `waktu` datetime DEFAULT NULL,
  `kode_unik` int(11) DEFAULT NULL,
  `diskon_produk` int(11) DEFAULT NULL,
  `diskon_kirim` int(11) NOT NULL,
  `asuransi` int(11) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `jumlah_dibayar` int(11) NOT NULL,
  `metode_pembayaran` varchar(20) NOT NULL,
  `catatan` varchar(50) NOT NULL,
  `biaya_kirim` int(11) NOT NULL,
  PRIMARY KEY (`no_transaksi`),
  UNIQUE KEY `no_transaksi` (`no_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`no_transaksi`, `id_customer`, `id_alamat`, `waktu`, `kode_unik`, `diskon_produk`, `diskon_kirim`, `asuransi`, `jumlah_bayar`, `jumlah_dibayar`, `metode_pembayaran`, `catatan`, `biaya_kirim`) VALUES
(16000101, '36.72.176.100', 67, '2016-07-01 03:37:00', 313, 0, 30000, 0, 1218687, 0, 'BCA', 'tisnadinata@gmail.com', 11000),
(16000102, '202.51.104.50', 69, '2016-07-01 14:22:00', 984, 0, 30000, 0, 42816, 0, 'DOKU-15', 'afirzan@gmail.com', 0),
(16000103, 'BAY081', 44, '2016-07-01 14:35:00', 384, 0, 30000, 0, 736616, 0, 'DOKU-14', '', 69000),
(16000104, 'BAY081', 44, '2016-07-01 14:38:00', 524, 0, 30000, 0, 210476, 0, 'DOKU-15', '', 69000),
(16000105, 'BAY081', 44, '2016-07-01 15:09:00', 411, 0, 30000, 0, 444589, 0, 'DOKU-15', '', 69000),
(16000106, 'BAY081', 44, '2016-07-01 15:12:00', 940, 0, 30000, 0, 366060, 0, 'DOKU-15', '', 69000),
(16000107, '36.72.184.162', 70, '2016-07-01 15:33:00', 530, 0, 30000, 0, 171470, 0, 'DOKU-04', 'tes', 11000),
(16000108, 'MAT274', 25, '2016-07-01 15:37:00', 340, 74360, 30000, 0, 297100, 0, 'DOKU-15', '', 11000),
(16000109, '202.51.104.50', 71, '2016-07-01 15:39:00', 426, 0, 30000, 0, 43374, 0, 'DOKU-15', 'afirzan@gmail.com', 9000),
(16000110, 'MAT274', 25, '2016-07-01 15:47:00', 163, 68800, 30000, 0, 275037, 0, 'DOKU-14', '', 11000),
(16000111, 'MAT274', 25, '2016-07-01 15:48:00', 581, 100000, 30000, 0, 399419, 0, 'DOKU-14', '', 11000),
(16000112, '202.51.104.50', 72, '2016-07-01 15:53:00', 723, 0, 30000, 0, 43077, 0, 'DOKU-15', 'afirzan@gmail.com', 9000),
(16000113, '202.51.104.50', 69, '2016-07-01 16:11:00', 551, 0, 30000, 0, 43249, 0, 'DOKU-15', 'afirzan@gmail.com', 9000),
(16000114, '202.51.104.50', 72, '2016-07-01 16:12:00', 704, 0, 30000, 0, 43096, 0, 'DOKU-04', 'afirzan@gmail.com', 9000),
(16000115, '202.51.104.50', 69, '2016-07-01 16:14:00', 847, 0, 30000, 0, 42953, 0, 'DOKU-14', 'afirzan@gmail.com', 9000),
(16000116, '202.51.104.50', 69, '2016-07-01 16:15:00', 317, 0, 30000, 0, 43483, 0, 'DOKU-05', 'afirzan@gmail.com', 9000),
(16000117, 'ABD250', 10, '2016-07-01 19:48:00', 413, 151000, 30000, 0, 648587, 0, 'DOKU-15', '', 75000),
(16000118, '139.228.7.176', 77, '2016-07-02 05:10:00', 830, 0, 30000, 0, 418170, 0, 'BCA', '', 11000),
(16000119, 'BAY810', 78, '2016-07-02 07:58:00', 115, 101800, 30000, 6018, 413103, 0, 'DOKU-05', '', 11000),
(16000120, 'MAT274', 25, '2016-07-02 15:02:00', 398, 217600, 30000, 0, 620002, 0, 'BCA', '', 11000),
(16000121, 'YUL150', 80, '2016-07-02 18:14:00', 505, 160000, 30000, 0, 389495, 0, 'DOKU-15', '', 9000),
(16000122, 'MAT274', 25, '2016-07-02 20:34:00', 269, 163000, 30000, 0, 651731, 0, 'DOKU-15', '', 11000),
(16000123, '124.153.33.8', 95, '2016-07-18 16:37:00', 521, 0, 30000, 0, 418479, 0, 'BCA', 'Tes', 0),
(16000124, 'YAS602', 91, '2016-07-18 16:55:00', 536, 111200, 30000, 0, 294264, 0, 'MANDIRI', '', 9000),
(16000125, 'JOK271', 97, '2016-07-22 13:59:00', 563, 108000, 30000, 0, 281437, 0, 'DOKU-15', '', 9000),
(16000126, 'ABD250', 10, '2016-07-22 14:04:00', 254, 78000, 30000, 0, 311746, 0, 'DOKU-15', '', 9000),
(16000127, 'JOK271', 97, '2016-07-22 14:18:00', 430, 78000, 30000, 0, 311570, 0, 'DOKU-15', '', 9000),
(16000128, 'JOK271', 97, '2016-07-22 14:37:00', 224, 108000, 30000, 0, 281776, 0, 'DOKU-15', '', 9000),
(16000129, 'SIT220', 93, '2016-07-22 15:05:00', 462, 111200, 30000, 0, 294338, 0, 'MANDIRI', '', 9000),
(16000130, 'SIT220', 93, '2016-07-22 16:52:00', 871, 110000, 30000, 0, 289129, 0, 'MANDIRI', '', 9000),
(16000131, 'SUM140', 100, '2016-07-25 07:43:00', 659, 110000, 30000, 0, 289341, 0, 'MANDIRI', '', 9000),
(16000132, 'ABD140', 101, '2016-07-25 13:27:00', 723, 108600, 30000, 0, 283677, 0, 'MANDIRI', '', 9000),
(16000133, 'ABD250', 10, '2016-07-25 22:44:00', 521, 110000, 30000, 0, 289479, 0, 'MANDIRI', '', 9000),
(16000134, 'MUL805', 98, '2016-07-26 12:40:00', 871, 110000, 30000, 0, 289129, 0, 'MANDIRI', '', 9000),
(16000135, 'MUL805', 98, '2016-07-26 12:45:00', 176, 110000, 30000, 0, 289824, 0, 'MANDIRI', '', 9000),
(16000136, 'ARI121', 104, '2016-07-26 13:35:00', 585, 108600, 30000, 0, 283815, 0, 'MANDIRI', '', 9000),
(16000137, 'KAR210', 92, '2016-07-28 07:23:00', 571, 114400, 30000, 0, 307029, 0, 'DOKU-15', '', 9000),
(16000138, 'KAR210', 92, '2016-07-28 07:29:00', 961, 114400, 30000, 0, 306639, 0, 'MANDIRI', '', 9000),
(16000139, 'EKA710', 82, '2016-07-28 13:49:00', 244, 111200, 30000, 0, 294556, 0, 'MANDIRI', '', 17000),
(16000140, 'EKA710', 82, '2016-07-28 13:55:00', 664, 89400, 30000, 0, 206936, 0, 'MANDIRI', '', 17000),
(16000141, 'DYA140', 109, '2016-07-28 14:24:00', 549, 103800, 30000, 0, 264651, 0, 'MANDIRI', '', 9000),
(16000142, 'AFI512', 96, '2016-07-28 17:24:00', 609, 111200, 30000, 0, 294191, 0, 'MANDIRI', '', 9000),
(16000143, 'BAY081', 51, '2016-07-28 22:41:00', 985, 0, 30000, 0, 921015, 0, 'BCA', '', 11000),
(16000144, 'AFI512', 96, '2016-08-04 14:30:00', 911, 110000, 30000, 0, 289089, 0, 'MANDIRI', '', 9000),
(16000145, 'RIF280', 112, '2016-08-05 15:50:00', 894, 110000, 30000, 0, 289106, 0, 'MANDIRI', '', 9000),
(16000146, 'SUP130', 108, '2016-08-09 08:01:00', 591, 111200, 30000, 0, 294209, 0, 'MANDIRI', '', 9000),
(16000147, 'TED100', 106, '2016-08-11 08:02:00', 611, 110000, 30000, 0, 289389, 0, 'MANDIRI', '', 9000),
(16000148, 'KEM210', 107, '2016-08-12 07:49:00', 956, 111200, 30000, 0, 293844, 0, 'MANDIRI', '', 9000),
(16000149, 'PUR903', 111, '2016-08-12 08:04:00', 711, 110000, 30000, 0, 289289, 0, 'MANDIRI', '', 9000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_orderdetail`
--

CREATE TABLE IF NOT EXISTS `tbl_orderdetail` (
  `id_orderdetail` int(11) NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(25) NOT NULL,
  `kode_produk` varchar(20) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id_orderdetail`),
  KEY `kode_barang` (`kode_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data untuk tabel `tbl_orderdetail`
--

INSERT INTO `tbl_orderdetail` (`id_orderdetail`, `no_transaksi`, `kode_produk`, `harga`, `jumlah`, `keterangan`) VALUES
(1, '16000101', '8.2.2.3.0.0.2', 172000, 1, 'M,White'),
(2, '16000101', '4.1.3.3.0.1.1', 349000, 3, 'XL,Blue Indigo'),
(3, '16000102', '9.2.4.1.3.1.2', 43800, 1, 'S,Blue Light'),
(4, '16000103', '3.1.3.3.0.1.2', 349000, 2, 'XXL,Blue Light'),
(5, '16000104', '8.2.2.3.0.0.2', 172000, 1, 'XL,Grey'),
(6, '16000105', '2.2.1.1.1.2.1', 406000, 1, '34,Blue Light'),
(7, '16000106', '7.2.5.3.0.1.2', 328000, 1, 'XL,Blue Light'),
(8, '16000107', '8.2.2.3.0.0.2', 172000, 1, 'S,White'),
(9, '16000108', '9.2.4.1.3.1.2', 43800, 1, 'S,Blue Light'),
(10, '16000108', '7.2.5.3.0.1.2', 328000, 1, 'S,Blue Light'),
(11, '16000109', '9.2.4.1.3.1.2', 43800, 1, 'S,Blue Light'),
(12, '16000110', '8.2.2.3.0.0.2', 172000, 2, 'S,White'),
(13, '16000111', '5.1.2.3.0.0.2', 172000, 1, 'S,White'),
(14, '16000111', '7.2.5.3.0.1.2', 328000, 1, 'S,Blue Light'),
(15, '16000112', '9.2.4.1.3.1.2', 43800, 1, 'XL,Blue Light'),
(16, '16000113', '9.2.4.1.3.1.2', 43800, 1, 'XL,Blue Light'),
(17, '16000114', '9.2.4.1.3.1.2', 43800, 1, 'XL,Blue Light'),
(18, '16000115', '9.2.4.1.3.1.2', 43800, 1, 'XL,Blue Light'),
(19, '16000116', '9.2.4.1.3.1.2', 43800, 1, 'XL,Blue Light'),
(20, '16000117', '2.2.1.1.1.2.1', 406000, 1, '29,Blue Light'),
(21, '16000117', '3.1.3.3.0.1.2', 349000, 1, 'M,Blue Light'),
(22, '16000118', '15.1.1.1.3.3.1', 419000, 1, '28,Blue Sky Ripped'),
(23, '16000119', '4.1.3.3.0.1.1', 349000, 1, 'M,Blue Indigo'),
(24, '16000119', '5.1.2.3.0.0.2', 160000, 1, 'XL,Grey'),
(25, '16000120', '15.1.1.1.3.3.1', 419000, 2, '28,Blue Sky Ripped'),
(26, '16000121', '8.2.2.3.0.0.2', 160000, 1, 'M,Grey'),
(27, '16000121', '1.2.1.1.4.2.1', 390000, 1, 'L,Black'),
(28, '16000122', '14.1.1.1.3.2.1', 393000, 1, '28,Blue Dark Whisker'),
(29, '16000122', '2.2.1.1.1.2.1', 422000, 1, '30,Blue Light Scratch'),
(30, '16000123', '15.1.1.1.3.3.1', 419000, 1, '28,Blue Sky Ripped'),
(31, '16000124', '2.2.1.1.1.2.1', 406000, 1, '29,Blue Light'),
(32, '16000125', '11.1.1.2.2.1.1', 390000, 1, '34,Blue Navy'),
(33, '16000126', '11.1.1.2.2.1.1', 390000, 1, '36,Brown Khaki'),
(34, '16000127', '11.1.1.2.2.1.1', 390000, 1, '36,Blue Navy'),
(35, '16000128', '11.1.1.2.2.1.1', 390000, 1, '34,Blue Navy'),
(36, '16000129', '2.2.1.1.1.2.1', 406000, 1, '32,Blue Light'),
(37, '16000130', '9.2.4.1.3.1.2', 400000, 1, 'M,Blue Light'),
(38, '16000131', '11.1.1.2.2.1.1', 400000, 1, '36,Brown Khaki'),
(39, '16000132', '14.1.1.1.3.2.1', 393000, 1, '31,Blue Dark Whisker'),
(40, '16000133', '11.1.1.2.2.1.1', 400000, 1, '36,Grey Dark'),
(41, '16000134', '11.1.1.2.2.1.1', 400000, 1, '34,Brown Khaki'),
(42, '16000135', '11.1.1.2.2.1.1', 400000, 1, '34,Brown Khaki'),
(43, '16000136', '14.1.1.1.3.2.1', 393000, 1, '36,Blue Dark Whisker'),
(44, '16000137', '2.2.1.1.1.2.1', 422000, 1, '34,Blue Dark Scratch'),
(45, '16000138', '2.2.1.1.1.2.1', 422000, 1, '34,Blue Dark Scratch'),
(46, '16000139', '2.2.1.1.1.2.1', 406000, 1, '29,Blue Light'),
(47, '16000140', '12.1.1.1.3.3.2', 297000, 1, '32,Blue Light'),
(48, '16000141', '0.2.1.1.1.2.2', 369000, 1, 'XL,Blue Light'),
(49, '16000142', '2.2.1.1.1.2.1', 406000, 1, '32,Blue Light'),
(50, '16000143', '7.2.5.3.0.1.2', 328000, 1, 'XL,Blue Light'),
(51, '16000143', '12.1.1.1.3.3.2', 297000, 2, '36,Blue Light'),
(52, '16000144', '11.1.1.2.2.1.1', 400000, 1, '28,Blue Navy'),
(53, '16000145', '11.1.1.2.2.1.1', 400000, 1, '31,Blue Navy'),
(54, '16000146', '2.2.1.1.1.2.1', 406000, 1, '34,Blue Light'),
(55, '16000147', '11.1.1.2.2.1.1', 400000, 1, '32,Blue Navy'),
(56, '16000148', '2.2.1.1.1.2.1', 406000, 1, '31,Blue Light'),
(57, '16000149', '11.1.1.2.2.1.1', 400000, 1, '29,Grey Dark');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_orderkode`
--

CREATE TABLE IF NOT EXISTS `tbl_orderkode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_transaksi` int(15) NOT NULL,
  `kode_booking` varchar(8) DEFAULT NULL,
  `resi` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data untuk tabel `tbl_orderkode`
--

INSERT INTO `tbl_orderkode` (`id`, `no_transaksi`, `kode_booking`, `resi`) VALUES
(1, 16000101, NULL, NULL),
(2, 16000102, NULL, NULL),
(3, 16000103, NULL, NULL),
(4, 16000104, NULL, NULL),
(5, 16000105, NULL, NULL),
(6, 16000106, NULL, NULL),
(7, 16000107, NULL, NULL),
(8, 16000108, NULL, NULL),
(9, 16000109, NULL, NULL),
(10, 16000110, NULL, NULL),
(11, 16000111, NULL, NULL),
(12, 16000112, NULL, NULL),
(13, 16000113, NULL, NULL),
(14, 16000114, NULL, NULL),
(15, 16000115, NULL, NULL),
(16, 16000116, NULL, NULL),
(17, 16000117, NULL, NULL),
(18, 16000118, NULL, NULL),
(19, 16000119, NULL, NULL),
(20, 16000120, NULL, NULL),
(21, 16000121, NULL, '123456789'),
(22, 16000122, NULL, NULL),
(23, 16000123, NULL, NULL),
(24, 16000124, NULL, '234567890'),
(25, 16000125, NULL, NULL),
(26, 16000126, NULL, NULL),
(27, 16000127, NULL, NULL),
(28, 16000128, NULL, '34567890'),
(29, 16000129, NULL, '567891011'),
(30, 16000130, NULL, '45678910'),
(31, 16000131, NULL, '12345678'),
(32, 16000132, NULL, '67891011'),
(33, 16000133, NULL, NULL),
(34, 16000134, NULL, '45678910'),
(35, 16000135, NULL, NULL),
(36, 16000136, NULL, '567891011'),
(37, 16000137, NULL, NULL),
(38, 16000138, NULL, '12345678'),
(39, 16000139, NULL, '12345678'),
(40, 16000140, NULL, '12345678'),
(41, 16000141, NULL, '12345678'),
(42, 16000142, NULL, '12345678'),
(43, 16000143, NULL, NULL),
(44, 16000144, NULL, '12345678'),
(45, 16000145, NULL, '12345678'),
(46, 16000146, NULL, '12345678'),
(47, 16000147, NULL, '12345678'),
(48, 16000148, NULL, '12345678'),
(49, 16000149, NULL, '12345678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_orderkonfirmasi`
--

CREATE TABLE IF NOT EXISTS `tbl_orderkonfirmasi` (
  `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT,
  `waktu` datetime NOT NULL,
  `waktu_transfer` datetime NOT NULL,
  `no_transaksi` int(25) NOT NULL,
  `atas_nama` varchar(40) NOT NULL,
  `no_rekening` varchar(50) DEFAULT NULL,
  `ke` varchar(50) NOT NULL,
  `jumlah_transfer` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id_konfirmasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `tbl_orderkonfirmasi`
--

INSERT INTO `tbl_orderkonfirmasi` (`id_konfirmasi`, `waktu`, `waktu_transfer`, `no_transaksi`, `atas_nama`, `no_rekening`, `ke`, `jumlah_transfer`, `status`) VALUES
(1, '0000-00-00 00:00:00', '2016-07-18 00:00:00', 16000124, 'YASTI MIYARSIH', NULL, 'MANDIRI TRANSFER', 294300, 1),
(2, '0000-00-00 00:00:00', '2016-07-27 00:00:00', 16000130, 'SITI PUDJI', NULL, 'MANDIRI TRANSFER', 289129, 1),
(3, '0000-00-00 00:00:00', '2016-07-27 00:00:00', 16000129, 'SITI PUDJI', NULL, 'MANDIRI TRANSFER', 294338, 1),
(4, '0000-00-00 00:00:00', '2016-07-26 00:00:00', 16000134, 'MULYO SUTARTO', NULL, 'MANDIRI TRANSFER', 289129, 1),
(5, '0000-00-00 00:00:00', '2016-07-26 00:00:00', 16000136, 'ARIF', NULL, 'MANDIRI TRANSFER', 283815, 1),
(6, '0000-00-00 00:00:00', '2016-07-25 00:00:00', 16000132, 'ABDUL HARIS', NULL, 'MANDIRI TRANSFER', 283677, 1),
(7, '0000-00-00 00:00:00', '2016-07-25 00:00:00', 16000131, 'SUMINAH', NULL, 'MANDIRI TRANSFER', 289341, 1),
(8, '0000-00-00 00:00:00', '2016-07-28 00:00:00', 16000142, 'AFIT ARIFITRI', NULL, 'MANDIRI TRANSFER', 294191, 1),
(9, '0000-00-00 00:00:00', '2016-07-29 00:00:00', 16000141, 'DIYAN', NULL, 'MANDIRI TRANSFER', 264651, 1),
(10, '0000-00-00 00:00:00', '2016-07-29 00:00:00', 16000140, 'EKA', NULL, 'MANDIRI TRANSFER', 206936, 1),
(11, '0000-00-00 00:00:00', '2016-07-29 00:00:00', 16000139, '294556', NULL, 'MANDIRI TRANSFER', 294556, 1),
(12, '0000-00-00 00:00:00', '2016-07-29 00:00:00', 16000138, 'KARTIKA', NULL, 'MANDIRI TRANSFER', 306639, 1),
(13, '0000-00-00 00:00:00', '2016-08-05 00:00:00', 16000144, 'AFIT ARIFITRI', NULL, 'MANDIRI TRANSFER', 289089, 1),
(14, '0000-00-00 00:00:00', '2016-08-12 00:00:00', 16000146, 'SUPARNA WIJAYA', NULL, 'MANDIRI TRANSFER', 295000, 1),
(15, '0000-00-00 00:00:00', '2016-08-11 00:00:00', 16000147, 'TEDY', NULL, 'MANDIRI TRANSFER', 289389, 1),
(16, '0000-00-00 00:00:00', '2016-08-12 00:00:00', 16000148, 'puti', NULL, 'MANDIRI TRANSFER', 293844, 1),
(17, '0000-00-00 00:00:00', '2016-08-12 00:00:00', 16000149, 'PURNO', NULL, 'MANDIRI TRANSFER', 289289, 1),
(18, '0000-00-00 00:00:00', '2016-08-12 00:00:00', 16000145, 'RIFDAH', NULL, 'MANDIRI TRANSFER', 289106, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_orderprint`
--

CREATE TABLE IF NOT EXISTS `tbl_orderprint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penerima` varchar(36) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `estimasi_ongkir` int(13) NOT NULL,
  `keterangan` varchar(75) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `no_transaksi` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_orderstatus`
--

CREATE TABLE IF NOT EXISTS `tbl_orderstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_transaksi` int(25) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'Menunggu pembayaran',
  PRIMARY KEY (`id`),
  KEY `no_transaksi` (`no_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=119 ;

--
-- Dumping data untuk tabel `tbl_orderstatus`
--

INSERT INTO `tbl_orderstatus` (`id`, `no_transaksi`, `waktu`, `status`) VALUES
(1, 16000101, '2016-07-01 03:37:00', 'Menunggu pembayaran'),
(2, 16000102, '2016-07-01 14:22:00', 'Pesanan dibatalkan'),
(3, 16000103, '2016-07-01 14:35:00', 'Pesanan dibatalkan'),
(4, 16000104, '2016-07-01 14:38:00', 'Menunggu pembayaran'),
(5, 16000105, '2016-07-01 15:09:00', 'Pesanan dibatalkan'),
(6, 16000106, '2016-07-01 15:12:00', 'Pesanan dibatalkan'),
(7, 16000107, '2016-07-01 15:33:00', 'Menunggu pembayaran'),
(8, 16000108, '2016-07-01 15:37:00', 'Menunggu pembayaran'),
(9, 16000109, '2016-07-01 15:39:00', 'Pesanan dibatalkan'),
(10, 16000110, '2016-07-01 15:47:00', 'Menunggu pembayaran'),
(11, 16000111, '2016-07-01 15:48:00', 'Menunggu pembayaran'),
(12, 16000112, '2016-07-01 15:53:00', 'Pembayaran diterima'),
(13, 16000113, '2016-07-01 16:11:00', 'Pesanan dibatalkan'),
(14, 16000114, '2016-07-01 16:12:00', 'Pembayaran diterima'),
(15, 16000115, '2016-07-01 16:14:00', 'Menunggu pembayaran'),
(16, 16000116, '2016-07-01 16:15:00', 'Menunggu pembayaran'),
(17, 16000117, '2016-07-01 19:48:00', 'Pesanan dibatalkan'),
(18, 16000118, '2016-07-02 05:10:00', 'Menunggu pembayaran'),
(19, 16000119, '2016-07-02 07:58:00', 'Menunggu pembayaran'),
(20, 16000120, '2016-07-02 15:02:00', 'Menunggu pembayaran'),
(21, 16000121, '2016-07-02 18:14:00', 'Pembayaran diterima'),
(22, 16000122, '2016-07-02 20:34:00', 'Menunggu pembayaran'),
(23, 16000121, '2016-07-10 14:46:00', 'Pesanan diproses'),
(24, 16000123, '2016-07-18 16:37:00', 'Menunggu pembayaran'),
(25, 16000124, '2016-07-18 16:55:00', 'Menunggu pembayaran'),
(26, 16000121, '2016-07-18 20:50:02', 'Pesanan terkirim'),
(27, 16000104, '2016-07-18 20:52:56', 'Pesanan dibatalkan'),
(28, 16000122, '2016-07-18 20:59:05', 'Pesanan dibatalkan'),
(29, 16000120, '2016-07-18 20:59:16', 'Pesanan dibatalkan'),
(30, 16000119, '2016-07-18 20:59:38', 'Pesanan dibatalkan'),
(31, 16000111, '2016-07-18 20:59:54', 'Pesanan dibatalkan'),
(32, 16000110, '2016-07-18 21:00:06', 'Pesanan dibatalkan'),
(33, 16000108, '2016-07-18 21:00:18', 'Pesanan dibatalkan'),
(34, 16000124, '2016-07-18 21:36:40', 'Pembayaran diterima'),
(35, 16000124, '2016-07-18 21:37:19', 'Pesanan diproses'),
(36, 16000124, '2016-07-18 21:38:03', 'Pesanan terkirim'),
(37, 16000125, '2016-07-22 13:59:00', 'Menunggu pembayaran'),
(38, 16000126, '2016-07-22 14:04:00', 'Pesanan dibatalkan'),
(39, 16000125, '2016-07-22 14:11:27', 'Pesanan dibatalkan'),
(40, 16000127, '2016-07-22 14:18:00', 'Menunggu pembayaran'),
(41, 16000127, '2016-07-22 14:28:24', 'Pesanan dibatalkan'),
(42, 16000128, '2016-07-22 14:37:00', 'Pembayaran diterima'),
(43, 16000129, '2016-07-22 15:05:00', 'Menunggu pembayaran'),
(44, 16000130, '2016-07-22 16:52:00', 'Menunggu pembayaran'),
(45, 16000128, '2016-07-23 14:18:03', 'Pesanan diproses'),
(46, 16000128, '2016-07-23 14:18:40', 'Pesanan terkirim'),
(47, 16000131, '2016-07-25 07:43:00', 'Menunggu pembayaran'),
(48, 16000132, '2016-07-25 13:27:00', 'Menunggu pembayaran'),
(49, 16000130, '2016-07-25 16:29:19', 'Pembayaran diterima'),
(50, 16000130, '2016-07-25 16:35:33', 'Pesanan diproses'),
(51, 16000130, '2016-07-25 16:36:56', 'Pesanan terkirim'),
(52, 16000129, '2016-07-25 16:38:27', 'Pembayaran diterima'),
(53, 16000129, '2016-07-25 16:40:45', 'Pesanan diproses'),
(54, 16000129, '2016-07-25 16:41:34', 'Pesanan terkirim'),
(55, 16000133, '2016-07-25 22:44:00', 'Menunggu pembayaran'),
(56, 16000133, '2016-07-25 22:49:01', 'Pesanan dibatalkan'),
(57, 16000134, '2016-07-26 12:40:00', 'Menunggu pembayaran'),
(58, 16000135, '2016-07-26 12:45:00', 'Menunggu pembayaran'),
(59, 16000135, '2016-07-26 12:49:46', 'Pesanan dibatalkan'),
(60, 16000136, '2016-07-26 13:35:00', 'Menunggu pembayaran'),
(61, 16000134, '2016-07-26 16:00:30', 'Pembayaran diterima'),
(62, 16000136, '2016-07-27 07:22:21', 'Pembayaran diterima'),
(63, 16000136, '2016-07-27 07:22:55', 'Pesanan diproses'),
(64, 16000136, '2016-07-27 07:23:05', 'Pesanan terkirim'),
(65, 16000134, '2016-07-27 07:23:13', 'Pesanan diproses'),
(66, 16000134, '2016-07-27 07:23:27', 'Pesanan terkirim'),
(67, 16000132, '2016-07-27 07:23:53', 'Pembayaran diterima'),
(68, 16000132, '2016-07-27 07:24:24', 'Pesanan diproses'),
(69, 16000132, '2016-07-27 07:24:34', 'Pesanan terkirim'),
(70, 16000131, '2016-07-27 07:25:02', 'Pembayaran diterima'),
(71, 16000131, '2016-07-27 07:25:38', 'Pesanan diproses'),
(72, 16000131, '2016-07-27 07:25:48', 'Pesanan terkirim'),
(73, 16000137, '2016-07-28 07:23:00', 'Pesanan dibatalkan'),
(74, 16000138, '2016-07-28 07:29:00', 'Menunggu pembayaran'),
(75, 16000139, '2016-07-28 13:49:00', 'Menunggu pembayaran'),
(76, 16000140, '2016-07-28 13:55:00', 'Menunggu pembayaran'),
(77, 16000141, '2016-07-28 14:24:00', 'Menunggu pembayaran'),
(78, 16000142, '2016-07-28 17:24:00', 'Menunggu pembayaran'),
(79, 16000143, '2016-07-28 22:41:00', 'Menunggu pembayaran'),
(80, 16000142, '2016-07-31 11:32:34', 'Pembayaran diterima'),
(81, 16000141, '2016-07-31 11:33:36', 'Pembayaran diterima'),
(82, 16000140, '2016-07-31 11:34:27', 'Pembayaran diterima'),
(83, 16000139, '2016-07-31 11:35:12', 'Pembayaran diterima'),
(84, 16000138, '2016-07-31 11:35:53', 'Pembayaran diterima'),
(85, 16000144, '2016-08-04 14:30:00', 'Menunggu pembayaran'),
(86, 16000142, '2016-08-05 08:07:51', 'Pesanan diproses'),
(87, 16000141, '2016-08-05 08:07:56', 'Pesanan diproses'),
(88, 16000140, '2016-08-05 08:08:01', 'Pesanan diproses'),
(89, 16000139, '2016-08-05 08:08:09', 'Pesanan diproses'),
(90, 16000138, '2016-08-05 08:08:14', 'Pesanan diproses'),
(91, 16000138, '2016-08-05 08:08:31', 'Pesanan terkirim'),
(92, 16000139, '2016-08-05 08:09:13', 'Pesanan terkirim'),
(93, 16000140, '2016-08-05 08:09:27', 'Pesanan terkirim'),
(94, 16000141, '2016-08-05 08:09:40', 'Pesanan terkirim'),
(95, 16000142, '2016-08-05 08:09:49', 'Pesanan terkirim'),
(96, 16000145, '2016-08-05 15:50:00', 'Menunggu pembayaran'),
(97, 16000144, '2016-08-06 15:25:22', 'Pembayaran diterima'),
(98, 16000144, '2016-08-06 15:26:58', 'Pesanan diproses'),
(99, 16000144, '2016-08-06 15:27:39', 'Pesanan terkirim'),
(100, 16000146, '2016-08-09 08:01:00', 'Menunggu pembayaran'),
(101, 16000147, '2016-08-11 08:02:00', 'Menunggu pembayaran'),
(102, 16000146, '2016-08-11 13:04:06', 'Pembayaran diterima'),
(103, 16000147, '2016-08-11 13:04:51', 'Pembayaran diterima'),
(104, 16000147, '2016-08-11 13:05:29', 'Pesanan diproses'),
(105, 16000146, '2016-08-11 13:05:33', 'Pesanan diproses'),
(106, 16000147, '2016-08-11 13:05:44', 'Pesanan terkirim'),
(107, 16000146, '2016-08-11 13:05:55', 'Pesanan terkirim'),
(108, 16000148, '2016-08-12 07:49:00', 'Menunggu pembayaran'),
(109, 16000149, '2016-08-12 08:04:00', 'Menunggu pembayaran'),
(110, 16000148, '2016-08-12 15:23:09', 'Pembayaran diterima'),
(111, 16000148, '2016-08-12 15:23:48', 'Pesanan diproses'),
(112, 16000148, '2016-08-12 15:23:59', 'Pesanan terkirim'),
(113, 16000149, '2016-08-12 15:31:10', 'Pembayaran diterima'),
(114, 16000149, '2016-08-12 15:31:30', 'Pesanan diproses'),
(115, 16000149, '2016-08-12 15:31:38', 'Pesanan terkirim'),
(116, 16000145, '2016-08-12 15:32:09', 'Pembayaran diterima'),
(117, 16000145, '2016-08-12 15:32:26', 'Pesanan diproses'),
(118, 16000145, '2016-08-12 15:32:35', 'Pesanan terkirim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ordertemp`
--

CREATE TABLE IF NOT EXISTS `tbl_ordertemp` (
  `id_temp` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` varchar(20) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_temp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=140 ;

--
-- Dumping data untuk tabel `tbl_ordertemp`
--

INSERT INTO `tbl_ordertemp` (`id_temp`, `id_customer`, `kode_produk`, `keterangan`, `qty`) VALUES
(3, '36.72.176.100', '8.2.2.3.0.0.2', 'S,Grey', 1),
(5, '114.79.51.204', '7.2.5.3.0.1.2', 'L,Blue Light', 2),
(6, '114.79.51.204', '8.2.2.3.0.0.2', 'S,Grey', 2),
(7, '114.121.135.211', '9.2.4.1.3.1.2', 'XL,Blue Light', 1),
(9, '112.215.65.52', '9.2.4.1.3.1.2', 'XL,Blue Light', 1),
(16, '36.72.184.162', '9.2.4.1.3.1.2', 'S,Blue Light', 1),
(43, '115.178.195.88', '3.1.3.3.0.1.2', 'M,Blue Light', 1),
(46, 'Lae110', '14.1.1.1.3.2.1', '34,Blue Dark Whisker', 1),
(47, 'Lae110', '5.1.2.3.0.0.2', 'XL,Grey', 1),
(48, '114.121.130.35', '15.1.1.1.3.3.1', '28,Blue Sky Ripped', 1),
(50, '114.121.153.28', '2.2.1.1.1.2.1', '29,Blue Dark', 3),
(54, '114.124.5.119', '1.2.1.1.4.2.1', 'S,Black', 3),
(56, 'DIY170', '8.2.2.3.0.0.2', 'XL,White', 1),
(60, '140.0.126.66', '14.1.1.1.3.2.1', '36,Blue Dark Whisker', 1),
(71, '45.118.113.66', '15.1.1.1.3.3.1', '36,Blue Sky Ripped', 1),
(81, 'MAT274', '13.1.1.1.3.3.3', '28,Blue Dark Scratch', 1),
(82, '36.72.171.152', '13.1.1.1.3.3.3', '28,Blue Dark Scratch', 1),
(85, '61.94.132.241', '12.1.1.1.3.3.2', '30,Blue Light', 1),
(92, '180.253.148.49', '12.1.1.1.3.3.2', '28,Blue Light', 1),
(97, '114.121.135.44', '9.2.4.1.3.1.2', 'S,Blue Light', 1),
(102, '180.253.136.249', '13.1.1.1.3.3.3', '28,Blue Dark Scratch', 1),
(109, 'MUL805', '1.2.1.1.4.2.1', 'XL,Black', 1),
(124, 'ABD250', '11.1.1.2.2.1.1', '30,Blue Navy', 1),
(125, 'ABD250', '11.1.1.2.2.1.1', '28,Grey Dark', 1),
(126, 'ABD250', '12.1.1.1.3.3.2', '28,Blue Light', 1),
(127, 'ABD250', '2.2.1.1.1.2.1', '31,Blue Dark', 1),
(128, 'ABD250', '15.1.1.1.3.3.1', '28,Blue Sky Ripped', 1),
(131, '180.243.16.90', '3.1.3.3.0.1.2', 'M,Blue Dark', 1),
(132, '180.243.16.90', '15.1.1.1.3.3.1', '28,Blue Sky Ripped', 1),
(136, 'SUP130', '2.2.1.1.1.2.1', '34,Blue Light', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ordertemp2`
--

CREATE TABLE IF NOT EXISTS `tbl_ordertemp2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_transaksi` int(20) NOT NULL,
  `nama_penerima` varchar(36) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `code` varchar(20) NOT NULL,
  `keterangan` varchar(75) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengaturan`
--

CREATE TABLE IF NOT EXISTS `tbl_pengaturan` (
  `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengaturan` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pengaturan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `tbl_pengaturan`
--

INSERT INTO `tbl_pengaturan` (`id_pengaturan`, `nama_pengaturan`, `keterangan`) VALUES
(1, 'dis_nonmember', '0'),
(2, 'dis_member', '20'),
(3, 'dis_agen', '30'),
(4, 'default_referal', 'ABD250'),
(5, 'konversi_poin', '1000'),
(6, 'subsidi_ongkir', '30000'),
(7, 'kontak_facebook', 'https://facebook.com/orelishop'),
(8, 'kontak_twitter', 'https://twitter.com/orelishop'),
(9, 'kontak_telepon', ''),
(10, 'brand', 'https://oreli.co.id/images/logo.png'),
(11, 'alamat_return', ''),
(12, 'link', 'https://oreli.co.id'),
(13, 'kontak_instagram', 'https://instagram.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_poin`
--

CREATE TABLE IF NOT EXISTS `tbl_poin` (
  `id_poin` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` varchar(20) NOT NULL,
  `waktu` datetime DEFAULT CURRENT_TIMESTAMP,
  `poin_lama` int(11) DEFAULT '0',
  `poin` int(11) NOT NULL,
  `poin_aksi` varchar(2) DEFAULT NULL,
  `poin_akhir` int(11) DEFAULT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`id_poin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data untuk tabel `tbl_poin`
--

INSERT INTO `tbl_poin` (`id_poin`, `id_customer`, `waktu`, `poin_lama`, `poin`, `poin_aksi`, `poin_akhir`, `status`) VALUES
(1, 'YUL150', '2016-07-18 20:50:02', 0, 31, '+', 31, 'PP-Penambahan Poin +31 dari Transaksi 16000121'),
(2, 'YAS602', '2016-07-18 21:38:03', 0, 25, '+', 25, 'PP-Penambahan Poin +25 dari Transaksi 16000124'),
(3, 'ABD250', '2016-07-18 20:50:02', 0, 15, '+', 15, 'PS-Penambahan Poin +15 dari Transaksi YULIANTI'),
(4, 'ABD250', '2016-07-18 21:38:03', 15, 13, '+', 28, 'PS-Penambahan Poin +13 dari Transaksi Yasti Miyarsih'),
(5, 'JOK271', '2016-07-23 14:18:40', 0, 25, '+', 25, 'PP-Penambahan Poin +25 dari Transaksi 16000128'),
(6, 'YUL150', '2016-07-23 14:18:51', 31, 12, '+', 43, 'PS-Penambahan Poin +43 dari Transaksi JOKO EKANTO-JOK271'),
(7, 'SIT220', '2016-07-25 16:36:56', 0, 25, '+', 25, 'PP-Penambahan Poin +25 dari Transaksi 16000130'),
(8, 'abd250', '2016-07-25 16:37:00', 28, 13, '+', 41, 'PS-Penambahan Poin +41 dari Transaksi SITI-SIT220'),
(9, 'SIT220', '2016-07-25 16:41:34', 25, 25, '+', 50, 'PP-Penambahan Poin +50 dari Transaksi 16000129'),
(10, 'abd250', '2016-07-25 16:41:37', 41, 13, '+', 54, 'PS-Penambahan Poin +54 dari Transaksi SITI-SIT220'),
(11, 'ARI121', '2016-07-27 07:23:05', 0, 24, '+', 24, 'PP-Penambahan Poin +24 dari Transaksi 16000136'),
(12, 'YUL150', '2016-07-27 07:23:06', 43, 12, '+', 55, 'PS-Penambahan Poin +55 dari Transaksi ARIF MAHFUDIN FITRI-ARI121'),
(13, 'MUL805', '2016-07-27 07:23:27', 0, 20, '+', 20, 'PP-Penambahan Poin +20 dari Transaksi 16000134'),
(14, 'YUL150', '2016-07-27 07:23:28', 55, 10, '+', 65, 'PS-Penambahan Poin +65 dari Transaksi MULYO SUTARTO-MUL805'),
(15, 'ABD140', '2016-07-27 07:24:34', 0, 24, '+', 24, 'PP-Penambahan Poin +24 dari Transaksi 16000132'),
(16, 'YAS602', '2016-07-27 07:24:36', 25, 12, '+', 37, 'PS-Penambahan Poin +37 dari Transaksi ABDUL HARIS-ABD140'),
(17, 'SUM140', '2016-07-27 07:25:48', 0, 20, '+', 20, 'PP-Penambahan Poin +20 dari Transaksi 16000131'),
(18, 'SIT220', '2016-07-27 07:25:49', 50, 10, '+', 60, 'PS-Penambahan Poin +60 dari Transaksi SUMINAH-SUM140'),
(19, 'KAR210', '2016-08-05 08:08:31', 0, 25, '+', 25, 'PP-Penambahan Poin +25 dari Transaksi 16000138'),
(20, 'ABD250', '2016-08-05 08:08:39', 54, 13, '+', 67, 'PS-Penambahan Poin +67 dari Transaksi Kartika sagala-KAR210'),
(21, 'EKA710', '2016-08-05 08:09:13', 0, 25, '+', 25, 'PP-Penambahan Poin +25 dari Transaksi 16000139'),
(22, 'ABD250', '2016-08-05 08:09:15', 67, 13, '+', 80, 'PS-Penambahan Poin +80 dari Transaksi Eka Widy Hastuti-EKA710'),
(23, 'EKA710', '2016-08-05 08:09:27', 25, 18, '+', 43, 'PP-Penambahan Poin +43 dari Transaksi 16000140'),
(24, 'ABD250', '2016-08-05 08:09:28', 80, 9, '+', 89, 'PS-Penambahan Poin +89 dari Transaksi Eka Widy Hastuti-EKA710'),
(25, 'DYA140', '2016-08-05 08:09:40', 0, 22, '+', 22, 'PP-Penambahan Poin +22 dari Transaksi 16000141'),
(26, 'abd250', '2016-08-05 08:09:41', 89, 11, '+', 100, 'PS-Penambahan Poin +100 dari Transaksi Dyan-DYA140'),
(27, 'AFI512', '2016-08-05 08:09:49', 0, 25, '+', 25, 'PP-Penambahan Poin +25 dari Transaksi 16000142'),
(28, 'ABD250', '2016-08-05 08:09:51', 100, 13, '+', 113, 'PS-Penambahan Poin +113 dari Transaksi Afit arifitri-AFI512'),
(29, 'AFI512', '2016-08-06 15:27:39', 25, 20, '+', 45, 'PP-Penambahan Poin +45 dari Transaksi 16000144'),
(30, 'ABD250', '2016-08-06 15:27:40', 113, 10, '+', 123, 'PS-Penambahan Poin +123 dari Transaksi Afit arifitri-AFI512'),
(31, 'TED100', '2016-08-11 13:05:44', 0, 20, '+', 20, 'PP-Penambahan Poin +20 dari Transaksi 16000147'),
(32, 'KAR210', '2016-08-11 13:05:45', 25, 10, '+', 35, 'PS-Penambahan Poin +35 dari Transaksi Tedy kurniawan-TED100'),
(33, 'SUP130', '2016-08-11 13:05:56', 0, 25, '+', 25, 'PP-Penambahan Poin +25 dari Transaksi 16000146'),
(34, 'KAR210', '2016-08-11 13:05:57', 35, 13, '+', 48, 'PS-Penambahan Poin +48 dari Transaksi Suparna Wijaya-SUP130'),
(35, 'KEM210', '2016-08-12 15:23:59', 0, 25, '+', 25, 'PP-Penambahan Poin +25 dari Transaksi 16000148'),
(36, 'KAR210', '2016-08-12 15:24:00', 48, 13, '+', 61, 'PS-Penambahan Poin +61 dari Transaksi Kemala S.I.Z. Puti-KEM210'),
(37, 'PUR903', '2016-08-12 15:31:38', 0, 20, '+', 20, 'PP-Penambahan Poin +20 dari Transaksi 16000149'),
(38, 'YAS602', '2016-08-12 15:31:39', 37, 10, '+', 47, 'PS-Penambahan Poin +47 dari Transaksi Purno Murtopo-PUR903'),
(39, 'RIF280', '2016-08-12 15:32:35', 0, 20, '+', 20, 'PP-Penambahan Poin +20 dari Transaksi 16000145'),
(40, 'ABD250', '2016-08-12 15:32:37', 123, 10, '+', 133, 'PS-Penambahan Poin +133 dari Transaksi RIFDAH-RIF280');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_poinbonus`
--

CREATE TABLE IF NOT EXISTS `tbl_poinbonus` (
  `id_poinbonus` int(11) NOT NULL AUTO_INCREMENT,
  `total_poin` int(10) NOT NULL,
  `bonus` varchar(50) NOT NULL,
  PRIMARY KEY (`id_poinbonus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_poinpencairan`
--

CREATE TABLE IF NOT EXISTS `tbl_poinpencairan` (
  `id_pencairan` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` varchar(20) DEFAULT NULL,
  `jum_pencairan` int(11) DEFAULT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `status` int(20) DEFAULT '1',
  `tgl_pengajuan` datetime DEFAULT NULL,
  `tgl_pencairan` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pencairan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pointransfer`
--

CREATE TABLE IF NOT EXISTS `tbl_pointransfer` (
  `id_transfer` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` varchar(20) NOT NULL,
  `id_tujuan` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_transfer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE IF NOT EXISTS `tbl_produk` (
  `kode_produk` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama_produk` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `harga_diskon` int(25) DEFAULT '0',
  `berlaku` datetime DEFAULT NULL,
  `sampai` datetime DEFAULT NULL,
  `berat` float NOT NULL,
  `deskripsi` varchar(1000) DEFAULT NULL,
  `deskripsi2` varchar(1000) NOT NULL,
  `poin_downline` int(5) NOT NULL,
  `poin_upline` int(5) NOT NULL,
  `favorite` int(1) NOT NULL,
  `publish` int(11) NOT NULL,
  PRIMARY KEY (`kode_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`kode_produk`, `waktu`, `nama_produk`, `harga`, `harga_diskon`, `berlaku`, `sampai`, `berat`, `deskripsi`, `deskripsi2`, `poin_downline`, `poin_upline`, `favorite`, `publish`) VALUES
('0.2.1.1.1.2.2', '2016-06-30 23:50:48', 'JASMINE CAPRI JEANS', 369000, 0, NULL, NULL, 500, '<p>Celana kami dibuat dengan bahan berkualitas, sangat nyaman dipakai seperti sedang memakai bahan kaos. Celana capri berkesan trendi dan kasual yang membuat anda semakin gaya.&nbsp; Menampillkan potongan skinny yang pas di bagian paha sampai dengan lutut memberi kesan tubuh lebih panjang jika dipadukan dengan atasan yang pas dengan badan.</p>\r\n', '<ul>\r\n	<li>98 % Cotton</li>\r\n	<li>2% Elastane</li>\r\n</ul>\r\n', 22, 11, 0, 1),
('1.2.1.1.4.2.1', '2016-07-01 00:57:42', 'ADERA SUPER SKINNY JEANS', 390000, 0, NULL, NULL, 500, '<p>Style super skinny kami akan membuat anda semakin gaya dengan potongan tanpa efek whiskers atau scratch.&nbsp; Style ini dipakai di pinggang (medium rise) yang memberi kesan siluet alami dari bagian pinggang sampai kaki anda. Bahan Stretch Denim kami dirancang untuk kenyamanan anda saat dipakai.</p>\r\n', '<ul>\r\n	<li>98 % Cotton</li>\r\n	<li>2% Elastane</li>\r\n</ul>\r\n', 24, 12, 0, 1),
('11.1.1.2.2.1.1', '2016-07-01 21:02:02', 'CAVIN SLIM CHINOS', 400000, 0, NULL, NULL, 500, '<p>Jika anda mencari alternatif dari celana jeans, kami menghadirkan celana chinos yang akan membuat anda semakin gaya. Koleksi Chinos kami dibuat dari bahan katun berkualitas dan diproses dengan standar tinggi untuk kenyamanan anda. Style ini dipakai di pinggang (medium rise) dengan cutting slim dari paha sampai kaki berkesan modern dan streamline.</p>\r\n', '<ul>\r\n	<li>100% Katun</li>\r\n</ul>\r\n', 20, 10, 0, 1),
('12.1.1.1.3.3.2', '2016-07-01 21:10:31', 'DANDY SHORT', 297000, 0, NULL, NULL, 500, '<p>Koleksi celana pendek Jeans kami membuat anda semakin gaya berkesan trendi dan kasual dengan Efek pudar dan berkesan &ldquo;worn look&rdquo; .&nbsp; Menampilkan potongan reguler yang lega di bagian paha sampai dengan lutut, cocok dipakai di acara informal dan santai.</p>\r\n', '<ul>\r\n	<li>100% Katun</li>\r\n</ul>\r\n', 18, 9, 0, 1),
('13.1.1.1.3.3.3', '2016-07-01 21:14:01', 'DANDY SCRATCH SHORT', 299000, 0, NULL, NULL, 500, '<p>Koleksi celana pendek Jeans kami membuat anda semakin gaya berkesan trendi dan kasual dengan Efek distress kombinasi whiskers dan scratch yang kekinian dan berkesan &ldquo;worn look&rdquo; .&nbsp; Menampilkan potongan reguler yang lega di bagian paha sampai dengan lutut, cocok dipakai di acara informal dan santai.</p>\r\n', '<ul>\r\n	<li>100% Katun</li>\r\n</ul>\r\n', 18, 9, 0, 1),
('14.1.1.1.3.2.1', '2016-07-01 21:30:07', 'ROMEO WHISKER JEANS', 393000, 0, NULL, NULL, 700, '<p>Style Reguler kami membuat anda semakin gaya dengan efek handmade whiskers pada bagian Paha dan lutut. Style ini digunakan di pinggang (medium rise) dan berkesan lega dan lurus pada bagian paha dan kaki untuk memaksimalkan kenyamanan anda saat dipakai.</p>\r\n', '<ul>\r\n	<li>100% Katun</li>\r\n</ul>\r\n', 24, 12, 0, 1),
('15.1.1.1.3.3.1', '2016-07-01 21:35:10', 'ROMEO RIPPED JEANS', 419000, 0, NULL, NULL, 700, '<p>Style Reguler kami membuat anda semakin gaya dengan efek handmade whiskers dan ripped pada bagian Paha dan lutut. Style ini digunakan di pinggang (medium rise) dan berkesan lega dan lurus pada bagian paha dan kaki untuk memaksimalkan kenyamanan anda saat dipakai.</p>\r\n', '<ul>\r\n	<li>100% Katun</li>\r\n</ul>\r\n', 26, 13, 0, 1),
('2.2.1.1.1.2.1', '2016-07-01 01:05:45', 'AMORA SKINNY JEANS', 406000, 0, NULL, NULL, 500, '<p>Style skinny kami akan membuat anda semakin gaya dengan efek&nbsp; hand made whiskers pada bagian paha sampai lutut dan belakang.&nbsp; Style ini dipakai di pinggang (medium rise) yang memberi kesan siluet alami dari bagian pinggang sampai kaki anda. Bahan Stretch Denim kami dirancang untuk kenyamanan anda saat dipakai.</p>\r\n', '<ul>\r\n	<li>98% Cotton</li>\r\n	<li>2% Elastane</li>\r\n</ul>\r\n', 25, 13, 0, 1),
('3.1.3.3.0.1.2', '2016-07-01 01:20:03', 'ALUCIO SHIRT', 349000, 0, NULL, NULL, 300, '<p>Kemeja lengan pendek kami membuat anda semakin gaya dengan proses pencucian iced wash menampilkan warna indigo yang pecah berkesan bunga es yang menempel di baju. Dengan tampilan kemeja berkerah, berlengan pendek, bersaku tunggal di depan,&nbsp; style ini berkesan modern dan dapat digunakan untuk acara formal maupun informal.</p>\r\n', '<ul>\r\n	<li>100% Katun</li>\r\n</ul>\r\n', 21, 11, 0, 1),
('4.1.3.3.0.1.1', '2016-07-01 01:26:51', 'AZZAM SHIRT', 349000, 0, NULL, NULL, 300, '<p>Koleksi kemeja dengan lengan panjang dengan pilihan dengan kerah mandarin style&nbsp; menjadikan penampilan anda semakin gaya. Menampilkan potongan&nbsp; dengan dua saku di samping berkesan formal maupun informal dan cocok digunakan di acara resmi atau santai.</p>\r\n', '<ul>\r\n	<li>100% Katun</li>\r\n</ul>\r\n', 21, 11, 0, 1),
('5.1.2.3.0.0.2', '2016-07-01 01:32:56', 'ESTEE TSHIRT MEN', 160000, 0, NULL, NULL, 300, '<p>Kaos dan celana jeans kami dibuat untuk saling melengkapi. Kaos Standar dengan logo Estee dan Oreli.co.id menjadi ikon yang wajib dikoleksi bagi member dan&nbsp; agen. Kaos kami menggunakan bahan katun berkualitas diproses dengan garment washing untuk meningkatkan kenyamanan saat dipakai.</p>\r\n', '<ul>\r\n	<li>Catton Combed 20s (warna gray)</li>\r\n	<li>Catton Combed 30s (warna white)</li>\r\n</ul>\r\n', 7, 3, 0, 1),
('6.2.3.3.0.1.1', '2016-07-01 01:37:40', 'LEONA DRESS', 336000, 0, NULL, NULL, 300, '<p>Kemeka klasik denim yang dapat digunakan untuk berbagai suasana dan musim. Dengan pilihan&nbsp; lengan panjang , menampilkan kancing depan dan kantong depan dobel dengan flip dan kerah basic (reguler point collar).</p>\r\n', '<ul>\r\n	<li>100% Katun</li>\r\n</ul>\r\n', 20, 10, 0, 1),
('7.2.5.3.0.1.2', '2016-07-01 01:41:25', 'YOLANDA DRESS', 328000, 0, NULL, NULL, 300, '<p>Dress klasik denim yang dapat digunakan untuk berbagai suasana dan musim. Dengan pilihan&nbsp; tanpa lengan , menampilkan kancing depan dan kantong depan dobel dengan flip dan kerah basic (reguler point collar).</p>\r\n', '<ul>\r\n	<li>100% Katun</li>\r\n</ul>\r\n', 20, 10, 0, 1),
('8.2.2.3.0.0.2', '2016-07-01 01:45:14', 'ESTEE TSHIRT WOMEN', 160000, 0, NULL, NULL, 300, '<p>Kaos dan celana jeans kami dibuat untuk saling melengkapi. Kaos Standar dengan logo Estee dan Oreli.co.id menjadi ikon yang wajib dikoleksi bagi member dan&nbsp; agen. Kaos kami menggunakan bahan katun berkualitas diproses dengan garment washing untuk meningkatkan kenyamanan saat dipakai.</p>\r\n', '<ul>\r\n	<li>100% Katun Combed 30s (warna white)</li>\r\n	<li>100% Katun Combed 20s (warna gray)</li>\r\n</ul>\r\n', 7, 3, 0, 1),
('9.2.4.1.3.1.2', '2016-07-01 01:49:33', 'AGNES JACKET', 430000, 0, NULL, NULL, 300, '<p>Jaket denim klasik dengan potongan slim dan panjang di pinggang. Merupakan paduan yang sempurna terhadap segala jenis pakaian. Padukan dengan Celana Jeans atau dress akan membuat anda semakin gaya.&nbsp;</p>\r\n', '<ul>\r\n	<li>98% Catton</li>\r\n	<li>2% Elastane</li>\r\n</ul>\r\n', 25, 13, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produkimage`
--

CREATE TABLE IF NOT EXISTS `tbl_produkimage` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(15) NOT NULL,
  `warna` varchar(100) NOT NULL,
  PRIMARY KEY (`id_image`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

--
-- Dumping data untuk tabel `tbl_produkimage`
--

INSERT INTO `tbl_produkimage` (`id_image`, `kode_produk`, `warna`) VALUES
(1, '0.2.1.1.1.2.2', 'Blue Dark'),
(2, '0.2.1.1.1.2.2', 'Blue Dark'),
(3, '0.2.1.1.1.2.2', 'Blue Dark'),
(4, '0.2.1.1.1.2.2', 'Blue Dark'),
(5, '0.2.1.1.1.2.2', 'Blue Dark'),
(6, '0.2.1.1.1.2.2', 'Blue Light'),
(7, '0.2.1.1.1.2.2', 'Blue Light'),
(8, '0.2.1.1.1.2.2', 'Blue Light'),
(9, '0.2.1.1.1.2.2', 'Blue Light'),
(10, '0.2.1.1.1.2.2', 'Blue Light'),
(11, '1.2.1.1.4.2.1', 'Black'),
(12, '1.2.1.1.4.2.1', 'Black'),
(13, '1.2.1.1.4.2.1', 'Black'),
(14, '1.2.1.1.4.2.1', 'Black'),
(15, '1.2.1.1.4.2.1', 'Black'),
(16, '2.2.1.1.1.2.1', 'Blue Light'),
(17, '2.2.1.1.1.2.1', 'Blue Light'),
(18, '2.2.1.1.1.2.1', 'Blue Light'),
(19, '2.2.1.1.1.2.1', 'Blue Light'),
(20, '2.2.1.1.1.2.1', 'Blue Light'),
(21, '2.2.1.1.1.2.1', 'Blue Light Scratch'),
(22, '2.2.1.1.1.2.1', 'Blue Light Scratch'),
(23, '2.2.1.1.1.2.1', 'Blue Light Scratch'),
(24, '2.2.1.1.1.2.1', 'Blue Light Scratch'),
(25, '2.2.1.1.1.2.1', 'Blue Light Scratch'),
(26, '2.2.1.1.1.2.1', 'Blue Dark Scratch'),
(27, '2.2.1.1.1.2.1', 'Blue Dark Scratch'),
(28, '2.2.1.1.1.2.1', 'Blue Dark Scratch'),
(29, '2.2.1.1.1.2.1', 'Blue Dark Scratch'),
(30, '2.2.1.1.1.2.1', 'Blue Dark Scratch'),
(31, '2.2.1.1.1.2.1', 'Blue Dark'),
(32, '2.2.1.1.1.2.1', 'Blue Dark'),
(33, '2.2.1.1.1.2.1', 'Blue Dark'),
(34, '2.2.1.1.1.2.1', 'Blue Dark'),
(35, '3.1.3.3.0.1.2', 'Blue Light'),
(36, '3.1.3.3.0.1.2', 'Blue Light'),
(37, '3.1.3.3.0.1.2', 'Blue Light'),
(38, '3.1.3.3.0.1.2', 'Blue Light'),
(39, '4.1.3.3.0.1.1', 'Blue Indigo'),
(40, '4.1.3.3.0.1.1', 'Blue Indigo'),
(41, '4.1.3.3.0.1.1', 'Blue Indigo'),
(42, '4.1.3.3.0.1.1', 'Blue Indigo'),
(43, '5.1.2.3.0.0.2', 'Grey'),
(44, '5.1.2.3.0.0.2', 'Grey'),
(45, '5.1.2.3.0.0.2', 'Grey'),
(46, '5.1.2.3.0.0.2', 'White'),
(47, '5.1.2.3.0.0.2', 'White'),
(48, '5.1.2.3.0.0.2', 'White'),
(49, '6.2.3.3.0.1.1', 'Blue Dark'),
(50, '6.2.3.3.0.1.1', 'Blue Dark'),
(51, '6.2.3.3.0.1.1', 'Blue Dark'),
(52, '6.2.3.3.0.1.1', 'Blue Dark'),
(53, '7.2.5.3.0.1.2', 'Blue Light'),
(54, '7.2.5.3.0.1.2', 'Blue Light'),
(55, '7.2.5.3.0.1.2', 'Blue Light'),
(56, '7.2.5.3.0.1.2', 'Blue Light'),
(57, '8.2.2.3.0.0.2', 'Grey'),
(58, '8.2.2.3.0.0.2', 'Grey'),
(59, '8.2.2.3.0.0.2', 'Grey'),
(60, '8.2.2.3.0.0.2', 'White'),
(61, '8.2.2.3.0.0.2', 'White'),
(62, '8.2.2.3.0.0.2', 'White'),
(63, '9.2.4.1.3.1.2', 'Blue Light'),
(64, '9.2.4.1.3.1.2', 'Blue Light'),
(65, '9.2.4.1.3.1.2', 'Blue Light'),
(66, '9.2.4.1.3.1.2', 'Blue Light'),
(82, '11.1.1.2.2.1.1', 'Brown Khaki'),
(83, '11.1.1.2.2.1.1', 'Brown Khaki'),
(84, '11.1.1.2.2.1.1', 'Brown Khaki'),
(85, '11.1.1.2.2.1.1', 'Brown Khaki'),
(86, '11.1.1.2.2.1.1', 'Brown Khaki'),
(87, '11.1.1.2.2.1.1', 'Grey Dark'),
(88, '11.1.1.2.2.1.1', 'Grey Dark'),
(89, '11.1.1.2.2.1.1', 'Grey Dark'),
(90, '11.1.1.2.2.1.1', 'Grey Dark'),
(91, '11.1.1.2.2.1.1', 'Grey Dark'),
(92, '11.1.1.2.2.1.1', 'Blue Navy'),
(93, '11.1.1.2.2.1.1', 'Blue Navy'),
(94, '11.1.1.2.2.1.1', 'Blue Navy'),
(95, '11.1.1.2.2.1.1', 'Blue Navy'),
(96, '11.1.1.2.2.1.1', 'Blue Navy'),
(97, '13.1.1.1.3.3.3', 'Blue Dark Scratch'),
(98, '13.1.1.1.3.3.3', 'Blue Dark Scratch'),
(99, '13.1.1.1.3.3.3', 'Blue Dark Scratch'),
(100, '13.1.1.1.3.3.3', 'Blue Dark Scratch'),
(101, '13.1.1.1.3.3.3', 'Blue Dark Scratch'),
(102, '12.1.1.1.3.3.2', 'Blue Light'),
(103, '12.1.1.1.3.3.2', 'Blue Light'),
(104, '12.1.1.1.3.3.2', 'Blue Light'),
(105, '12.1.1.1.3.3.2', 'Blue Light'),
(106, '12.1.1.1.3.3.2', 'Blue Light'),
(107, '14.1.1.1.3.2.1', 'Blue Dark Whisker'),
(108, '14.1.1.1.3.2.1', 'Blue Dark Whisker'),
(109, '14.1.1.1.3.2.1', 'Blue Dark Whisker'),
(110, '14.1.1.1.3.2.1', 'Blue Dark Whisker'),
(111, '14.1.1.1.3.2.1', 'Blue Dark Whisker'),
(112, '15.1.1.1.3.3.1', 'Blue Sky Ripped'),
(113, '15.1.1.1.3.3.1', 'Blue Sky Ripped'),
(114, '15.1.1.1.3.3.1', 'Blue Sky Ripped'),
(115, '15.1.1.1.3.3.1', 'Blue Sky Ripped'),
(116, '15.1.1.1.3.3.1', 'Blue Sky Ripped'),
(117, '3.1.3.3.0.1.2', 'Blue Dark'),
(118, '3.1.3.3.0.1.2', 'Blue Dark'),
(119, '3.1.3.3.0.1.2', 'Blue Dark');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produkreview`
--

CREATE TABLE IF NOT EXISTS `tbl_produkreview` (
  `id_review` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(30) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `quality` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `review` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'tahan',
  PRIMARY KEY (`id_review`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tbl_produkreview`
--

INSERT INTO `tbl_produkreview` (`id_review`, `nickname`, `id_produk`, `quality`, `price`, `value`, `waktu`, `review`, `status`) VALUES
(1, 'Anonymous', '2.2.1.1.1.2.1', 3, 2, 2, '2016-07-01 11:02:00', 'Review Produk', 'tahan'),
(2, 'bayuns', '9.2.4.1.3.1.2', 5, 5, 5, '2016-07-01 20:46:00', 'barangnya mantap', 'tahan'),
(3, 'Bay', '15.1.1.1.3.3.1', 2, 2, 2, '2016-07-02 23:42:00', 'Bahan berkualitas, finishing rapi tidak kalah sama', 'tahan'),
(4, 'Bay', '15.1.1.1.3.3.1', 2, 2, 2, '2016-07-02 23:44:00', 'Kualitas bahan dan finishing rapi dan lembut. Tida', 'tahan'),
(5, 'Bay', '15.1.1.1.3.3.1', 2, 2, 2, '2016-07-02 23:45:00', 'Kualitas bahan dan finishing rapi dan lembut. Tida', 'tahan'),
(6, 'Bay', '15.1.1.1.3.3.1', 5, 5, 5, '2016-07-02 23:51:00', 'Bahan berkualitas, finishing rapi dan lembut. Tida', 'tahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produkstok`
--

CREATE TABLE IF NOT EXISTS `tbl_produkstok` (
  `id_produkstok` int(11) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(20) DEFAULT NULL,
  `id_produkwarna` int(3) NOT NULL,
  `ukuran` varchar(10) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produkstok`),
  KEY `id_produkwarna` (`id_produkwarna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=141 ;

--
-- Dumping data untuk tabel `tbl_produkstok`
--

INSERT INTO `tbl_produkstok` (`id_produkstok`, `kode_produk`, `id_produkwarna`, `ukuran`, `stok`) VALUES
(1, '0.2.1.1.1.2.2', 1, 'S', 10),
(2, '0.2.1.1.1.2.2', 1, 'M', 20),
(3, '0.2.1.1.1.2.2', 1, 'L', 20),
(4, '0.2.1.1.1.2.2', 1, 'XL', 10),
(5, '0.2.1.1.1.2.2', 1, 'XXL', 0),
(6, '0.2.1.1.1.2.2', 2, 'S', 10),
(7, '0.2.1.1.1.2.2', 2, 'M', 20),
(8, '0.2.1.1.1.2.2', 2, 'L', 20),
(9, '0.2.1.1.1.2.2', 2, 'XL', 10),
(10, '1.2.1.1.4.2.1', 3, 'S', 10),
(11, '1.2.1.1.4.2.1', 3, 'M', 20),
(12, '1.2.1.1.4.2.1', 3, 'L', 20),
(13, '1.2.1.1.4.2.1', 3, 'XL', 10),
(14, '2.2.1.1.1.2.1', 4, '28', 20),
(15, '2.2.1.1.1.2.1', 4, '29', 26),
(16, '2.2.1.1.1.2.1', 4, '30', 35),
(17, '2.2.1.1.1.2.1', 4, '31', 36),
(18, '2.2.1.1.1.2.1', 4, '32', 9),
(19, '2.2.1.1.1.2.1', 4, '34', 12),
(20, '2.2.1.1.1.2.1', 5, '28', 2),
(21, '2.2.1.1.1.2.1', 5, '29', 2),
(22, '2.2.1.1.1.2.1', 5, '30', 3),
(23, '2.2.1.1.1.2.1', 5, '31', 3),
(24, '2.2.1.1.1.2.1', 5, '32', 1),
(25, '2.2.1.1.1.2.1', 5, '34', 1),
(26, '2.2.1.1.1.2.1', 6, '28', 2),
(27, '2.2.1.1.1.2.1', 6, '29', 2),
(28, '2.2.1.1.1.2.1', 6, '30', 3),
(29, '2.2.1.1.1.2.1', 6, '31', 3),
(30, '2.2.1.1.1.2.1', 6, '32', 1),
(31, '2.2.1.1.1.2.1', 6, '34', 1),
(32, '2.2.1.1.1.2.1', 7, '28', 18),
(33, '2.2.1.1.1.2.1', 7, '29', 20),
(34, '2.2.1.1.1.2.1', 7, '30', 36),
(35, '2.2.1.1.1.2.1', 7, '31', 29),
(36, '2.2.1.1.1.2.1', 7, '32', 12),
(37, '2.2.1.1.1.2.1', 7, '34', 10),
(38, '3.1.3.3.0.1.2', 8, 'M', 26),
(39, '3.1.3.3.0.1.2', 8, 'L', 49),
(40, '3.1.3.3.0.1.2', 8, 'XL', 48),
(41, '3.1.3.3.0.1.2', 8, 'XXL', 24),
(42, '4.1.3.3.0.1.1', 9, 'M', 30),
(43, '4.1.3.3.0.1.1', 9, 'L', 66),
(44, '4.1.3.3.0.1.1', 9, 'XL', 60),
(45, '4.1.3.3.0.1.1', 9, 'XXL', 24),
(46, '5.1.2.3.0.0.2', 10, 'S', 15),
(47, '5.1.2.3.0.0.2', 10, 'M', 28),
(48, '5.1.2.3.0.0.2', 10, 'L', 29),
(49, '5.1.2.3.0.0.2', 10, 'XL', 18),
(50, '5.1.2.3.0.0.2', 11, 'S', 0),
(51, '5.1.2.3.0.0.2', 11, 'M', 24),
(52, '5.1.2.3.0.0.2', 11, 'L', 24),
(53, '5.1.2.3.0.0.2', 11, 'XL', 10),
(54, '6.2.3.3.0.1.1', 12, 'S', 0),
(55, '6.2.3.3.0.1.1', 12, 'M', 0),
(56, '6.2.3.3.0.1.1', 12, 'L', 0),
(57, '6.2.3.3.0.1.1', 12, 'XL', 0),
(58, '7.2.5.3.0.1.2', 13, 'S', 23),
(59, '7.2.5.3.0.1.2', 13, 'M', 51),
(60, '7.2.5.3.0.1.2', 13, 'L', 45),
(61, '7.2.5.3.0.1.2', 13, 'XL', 26),
(62, '8.2.2.3.0.0.2', 14, 'S', 7),
(63, '8.2.2.3.0.0.2', 14, 'M', 14),
(64, '8.2.2.3.0.0.2', 14, 'L', 14),
(65, '8.2.2.3.0.0.2', 14, 'XL', 9),
(66, '8.2.2.3.0.0.2', 15, 'S', 0),
(67, '8.2.2.3.0.0.2', 15, 'M', 12),
(68, '8.2.2.3.0.0.2', 15, 'L', 12),
(69, '8.2.2.3.0.0.2', 15, 'XL', 5),
(70, '9.2.4.1.3.1.2', 16, 'S', 20),
(71, '9.2.4.1.3.1.2', 16, 'M', 40),
(72, '9.2.4.1.3.1.2', 16, 'L', 40),
(73, '9.2.4.1.3.1.2', 16, 'XL', 20),
(88, '11.1.1.2.2.1.1', 19, '28', 1),
(89, '11.1.1.2.2.1.1', 19, '29', 2),
(90, '11.1.1.2.2.1.1', 19, '30', 2),
(91, '11.1.1.2.2.1.1', 19, '31', 1),
(92, '11.1.1.2.2.1.1', 19, '32', 3),
(93, '11.1.1.2.2.1.1', 19, '34', 2),
(94, '11.1.1.2.2.1.1', 19, '36', 1),
(95, '11.1.1.2.2.1.1', 20, '28', 1),
(96, '11.1.1.2.2.1.1', 20, '29', 2),
(97, '11.1.1.2.2.1.1', 20, '30', 2),
(98, '11.1.1.2.2.1.1', 20, '31', 1),
(99, '11.1.1.2.2.1.1', 20, '32', 3),
(100, '11.1.1.2.2.1.1', 20, '34', 2),
(101, '11.1.1.2.2.1.1', 20, '36', 1),
(102, '11.1.1.2.2.1.1', 21, '28', 1),
(103, '11.1.1.2.2.1.1', 21, '29', 2),
(104, '11.1.1.2.2.1.1', 21, '30', 2),
(105, '11.1.1.2.2.1.1', 21, '31', 1),
(106, '11.1.1.2.2.1.1', 21, '32', 3),
(107, '11.1.1.2.2.1.1', 21, '34', 2),
(108, '11.1.1.2.2.1.1', 21, '36', 1),
(109, '12.1.1.1.3.3.2', 22, '28', 2),
(110, '12.1.1.1.3.3.2', 22, '29', 0),
(111, '12.1.1.1.3.3.2', 22, '30', 5),
(112, '12.1.1.1.3.3.2', 22, '31', 6),
(113, '12.1.1.1.3.3.2', 22, '32', 16),
(114, '12.1.1.1.3.3.2', 22, '34', 9),
(115, '12.1.1.1.3.3.2', 22, '36', 4),
(116, '13.1.1.1.3.3.3', 23, '28', 3),
(117, '13.1.1.1.3.3.3', 23, '29', 16),
(118, '13.1.1.1.3.3.3', 23, '30', 7),
(119, '13.1.1.1.3.3.3', 23, '31', 0),
(120, '13.1.1.1.3.3.3', 23, '32', 5),
(121, '13.1.1.1.3.3.3', 23, '34', 10),
(122, '13.1.1.1.3.3.3', 23, '36', 1),
(123, '14.1.1.1.3.2.1', 24, '28', 2),
(124, '14.1.1.1.3.2.1', 24, '29', 2),
(125, '14.1.1.1.3.2.1', 24, '30', 2),
(126, '14.1.1.1.3.2.1', 24, '31', 3),
(127, '14.1.1.1.3.2.1', 24, '32', 1),
(128, '14.1.1.1.3.2.1', 24, '34', 2),
(129, '14.1.1.1.3.2.1', 24, '36', 2),
(130, '15.1.1.1.3.3.1', 25, '28', 2),
(131, '15.1.1.1.3.3.1', 25, '29', 4),
(132, '15.1.1.1.3.3.1', 25, '30', 4),
(133, '15.1.1.1.3.3.1', 25, '31', 2),
(134, '15.1.1.1.3.3.1', 25, '32', 10),
(135, '15.1.1.1.3.3.1', 25, '34', 4),
(136, '15.1.1.1.3.3.1', 25, '36', 2),
(137, '3.1.3.3.0.1.2', 26, 'M', 27),
(138, '3.1.3.3.0.1.2', 26, 'L', 51),
(139, '3.1.3.3.0.1.2', 26, 'XL', 50),
(140, '3.1.3.3.0.1.2', 26, 'XXL', 26);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produkwarna`
--

CREATE TABLE IF NOT EXISTS `tbl_produkwarna` (
  `id_produkwarna` int(3) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(15) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `tambahanHarga` float NOT NULL DEFAULT '0',
  `tambahanPP` int(11) NOT NULL DEFAULT '0',
  `tambahanPS` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_produkwarna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data untuk tabel `tbl_produkwarna`
--

INSERT INTO `tbl_produkwarna` (`id_produkwarna`, `kode_produk`, `warna`, `tambahanHarga`, `tambahanPP`, `tambahanPS`) VALUES
(1, '0.2.1.1.1.2.2', 'Blue Dark', 0, 0, 0),
(2, '0.2.1.1.1.2.2', 'Blue Light', 0, 0, 0),
(3, '1.2.1.1.4.2.1', 'Black', 0, 0, 0),
(4, '2.2.1.1.1.2.1', 'Blue Light', 0, 0, 0),
(5, '2.2.1.1.1.2.1', 'Blue Light Scratch', 16000, 0, 0),
(6, '2.2.1.1.1.2.1', 'Blue Dark Scratch', 16000, 0, 0),
(7, '2.2.1.1.1.2.1', 'Blue Dark', 0, 0, 0),
(8, '3.1.3.3.0.1.2', 'Blue Light', 0, 0, 0),
(9, '4.1.3.3.0.1.1', 'Blue Indigo', 0, 0, 0),
(10, '5.1.2.3.0.0.2', 'Grey', 0, 0, 0),
(11, '5.1.2.3.0.0.2', 'White', 0, 0, 0),
(12, '6.2.3.3.0.1.1', 'Blue Dark', 0, 0, 0),
(13, '7.2.5.3.0.1.2', 'Blue Light', 0, 0, 0),
(14, '8.2.2.3.0.0.2', 'Grey', 0, 0, 0),
(15, '8.2.2.3.0.0.2', 'White', 0, 0, 0),
(16, '9.2.4.1.3.1.2', 'Blue Light', 0, 0, 0),
(19, '11.1.1.2.2.1.1', 'Brown Khaki', 0, 0, 0),
(20, '11.1.1.2.2.1.1', 'Grey Dark', 0, 0, 0),
(21, '11.1.1.2.2.1.1', 'Blue Navy', 0, 0, 0),
(22, '12.1.1.1.3.3.2', 'Blue Light', 0, 0, 0),
(23, '13.1.1.1.3.3.3', 'Blue Dark Scratch', 0, 0, 0),
(24, '14.1.1.1.3.2.1', 'Blue Dark Whisker', 0, 0, 0),
(25, '15.1.1.1.3.3.1', 'Blue Sky Ripped', 0, 0, 0),
(26, '3.1.3.3.0.1.2', 'Blue Dark', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produkwishlist`
--

CREATE TABLE IF NOT EXISTS `tbl_produkwishlist` (
  `id_wishlist` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` varchar(15) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_wishlist`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `tbl_produkwishlist`
--

INSERT INTO `tbl_produkwishlist` (`id_wishlist`, `id_customer`, `kode_produk`, `keterangan`) VALUES
(1, '36.72.176.100', '8.2.2.3.0.0.2', 'S,14'),
(2, '114.79.51.204', '2.2.1.1.1.2.1', '28,4'),
(3, 'Lae110', '14.1.1.1.3.2.1', '28,24'),
(4, '180.214.233.24', '15.1.1.1.3.3.1', '28,25'),
(5, '114.121.154.41', '5.1.2.3.0.0.2', 'S,10'),
(6, '103.28.107.222', '2.2.1.1.1.2.1', '28,6'),
(7, 'KAR210', '2.2.1.1.1.2.1', '28,5'),
(8, '114.121.135.44', '9.2.4.1.3.1.2', 'S,16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_refund`
--

CREATE TABLE IF NOT EXISTS `tbl_refund` (
  `id_refund` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` varchar(11) NOT NULL,
  `no_transaksi` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `jumlah_refund` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_refund`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_return`
--

CREATE TABLE IF NOT EXISTS `tbl_return` (
  `id_return` int(11) NOT NULL AUTO_INCREMENT,
  `no_transaksi` int(11) NOT NULL,
  `kode_produk` varchar(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id_return`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_verifikasi`
--

CREATE TABLE IF NOT EXISTS `tbl_verifikasi` (
  `id_verifikasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) DEFAULT NULL,
  `tipe_verifikasi` varchar(10) DEFAULT NULL,
  `kode_verifikasi` varchar(10) DEFAULT NULL,
  `dibuat` datetime DEFAULT NULL,
  `berakhir` datetime DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_verifikasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

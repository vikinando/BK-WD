-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2024 at 08:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_rs`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','dokter','pasien') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `email`, `password`, `role`) VALUES
(7, 'kampoengbola6@gmail.com', '$2y$10$FM.1ovaRdUQihqECbmPBkeExBhZaWuJmz44Y19nhaKP.4MNo.7yHm', 'pasien'),
(8, 'admin@email.com', '$2y$10$FM.1ovaRdUQihqECbmPBkeExBhZaWuJmz44Y19nhaKP.4MNo.7yHm', 'admin'),
(9, 'safiardemak@kalijaga.com', '$2y$10$.f0SAjUUGuKSvxn2yeiiHOKA5kNDzmcztk8kTzXPe2k7c8MKJZKZu', 'pasien'),
(15, 'hafizhdhiya@gmail.com', '$2y$10$bXreufIY1TJWYLE9J/r.PO2O0PtTvS4g72CNByp8CjIzgIJg0HmmO', 'pasien'),
(16, 'qwerty@yahoo.com', '123456', 'admin'),
(39, 'qweqwewqe@12dqw', '$2y$10$Xzox9v43ZtT0apOGbVcj/evdY6r.WGgfUwyaah3G41dgb0MoRid1m', 'pasien'),
(40, 'dokter@gmail.com', '$2y$10$lnVvNKQ43dtofc1wY3gnXenl2cZFDjVUFI.zwb85ABnkZYZVIOARS', 'dokter'),
(41, '12131@gmail.com', '$2y$10$fPCnjlXzBXU64mERVwq22OHu75xrw.K/Ldtsbv5yb2kxczNzC2aLa', 'dokter'),
(42, 'Dr.deo@gmail.com', '$2y$10$oZO4FepCuE.k2HDxLDbYceM0TcfqK1ed453We2Vg/ojiGBTmZ4mUq', 'dokter'),
(43, 'Dr.safiar@gmail.com', '$2y$10$nkdCODfgntq2WnBfjOVbYehWdG.tw9AncwfBOiqQYkrLzJRpouuxi', 'dokter'),
(44, 'Dr.Yudhistira@gmai.com', '$2y$10$cd1Qqb7GObplEuI.J9HsQOXW2VElINOEhysl7h86Iz5bhoXef9WzG', 'dokter'),
(45, 'Dr.Ardi@gmail.com', '$2y$10$nc.6V8iCATTiP/MCNmgSVui3bcJHIVcLvevdF4T4oVx/0ztnuhDZ6', 'dokter'),
(46, 'Dr.Sandy@gmail.com', '$2y$10$T16dvJmEng/j4y/UWUJHTOEGAPLMPG9n0KWjcdJzhx5TKZ1UU/hvu', 'dokter'),
(47, 'nanda@gmail.com', '$2y$10$dG1jyeSHeDj26vNXZvxtAOxmuH.SaotdmCCyyR/tEYIC4yODiURJK', 'pasien'),
(48, 'Dr.dian@gmail.com', '$2y$10$5l7mtpvsCNWEaBksGhc1x.AzIuLUTFiMhEWRLUaPWwWxtHUbld01a', 'dokter'),
(49, 'rheza@gmail.com', '$2y$10$tXs4vxrGpGPDBLNrana08.syyOmuO1l//lMtUjMHkYVg6kJw6iLB6', 'pasien'),
(50, 'susan@gmail.com', '$2y$10$duiIikFzEsKkftX8kf9atOAFeAmM9NisLJ29C.HNOOjlhyAB8.1nK', 'pasien'),
(51, 'bagus@gmail.com', '$2y$10$LuZInpqSh0Abd8JBie2TWuj6DLJOmYh3v/YLlaEBEicmSOsuZjk6m', 'pasien');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_poli`
--

CREATE TABLE `daftar_poli` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_pasien` int(11) UNSIGNED NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `id_jadwal` int(11) UNSIGNED NOT NULL,
  `keluhan` text NOT NULL,
  `no_antrian` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_poli`
--

INSERT INTO `daftar_poli` (`id`, `id_pasien`, `nama_poli`, `id_jadwal`, `keluhan`, `no_antrian`) VALUES
(40, 26, '', 1, 'Sakit Perut', 3),
(41, 26, '', 1, 'Sakit Perut', 4),
(42, 26, '', 1, 'Sakit Perut', 5),
(44, 26, '', 1, 'Sakit Perut', 6),
(45, 25, '', 2, 'Gusi Bengkak', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_periksa`
--

CREATE TABLE `detail_periksa` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_periksa` int(11) UNSIGNED NOT NULL,
  `id_obat` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_periksa`
--

INSERT INTO `detail_periksa` (`id`, `id_periksa`, `id_obat`) VALUES
(31, 44, 12),
(32, 44, 14),
(33, 44, 15),
(34, 44, 19),
(35, 44, 21);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_akun` int(11) UNSIGNED NOT NULL,
  `id_poli` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `id_akun`, `id_poli`, `nama`, `alamat`, `no_hp`) VALUES
(2, 41, 4, 'Dr. Nantalira', 'Jl. Limpung', '081391638041'),
(3, 42, 5, 'Dr.deo Andrianto', 'Jl. Pemalang', '12312321'),
(4, 43, 6, 'Dr.Safiar Amanullah', 'Jl. Demak', '12213123'),
(5, 44, 7, 'Dr. Yudhistira Reyhan', 'Jl. Gaharu', '12322321'),
(6, 45, 4, 'Dr. Ardi Caesar', 'Jl. Sorong', '139551331'),
(7, 46, 5, 'Dr. Sandy Nugraha', 'Jl.Sumurboto', '1123911331'),
(8, 48, 6, 'Dr. Rahardian', 'Jl.WIrosari', '2147483647');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_periksa`
--

CREATE TABLE `jadwal_periksa` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_dokter` int(11) UNSIGNED NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_periksa`
--

INSERT INTO `jadwal_periksa` (`id`, `id_dokter`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(1, 2, 'Senin', '10:00:00', '12:00:00'),
(2, 3, 'Sabtu', '08:00:00', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `kemasan` varchar(35) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `kemasan`, `harga`) VALUES
(12, 'ACT (Artesunate tablet 50 mg + Amodiaquine anhydri', '2 blister @ 12 tablet / kotak', 44000),
(13, 'ACT (Artesunate tablet 50 mg + Amodiaquine anhydri', '3 blister @ 8 tablet / kotak', 44000),
(14, 'Albendasol suspensi 200 mg/5 ml', 'Ktk 10 btl @ 10 ml', 6000),
(15, 'Albendazol tablet/ tablet kunyah 400 mg', 'ktk 5 x 6 tablet', 16000),
(16, 'Alopurinol tablet 100 mg', 'ktk 10 x 10 tablet', 16000),
(17, 'Alopurinol tablet 300 mg', 'ktk 10 x 10 tablet', 33000),
(18, 'Alprazolam tablet 0,25 mg', 'ktk 10 x 10 tablet', 64000),
(19, 'Alprazolam tablet 0,5 mg', 'ktk 10 x 10 tablet', 77000),
(20, 'Alprazolam tablet 1 mg', 'ktk 10 x 10 tablet', 118000),
(21, 'Ambroxol sirup 15 mg/ml', 'btl 60 ml', 5000),
(22, 'Ambroxol sirup 30 mg', 'ktk 10 x 10 tablet', 21000),
(23, 'Amilorida tablet 5 mg', 'ktk 10 x 10 tablet', 12000),
(24, 'Aminofilin injeksi 24 mg/ml', 'ktk 30 ampul @ 10 ml', 118000),
(25, 'Aminofilin tablet 150', 'botol 1000 tablet', 57000),
(26, 'Aminofilin tablet 200', 'botol 100 tablet', 15000),
(27, 'Amitriptilin tablet salut 25 mg (HCI)', 'ktk 10 x 10 tablet salut', 16000),
(28, 'Amlodipin tablet 5 mg', 'ktk 3 x 10 tablet', 9000),
(29, 'Amlodipin tablet 5 mg', 'ktk 5 x 10 tablet', 63000),
(30, 'Amlodipin tablet 10 mg', 'ktk 3 x 10 tablet', 8750),
(31, 'Amlodipin tablet 10 mg', 'ktk 5 x 10 tablet', 111000),
(32, 'Amoksisilin +As.Klavulanat 625 mg tablet', 'ktk 5 x 6 tablet', 209000),
(33, 'Amoksisilin kapsul 250 mg', 'ktk 10 x 10 kapsul', 38000),
(34, 'Amoksisilin kapsul 250 mg', 'ktk 12 x 10 kapsul', 52000),
(35, 'Amoksisilin Kaplet 500 mg', 'ktk 10 x 10 kapsul', 45000),
(36, 'Amoksisilin serbuk injeksi 1000 mg', 'ktk 10 vial', 99000),
(37, 'Amoksisilin sirup kering 125 mg/ 5 ml', 'btl 60 ml', 5000),
(38, 'Ampisilin kaplet 250 mg', 'ktk 10 x 10 kaplet', 36000),
(39, 'Ampisilin kaplet 500 mg', 'ktk 10 x 10 kaplet', 62400),
(40, 'Ampisilin serbuk injeksi i.m/l.v 1000 mg/vial', 'ktk 10 vial', 105600),
(41, 'Ampisilin serbuk injeksi i.m/l.v 500 mg/vial', 'ktk 10 vial', 40000),
(42, 'Ampisilin sirup kering 125 mg/5 ml', 'btl 60 ml', 6000),
(43, 'Antasida DOEN I tablet kunyah, kombinasi : Alumini', 'ktk 10 x 10 tablet kunyah', 14000),
(44, 'Antasida DOEN II suspensi,kombinasi: Aluminium Hid', 'btl 60 ml', 4800),
(45, 'Anti Bakteri DOEN salep kombinasi Basitrasin 500 I', 'ktk 25 tube @ 5 g', 83000),
(46, 'Antifungi DOEN Kombinasi Asam Benzoat 6% + Asam Sa', 'ktk 24 pot @ 30 g', 55000),
(47, 'Antihemoroid DOEN Kombinasi : Bismut subgalat', 'ktk 10 supp', 27000),
(48, 'Antimalaria DOEN kombinasi : Pirimetamin25 mg Sulf', 'ktk 10 x 10 tablet', 64000),
(49, 'Antimigren : Ergotamin Tartrat 1 mg + Kofein 50 mg', 'btl 1000 tablet', 26000),
(50, 'Antiparkinson DOEN tablet kombinasi : Karbidopa 25', 'ktk 10 x 10 tablet', 167000),
(51, 'Aqua pro injeksi steril, bebas pirogen', 'ktk 10 vial @ 20 ml', 73000),
(52, 'Arthemeter Injeksi 80 mg/ml', 'ktk 6 ampul', 175000),
(53, 'Artesunate Injeksi vial 60 gr', 'ktk 8 vial', 263000),
(54, 'Asam Asetilsalisilat tablet 100 mg (asetosal)', 'ktk 10 x 10 tablet', 13000),
(55, 'Asam Asetilasalisillat tablet 500 mg (asetosal)', 'ktk 10 x 10 tablet', 21000),
(56, 'Asam Askorbat (Vitamin C) tablet 250 mg', 'btl 250 tablet', 42000),
(57, 'Asam Askorbat (Vitamin C) tablet 50 mg', 'btl 1000 tablet', 6500),
(58, 'Asam Askorbat (Vitamin C) tablet 100 mg', 'btl 1000 tablet', 29000),
(59, 'Asam Folat tablet 1 mg', 'btl 100 tablet', 6500),
(60, 'Asam Folat tablet 5 mg', 'btl 1000 tablet', 62000),
(61, 'Asam Mefenamat kapsul 250 mg', 'ktk 10 x 10 kapsul', 17000),
(62, 'Asam Mefenamat kaplet 500 mg', 'ktk 10 x 10 kaplet', 26800),
(63, 'Asetazolamid tablet 250 mg', 'btl 100 tablet', 24000),
(64, 'Asiklovir krim 5%', 'tube 5 gram', 3500),
(65, 'Asiklovir krim 5%', 'ktk 25 tube @ 5 gram', 99000),
(66, 'Asiklovir tablet 200 mg', 'ktk 3 x 10 tablet', 20000),
(67, 'Asiklovir tablet 200 mg', 'ktk 5 x 10 tablet', 36000),
(68, 'Asiklovir tablet 200 mg', 'ktk 10 x 10 tablet', 51000),
(69, 'Asiklovir tablet 400 mg', 'ktk 3 x 10 tablet', 29000),
(70, 'Asiklovir tablet 400 mg', 'ktk 5 x 10 tablet', 42000),
(71, 'Asiklovir tablet 400 mg', 'ktk 10 x 10 tablet', 68600),
(72, 'Atenolol tablet 50 mg', 'ktk 10 x 10 tablet', 36000),
(73, 'Atenolol tablet 100 mg', 'ktk 5 x 10 tablet', 34000),
(74, 'Atropin injeksi i.m./i.v./s.k./ 0,25 mg/ml (Sulfat', 'ktk 30 amp @ 1 ml', 50000),
(75, 'Atropin Sulfat tablet 0,5 mg.', 'btl 100 tablet', 8000),
(76, 'Atropin Sulfat tablet 0,5 mg.', 'btl 500 tablet', 47000),
(77, 'Atropin Sulfat tetes mata 0,5 %', 'ktk 24 btl @ 5 ml @ 5 ml@', 89000),
(78, 'Atropin tetes mata 0,5 % (Sulfat)', 'btl 5 ml', 4000),
(79, 'Azatioprin tablet 50 mg', 'ktk 10 x 10 tablet', 28000),
(80, 'Benzatin Benzil Penisilin 1,2 Juta IU/ vial', 'ktk 10 vial @ 20 ml', 108000),
(81, 'Benzatin Benzil Penisilin 2,4 Juta IU/ vial', 'ktk 10 vial @ 20 ml', 150000),
(82, 'Besi (ll) Sulfat 7 H2O tablet salut 300 mg', 'btl 1000 tablet salut', 35000),
(83, 'Besi II Sulfat 200 mg + asam folat 0,25 mg tablet ', '1 bungkus @ 30 tablet', 3000),
(84, 'Betahistin Mesilat tablet 6 mg', 'ktk 3 x 10 tablet', 34000),
(85, 'Betametason krim 0,1 % (sebagai valerat)', 'tube 5 gram', 2400),
(86, 'Betametason krim 0,1 % (sebagai valerat)', 'ktk 25 tube @ 5 g', 62000),
(87, 'Betametason tablet 0,5 mg', 'ktk 10 x 10 tablet', 10000),
(88, 'Bisoprolol tablet 5 mg', 'ktk 3 x 10 tablet', 44000),
(89, 'Bromheksin tablet 8 mg', 'ktk 10 x 10 tablet', 6000),
(90, 'Cetirizine sirup 5 mg/5 ml', 'btl 60 ml', 12600),
(91, 'Cetirizine tablet 10 mg', 'ktk 3 x 10 tablet', 12000),
(92, 'Cetirizine tablet 10 mg', 'ktk 5 x 10 tablet', 19000),
(93, 'Cisapride tablet 10 mg', 'ktk 10 x 10 tablet', 178000),
(94, 'Cisapride tablet 5 mg', 'ktk 10 x 10 tablet', 103000),
(95, 'Clobazam tablet 10 mg', 'ktk 10 x 10 tablet', 125000),
(96, 'Clobetasol krim 0,05 %', 'tube 10 gram', 16000),
(97, 'Dapson tablet 100 mg', 'btl 1000 tablet', 42000),
(98, 'Deksametason injeksi I.v.5 mg/ml', 'ktk 100 amp @ 1 ml', 263000),
(99, 'Deksametason tablet 0,5 mg', 'ktk 10 x 10 tablet', 29000),
(100, 'Dekstran 70 - larutan infus 6 % steril', 'btl 500 ml', 47000),
(101, 'Dekstrometorfan sirup 10 mg/5 ml (HBr)', 'btl 60 ml', 4000),
(102, 'Dekstrometorfan tablet 15 mg (HBr)', 'ktk 10 x 10 tablet', 15000),
(103, 'Diazepam Injeksi 5 mg/ml', 'ktk 30 amp @ 2 ml', 94000),
(104, 'Diazepam tablet 2 mg', 'btl 100 tablet', 5000),
(105, 'Diazepam tablet 2 mg', 'ktk 10 x 10 tablet', 6000),
(106, 'Diazepam tablet 5 mg', 'btl 250 tablet', 16000),
(107, 'Diazepam tablet 5 mg', 'btl 100 tablet', 7000),
(108, 'Diazepam tablet 5 mg', 'ktk 10 x 10 tablet', 9000),
(109, 'Dietilkarbamezin sitrat tablet 100 mg', 'ktk 10 x 10 tablet', 13000),
(110, 'Difenhidramin injeksi i.m 10 mg/ml/(HCI)', 'ktk 30 amp @ 1 ml', 36000),
(111, 'Digoksin tablet 0,25 mg', 'ktk 10 x 10 tablet', 19000),
(112, 'Digoksin tablet 0,0625 mg', 'btl 100 tablet', 10000),
(113, 'Dikloksasilin kapsul 125 mg', 'ktk 100 kapsul', 30000),
(114, 'Dikloksasilin kapsul 250 mg', 'ktk 25 x 4 kapsul', 42000),
(115, 'Dikloksasilin kapsul 500 mg', 'ktk 25 x 4 kapsul', 56000),
(116, 'Diltiazem HCI tablet 30 mg', 'ktk 10 x 10 tablet', 20000),
(117, 'Dimenhidrinat tablet 50 mg', 'btl 100 tablet', 18000),
(118, 'Disopiramid kapsul 100 mg', 'btl 100 kapsul', 31000),
(119, 'Doksisiklin kapsul 100 mg', 'ktk 10 x 10 kapsul', 36000),
(120, 'Domperidon Suspensi 5 mg/5 ml', 'btl 60 ml', 15200),
(121, 'Domperidon tablet 10 mg', 'ktk 10 x 10 tablet', 34200),
(122, 'Efedrin tablet 25 mg (HCI)', 'botol 250 tablet', 17000),
(123, 'Ekstraks Belladona tablet 10 mg', 'botol 1000 tablet', 78000),
(124, 'Epinefrin (adrenalin) injeksi 0,1 % (sebagai HCL)', 'ktk 30 amp @ 1 ml', 49000),
(125, 'Eritromisin kapsul 250 mg', 'ktk 10 x 10 kapsul', 67000),
(126, 'Entromisin kapsul 250 mg', 'ktk 12 x 10 kapsul', 72000),
(127, 'Entromisin kaplet 500 mg', 'ktk 10 x 10 kaplet', 111500),
(128, 'Entromisin sirup 200 mg/5 mg', 'btl 60 ml', 11000),
(129, 'Etakridin larutan 0,1 %', 'btl 300 ml', 3000),
(130, 'Etambutol tablet 250 mg (HCI)', 'ktk 10 x 10 tablet', 53000),
(131, 'Etambutol tablet 250 mg (HCI)', 'ktk 20 x 10 tablet', 92000),
(132, 'Etambutol tablet salut 500 mg (HCI)', 'ktk 10 x 10 tablet salut', 76000),
(133, 'Etoposid kapsul 100 mg', 'btl 10 kapsul', 92000),
(134, 'Famotidine tabet 40 mg', 'ktk 5 x 10 tablet', 12000),
(135, 'Famotidine tabet 20 mg', 'ktk 5 x 10 tablet', 8000),
(136, 'Fenilbutason tablet 200 mg', 'btl 1000 tablet', 107000),
(137, 'Fenitoin kapsul 100 mg', 'btl 250 kapsul', 27000),
(138, 'Fenitoin Natrium Injeksi Injeksi 50 mg/ml', 'ampul @ 2 ml', 64000),
(139, 'Fenitoin Natrium kapsul 30 mg', 'btl 250 kapsul', 24000),
(140, 'Fenobarbital injeksi i.m/i.v 50 mg/ml', 'ktk 30 amp @ 1 ml', 62000),
(141, 'Fenobarbital tablet 30 mg', 'btl 100 tablet', 30300),
(142, 'Fenobarbital tabet 30 mg', 'btl 250 tablet', 19000),
(143, 'Fenobarbital tablet 100 mg', 'btl 250 tablet', 48000),
(144, 'Fenoksimetil Penisilin tablet 250 mg', 'ktk 10 x 10 tablet', 35000),
(145, 'Fenoksimetil Penisilin tablet 500 mg', 'ktk 10 x 10 tablet', 61000),
(146, 'Fenol Gliserol tetes telinga 10 %', 'ktk 24 btl @ 5 ml', 124900),
(147, 'Fitomenadion (Vit.K1) tablet salut gula 10 mg', 'btl 100 tablet', 90000),
(148, 'Menadion (Vit.K3) tablet salut gula 10 mg', 'btl 500 tablet', 43000),
(149, 'Menadion (Vit K3) injeksi 10 mg/ml', 'ktk 100 ampul @ 1 ml', 190000),
(150, 'Fitomenadion (Vit K) injeksi 10 mg/ml', 'ktk 30 amp @ 1 ml', 66000),
(151, 'Flukonazol tablet 150 mg', 'ktk 10 tablet', 289000),
(152, 'Fluoride tablet 0,5 mg', 'btl 100 tablet', 5000),
(153, 'Fluoride tablet 1 mg', 'btl 100 tablet', 6000),
(154, 'Furosemid injeksi l.v /l.m 10 mg/ml', 'ktk 25 amp @ 2 ml', 68000),
(155, 'Furosemid tablet 40 mg', 'ktk 20 x 10 tablet', 27000),
(156, 'Furosemid tablet 40 mg', 'ktk 10 x 10 tablet', 23000);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_akun` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `no_rm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `id_akun`, `nama`, `alamat`, `no_ktp`, `no_hp`, `no_rm`) VALUES
(25, 47, 'nanda', 'Sebantengan', '12413', '13213124', '202312-004'),
(26, 49, 'rheza', 'Jl. Meranti raya', '123421', '081231221', '202312-005'),
(27, 50, 'susan', 'semarang', '213141237118', '081234324', '202312-003'),
(28, 51, 'bagus', 'Jl. Layur Selatan 9 No,122 sebantengan', '123871623345267', '081564338984', '202312-004');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_daftar_poli` int(11) UNSIGNED NOT NULL,
  `tgl_periksa` datetime NOT NULL,
  `catatan` text NOT NULL,
  `biaya_periksa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id`, `id_daftar_poli`, `tgl_periksa`, `catatan`, `biaya_periksa`) VALUES
(44, 45, '2024-01-03 00:00:00', 'Jangan merokok', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_poli` varchar(25) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id`, `nama_poli`, `keterangan`) VALUES
(4, 'Poliklinik Umum', 'Dokter Umum'),
(5, 'Poliklinik Gigi', 'Dokter Gigi'),
(6, 'Poliklinik Anak', 'Dokter Spesialis Anak'),
(7, 'Poliklinik Psikolog', 'Psikolog dan Psikeater');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_poli` (`nama_poli`);

--
-- Indexes for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_periksa` (`id_periksa`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_akun` (`id_akun`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_akun_2` (`id_akun`);

--
-- Indexes for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dokter` (`id_dokter`) USING BTREE;

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_akun` (`id_akun`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_daftar_poli` (`id_daftar_poli`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD CONSTRAINT `daftar_poli_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `daftar_poli_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_periksa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD CONSTRAINT `detail_periksa_ibfk_1` FOREIGN KEY (`id_periksa`) REFERENCES `periksa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_periksa_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dokter_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD CONSTRAINT `jadwal_periksa_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `periksa_ibfk_1` FOREIGN KEY (`id_daftar_poli`) REFERENCES `daftar_poli` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

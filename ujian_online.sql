-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2019 at 03:12 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujian_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `ansid` varchar(250) CHARACTER SET utf8 NOT NULL,
  `qid` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`ansid`, `qid`) VALUES
('5c40cc7b63aa8', '5c40cc7b36ef0'),
('5c40cc7bda07c', '5c40cc7bd47bf'),
('5c40cc7c21931', '5c40cc7c1694b'),
('5c40cc7c7d851', '5c40cc7c7299a'),
('5c40cc7cd6be2', '5c40cc7ccbdd4');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_staff` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_staff`, `username`, `nama_guru`, `password`) VALUES
(9, 'Althaf', 'Althaf Ahmad Riefyan', '$2y$10$y1DF3/nqlQGlBp/Qc82o1.Ou6uqaz1zTfmxrRM2chOs6V0Kcvh/pq'),
(10, 'farhan', 'm. farhan riefyan', '$2y$10$DDrPY2J2E3jmTLDosJ4yt.5vJDY8owqRnVelljbG5d7lPs.jAq.aa'),
(13, 'riefyan bahar', 'riefyan bahar', '$2y$10$pGfYwX4umrKx1r.shdc0S.sY.gDyA42rNgf2HOIQEn.3BYu90OkzW'),
(14, 'ade', 'ade firdiana', '$2y$10$N.p9be9MbTZOPwquD704tOJHWUPRITxLnBqODMrD70TbsDp13C47.');

-- --------------------------------------------------------

--
-- Table structure for table `kuis`
--

CREATE TABLE `kuis` (
  `eid` varchar(250) CHARACTER SET utf8 NOT NULL,
  `id_staff` int(11) NOT NULL,
  `kelas` varchar(100) CHARACTER SET utf8 NOT NULL,
  `matpel` varchar(100) CHARACTER SET utf8 NOT NULL,
  `judul` varchar(100) CHARACTER SET utf8 NOT NULL,
  `total` int(11) NOT NULL,
  `desc` text CHARACTER SET utf8,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuis`
--

INSERT INTO `kuis` (`eid`, `id_staff`, `kelas`, `matpel`, `judul`, `total`, `desc`, `date`) VALUES
('5c40cbe897e32', 9, '10 IPA-2', 'PKN', 'Kewarganegaraan', 5, 'Kewarganegaraan', '2019-01-17 18:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `NIS` int(11) NOT NULL,
  `eid` varchar(250) CHARACTER SET utf8 NOT NULL,
  `score` int(11) NOT NULL,
  `right` int(11) NOT NULL,
  `wrong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `NIS`, `eid`, `score`, `right`, `wrong`) VALUES
(1, 54415998, '5c28f751013b4', 2, 2, 1),
(2, 54415997, '5c28f751013b4', 1, 1, 1),
(3, 54415997, '5c40cbe897e32', 4, 4, 1),
(4, 54415999, '5c40cbe897e32', 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pilihan`
--

CREATE TABLE `pilihan` (
  `optionid` varchar(250) CHARACTER SET utf8 NOT NULL,
  `qid` varchar(250) CHARACTER SET utf8 NOT NULL,
  `option` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pilihan`
--

INSERT INTO `pilihan` (`optionid`, `qid`, `option`) VALUES
('5c28f7841ee91', '5c28f78414c8a', 'soal 1 a salah'),
('5c28f7841eeae', '5c28f78414c8a', 'soal 1 jawban yang benar'),
('5c28f7841eebd', '5c28f78414c8a', 'soal 1 c salah'),
('5c28f7841eeca', '5c28f78414c8a', 'soal 1 d sakah'),
('5c28f7847de7f', '5c28f78473089', 'soal 2 a salah'),
('5c28f7847de8e', '5c28f78473089', 'soal 2 b salah'),
('5c28f7847de91', '5c28f78473089', 'soal 2 c salah'),
('5c28f7847de92', '5c28f78473089', 'soal 2 jawaban yang benar'),
('5c40cc7b63a9e', '5c40cc7b36ef0', 'Aristoteles'),
('5c40cc7b63aa8', '5c40cc7b36ef0', 'Logeman'),
('5c40cc7b63aae', '5c40cc7b36ef0', 'J.J. Rousseau'),
('5c40cc7b63ab4', '5c40cc7b36ef0', ' Plato'),
('5c40cc7bda064', '5c40cc7bd47bf', 'kepentingan umum'),
('5c40cc7bda072', '5c40cc7bd47bf', 'kesamaan bahasa'),
('5c40cc7bda07c', '5c40cc7bd47bf', 'kehendak untuk bersatu'),
('5c40cc7bda088', '5c40cc7bd47bf', 'komunitas politik'),
('5c40cc7c21926', '5c40cc7c1694b', 'batas wilayah yang jelas'),
('5c40cc7c2192e', '5c40cc7c1694b', 'pemerintah yang berdaulat'),
('5c40cc7c21931', '5c40cc7c1694b', 'adanya solidaritas'),
('5c40cc7c21934', '5c40cc7c1694b', 'mempunyai keharmonisan'),
('5c40cc7c7d851', '5c40cc7c7299a', 'kesusilaan'),
('5c40cc7c7d859', '5c40cc7c7299a', 'politik'),
('5c40cc7c7d85d', '5c40cc7c7299a', 'kekuasaan'),
('5c40cc7c7d861', '5c40cc7c7299a', 'kemasyarakatan'),
('5c40cc7cd6be2', '5c40cc7ccbdd4', 'res nulius dan res communis'),
('5c40cc7cd6be8', '5c40cc7ccbdd4', 'nusailara dan anchipelago'),
('5c40cc7cd6beb', '5c40cc7ccbdd4', 'maritim dan kontinental'),
('5c40cc7cd6bee', '5c40cc7ccbdd4', 'zona ekonomi eksklusif');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qid` varchar(250) CHARACTER SET utf8 NOT NULL,
  `eid` varchar(250) CHARACTER SET utf8 NOT NULL,
  `qns` text CHARACTER SET utf8 NOT NULL,
  `choise` int(11) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `eid`, `qns`, `choise`, `sn`) VALUES
('5c40cc7b36ef0', '5c40cbe897e32', 'Pengertian negera sebagai organisasi kekuasaan dipelopori olehâ€¦.', 4, 1),
('5c40cc7bd47bf', '5c40cbe897e32', 'Menurut Ernest Renan, bangsa terjadi karena adanyaâ€¦.', 4, 2),
('5c40cc7c1694b', '5c40cbe897e32', 'Meskipun tidak saling kenal, para anggota bangsa selalu memandang satu sama lain sebagai saudara. Hal ini menunjukkan bahwa bangsa itu memiliki ciriâ€¦.', 4, 3),
('5c40cc7c7299a', '5c40cbe897e32', 'Pengertian negara sebagai organisasi kesusilaan yang timbul sebagai sintesa antara kemerdekaan universal dengan kemerdekaan invidual. Hal ini disebut negara sebagai organisasiâ€¦.', 4, 4),
('5c40cc7ccbdd4', '5c40cbe897e32', 'Dua konsep kelautan pada zaman dahulu yang menimbulkan masalah internasional tentang batas wilayah laut suatu negara adalahâ€¦.', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `NIS` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NIS`, `nama_siswa`, `password`) VALUES
(54415992, 'muhammad farhan riefyan', '$2y$10$UJ7HV/.pA1Olf/SD1pV0H.bSkIXAskGbtPQ2idtmyO4VP2FwTP.gu'),
(54415995, 'ade firdiana', '$2y$10$.WEhNX1hG/dT5uXEY/gepuueX61lNpDD0Ppy.u2XdUBbeL4VF8ipq'),
(54415996, 'riefyan bahar', '$2y$10$T7nJvAGUL7o/OCecJogmMu1SbCddYx/M6HN.CtKE6HVKbRPG1j18i'),
(54415997, 'naufal ahmad riefyan', '$2y$10$uCo5xZLck2UNBTEEH/lRRetvbS4MMelekrRGxdDcDeNta4ZGlg6Uq'),
(54415998, 'farah nisrina riefyan', '$2y$10$wMY.wuygNutpbLpbCvWVJupy/RPaQmwUITIFA3fY6Gns5V0SbmJJG'),
(54415999, 'althaf ahmad riefyan', '$2y$10$wpC8w8r8OpRDGPd69FKZCusIxI2fOo7lNDRSEt6xIIJG9ka7rsWpy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`ansid`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD PRIMARY KEY (`optionid`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NIS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jan 2025 pada 10.43
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kalibrasi_0071`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE `alat` (
  `IdAlat` varchar(5) NOT NULL,
  `NamaAlat` varchar(150) DEFAULT NULL,
  `MerkType` varchar(150) DEFAULT NULL,
  `LokasiFoto` varchar(255) DEFAULT NULL,
  `Fungsi` varchar(255) DEFAULT NULL,
  `Pemakai` varchar(40) DEFAULT NULL,
  `Lokasi` varchar(100) DEFAULT NULL,
  `Status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alat`
--

INSERT INTO `alat` (`IdAlat`, `NamaAlat`, `MerkType`, `LokasiFoto`, `Fungsi`, `Pemakai`, `Lokasi`, `Status`) VALUES
('L001', 'KOKO', 'KOKO', 'KOKO', 'KOKO', 'KOKOK', 'KOKO', 'K');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `IdLokasi` varchar(5) NOT NULL,
  `NamaLokasi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`IdLokasi`, `NamaLokasi`) VALUES
(' nlok', 'bh'),
(';pol', 'bvb'),
('aser', 'aer'),
('b b', '  n'),
('bh', 'vv'),
('bnb', ' n'),
('dcfef', 'efr'),
('jhj', 'hgh'),
('L002', 'Batan'),
('L0043', 'kokpo'),
('L005', 'ardi'),
('L008', 'zzz'),
('L0089', 'kokpo'),
('L010', 'ssdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemakai`
--

CREATE TABLE `pemakai` (
  `IdPemakai` varchar(5) NOT NULL,
  `NamaPemakai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemakai`
--

INSERT INTO `pemakai` (`IdPemakai`, `NamaPemakai`) VALUES
('P001', 'Amar'),
('P002', 'Nopal'),
('P003', 'Ardhi'),
('P004', 'Tantra'),
('P005', 'Nastain'),
('P006', 'Krissjon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `IdPetugas` varchar(5) NOT NULL,
  `NamaPetugas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`IdPetugas`, `NamaPetugas`) VALUES
('PT001', 'agus'),
('PT002', 'Jojo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksikalibrasi`
--

CREATE TABLE `transaksikalibrasi` (
  `IdKalibrasi` varchar(10) NOT NULL,
  `TransType` char(1) DEFAULT NULL,
  `TransDate` timestamp NULL DEFAULT current_timestamp(),
  `Petugas` varchar(5) DEFAULT NULL,
  `Alat` varchar(5) DEFAULT NULL,
  `NoSPMB` varchar(25) DEFAULT NULL,
  `TglSPMB` datetime DEFAULT NULL,
  `NoSPK` varchar(25) DEFAULT NULL,
  `TglSPK` datetime DEFAULT NULL,
  `Vendor` varchar(5) DEFAULT NULL,
  `TglKalibrasi` datetime DEFAULT NULL,
  `TglExpire` datetime DEFAULT NULL,
  `NoDokumen` varchar(100) DEFAULT NULL,
  `Status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksikalibrasi`
--

INSERT INTO `transaksikalibrasi` (`IdKalibrasi`, `TransType`, `TransDate`, `Petugas`, `Alat`, `NoSPMB`, `TglSPMB`, `NoSPK`, `TglSPK`, `Vendor`, `TglKalibrasi`, `TglExpire`, `NoDokumen`, `Status`) VALUES
('0071', 'K', '2025-01-09 17:00:00', 'PT001', 'L001', '7787', '2025-01-10 00:00:00', '99999999', '2025-01-10 00:00:00', 'koko', '2025-01-10 00:00:00', '2025-01-10 00:00:00', '667', 'h'),
('0072', 'K', '2025-01-13 07:23:02', 'PT001', 'L001', '909', '2025-01-13 00:00:00', '909', '2025-01-13 00:00:00', 'bnb', '2025-01-13 00:00:00', '2025-01-13 00:00:00', '90', 'u'),
('0073', 'K', '2025-01-13 07:26:03', 'PT001', 'L001', '2132', '2025-01-13 00:00:00', '213', '2025-01-13 00:00:00', 'bnb', '2025-01-13 00:00:00', '2025-01-13 00:00:00', '2e23', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nik` char(10) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nik`, `password`) VALUES
('0071', '$2y$10$3S1mijdSft2tnXngX2aHLu6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `IdVendor` varchar(5) NOT NULL,
  `NamaVendor` varchar(150) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Kota` varchar(50) DEFAULT NULL,
  `Telpon` varchar(15) DEFAULT NULL,
  `Fax` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `ContactPerson` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`IdVendor`, `NamaVendor`, `Alamat`, `Kota`, `Telpon`, `Fax`, `Email`, `ContactPerson`) VALUES
('bnb', 'vbv', 'vb', 'vb', 'vb', 'b', 'afa@gmail.com', 'vv'),
('gfg', 'jnbhbh', 'd', 'fd', 'fd', 'f', 'afa@gmail.com', 'bvb'),
('koko', 'ko', 'ko', 'k', '909090909', 'ok', 'koko@gmail.com', 'opk'),
('kokop', 'ko', 'ko', 'k', '90909090', 'ok', 'koko@gmail.com', 'opk'),
('mkmkm', 'km', 'km', 'km', '09909090', '8898', 'afa@gmail.com', 'mkm'),
('nb', 'nbn', 'b', 'nb', 'nb', ' b', 'ada@gmail.com', 'nbb'),
('opp', 'oppo', 'opp', 'ppp', '909090', '09', 'kok@gmail.com', 'kkok');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`IdAlat`),
  ADD KEY `Pemakai` (`Pemakai`),
  ADD KEY `Lokasi` (`Lokasi`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`IdLokasi`);

--
-- Indeks untuk tabel `pemakai`
--
ALTER TABLE `pemakai`
  ADD PRIMARY KEY (`IdPemakai`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`IdPetugas`);

--
-- Indeks untuk tabel `transaksikalibrasi`
--
ALTER TABLE `transaksikalibrasi`
  ADD PRIMARY KEY (`IdKalibrasi`),
  ADD KEY `Petugas` (`Petugas`),
  ADD KEY `Alat` (`Alat`),
  ADD KEY `Vendor` (`Vendor`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`IdVendor`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksikalibrasi`
--
ALTER TABLE `transaksikalibrasi`
  ADD CONSTRAINT `transaksikalibrasi_ibfk_1` FOREIGN KEY (`Petugas`) REFERENCES `petugas` (`IdPetugas`),
  ADD CONSTRAINT `transaksikalibrasi_ibfk_2` FOREIGN KEY (`Alat`) REFERENCES `alat` (`IdAlat`),
  ADD CONSTRAINT `transaksikalibrasi_ibfk_3` FOREIGN KEY (`Vendor`) REFERENCES `vendor` (`IdVendor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Mar 2025 pada 01.52
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simbisa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukupedoman`
--

CREATE TABLE `bukupedoman` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `filenya` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bukupedoman`
--

INSERT INTO `bukupedoman` (`id`, `nama`, `filenya`) VALUES
(1, 'tes', 'aws.pdf'),
(2, 'aku', 'KK.pdf'),
(10, 'baae222', 'aws.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_admin`
--

CREATE TABLE `data_admin` (
  `userid` varchar(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_admin`
--

INSERT INTO `data_admin` (`userid`, `nama`, `email`, `jenis_kelamin`, `alamat`, `id`) VALUES
('E41202233', 'Fasta Biqul Hoirot', 'fastabee101@gmail.com', 'Perempuan', 'Ajung', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_dosen`
--

CREATE TABLE `data_dosen` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_dosen`
--

INSERT INTO `data_dosen` (`id`, `userid`, `nama`, `alamat`, `jenis_kelamin`, `email`) VALUES
(4, 'E4444444', 'Satria Hari', 'Gilimanuk', 'Laki-Laki', 'ahmaderik6969@gmail.com'),
(5, 'S320023', 'Samba', 'Ajung', 'Laki-Laki', 'zizicomel02@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `userid` varchar(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `pembimbing_1` varchar(255) DEFAULT NULL,
  `pembimbing_2` varchar(255) DEFAULT NULL,
  `judul_skripsi` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `u1` varchar(255) DEFAULT NULL,
  `u2` varchar(255) DEFAULT NULL,
  `i1` varchar(255) DEFAULT NULL,
  `i2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`userid`, `email`, `nama`, `jenis_kelamin`, `pembimbing_1`, `pembimbing_2`, `judul_skripsi`, `alamat`, `jurusan`, `u1`, `u2`, `i1`, `i2`) VALUES
('10029000', 'hariyanto@gmail.com', 'Hariyanto', 'Laki-Laki', NULL, NULL, NULL, 'Badung', 'TI', NULL, NULL, NULL, NULL),
('E412898989', 'zizicomel02@gmail.com', 'Fasta Biqul Hoirot', 'Perempuan', 'Satria', 'Samba', 'ayo', 'Ajung Jember', 'Tesitng', 'E4444444', 'S320023', 'disetujui', 'disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(255) NOT NULL,
  `batas_skripsi` date DEFAULT NULL,
  `batas_bimbingan` date DEFAULT NULL,
  `batas_proposal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `batas_skripsi`, `batas_bimbingan`, `batas_proposal`) VALUES
(1, '2025-03-09', '2025-03-08', '2025-03-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `link`
--

CREATE TABLE `link` (
  `id` int(255) NOT NULL,
  `ig` varchar(255) DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `link`
--

INSERT INTO `link` (`id`, `ig`, `fb`, `web`) VALUES
(1, 'https://www.google.com/', 'https://www.google.com/', 'https://www.google.com/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_judul`
--

CREATE TABLE `pengajuan_judul` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengajuan_judul`
--

INSERT INTO `pengajuan_judul` (`id`, `userid`, `nama`, `tanggal`, `judul`, `status`) VALUES
(1, 'E412898989', 'Fasta', '2025-03-18', 'ayo', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `userid` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `catatan` varchar(1000) DEFAULT NULL,
  `udosen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`userid`, `id`, `nama`, `tanggal`, `catatan`, `udosen`) VALUES
('E412898989', 1, 'Fasta', '2025-03-18', 'oke', 'E4444444'),
('E412898989', 2, 'Fasta', '2025-03-04', 'tambahkan metodologi penelitian', 'E4444444'),
('E412898989', 3, 'Fasta', '2025-03-05', 'tambahkan metodologi penelitian', 'E4444444'),
('E412898989', 4, 'Fasta', '2025-03-12', 'ayo', 'E4444444'),
('E412898989', 5, 'Fasta', '2025-03-13', 'ddd', 'E4444444'),
('E412898989', 6, 'Fasta', '2025-03-22', '', 'E4444444'),
('E412898989', 7, 'Fasta', '2025-03-23', 'ss', 'E4444444'),
('E412898989', 8, 'Fasta', '2025-03-15', 'aok', 'E4444444'),
('E412898989', 9, 'Fasta', '2025-03-26', 'dd', 'E4444444'),
('E412898989', 10, 'Fasta', '2025-03-29', 'dd', 'E4444444'),
('E412898989', 11, 'Fasta', '2025-04-04', 'ddd', 'E4444444'),
('E412898989', 12, 'Fasta', '2025-04-08', 'dd', 'E4444444'),
('E412898989', 13, 'Fasta', '2025-04-03', '', 'E4444444'),
('E412898989', 14, 'Fasta', '2025-03-19', 'dd', 'S320023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposal`
--

CREATE TABLE `proposal` (
  `id` int(255) NOT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `ringkasan` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `proposal`
--

INSERT INTO `proposal` (`id`, `userid`, `nama`, `judul`, `ringkasan`, `file`, `status`) VALUES
(1, 'E412898989', 'Fasta', 'ayo', 'Mantap', 'tomichi_merged.pdf', 'disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsi`
--

CREATE TABLE `skripsi` (
  `id` int(255) NOT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `ringkasan` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `skripsi`
--

INSERT INTO `skripsi` (`id`, `userid`, `nama`, `judul`, `ringkasan`, `file`, `status`) VALUES
(2, 'E412898989', 'Fasta', 'ayo', 'trss', 'aws.pdf', 'disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userid` varchar(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `userid`, `password`, `role`) VALUES
(1, 'E41202233', 'fastabee101', 'admin'),
(11, 'E412898989', 'Ayamkampus', 'mahasiswa'),
(12, 'E4444444', 'ajkaj4d1', 'dosen'),
(13, 'S320023', 'Oke gas', 'dosen'),
(15, '10029000', 'hari', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bukupedoman`
--
ALTER TABLE `bukupedoman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `data_dosen`
--
ALTER TABLE `data_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`userid`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan_judul`
--
ALTER TABLE `pengajuan_judul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bukupedoman`
--
ALTER TABLE `bukupedoman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_dosen`
--
ALTER TABLE `data_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `link`
--
ALTER TABLE `link`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_judul`
--
ALTER TABLE `pengajuan_judul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

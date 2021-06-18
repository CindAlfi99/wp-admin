-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2021 pada 05.26
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahlaundry381`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `jenis_item` varchar(75) NOT NULL,
  `jenis_layanan` varchar(50) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `jenis_item`, `jenis_layanan`, `satuan`, `harga`) VALUES
(1, 'Atasan(Pria/Wanita)', 'Satuan', 'pcs', '21000'),
(2, 'Baju_Muslim', 'Satuan', 'pcs', '15000'),
(3, 'Bantal_Kecil', 'Satuan', 'pcs', '12000'),
(4, 'Bantal_Besar', 'Satuan', 'pcs', '20000'),
(5, 'Baju_1set_(BahanKaos)', 'Satuan', 'pcs', '25000'),
(6, 'Baju_Safari(Atasan)', 'Satuan', 'pcs', '25000'),
(7, 'Baju_Safari(1set)', 'Satuan', 'pcs', '35000'),
(8, 'Boneka_Size_20cm', 'Satuan', 'pcs', '12000'),
(9, 'Boneka_Size_25cm-40cm', 'Satuan', 'pcs', '18000'),
(10, 'Boneka(Uk_45cm-60cm)', 'Satuan', 'pcs', '30000'),
(11, 'Celana_Pendek', 'Satuan', 'pcs', '15000'),
(12, 'Celana_Panjang(No_jeans)', 'Satuan', 'pcs', '20000'),
(13, 'Celana_Panjang(Jeans|Denim)', 'Satuan', 'pcs', '23000'),
(14, 'Daster', 'Satuan', 'pcs', '20000'),
(15, 'Dress', 'Satuan', 'pcs', '35000'),
(16, 'Gaun_Pendek', 'Satuan', 'pcs', '25000'),
(17, 'Gaun_Panjang\r\n', 'Satuan', 'pcs', '35000'),
(18, 'Gaun_Pengantin', 'Satuan', 'pcs', '100000'),
(19, 'Jaket_Tipis', 'Satuan', 'pcs', '23000'),
(20, 'Jaket_Tebal', 'Satuan', 'pcs', '28000'),
(21, 'Jaket_Kulit', 'Satuan', 'pcs', '45000'),
(22, 'Jas_Atasan(Pria/Wanita)', 'Satuan', 'pcs', '21000'),
(23, 'Jas_Setelan(Pria/Wanita)', 'Satuan', 'pcs', '45000'),
(24, 'Kebaya_Setelan', 'Satuan', 'pcs', '50000'),
(25, 'Kemeja(Lengan_Pendek)', 'Satuan', 'pcs', '15000'),
(26, 'Kemeja(Lengan_Panjang)', 'Satuan', 'pcs', '20000'),
(27, 'Kemeja_Batik ', 'Satuan', 'pcs', '22000'),
(28, 'Koper_kecil(size_18Liter-20Liter)', 'Satuan', 'pcs', '35000'),
(29, 'Koper_Sedang(size_22Liter-27Liter)', 'Satuan', 'pcs', '50000'),
(30, 'Koper_Besar(size>30Liter)', 'Satuan', 'pcs', '65000'),
(31, 'Mantel(Uk_Sedang)', 'Satuan', 'pcs', '25000'),
(32, 'Mantel(Uk_Tebal)', 'Satuan', 'pcs', '35000'),
(33, 'Mukenah(1set)', 'Satuan', 'pcs', '25000'),
(34, 'Pakaian_Renang(All_size)', 'Satuan', 'pcs', '25000'),
(35, 'Pakaian_Dalam_Wanita(Lingerie)', 'Satuan', 'pcs', '25000'),
(36, 'Piyama(1set)', 'Satuan', 'pcs', '25000'),
(37, 'Rok_Biasa', 'Satuan', 'pcs', '15000'),
(38, 'Rok_Plisket', 'Satuan', 'pcs', '20000'),
(39, 'Rompi_Kulit', 'Satuan', 'pcs', '35000'),
(40, 'Sajadah', 'Satuan', 'pcs', '15000'),
(41, 'Sweater/hoodie', 'Satuan', 'pcs', '25000'),
(42, 'Tas_Wanita(Non_Kulit)', 'Satuan', 'pcs', '25000'),
(43, 'Tas_Ransel(Uk_Kecil)', 'Satuan', 'pcs', '35000'),
(44, 'Tas_Ransel(Uk_Besar)', 'Satuan', 'pcs', '50000'),
(45, 'Tas_Kulit', 'Satuan', 'pcs', '50000'),
(46, 'Tas_Carrier(size_30Liter-45Liter)', 'Satuan', 'pcs', '50000'),
(47, 'Tas_Carrier(size_50Liter-65Liter)', 'Satuan', 'pcs', '60000'),
(48, 'Tas_Carrier_(size>65 Liter)', 'Satuan', 'pcs', '70000'),
(49, 'Bed_Cover(Uk_S)', 'Satuan', 'pcs', '25000'),
(50, 'Bed_Cover(Uk_M)', 'Satuan', 'pcs', '35000'),
(51, 'Bed_Cover_(Uk_L)', 'Satuan', 'pcs', '40000'),
(52, 'Karpet_Bulu_(M2)', 'Karpet', 'pcs', '25000'),
(53, 'Karpet_Tebal(M2)', 'Karpet', 'pcs', '17000'),
(54, 'Karpet_Tebal_Super(Uk>1cm)', 'Karpet', 'pcs', '30000'),
(55, 'Karpet_Tipis', 'Karpet', 'pcs', '20000'),
(56, 'Etimasi_selesai:48Jam', 'Kiloan', 'kg', '6000'),
(57, 'Etimasi_selesai:24Jam', 'Kiloan', 'kg', '10000'),
(58, 'Etimasi_selesai:12Jam', 'Kiloan', 'kg', '17000'),
(59, 'Etimasi_selesai:6Jam', 'Kiloan', 'kg', '17000'),
(60, 'Cuci_Kering', 'Kiloan', 'kg', '5000'),
(61, 'Setrika', 'Kiloan', 'kg', '5000'),
(62, 'Laundry_Express(5Jam)', 'Kiloan', 'kg', '20000'),
(63, 'Fast_Clean', 'Sepatu', 'pcs', '25000'),
(64, 'Deep_Clean', 'Sepatu', 'pcs', '35000'),
(65, 'Alas_Kasur_Springbed', 'Satuan', 'pcs', '21000'),
(67, 'Cuci_Kering', 'Kiloan', 'kg', '5000'),
(68, 'Setrika', 'Kiloan', 'pcs', '5000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_masuk`
--

CREATE TABLE `order_masuk` (
  `id_order` int(11) NOT NULL,
  `no_resi` varchar(15) NOT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `no_wa` varchar(15) NOT NULL,
  `alamat_jemput` varchar(60) NOT NULL,
  `jenis_layanan` varchar(20) NOT NULL,
  `jenis_item` varchar(25) NOT NULL,
  `jumlah` int(9) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `ongkir` int(10) NOT NULL,
  `total_bayar` int(15) NOT NULL,
  `status_cucian` varchar(10) NOT NULL,
  `status_pembayaran` varchar(15) NOT NULL,
  `mode` varchar(10) NOT NULL,
  `tanggal_pesan` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_selesai` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_masuk`
--

INSERT INTO `order_masuk` (`id_order`, `no_resi`, `nama_pemesan`, `no_wa`, `alamat_jemput`, `jenis_layanan`, `jenis_item`, `jumlah`, `satuan`, `harga`, `ongkir`, `total_bayar`, `status_cucian`, `status_pembayaran`, `mode`, `tanggal_pesan`, `tanggal_selesai`) VALUES
(56, '9203', 'cindi alfiani', '08567273892', 'jl. panjaitan no,14', 'Satuan', 'Jaket_Tebal', 1, 'kg', 6000, 10000, 6000, 'jemput', 'belum_lunas', 'online', '2021-06-02 02:52:33', '2021-06-04 02:52:33'),
(57, '9203', 'cindi ani', '08567273892', 'jl. panjaitan no,14', 'Sepatu', 'Deep_Clean', 1, 'kg', 6000, 10000, 6000, 'jemput', 'belum_lunas', 'online', '2021-06-02 02:52:33', '2021-06-04 02:52:33'),
(58, '7662', 'alamsyahh', '0865638383', 'jl. imam bonjol samping masjid nurul iman , KM.03', 'Karpet', 'Karpet_Tipis', 2, 'pcs', 28000, 10000, 28000, 'jemput', 'belum_lunas', 'online', '2021-06-02 02:53:40', '2021-06-04 02:53:40'),
(64, '6171', 'cindi', '96969', 'jl.hfhhf', 'Satuan', 'Daster', 1, 'pcs', 20000, 10000, 20000, 'jemput', 'belum_lunas', 'online', '2021-06-09 11:32:48', '2021-06-11 11:32:48'),
(65, '6171', 'cindi', '96969', 'jl.hfhhf', 'Karpet', 'Karpet_Bulu_(M2)', 2, 'pcs', 20000, 10000, 20000, 'jemput', 'belum_lunas', 'online', '2021-06-09 11:32:48', '2021-06-11 11:32:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `password`, `role`) VALUES
(1, 'admin@laundry.com', 'password', 'admin'),
(2, 'owner@laundry.com', 'owner', 'owner');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `order_masuk`
--
ALTER TABLE `order_masuk`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `order_masuk`
--
ALTER TABLE `order_masuk`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

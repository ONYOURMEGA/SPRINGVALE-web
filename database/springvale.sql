-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Apr 2025 pada 15.31
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
-- Database: `springvale`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '482c811da5d5b4bc6d497ffa98491e38', '2025-04-10 05:33:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artificial_products`
--

CREATE TABLE `artificial_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `stock` int(5) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artificial_products`
--

INSERT INTO `artificial_products` (`id`, `name`, `price`, `description`, `stock`, `image`, `created_at`) VALUES
(1, 'Unicorn Edition', 274000.00, 'Bunga dengan desain unik untuk memperindah ruangan Anda.', 0, 'assets/1.jpeg', '2025-04-09 13:26:33'),
(2, 'Flower Cup', 80000.00, 'Bunga dalam cangkir yang cantik dan elegan.', 0, 'assets/15.jpeg', '2025-04-09 13:26:33'),
(3, 'Unicorn Edition 2', 200000.00, 'Bunga dengan desain kreatif bertema unicorn.', 0, 'assets/22.jpeg', '2025-04-09 13:26:33'),
(4, 'Medium Becca', 65000.00, 'Buket bunga medium yang elegan.', 0, 'assets/14.jpeg', '2025-04-09 13:32:35'),
(5, 'Medium Mermaid', 105000.00, 'Buket bunga dengan tema putri duyung.', 0, 'assets/36.jpeg', '2025-04-09 13:32:35'),
(6, 'Big Mariposa', 175000.00, 'Buket bunga besar dengan sentuhan elegan.', 0, 'assets/34.jpeg', '2025-04-09 13:32:35'),
(7, 'Big Siren', 135000.00, 'Buket bunga besar dengan tema siren laut.', 0, 'assets/41.jpeg', '2025-04-09 13:32:35'),
(8, 'Barbie', 275000.00, 'Buket bunga dengan tema Barbie.', 0, 'assets/38.jpeg', '2025-04-09 13:32:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fresh_products`
--

CREATE TABLE `fresh_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fresh_products`
--

INSERT INTO `fresh_products` (`id`, `name`, `price`, `description`, `image`, `created_at`) VALUES
(1, 'Fairytale', 120000.00, 'Buket bunga dengan tema cerita dongeng.', 'assets/24.jpeg', '2025-04-09 13:33:24'),
(2, 'Aiyra', 150000.00, 'Buket bunga dengan desain elegan.', 'assets/25.jpeg', '2025-04-09 13:33:24'),
(3, 'Zora', 110000.00, 'Buket bunga segar dengan kesan natural.', 'assets/27.jpeg', '2025-04-09 13:33:24'),
(4, 'Elena', 90000.00, 'Buket bunga dengan kesan feminin dan soft.', 'assets/29.jpeg', '2025-04-09 13:33:24'),
(5, 'Sunset', 95000.00, 'Buket bunga segar dengan nuansa senja.', 'assets/31.jpeg', '2025-04-09 13:33:24'),
(6, 'Aretha', 75000.00, 'Buket bunga elegan dengan kombinasi warna yang menawan.', 'assets/30.jpeg', '2025-04-09 13:33:24'),
(7, 'Poppy', 65000.00, 'Buket bunga dengan tema ceria dan berwarna cerah.', 'assets/32.jpeg', '2025-04-09 13:33:24'),
(8, 'Athena', 85000.00, 'Buket bunga segar yang mewah dengan desain premium.', 'assets/IMG_6707.jpeg', '2025-04-09 13:33:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_phone` varchar(15) NOT NULL,
  `recipient_name` varchar(255) NOT NULL,
  `recipient_address` text NOT NULL,
  `message` text DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `delivery_fee` decimal(10,2) NOT NULL,
  `payment_proof` varchar(255) NOT NULL,
  `status` set('Sedang di Proses','Selesai','','') NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `sender_name`, `sender_phone`, `recipient_name`, `recipient_address`, `message`, `product_name`, `product_price`, `quantity`, `total_price`, `delivery_fee`, `payment_proof`, `status`, `order_date`) VALUES
(23, 'sdsd', '082361168209', 'Riza', 'Phone Cell', 'sdsd', 'Unicorn Edition', 0.00, 3, 0.00, 5000.00, 'uploads/WhatsApp Image 2025-04-03 at 06.08.40_3abfd8a1.jpg', 'Selesai', '2025-04-10 08:03:54'),
(213, 'sdsd', '082361168209', 'Riza', 'Phone Cell', 'sdsdsddd', 'Big Mariposa', 0.00, 2, 0.00, 5000.00, 'uploads/adolf-hitler-giving-nazi-salute-600w-242815222.webp', 'Selesai', '2025-04-10 08:05:37'),
(521, 'sdsd', '082361168209', 'Riza', 'Phone Cell', 'sds', 'Flower Cup', 0.00, 1, 0.00, 5000.00, 'uploads/WhatsApp Image 2025-04-03 at 06.08.40_3abfd8a1.jpg', 'Sedang di Proses', '2025-04-10 08:32:38'),
(620, 'sdsd', '082361168209', 'Riza', 'Phone Cell', 'sdsd', 'Unicorn Edition', 0.00, 3, 0.00, 5000.00, 'uploads/WhatsApp Image 2025-04-03 at 06.08.40_3abfd8a1.jpg', 'Sedang di Proses', '2025-04-10 08:04:37'),
(717, 'sdsd', '082361168209', 'Riza', 'Phone Cell', 'sdsd', 'Unicorn Edition 2', 0.00, 1, 0.00, 5000.00, 'uploads/WhatsApp Image 2025-04-03 at 06.08.40_3abfd8a1.jpg', '', '2025-04-10 13:17:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `recipient_name` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `delivery_fee` decimal(10,2) NOT NULL,
  `payment_proof` varchar(255) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `sender_name`, `recipient_name`, `total_price`, `product_name`, `quantity`, `delivery_fee`, `payment_proof`, `payment_date`) VALUES
(1, '', '', '', 0.00, '', 0, 0.00, 'uploads/WhatsApp Image 2025-04-03 at 06.08.40_3abfd8a1.jpg', '2025-04-10 07:35:50'),
(2, '', '', '', 0.00, '', 0, 0.00, 'uploads/WhatsApp Image 2025-04-03 at 06.08.40_3abfd8a1.jpg', '2025-04-10 07:36:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `updates`
--

CREATE TABLE `updates` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `updates`
--

INSERT INTO `updates` (`id`, `title`, `content`, `image`, `created_at`) VALUES
(1, 'Bouquet Elegant Terbaru!', 'Bunga selalu menjadi simbol kecantikan, cinta, dan penghargaan, dan buket Zora ini adalah wujud sempurna dari perasaan tersebut.', 'assets/27 - Copy.jpeg', '2025-04-09 13:33:46'),
(2, 'Cuaca Secerah Bunga Matahari', 'Buket Sunset adalah kombinasi sempurna antara keindahan yang cerah dan makna yang mendalam.', 'assets/31 - Copy.jpeg', '2025-04-09 13:33:46'),
(3, 'Flowers Wedding Dream', 'Buket Bunga Impian Untuk Menikah adalah pilihan yang sempurna untuk melambangkan keindahan dan harapan pada hari pernikahan.', 'assets/30.jpeg', '2025-04-09 13:33:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'user1', '', 'password123', '2025-04-09 11:36:05'),
(2, 'admin', '', 'admin', '2025-04-09 11:44:11'),
(3, 'riza', '', '21232f297a57a5a743894a0e4a801fc3', '2025-04-09 11:47:53'),
(4, 'tarigan', 'rizapahlevi180@gmail.com', '$2y$10$na.DG8dbao0MRShUqxF6e.88Y/53AyB7v7Z8MJMEL67pULZ0aeqCa', '2025-04-10 13:26:49'),
(5, 'raim', 'raimlaode@gmail.com', 'raim', '2025-04-10 13:29:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `artificial_products`
--
ALTER TABLE `artificial_products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fresh_products`
--
ALTER TABLE `fresh_products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `artificial_products`
--
ALTER TABLE `artificial_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `fresh_products`
--
ALTER TABLE `fresh_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=718;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

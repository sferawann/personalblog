-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Mar 2021 pada 08.52
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personalblog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id_about` int(11) NOT NULL,
  `id_settings` int(11) NOT NULL,
  `image_about` varchar(50) NOT NULL,
  `description_about` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_visitors` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `name_visitors` varchar(50) NOT NULL,
  `email_visitors` varchar(50) NOT NULL,
  `message_comment` text NOT NULL,
  `image_comment` varchar(40) NOT NULL,
  `status_comment` int(11) NOT NULL,
  `dateandtime_comment` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `course`
--

CREATE TABLE `course` (
  `id_course` int(11) NOT NULL,
  `id_visitors` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_tags` int(11) NOT NULL,
  `tittle_course` varchar(250) NOT NULL,
  `description_course` text NOT NULL,
  `content_course` longtext NOT NULL,
  `image_course` varchar(40) NOT NULL,
  `postdate_course` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastupdate_course` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `course`
--

INSERT INTO `course` (`id_course`, `id_visitors`, `id_category`, `id_tags`, `tittle_course`, `description_course`, `content_course`, `image_course`, `postdate_course`, `lastupdate_course`) VALUES
(1, 1, 1, 1, 'Belajar Python', 'wadaddadaw', 'qweqweasdasd', '', '2021-03-12 07:01:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `home`
--

CREATE TABLE `home` (
  `id_home` int(11) NOT NULL,
  `id_settings` int(11) NOT NULL,
  `caption_1_home` varchar(200) NOT NULL,
  `caption_2_home` varchar(200) NOT NULL,
  `heading_hoome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE `inbox` (
  `id_inbox` int(11) NOT NULL,
  `id_visitors` int(11) NOT NULL,
  `name_visitors` varchar(50) NOT NULL,
  `email_visitors` varchar(50) NOT NULL,
  `subject_inbox` varchar(200) NOT NULL,
  `message_inbox` text NOT NULL,
  `dateandtime_inbox` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_inbox` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `research`
--

CREATE TABLE `research` (
  `id_research` int(11) NOT NULL,
  `tittle_research` varchar(250) NOT NULL,
  `link_research` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `research`
--

INSERT INTO `research` (`id_research`, `tittle_research`, `link_research`) VALUES
(1, 'Study of Social Networking usage in Higher Education Environment', 'https://www.sciencedirect.com/science/article/pii/S1877042812053025'),
(2, 'Komparasi Framework MVC (Codeigniter, Dan Cakephp) Pada Aplikasi Berbasis Web', 'https://scholar.google.com/scholar?cluster=1222166045411965942&hl=en&oi=scholarr'),
(3, 'Fractal Method For Non-Metamorphic Animation Using Iterated Function System Algorithm', 'http://www.jatit.org/volumes/Vol97No1/28Vol97No1.pdf'),
(4, 'Implementasi Aplikasi Website E-Commerce Batik Sunda dengan Menggunakan Protokol Secure Socket Layer (SSL)', 'https://scholar.google.com/scholar?cluster=13523554428379437573&hl=en&oi=scholarr'),
(5, 'Pemodelan Proses Bisnis B2B dengan BPMN (Studi Kasus Pengadaan Barang pada Divisi Logistik)', 'https://scholar.google.com/scholar?cluster=17984461796749106684&hl=en&oi=scholarr'),
(6, 'Implementasi Mode Operasi Cipher Block Chaining (CBC) pada Pengamanan Data', 'https://scholar.google.com/scholar?cluster=5303637430409026214&hl=en&oi=scholarr'),
(7, 'Pembangunan Aplikasi Travel Recommender Dengan Metode Case Base Reasoning', 'https://scholar.google.com/scholar?cluster=17224918656378494899&hl=en&oi=scholarr'),
(8, 'Aplikasi Pembelajaran Alat Musik Gitar Menggunakan Model Skenario Multimedia Interaktif Timeline Tree', 'http://lib.itenas.ac.id/kti/wp-content/uploads/2013/10/Jurnal-No1Vol4-1.pdf'),
(9, 'Pembangunan Website Content Monitoring System Menggunakan DIFFLIB PYTHON', 'https://scholar.google.com/scholar?cluster=12187977127436684713&hl=en&oi=scholarr'),
(10, 'Penerapan Framework Zachman Pada Arsitektur Pengelolaan Data Operasional (studi kasus sbu aircraft services, PT. Dirgantara indonesia)', 'https://scholar.google.com/scholar?cluster=9692835690698204560&hl=en&oi=scholarr'),
(11, 'Implementasi Algoritma Binary Tree pada Sistem Informasi Multilevel Marketing', 'https://scholar.google.com/scholar?cluster=9913936556565847282&hl=en&oi=scholarr'),
(12, 'Implementasi Webcrawler Pada Social Media Monitoring WEBCRAWLER PADA SOCIAL MEDIA MONITORING ', 'https://d1wqtxts1xzle7.cloudfront.net/56545902/jurnal_media_2014.pdf?1526122146=&response-content-disposition=inline%3B+filename%3DIMPLEMENTASI_WEBCRAWLER_PADA_SOCIAL_MEDI.pdf&Expires=1615233661&Signature=SwClSuc4EjBozOlS~Bjx4~3rzxMXCN~bSOV~ecL4exFDppIbYNjjNUp5dw5NKCrcaKTRGVnT--xe~T920uAXtLFOTuUs2CRoQ-tiHIV~hUC3wHMf~okOkZWtA8J5jwIKOjVas-RiICe~cdINPEcQ1diTSm6UzCWEwOnZEiFYylzUa5w52LPb9sn3lJuKw4vHkRUyOC9ce10vM-lWb6qQYNdptKmBjnTktJpmEKTPAe~DGbyrxz2kkG1c~g78T4Lk4I2mtUFi6zJmPj8t38d50Dl-pDLX0QWoH4oXbUyihQ9gp2THoZaFCTf~IIWEVGEUAVRIPcRq5DjcVLkrItSV1w__&Key-Pair-Id=APKAJLOHF5GGSLRBV4ZA'),
(13, 'Algoritma Levenshtein Distance Dalam Aplikasi Pencarian Isu di Kota Bandung Pada Twitter', 'https://ejurnal.itenas.ac.id/index.php/mindjournal/article/view/2408'),
(14, 'Aplikasi Pelayanan dan Keluhan Gangguan Telepon Pelanggan Di PT Telekomunikasi Indonesia Tbk (Studi Kasus di Kancatel XXX)', 'http://jurnal.upnyk.ac.id/index.php/semnasif/article/view/1078'),
(15, 'Penerapan Framework Zachman Pada Arsitektur Pengelolaan Data Operasional (Studi Kasus SBU Aircraft Service, PT. Dirgantara Indonesia)', 'https://journal.uii.ac.id/Snati/article/viewFile/1948/1723'),
(16, 'Respon Alphanumerik dan Numerik QR Code', 'https://scholar.google.com/citations?user=zJuf-CAAAAAJ&hl=en&oi=sra#d=gs_md_cita-d&u=%2Fcitations%3Fview_op%3Dview_citation%26hl%3Den%26user%3DzJuf-CAAAAAJ%26citation_for_view%3DzJuf-CAAAAAJ%3AZph67rFs4hoC%26tzom%3D-420'),
(17, 'Perbandingan Metode Most Significant Bit dan Least Significant Bit pada Steganografi untuk Keamanan Data Media Digital', 'https://ejurnal.itenas.ac.id/index.php/mindjournal/article/viewFile/2692/1942'),
(18, 'Aplikasi Pembelajaran Kamera DSLR Menggunakan Multimedia Interaktif', 'http://eprints.itenas.ac.id/188/'),
(19, 'Implementasi Algoritma Genetika Pada Aplikasi Peringkas Dokumen Berita Bahasa Indonesia', 'http://eprints.itenas.ac.id/82/'),
(20, 'Algoritma C4.5 pada Registrasi Pasien', 'https://ejurnal.itenas.ac.id/index.php/mindjournal/article/view/2403'),
(21, 'Implementasi Simple Additive Weighting Pada Pembangunan Aplikasi Penentuan Insentif Telecaller', 'https://scholar.google.com/scholar?cluster=16960349696779708824&hl=en&oi=scholarr'),
(22, 'Implementasi Algoritma Color Filtering Pada Aplikasi Gitar Virtual', 'https://scholar.google.com/scholar?cluster=3471369741240247737&hl=en&oi=scholarr'),
(23, 'Socialization and Visualization Of City Transport Using Google Maps API', 'https://repository.widyatama.ac.id/xmlui/handle/123456789/6142'),
(24, '2Case Tools Dalam Lingkungan Operasi Open Source (Eksplorasi Fasilitas dan Fitur Pada Toghether dan Poseidon)', 'https://repository.widyatama.ac.id/xmlui/handle/123456789/1595'),
(25, 'Membangun Portal Pengetahuan Di Lingkungan Akademik', 'https://repository.widyatama.ac.id/xmlui/handle/123456789/2946'),
(26, 'Penerapan Six Sigma Sebagai Metoda Pengendalian Kualitas (Studi Kasus Analisa Kualitas Basis Data Sistem Informasi)', 'https://repository.widyatama.ac.id/xmlui/handle/123456789/2923'),
(27, 'Requirement Analysis Using Extended Vord Method', 'https://www.researchgate.net/profile/Falahah-Suprapto/publication/303000389_REQUIREMENT_ANALYSIS_USING_EXTENDED_VORD_METHOD/links/5f5a9cc64585154dbbc86eb2/REQUIREMENT-ANALYSIS-USING-EXTENDED-VORD-METHOD.pdf'),
(28, 'Pembangunan Aplikasi Web Event Calendar Menggunakan Algoritma Rijndael Untuk Enkripsi Data', 'http://lib.itenas.ac.id/kti/wp-content/uploads/2013/10/Jurnal-No.2-vol.4-5.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id_settings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sites`
--

CREATE TABLE `sites` (
  `id_sites` int(11) NOT NULL,
  `id_settings` int(11) NOT NULL,
  `name_sites` varchar(100) NOT NULL,
  `tiitle_sites` varchar(200) NOT NULL,
  `description_sites` text NOT NULL,
  `favicon_sites` varchar(150) NOT NULL,
  `logo_header_site` varchar(150) NOT NULL,
  `logo_footer_site` varchar(150) NOT NULL,
  `logo_big_sites` varchar(150) NOT NULL,
  `facebook_sites` varchar(150) NOT NULL,
  `twitter_sites` varchar(150) NOT NULL,
  `instagram_sites` varchar(150) NOT NULL,
  `pinterest_sites` varchar(150) NOT NULL,
  `linkedin_sites` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `id_tags` int(11) NOT NULL,
  `name_tags` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(100) NOT NULL,
  `email_user` varchar(60) NOT NULL,
  `username_user` varchar(20) NOT NULL,
  `password_user` varchar(40) NOT NULL,
  `level_user` varchar(10) NOT NULL,
  `photo_user` varchar(40) NOT NULL,
  `role_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `email_user`, `username_user`, `password_user`, `level_user`, `photo_user`, `role_user`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'admin', '', '', 1),
(2, 'user', 'user@gmail.com', 'user', 'user', '', '', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `views`
--

CREATE TABLE `views` (
  `id_views` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_visitors` int(11) NOT NULL,
  `ip_visitors` varchar(50) NOT NULL,
  `dateandtime_views` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `count_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitors`
--

CREATE TABLE `visitors` (
  `id_visitors` int(11) NOT NULL,
  `ip_visitors` varchar(50) DEFAULT NULL,
  `visit_dateandtime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indeks untuk tabel `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_course`);

--
-- Indeks untuk tabel `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id_home`);

--
-- Indeks untuk tabel `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id_inbox`);

--
-- Indeks untuk tabel `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`id_research`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id_settings`);

--
-- Indeks untuk tabel `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id_sites`);

--
-- Indeks untuk tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tags`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id_views`);

--
-- Indeks untuk tabel `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id_visitors`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `course`
--
ALTER TABLE `course`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `home`
--
ALTER TABLE `home`
  MODIFY `id_home` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id_inbox` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `research`
--
ALTER TABLE `research`
  MODIFY `id_research` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id_settings` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sites`
--
ALTER TABLE `sites`
  MODIFY `id_sites` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tags` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `views`
--
ALTER TABLE `views`
  MODIFY `id_views` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id_visitors` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

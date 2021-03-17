-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Mar 2021 pada 22.44
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
  `image_about` varchar(100) DEFAULT NULL,
  `description_about` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(200) DEFAULT NULL,
  `slug_category` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `name_comment` varchar(50) DEFAULT NULL,
  `email_comment` varchar(90) DEFAULT NULL,
  `message_comment` text DEFAULT NULL,
  `image_comment` varchar(50) DEFAULT NULL,
  `status_comment` int(11) NOT NULL,
  `parent_comment` int(11) DEFAULT NULL,
  `postid_comment` int(11) DEFAULT NULL,
  `dateandtime_comment` timestamp NULL DEFAULT current_timestamp()
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
  `caption_1_home` varchar(200) DEFAULT NULL,
  `caption_2_home` varchar(200) DEFAULT NULL,
  `bgheading_home` varchar(50) DEFAULT NULL,
  `bgtestimonial_home` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `home`
--

INSERT INTO `home` (`id_home`, `caption_1_home`, `caption_2_home`, `bgheading_home`, `bgtestimonial_home`) VALUES
(1, 'Hallo', 'Apa Kabar', 'Welcome to Personal Blog', NULL),
(2, 'Kabar Baik', 'Alhamdulilah', 'Welcome to Personal Blog2', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE `inbox` (
  `id_inbox` int(11) NOT NULL,
  `name_inbox` varchar(50) DEFAULT NULL,
  `email_inbox` varchar(80) DEFAULT NULL,
  `subject_inbox` varchar(200) DEFAULT NULL,
  `message_inbox` text DEFAULT NULL,
  `createdat_inbox` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_inbox` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pkm`
--

CREATE TABLE `pkm` (
  `id_pkm` int(11) NOT NULL,
  `author_pkm` varchar(50) NOT NULL,
  `tittle_pkm` varchar(250) NOT NULL,
  `jurnalname_pkm` varchar(250) NOT NULL,
  `publisher_pkm` varchar(100) NOT NULL,
  `volume_pkm` varchar(100) NOT NULL,
  `tanggal_pkm` date NOT NULL,
  `page_pkm` varchar(50) NOT NULL,
  `permalink_pkm` varchar(100) NOT NULL,
  `contens_pkm` text NOT NULL,
  `metadescription_pkm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `research`
--

CREATE TABLE `research` (
  `id_research` int(11) NOT NULL,
  `tittle_research` varchar(250) DEFAULT NULL,
  `link_research` varchar(1000) DEFAULT NULL,
  `abstract_research` text DEFAULT NULL,
  `publisher_research` varchar(50) DEFAULT NULL,
  `jurnalname_research` varchar(100) DEFAULT NULL,
  `author_research` varchar(100) DEFAULT NULL,
  `volume_research` varchar(20) DEFAULT NULL,
  `date_research` varchar(30) DEFAULT NULL,
  `pages_research` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `research`
--

INSERT INTO `research` (`id_research`, `tittle_research`, `link_research`, `abstract_research`, `publisher_research`, `jurnalname_research`, `author_research`, `volume_research`, `date_research`, `pages_research`) VALUES
(1, 'Study of Social Networking usage in Higher Education Environment', 'https://www.sciencedirect.com/science/article/pii/S1877042812053025', 'Social networking, in specific term, access social network application through internet connection, is a new trend in almost organization today. This phenomenon also aroused some debate about impact of employee productivity by using social networking site during office hours. The phenomenon of social networking access also occurred in higher education environment. Despites of debate about negative assumption of social networking impact on productivities, some of campus elements such as students or lecturers using these sites to disseminate information and support the communication among them. Based on this phenomenon, we conducted the research to explore the usage of social networking in higher education environment, especially among lecturers and students, and analyse the impact into teaching-learning activity. Research was conducted in three private universities which have familiar with social networking activities. The research focused on the usage of four kinds of activities such as connecting through facebook, microblogging, instant messaging, and blogging, 300 respondents, responded to the online survey. The result show that most respondents agree for free access into social networking during office hours, and at about 60% respondents using these access not only for entertain but also for information distribution and communication to support teaching activity. The usages vary from task assignment, announcement, class rescheduling negotiation, examination, and so on, which uses some application such as Facebook, Twitter, instant messenger and blog site. This is a policy of social networking access which is most suitable with user behavior in each environment should be proposed.', 'Elsevier B.V. or its Licensors or Contributors.', 'Procedia - Social and Behavioral Sciences', 'Falahah and Dewi Rosmala', '67', '10 December 2012', '156-166'),
(2, 'Komparasi Framework MVC (Codeigniter, Dan Cakephp) Pada Aplikasi Berbasis Web', 'https://scholar.google.com/scholar?cluster=1222166045411965942&hl=en&oi=scholarr', '', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Fractal Method For Non-Metamorphic Animation Using Iterated Function System Algorithm', 'http://www.jatit.org/volumes/Vol97No1/28Vol97No1.pdf', 'In this research, the Fractal method is implemented for Non-Metamorphic animation using Iterated Function System Algorithm. This study aims to find out how implementation process of animation created by a fractal method with IFS algorithm. The method used in this design is the drawing and animating stage. The fractal method is used at the stage of drawing; therefore reading and calculation of the input of data values of the IFS codes are done. The coordinate points generated from the IFS code consisting of the dimensional coefficient relative to the frame and the values of the points so that the affine coefficient is obtained through calculating the IFS algorithm matrix and forming a fractal object. In the animating stage, the object that has been obtained from the drawing stage is processed by non-metamorphic animation process through calculating the number of locations and the duration between the points of the object location so that the object is seen moving from the point of the initial location to the point of the final location. Based on the results of the fractal method for testing IFS, it can be applied to the animation using an object of fractal which the best results requires a sufficient iteration value of 10000 times to form a full fractal object and the iteration process does not last long, and as well as the off set value search testing performed on various iteration tests, having an offset value average by 0.11735%.', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Implementasi Aplikasi Website E-Commerce Batik Sunda dengan Menggunakan Protokol Secure Socket Layer (SSL)', 'https://scholar.google.com/scholar?cluster=13523554428379437573&hl=en&oi=scholarr', '', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Pemodelan Proses Bisnis B2B dengan BPMN (Studi Kasus Pengadaan Barang pada Divisi Logistik)', 'https://scholar.google.com/scholar?cluster=17984461796749106684&hl=en&oi=scholarr', '', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Implementasi Mode Operasi Cipher Block Chaining (CBC) pada Pengamanan Data', 'https://scholar.google.com/scholar?cluster=5303637430409026214&hl=en&oi=scholarr', '', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Pembangunan Aplikasi Travel Recommender Dengan Metode Case Base Reasoning', 'https://scholar.google.com/scholar?cluster=17224918656378494899&hl=en&oi=scholarr', '', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Aplikasi Pembelajaran Alat Musik Gitar Menggunakan Model Skenario Multimedia Interaktif Timeline Tree', 'http://lib.itenas.ac.id/kti/wp-content/uploads/2013/10/Jurnal-No1Vol4-1.pdf', 'Guitar is a musical instrument that is easy to learn, either by following guitar courses or autodidact. By following the course we will be given a briefing precise technique target according to our ability. Unlike the autodidact methode where we seek and learn the material itself so that what is learned less on target. As an alternative solution for autodidact guitar lesson, multimedia applications for learning guitar instrument were built. These applications are built by applying interactive multimedia timeline tree scenario as a medium of learning because the objects that displayed containing a synchronous and an asynchronous events. Based on test result, the application of guitar instrument lessons can provide a basic material for autodidact guitar lessons.', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Pembangunan Website Content Monitoring System Menggunakan DIFFLIB PYTHON', 'https://scholar.google.com/scholar?cluster=12187977127436684713&hl=en&oi=scholarr', '', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Penerapan Framework Zachman Pada Arsitektur Pengelolaan Data Operasional (studi kasus sbu aircraft services, PT. Dirgantara indonesia)', 'https://scholar.google.com/scholar?cluster=9692835690698204560&hl=en&oi=scholarr', '', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Implementasi Algoritma Binary Tree pada Sistem Informasi Multilevel Marketing', 'https://scholar.google.com/scholar?cluster=9913936556565847282&hl=en&oi=scholarr', '', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Implementasi Webcrawler Pada Social Media Monitoring WEBCRAWLER PADA SOCIAL MEDIA MONITORING ', 'http://lib.itenas.ac.id/kti/wp-content/uploads/2013/10/No.-2-Vol.-2-Mei-Agustus-2011-5.pdf', 'Social media monitoring is a process to collect, understand, and respond to opinions about brands, products, reputation, or opinion on social media. This is done to maintain the brand image of the product itself.Brand image was built in order to create consumer loyalty to a product, because byestablishinga brand image means built and keep the profit (return on investment) as well as the company\'s survival. By surfing the web using a web crawler to find activities and conversations that are happening and determine what the proper way to influence and form an opinion in social media.Web crawler is a software which is used to explore the pages on the internet and will take the an available information. Based on that case, was built a social media monitoring application by take an advantage of web crawler.This application allow business people to monitor public opinions towards a product.With this application should be able to assist business people in maintaining a brand image. In addition,are expected by take an advantage of this application is not limited to monitoring only, but social media monitoring can be a source of key learning how to create a successful campaign strategy.', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Algoritma Levenshtein Distance Dalam Aplikasi Pencarian Isu di Kota Bandung Pada Twitter', 'https://ejurnal.itenas.ac.id/index.php/mindjournal/article/view/2408', 'Twitter digunakan Pemerintah Kota Bandung dalam memperoleh data terkait isu yang terjadi di Kota Bandung yang dilaporkan oleh masyarakat Kota Bandung. Kendala yang dihadapi pada saat melakukan pencarian data isu melalui Twitter adalah adanya perbedaan ejaan kata di dalam tweet pada Twitter dengan kata kunci pada data kategori isu yang ada di Pemerintah Kota Bandung. Sehingga dibutuhkan sebuah algoritma yang mampu mengubah suatu kata menjadi kata lainnya, yaitu Algoritma Levenshtein Distance. Berdasarkan hasil pengujian yang telah dilakukan, Algoritma Levenshtein Distance mampu 100% mengubah kata dengan kesalahan ejaan pada tweet menjadi kata kunci pada kategori isu.Dengan digunakannya Algoritma Levenshtein Distance pada proses pencarian data isu dari Twitter, data isu yang diperoleh Pemerintah Kota Bandung menjadi lebih baik dan akurat.', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Aplikasi Pelayanan dan Keluhan Gangguan Telepon Pelanggan Di PT Telekomunikasi Indonesia Tbk (Studi Kasus di Kancatel XXX)', 'http://jurnal.upnyk.ac.id/index.php/semnasif/article/view/1078', 'Layanan pelanggan merupakan salah satu ujung tombak peningkatan kepuasan konsumen. Penanganan keluhan pelanggan yang terkoordinasi dan tuntas dapat memberikan citra positif atas perusahaan/organisasi. Pelayanan yang tuntas dan efektif perlu didukung oleh sistem administrasi yang terkoordinasi dan meliputi satu siklus layanan secara keseluruhan yang dimulai dari menerima keluhan, follow-up keluhan, eskalasi keluhan (jika ada masalah yang tidak dapat diselesaikan), eksekusi solusi penyelesaian dan monitoring atau rekapitulasi keluhan yang masuk sebagai bahan acuan manajemen untuk mengkaji domain mana yang sering dikeluhkan oleh pelanggan. Aplikasi pelayanan dan keluhan gangguan telepon pelanggan ini dirancang untuk membantu salah satu kantor cabang PT.Telkom untuk mengelola dan memonitor keluhan pelanggan. Aplikasi ini menitikberatkan pada follow-up keluhan dan monitoring atas jenis keluhan yang disampaikan. Keluhan yang masuk dicatat kemudian didelegasikan penyelesaiannya pada pihak terkait, sekaligus juga dimonitor status penyelesaian atas keluhan tersebut. Pada aplikasi ini juga dicatat jenis gangguan apa yang paling sering terjadi juga dapat dilengkapi dengan peta wilayah daerah gangguan tersebut. Fitur monitoring ini dapat membantu manajemen untuk memperbaiki kualitas layanan dengan cara mengantisipasi atau mengurangi tingkat keluhan pada periode berikutnya, sehingga dapat meningkatan kepuasan konsumen secara umum.', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Penerapan Framework Zachman Pada Arsitektur Pengelolaan Data Operasional (Studi Kasus SBU Aircraft Service, PT. Dirgantara Indonesia)', 'https://journal.uii.ac.id/Snati/article/viewFile/1948/1723', 'Framework Zachman merupakan salah satu kerangka kerja yang populer dalam memetakan artifak arsitektur informasi di sebuah organisasi. Penerapan framework Zachman sangat variatif dan mampu memberikan gambaran yang representative atas elemen-elemen informasi di sebuah organisasi. Pada makalah ini akan membahas kasus penerapan framework Zachman pada usulan pengembangan arsitektur pengelolaan data untuk kasus SBU Aircraft Services (ACS) yang menghadapi masalah dalam eksekusi berbagai aplikasi yang tidak saling terintegrasi. ACS pada saat ini menjalankan berbagai jenis aplikasi yang dengan berbagai kendala dan kondisi juga harus tetap meningkatkan kinerja bisnis dan berinteraksi dengan para mitra dan konsumennya. Skala bisnis yang luas menyebabkan ACS harus dapat saling bertukar data dengan mitra dan konsumennya. Hal ini tidak dapat dilaksanakan dengan mudah karena ACS tidak memiliki konsep arsitektur pengelolaan data yang baik dan semua aplikasi dibiarkan berjalan dan informasi yang mengalir di antara aplikasi ditangani apa adanya. Untuk dapat memodelkan arsitektur pengelolaan data yang harus disiapkan maka dicoba digunakan framework Zachman yang difokuskan untuk sudut pandang data skala enterprise dan diterapkan pada pengelolaan data operasional. Hasil pemodelan arsitektur data dengan menggunakan pendekatan Framework Zachman dapat memberikan masukan yang signifikan bagi para manajemen untuk penyiapan integrasi data di masa mendatang.', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Respon Alphanumerik dan Numerik QR Code', 'https://scholar.google.com/citations?user=zJuf-CAAAAAJ&hl=en&oi=sra#d=gs_md_cita-d&u=%2Fcitations%3Fview_op%3Dview_citation%26hl%3Den%26user%3DzJuf-CAAAAAJ%26citation_for_view%3DzJuf-CAAAAAJ%3AZph67rFs4hoC%26tzom%3D-420', '', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Perbandingan Metode Most Significant Bit dan Least Significant Bit pada Steganografi untuk Keamanan Data Media Digital', 'https://ejurnal.itenas.ac.id/index.php/mindjournal/article/viewFile/2692/1942', 'Steganography is the art and science which studies the way of confidential information hiding into a medium so human doesn’t realize the message existence. Most Siginificant bit (MSB) and least significant bit (LSB) method are used method in steganography technique. Binary from secretfile inserted into most influenced bit for MSB or most uninfluenced bit for LSB into cover file. From inserted process, it can be seen the file image size comparison before and after inserted by secret message. To analyze which method are better, it has must fulfilled parameters for each methods, a stego file is good if it has above 30 dB of PSNR value and 3 (fair) of MOS value. From the test result it can be concluded, that LSB method is better than MSB method, that can be proved with 70.31 dB of LSB method PSNR average value and 4 (good) of MOS average value, meanwhile MSB method just has 28.31 dB of PSNR average value and 2 (poor) of MOS average.', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Aplikasi Pembelajaran Kamera DSLR Menggunakan Multimedia Interaktif', 'http://eprints.itenas.ac.id/188/', 'DSLR (Digital single lens reflex) adalah salah satu kamera yang sangat digemari pada saat ini. Untuk mempelajari kamera DSLR tidak mudah bagi pemula dalam mengetahui parameter berdasarkan pengaturan kecepatan rana, aperture/bukaan diagfragma, dan ISO. Oleh karena itu, diperlukan suatu aplikasi pembelajaran DSLR berbasis Multimedia/virtual yang sistem kerjanya dikontrol langsung melalui komputer dengan cara kamera terhubung ke komputer menggunakan SD card USB data. Multimedia Interaktif adalah media yang terdiri dari banyak komponen media yang saling terintegrasi yang mampu untuk berinteraksi dengan penggunanya. dalam penelitian ini dirancang dan dibangun sebuah aplikasi pembelajaran kamera dengan menggunakan Skenario Petri Net sebagai model penggambaran semua kejadian dan mengetahui media-media yang digunakan. Petri net merupakan perangkat untuk pemodelan dan menganalisis sistem sehingga dapat diperoleh informasi tentang struktur, perilaku dinamik dari sistem dan media-media yang di modelkan. Perancangan ini menggunakan metode pembangunan game dimulai dari Storyline, Storyboard, Desain, dan koding. Pengembangan aplikasi ini menggunakan C# Visual Studio. Aplikasi ini telah melalui proses pengujian dimana aplikasi pembelajaran DSLR ini dapat membantu para pemula dalam teknik pengambilan gambar berdasarkan intensitas cahaya yang ditangkap oleh kamera serta memahami pengaturan kecepatan rana, aperture/bukaan diagfragma, dan ISO pada kamera.', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Implementasi Algoritma Genetika Pada Aplikasi Peringkas Dokumen Berita Bahasa Indonesia', 'http://eprints.itenas.ac.id/82/', 'Banyaknya informasi atau data yang tersimpan dalam bentuk dokumen bisa mencapai puluhan bahkan ratusan halaman. Membaca semua halaman satu persatu bisa dikatakan kurang efisien. Membaca banyak halaman dengan waktu yang singkat dan terburu-buru ada kemungkinan data yang didapat kurang relevan. Untuk mengatasi permasalahan tersebut, pada penelitian ini dibuat sebuah aplikasi peringkas dokumen. Pada penelitian ini algoritma yang digunakan adalah Genetic Algorithm, karena Genetic Algorithm mengambil nilai terbaik dari hasil seleksi beberapa kemungkinan secara random. Hasil ringkasan di dapat dari nilai Individu terbaik. Satu individu terdiri dari beberapa kromosom (kalimat). Kalimat kalimat dari individu terbaik akan diambil sebagai kalimat ringkasan. Dari kalimat ringkasan akan dilakukan pemapatan (compression rate) sebesar 50%. Dari hasil penelitian, di dapat bahwa dengan algoritma genetika mampu mencari nilai terbaik dalam individu sebesar 11326.16. dari hasil compression rate nilai individu terbaik didapat kalimat kalimat dengan nilai terbaik antara lain : 4408.3720, 2131.226, 1612.671.', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Algoritma C4.5 pada Registrasi Pasien', 'https://ejurnal.itenas.ac.id/index.php/mindjournal/article/view/2403', 'Algoritma C4.5 merupakan algoritma yang digunakan untuk membentuk pohon keputusan. Klinik dan Rumah Bersalin Melong Asih yang bertempat di Cimahi, bertugas melayani pemeriksaan umum, konsultasi masalah kandungan serta pemeriksaan ibu hamil. Proses registrasi yang panjang dapat menimbulkan antrian yang menyebabkan ketidaknyamanan pasien. Melihat kondisi tersebut diperlukan suatu sistem registrasi pada paisen untuk memprediksi waktu antrian di Klinik dan Rumah Bersalin Melong Asih. Data yang dimanfaatkan adalah data Rekam Medis Pasien (yang digunakan sebagai data training dan data testing). Data keluhan tersebut diproses menggunakan decision tree sehingga dapat menghasilkan suatu keputusan waktu penanganan pasien yang diterjemahkan ke dalam bahasa linguistik yaitu, cepat, sedang, dan lama. Partisi data 90:10 merupakan partisi terbaik karena memiliki nilai precision, recall, dan accuracy yang paling tinggi daripada partisi lainnya.', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Implementasi Simple Additive Weighting Pada Pembangunan Aplikasi Penentuan Insentif Telecaller', 'https://scholar.google.com/scholar?cluster=16960349696779708824&hl=en&oi=scholarr', '', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Implementasi Algoritma Color Filtering Pada Aplikasi Gitar Virtual', 'https://scholar.google.com/scholar?cluster=3471369741240247737&hl=en&oi=scholarr', '', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Socialization and Visualization Of City Transport Using Google Maps API', 'https://repository.widyatama.ac.id/xmlui/handle/123456789/6142', 'Traffic jam is a classic problem that has always faced by big cities. One source of traffic jam is the number of private vehicles used by people in everyday mobility. Therefore, some of the city government initiated the program to encourage people to use public transport, such as in Jakarta and Bandung. The evidence suggests there are still many people, especially certain circles or urban migrants, who are reluctant to use public transportation services because they do not know the complete information of public transportation such as the route and tariff. On the basis of the problems we are trying to build an application to introduce public transportation service and pricing estimates. This web -based GIS application built using the Google Maps API technology that can display interactive maps and easy to use. This application is equipped with various facilities such as public transportation data entry, visualization routes, calculates distance, public places are impassable, route planning and calculation of the total tariff for two particular points on the map. The application contains information about 39 tracks and 78 routes. The application is expected used by local government to socialize the public transportation, especially city transport.', NULL, NULL, NULL, NULL, NULL, NULL),
(24, '2Case Tools Dalam Lingkungan Operasi Open Source (Eksplorasi Fasilitas dan Fitur Pada Toghether dan Poseidon)', 'https://repository.widyatama.ac.id/xmlui/handle/123456789/1595', 'CASE (Computer Aided Software Engineering) adalah sejenis software yang dapat digunakan sebagai alat bantu otomatisasi aktivitas manual siklus pengembangan perangkat lunak. Saat ini penggunaan CASE untuk sebuah proyek pengembangan perangkat lunak sangat diperlukan karena berbagai kemudahan disediakan CASE sehingga proses perancangan dan pembangunan software menjadi lebih efisien dan memudahkan penelusuran (traceability) serta memungkinkan proses reverse engineering (mencari bentuk desain dari kode yang sudah jadi). tingkatan integrasi yang disediakan oleh berbagai software CASE tersebut berbeda-beda dan penggunaannya dapat disesuaikan dengan tingkat kebutuhan dan daya adaptasi lingkungan yang menggunakan CASE itu sendiri. Berbagai merk CASE yang saat ini beredar dipasaran umumnya menggunakan standar pemodelan sistem berbasis object dengan notasi UML dan menyediakan fasilitas yang meliputi perancanganobyek, antarmuka, produksi template kode secara otomatis dan dokumentasi.', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Membangun Portal Pengetahuan Di Lingkungan Akademik', 'https://repository.widyatama.ac.id/xmlui/handle/123456789/2946', 'Lingkungan akademik adalah lingkungan yang sarat dengan pengetahuan. Pengetahuan yang ada di lingkungan akademik terus berubah seeara dinamis sesuai dengan dinamika orang-orang yang terlibat. Pengelahuan sendiri sebenarnya merupakan asset penling bagi organisasi, lermasuk organisasi / institusi akademik, Oleh karen a itu, jika dikelola dengan tepat, maka pengetahuan ini akan memberikan manfaat yang sangat besar bagi seluruh komponen di lingkungan akademik baik mahasiswa, dosen maupun elemen·elemen lainnya. Sayangnya, hingga saat ini, masih sedikit institusi pendidikan di Indonesia yang menerapkan manajemen pengetahuan sehingga pengetahuan yang ada lidak terkelola dengan baik. Pengetahuan datang dan pergi bersamaan dengan datang dan pergi orang-orang di lingkungan tersebut. Salah satu eara untuk mengelola pengetahuan adalah dengan membangun portal pengetahuan yang dapat digunakan sebagai fasilitalor untuk berbagi pengetahuan. . Tulisan ini memuat usulan tahapan pembangunan dan implementasi portal pengetahuan, khususnya untuk lingkungan akademik, dengan menekankan asurnsi bahwa manajemen pengetahuan bukanlah sebuah produk, tetapi merupakan suatu kerangka kerja yang utuh yang harus dijalankan seeara bertahap dan tereneana dengan baik. Teknologi hanyalah sebagai pendukung mempermudah proses berbagi pengetahuan, sedangkan keberhasilan portal pengetahuan terletak pada pereneanaan isi (content), proses, dan dukungan tim yang tepa!.', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Penerapan Six Sigma Sebagai Metoda Pengendalian Kualitas (Studi Kasus Analisa Kualitas Basis Data Sistem Informasi)', 'https://repository.widyatama.ac.id/xmlui/handle/123456789/2923', '', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Requirement Analysis Using Extended Vord Method', 'https://www.researchgate.net/profile/Falahah-Suprapto/publication/303000389_REQUIREMENT_ANALYSIS_USING_EXTENDED_VORD_METHOD/links/5f5a9cc64585154dbbc86eb2/REQUIREMENT-ANALYSIS-USING-EXTENDED-VORD-METHOD.pdf', '', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Pembangunan Aplikasi Web Event Calendar Menggunakan Algoritma Rijndael Untuk Enkripsi Data', 'http://lib.itenas.ac.id/kti/wp-content/uploads/2013/10/Jurnal-No.2-vol.4-5.pdf', '', NULL, NULL, NULL, NULL, NULL, NULL);

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
  `name_sites` varchar(100) DEFAULT NULL,
  `tiitle_sites` varchar(200) DEFAULT NULL,
  `description_sites` text DEFAULT NULL,
  `favicon_sites` varchar(50) DEFAULT NULL,
  `logo_header_site` varchar(50) DEFAULT NULL,
  `logo_footer_site` varchar(50) DEFAULT NULL,
  `logo_big_sites` varchar(50) DEFAULT NULL,
  `facebook_sites` varchar(150) DEFAULT NULL,
  `twitter_sites` varchar(150) DEFAULT NULL,
  `instagram_sites` varchar(150) DEFAULT NULL,
  `pinterest_sites` varchar(150) DEFAULT NULL,
  `linkedin_sites` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `id_tags` int(11) NOT NULL,
  `name_tags` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamyiz`
--

CREATE TABLE `tamyiz` (
  `id_tamyiz` int(11) NOT NULL,
  `tittle_tamyiz` varchar(250) NOT NULL,
  `contents_tamyiz` text NOT NULL,
  `metadescription_tamyiz` varchar(250) NOT NULL,
  `postdate_tamyiz` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tamyiz`
--

INSERT INTO `tamyiz` (`id_tamyiz`, `tittle_tamyiz`, `contents_tamyiz`, `metadescription_tamyiz`, `postdate_tamyiz`) VALUES
(1, 'Wadidaw aweu', 'assalamualaikum', 'cukup sekian terimakasih', '2021-03-17 21:12:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(100) DEFAULT NULL,
  `email_user` varchar(60) DEFAULT NULL,
  `password_user` varchar(40) DEFAULT NULL,
  `level_user` varchar(10) DEFAULT NULL,
  `status_user` varchar(1) DEFAULT NULL,
  `photo_user` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `email_user`, `password_user`, `level_user`, `status_user`, `photo_user`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '', NULL, ''),
(2, 'user', 'user@gmail.com', 'user', '', NULL, '');

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
  `visit_dateandtime` datetime DEFAULT NULL,
  `platform_visitors` varchar(100) DEFAULT NULL
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
-- Indeks untuk tabel `pkm`
--
ALTER TABLE `pkm`
  ADD PRIMARY KEY (`id_pkm`);

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
-- Indeks untuk tabel `tamyiz`
--
ALTER TABLE `tamyiz`
  ADD PRIMARY KEY (`id_tamyiz`);

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
  MODIFY `id_home` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id_inbox` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pkm`
--
ALTER TABLE `pkm`
  MODIFY `id_pkm` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT untuk tabel `tamyiz`
--
ALTER TABLE `tamyiz`
  MODIFY `id_tamyiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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

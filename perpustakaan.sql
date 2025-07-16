-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 16, 2025 at 08:25 PM
-- Server version: 8.0.30
-- PHP Version: 8.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `KodeAnggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TTL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodePos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoTelp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TglDaftar` date NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`KodeAnggota`, `Nama`, `TTL`, `Alamat`, `KodePos`, `NoTelp`, `Hp`, `TglDaftar`, `Email`, `created_at`, `updated_at`) VALUES
('AG-1024', 'Austen Leffler', '2004-10-03, Lake Alice', '3168 Miles Radial\nPort Annamaeville, AK 07574-6690', '86865-7839', '714-402-3883', '081656586044', '1980-02-13', 'damore.jennyfer@example.com', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('AG-1126', 'Prof. Garfield Walter PhD', '2002-05-20, Yundtbury', '581 Auer Parkway Suite 249\nMohrhaven, IL 70715', '86453', '1-640-783-7738', '086716395220', '1983-08-11', 'fletcher.deckow@example.net', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('AG-1276', 'Jarred Blick DDS', '2009-02-16, Kleinton', '3604 Grady Mountains Apt. 756\nPort Lucile, SD 79965', '16079-9052', '+1-314-500-6719', '087542715826', '1992-06-13', 'muller.daisy@example.net', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('AG-1369', 'Justus Johnston', '2010-05-21, Bergeton', '949 Pollich Orchard Suite 251\nNorth Luigitown, NJ 73955', '68368', '463.445.4899', '084775615182', '2020-08-31', 'lafayette.vandervort@example.com', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('AG-2630', 'Tyler Gorczany', '1977-10-10, Port Geoffrey', '9026 Dashawn Springs Apt. 186\nEast Destineystad, AR 27907-0275', '43833-6055', '1-820-964-8745', '085724813965', '2025-03-23', 'verda53@example.com', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('AG-2663', 'Cheyenne Treutel PhD', '1970-09-09, Gretchenshire', '73206 Eusebio Stream\nSouth Marielaton, TX 27435-5362', '10151-5627', '+19203405574', '082565213370', '1997-09-06', 'iwillms@example.com', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('AG-3073', 'Audie Gaylord', '1989-01-02, New Lindseyberg', '318 Melany Glens Apt. 344\nDollychester, OH 57834', '53632', '+1-580-270-7545', '088570040519', '1980-03-26', 'rflatley@example.org', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('AG-3412', 'George Schimmel', '1989-09-13, Port Rahsaanport', '99518 Feest Mission\nAmaraberg, NJ 85967-9642', '59796-2257', '934.456.9724', '087783101889', '2012-06-11', 'kirlin.arden@example.org', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('AG-4049', 'Randi Roob', '1997-02-17, Port Gage', '16428 Rosario Stream Apt. 180\nSouth Brycenburgh, CT 91228', '52939', '1-203-557-4738', '080094003404', '2000-10-15', 'ubode@example.org', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('AG-4844', 'Diego Larson', '1985-07-21, Wittingland', '7943 Nicolas Trafficway\nLake Bradly, NY 26491-7224', '31910-3732', '906.886.2879', '088325204109', '1984-07-09', 'myrtle.mcdermott@example.net', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('AG-5892', 'Mr. Luciano Dickinson Sr.', '1980-09-25, Port Gaylordfort', '177 Schmidt Station Apt. 743\nGorczanytown, IA 43750', '98865', '+1 (863) 599-5790', '082055362237', '2009-09-07', 'dietrich.lola@example.com', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('AG-6096', 'Jenifer Lemke', '1980-04-14, West Cordiashire', '3551 Schneider Prairie Apt. 029\nNatalietown, AR 30952-1145', '61609', '+1 (458) 766-2140', '086566706916', '2008-08-24', 'hcole@example.net', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('AG-6359', 'Luna Gislason', '1986-10-10, Douglaston', '900 Batz Spurs Apt. 284\nAugustachester, ID 59420-5198', '13665-5252', '1-669-429-4500', '080913778287', '2011-07-10', 'rhoda41@example.org', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('AG-6435', 'Dr. Autumn Robel', '1981-06-19, New Jaredfurt', '3624 Jakubowski Hills\nWest Obie, RI 71099-6084', '00057-1201', '804.995.2507', '080445579670', '1987-05-09', 'crist.mikayla@example.org', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('AG-7434', 'Dr. Dayton Beahan', '1994-08-10, O\'Connelltown', '891 Greenholt Branch Apt. 088\nMaggioberg, FL 25279', '48585', '972.468.3702', '082992648600', '2010-06-25', 'genesis.sporer@example.com', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('AG-8364', 'Winnifred Nienow', '2004-07-07, North Chynamouth', '29953 Cremin Squares Apt. 032\nPort Shanon, NE 36481', '01561', '+13615217413', '087742872443', '2010-03-06', 'laurence.hane@example.com', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('AG-8694', 'Letha Erdman', '1998-08-18, South Floyfort', '7937 Kunze Mountain Apt. 024\nNew Venastad, MO 70861-4155', '92091-6641', '1-781-932-0903', '081501886732', '1992-10-20', 'tristian34@example.com', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('AG-8733', 'Earnest Ernser', '1983-03-08, Herbertland', '547 Cronin Valleys Suite 542\nPort Bradfordport, NE 54600', '81804', '1-859-262-7188', '082899752578', '1996-07-22', 'zakary01@example.com', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('AG-9453', 'Foster Smith', '1988-02-23, South Blake', '691 Alia Estate Suite 381\nWest Rainaton, IN 86916', '34198-4931', '1-765-364-3228', '083112989191', '2011-09-15', 'pacocha.nicholaus@example.net', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('AG-9664', 'Gunner Gislason', '1998-10-20, Halvorsonport', '30929 Schuster Tunnel\nWindlerfort, NH 42944-0247', '69218', '(630) 581-0049', '086900010163', '1992-03-01', 'rickie09@example.net', '2025-06-14 23:53:27', '2025-06-14 23:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `KodeBuku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoUDC` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoReg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Judul` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Penerbit` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pengarang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `TahunTerbit` year NOT NULL,
  `KotaTerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bahasa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Edisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ISBN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JumEksemplar` int NOT NULL,
  `SubyekUtama` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `SubyekTambahan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`KodeBuku`, `NoUDC`, `NoReg`, `Judul`, `Penerbit`, `Pengarang`, `TahunTerbit`, `KotaTerbit`, `Bahasa`, `Edisi`, `Deskripsi`, `ISBN`, `JumEksemplar`, `SubyekUtama`, `SubyekTambahan`, `created_at`, `updated_at`) VALUES
('BK-1790', '054.34', 'REG-7088', 'Dignissimos unde quia ipsa.', 'Waters Inc', 'Mrs. Maddison Fay DVM', 1979, 'Schroederfurt', 'Indonesia', 'Edisi 4', 'Est quos pariatur tempore dolore non. Nobis cupiditate omnis laborum dolore numquam nobis. Ex debitis amet et quae est pariatur. Provident vero explicabo est dolorum.', '9793790842233', 5, 'et', 'et ea accusantium', '2025-06-14 23:53:27', '2025-07-15 22:01:21'),
('BK-1850', '570.84', 'REG-1953', 'Occaecati est.', 'Graham and Sons', 'Philip Cormier', 2009, 'Hickleton', 'Jerman', 'Edisi 3', 'Architecto ratione sint repellendus vel. Ullam totam et qui exercitationem qui et. Accusamus reprehenderit non voluptas. At at molestiae quo unde animi. Harum esse quod et est occaecati.', '9785909179903', 2, 'libero', 'pariatur enim ab', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('BK-2231', '041.09', 'REG-8413', 'Possimus quae recusandae facere.', 'Grimes and Sons', 'Ronny Feest PhD', 1991, 'Runolfssonside', 'Jepang', 'Edisi 1', 'Earum similique vel dolor dolor aspernatur aperiam dignissimos. Minus ipsum qui tenetur ipsa delectus delectus. Laudantium inventore officiis sapiente culpa. Voluptatem id et veniam quae soluta voluptatem harum.', '9782752134691', 4, 'et', 'animi voluptate dicta', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('BK-2846', '656.48', 'REG-6932', 'Ea qui ut.', 'Buckridge Inc', 'Ms. Katherine Wehner I', 1976, 'Port Hassan', 'Inggris', 'Edisi 2', 'Sunt odio atque laboriosam cupiditate quia. Similique maxime nihil perferendis mollitia. Ab ut cum ut impedit aut. Harum officiis voluptatem et repudiandae omnis ad eos debitis.', '9780158346410', 1, 'odit', 'occaecati et excepturi', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('BK-2945', '516.88', 'REG-1106', 'Dolore provident voluptas.', 'Prosacco LLC', 'Mr. Shaun Baumbach PhD', 1997, 'South Bennett', 'Indonesia', 'Edisi 3', 'Quasi officia fuga vel reprehenderit aut facilis minus. Fugiat quo suscipit dolor. Rerum odit corporis saepe excepturi occaecati sed est vero.', '9792674872274', 8, 'blanditiis', 'alias est ut', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('BK-3455', '304.85', 'REG-2157', 'Velit id', 'Waelchi, West and Torp', 'Mr. Hadley Carter', 1996, 'Lake Arnaldo', 'Jerman', 'Edisi 5', 'Commodi deleniti nisi accusamus illo distinctio sit. Odit aspernatur incidunt dignissimos delectus distinctio commodi optio. Perspiciatis sed occaecati officia veritatis necessitatibus dolor ut.', '9797302555239', 5, 'ut', 'dicta molestiae pariatur', '2025-06-14 23:53:27', '2025-07-10 18:31:28'),
('BK-4012', '698.52', 'REG-9978', 'Et reiciendis nobis.', 'White, Heathcote and Kiehn', 'Reva Nienow', 2017, 'South Jeremie', 'Jepang', 'Edisi 5', 'Dolore enim illum earum dolore ipsam corrupti. Ut commodi nesciunt cumque eum adipisci dolor. Reiciendis iure dolor fugiat quis ducimus eos suscipit.', '9789483620554', 10, 'facere', 'aut quidem et', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('BK-4629', '207.61', 'REG-1463', 'Corporis voluptates consequatur voluptatem.', 'Gulgowski-Wiza', 'Travon Fisher', 1975, 'West Mozell', 'Inggris', 'Edisi 5', 'Eum magnam suscipit tempore ratione non culpa ipsum quia. Voluptatem quia rerum laboriosam natus quisquam sunt similique. Occaecati distinctio illum aliquam ut.', '9792488770353', 2, 'et', 'iusto iusto ut', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('BK-4915', '385.41', 'REG-6675', 'Enim ut vel.', 'Hegmann LLC', 'Orpha Senger', 1991, 'West Masonchester', 'Jepang', 'Edisi 2', 'Voluptas ipsa non ut eligendi blanditiis. Ut placeat sint hic doloribus debitis vel commodi deserunt. Et dolores deserunt tempora rerum.', '9785793573924', 10, 'quidem', 'doloremque deleniti aliquam', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('BK-5439', '178.07', 'REG-6150', 'Nemo distinctio aut aut.', 'Hand, McLaughlin and Gerhold', 'Francis Parker', 2016, 'Lake Kendrick', 'Inggris', 'Edisi 1', 'Beatae quo accusamus repellat quo tempora numquam possimus. Laudantium tenetur aut sit veritatis omnis. Eveniet molestiae aspernatur placeat. Asperiores animi recusandae sit est tenetur hic.', '9795679720168', 1, 'occaecati', 'repudiandae facilis ad', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('BK-5922', '268.26', 'REG-9759', 'Veritatis possimus exercitationem.', 'Brakus-Gislason', 'Michel Auer Jr.', 1998, 'Newellside', 'Jepang', 'Edisi 4', 'Omnis blanditiis quia commodi blanditiis. Assumenda aut et rerum sequi voluptatibus.', '9782349029423', 5, 'voluptas', 'velit reprehenderit et', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('BK-6015', '400.00', 'REG-8992', 'Maxime et explicabo corrupti.', 'Wehner-Abernathy', 'Celine O\'Kon', 1987, 'Port Lavina', 'Inggris', 'Edisi 4', 'Magni ex asperiores laborum qui magni ratione adipisci velit. Repellendus qui magni beatae accusamus velit consequatur. Dolorem dignissimos minus ad.', '9792948350149', 10, 'doloremque', 'nulla velit ut', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('BK-6221', '637.78', 'REG-4765', 'Ut fuga optio voluptatem.', 'Baumbach Inc', 'Junior Johnston', 1984, 'Vivianeside', 'Jepang', 'Edisi 3', 'Doloremque placeat debitis quasi eaque. Qui ea optio quia esse. Aut doloribus illum pariatur pariatur suscipit. Nihil sed consequatur rerum sed possimus fuga accusantium.', '9784692758630', 5, 'minima', 'commodi aliquid iste', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('BK-6316', '196.02', 'REG-6174', 'Perspiciatis id aut in.', 'Streich, Glover and Blick', 'Macie Kilback', 2019, 'Port Fredrick', 'Indonesia', 'Edisi 1', 'Aperiam voluptas impedit modi sint. Aut qui itaque praesentium ea laudantium dolorum non in. Nulla omnis magnam quia totam.', '9787996053241', 9, 'adipisci', 'rerum dolore eligendi', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('BK-7224', '087.65', 'REG-2297', 'Qui sunt eos.', 'Rippin, Fritsch and Miller', 'Elyssa Heaney', 1971, 'Thereseburgh', 'Inggris', 'Edisi 5', 'Omnis quis molestiae qui aut sint. Dolore fugit amet quod quasi. Quis quia provident voluptatem.', '9783254596314', 7, 'enim', 'temporibus qui sunt', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('BK-7713', '155.92', 'REG-1141', 'Modi repellat rerum itaque.', 'Wisozk, Lakin and Stoltenberg', 'Kale Nicolas', 1989, 'Adelbertstad', 'Jepang', 'Edisi 3', 'Laboriosam et rem voluptatem nobis dolores distinctio est dolores. Dolore beatae natus aut suscipit quod. Magnam nihil consequatur et quisquam esse.', '9797581430722', 5, 'laborum', 'earum ullam nostrum', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('BK-7834', '349.57', 'REG-1946', 'Qui consectetur voluptate iste.', 'Klocko PLC', 'Alvera Swaniawski', 1981, 'Schroederberg', 'Jepang', 'Edisi 3', 'Nihil non et dolorem porro quisquam quae doloremque consequatur. Natus veritatis exercitationem consequatur numquam dolor nesciunt quis est. Eum libero quos qui eum nihil. Officia voluptatem architecto temporibus quis est quaerat. Qui nostrum dolores corporis officia.', '9787868250334', 1, 'eos', 'dolores officia atque', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('BK-8770', '999.43', 'REG-3436', 'Quaerat quidem repellendus.', 'Schulist PLC', 'Fletcher Robel', 2018, 'Hardyton', 'Jerman', 'Edisi 5', 'Ducimus tempore reprehenderit consequatur vitae vero eos dolorum et. Aut veniam libero nisi non sit aut. Tempora aut assumenda voluptates eos aut.', '9790901838086', 1, 'repudiandae', 'sed fugiat ut', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('BK-9509', '072.59', 'REG-2005', 'Quam quas eaque molestias.', 'Ortiz, Glover and Hickle', 'Judd Bruen', 1997, 'Soledadton', 'Jerman', 'Edisi 1', 'Perspiciatis fugit qui vitae ducimus. Id perspiciatis ex ea sunt impedit est occaecati. Iste corrupti autem architecto dignissimos vitae voluptatem.', '9789472886206', 3, 'commodi', 'reprehenderit distinctio quia', '2025-06-14 23:53:27', '2025-06-14 23:53:27'),
('BK-9952', '851.00', 'REG-1404', 'Et earum nisi reprehenderit.', 'McKenzie, Bradtke and Jacobi', 'Stephen Lind I', 1978, 'Millerfort', 'Inggris', 'Edisi 1', 'Id officiis necessitatibus ad. Consequatur sequi modi ad blanditiis excepturi nihil. Possimus dolor architecto tempora libero.', '9784881447963', 9, 'libero', 'dolor nostrum laborum', '2025-06-14 23:53:27', '2025-06-14 23:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kembali_anggota`
--

CREATE TABLE `kembali_anggota` (
  `NoKembali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoPinjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TglKembali` date NOT NULL,
  `KodePetugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_14_150438_create_anggota_table', 1),
(5, '2025_06_14_150520_create_buku_table', 1),
(6, '2025_06_14_150552_create_petugas_table', 1),
(7, '2025_06_14_150700_create_pinjam_header_anggota_table', 1),
(8, '2025_06_14_150725_create_pinjam_detail_anggota_table', 1),
(9, '2025_06_14_150749_create_kembali_anggota_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `KodePetugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HakAkses` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`KodePetugas`, `Nama`, `Jabatan`, `HakAkses`, `password`, `created_at`, `updated_at`) VALUES
('Akbar', 'Akbar', 'COE', 'Admin', '$2y$12$YObRONpO225LcpES2gVQ5u0oIPZQ1LBmluipnQg4FEhPx/2RA.wkK', '2025-07-15 17:02:37', '2025-07-15 17:02:37'),
('asd', 'asd', 'asd', 'Admin', '$2y$12$pkrXvXZScVM4CBg5yi/ykuyK60uyHXR8Qtf2OnqvGABbuqpIB0Hhu', '2025-07-15 17:44:06', '2025-07-15 17:44:06'),
('Jonathan', 'Jonathan Afriliansyah', 'Bos Besar', 'Admin', '$2y$12$aQef661POtd9tWFkII6ADOzoW3Y3WFK0QExVbwm91bngIYy3iYJve', '2025-07-15 16:20:37', '2025-07-15 16:50:04'),
('PTG-001', 'Petugas Test', 'Staf Admin', 'Admin', '$2y$12$dhx9Z1HLXexT7phcm7YrX.UhbNs1uL4PQ0Te8Qxx5dXIl3hW8YmAC', '2025-07-15 17:31:11', '2025-07-15 17:31:11'),
('PTG-047', 'Aubree Hartmann', 'Staf Admin', 'Admin', '$2y$12$Fn.Pk0CIXPPiUfu2IbgsdOOntd7Wz82AoKK7DXuACOJbYuu4Dz4g6', '2025-06-14 23:53:28', '2025-07-03 00:57:16'),
('PTG-101', 'Petugas Test', 'Staf Admin', 'Admin', '$2y$12$i4buCratuzdIBS2l80s.4OAoBM4UEmLt5Y9ZrKj/oq3ooTJPTYRe2', '2025-07-15 17:33:21', '2025-07-15 17:33:21'),
('PTG-552', 'Selina Gutkowski', 'Staf Admin', 'Admin', '$2y$12$JdhkMcxGMNtrvsaMt5RIJ.XOwzvklVPO34fnZsPsHYrxBGTWaz/we', '2025-06-14 23:53:28', '2025-06-14 23:53:28'),
('PTG-989', 'Rod Pfannerstill', 'Kepala Perpustakaan', 'Admin', '$2y$12$oDO16RTN0eHjYtgYHMLLKei4fZd7mMji/S78DBRqu3.537Mm9cAke', '2025-06-14 23:53:28', '2025-06-14 23:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_detail_anggota`
--

CREATE TABLE `pinjam_detail_anggota` (
  `NoPinjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeBuku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Judul` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Penerbit` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `TahunTerbit` year DEFAULT NULL,
  `Jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pinjam_detail_anggota`
--

INSERT INTO `pinjam_detail_anggota` (`NoPinjam`, `KodeBuku`, `Judul`, `Penerbit`, `TahunTerbit`, `Jumlah`, `created_at`, `updated_at`) VALUES
('PJ-0001', 'BK-1850', 'Occaecati est.', 'Graham and Sons', NULL, 1, '2025-06-14 23:53:55', '2025-06-14 23:53:55'),
('PJ-0002', 'BK-1790', 'Dignissimos unde quia ipsa.', 'Waters Inc', NULL, 1, '2025-07-15 21:56:47', '2025-07-15 21:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_header_anggota`
--

CREATE TABLE `pinjam_header_anggota` (
  `NoPinjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TglPinjam` date NOT NULL,
  `TglKembali` date NOT NULL,
  `KodeAnggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodePetugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pinjam_header_anggota`
--

INSERT INTO `pinjam_header_anggota` (`NoPinjam`, `TglPinjam`, `TglKembali`, `KodeAnggota`, `KodePetugas`, `created_at`, `updated_at`) VALUES
('PJ-0001', '2025-06-15', '2025-06-22', 'AG-1126', 'PTG-047', '2025-06-14 23:53:55', '2025-06-14 23:53:55'),
('PJ-0002', '2025-07-17', '2025-07-23', 'AG-1024', 'Jonathan', '2025-07-15 21:56:47', '2025-07-15 21:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Qt2AUgrUak4Tn7PKJJqZEIY1PPgf5udMQeUI3Sxh', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRXdrd0FlM3o0cHZIWXhqdGVjUHZiSG5sSmsxd09kN2FpVzQ0WnhGYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9idWt1Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751549467);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`KodeAnggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`KodeBuku`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kembali_anggota`
--
ALTER TABLE `kembali_anggota`
  ADD PRIMARY KEY (`NoKembali`),
  ADD KEY `kembali_anggota_nopinjam_foreign` (`NoPinjam`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`KodePetugas`);

--
-- Indexes for table `pinjam_detail_anggota`
--
ALTER TABLE `pinjam_detail_anggota`
  ADD PRIMARY KEY (`NoPinjam`),
  ADD KEY `pinjam_detail_anggota_kodebuku_foreign` (`KodeBuku`);

--
-- Indexes for table `pinjam_header_anggota`
--
ALTER TABLE `pinjam_header_anggota`
  ADD PRIMARY KEY (`NoPinjam`),
  ADD KEY `pinjam_header_anggota_kodeanggota_foreign` (`KodeAnggota`),
  ADD KEY `pinjam_header_anggota_kodepetugas_foreign` (`KodePetugas`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kembali_anggota`
--
ALTER TABLE `kembali_anggota`
  ADD CONSTRAINT `kembali_anggota_nopinjam_foreign` FOREIGN KEY (`NoPinjam`) REFERENCES `pinjam_header_anggota` (`NoPinjam`) ON DELETE CASCADE;

--
-- Constraints for table `pinjam_detail_anggota`
--
ALTER TABLE `pinjam_detail_anggota`
  ADD CONSTRAINT `pinjam_detail_anggota_kodebuku_foreign` FOREIGN KEY (`KodeBuku`) REFERENCES `buku` (`KodeBuku`) ON DELETE CASCADE,
  ADD CONSTRAINT `pinjam_detail_anggota_nopinjam_foreign` FOREIGN KEY (`NoPinjam`) REFERENCES `pinjam_header_anggota` (`NoPinjam`) ON DELETE CASCADE;

--
-- Constraints for table `pinjam_header_anggota`
--
ALTER TABLE `pinjam_header_anggota`
  ADD CONSTRAINT `pinjam_header_anggota_kodeanggota_foreign` FOREIGN KEY (`KodeAnggota`) REFERENCES `anggota` (`KodeAnggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pinjam_header_anggota_kodepetugas_foreign` FOREIGN KEY (`KodePetugas`) REFERENCES `petugas` (`KodePetugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

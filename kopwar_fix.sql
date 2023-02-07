-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2023 pada 15.17
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopwar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `anggota_id` int NOT NULL,
  `kode_anggota` char(10) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `tgl_keanggotaan` varchar(255) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tgl_registrasi` varchar(255) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'aktif',
  `tgl_nonaktif` varchar(255) DEFAULT NULL,
  `ket_nonaktif` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`anggota_id`, `kode_anggota`, `nama_lengkap`, `tgl_keanggotaan`, `username`, `password`, `tgl_registrasi`, `status`, `tgl_nonaktif`, `ket_nonaktif`, `created_at`, `image`, `updated_at`, `level`) VALUES
(1, 'A-229', 'Drs. H. DESNUERI', '', 'A-199', 'VFZSSmVrNUVWVEk9', '17-10-2022 16:18:32', 'non aktif', '01-01-2022', 'Pensiun', '2023-01-12 03:16:19', NULL, '2023-02-03 02:38:42', NULL),
(2, 'A-002', 'Drs. H. ENDANG HERMAWAN', '', 'A-002', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(3, 'A-007', 'Dra. Hj. ATIN SUPRIATIN, M.Pd.', '', 'A-007', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(4, 'A-008', 'Dra. Hj. SUMARTINI, M.Pd.', '', 'A-008', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(5, 'A-010', 'Hj. DIAN EDRIANI, S.Pd., M.Pd..', '', 'A-010', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(6, 'A-015', 'Drs. ACENG MUBAROK, M.Pd.', '', 'A-015', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(7, 'A-017', 'ENDANG HENDARMIN, S.Pd.', '', 'A-017', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', 'profile/ly4kxPq6xrUW6Yrs6bQHZZbJKBWH7vxKWrkNAaJP.png', '2023-01-11 20:22:15', NULL),
(8, 'A-018', 'KUSNADI, S.Pd.', '', 'A-018', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(9, 'A-029', 'Dra. Hj. TETI KURNIYAWATI', '', 'A-029', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(10, 'A-033', 'Drs. H. SUKISNO, MPSA.', '', 'A-033', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(11, 'A-034', 'Drs. H. NANANG PERMANA', '', 'A-034', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(12, 'A-036', 'Dra. YAYAH SUKAYAH, M.M.', '', 'A-036', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(13, 'A-038', 'ABDUL MALIK, S.Pd.', '', 'A-038', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(14, 'A-039', 'Drs. DARNO ARYANTO', '', 'A-039', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(15, 'A-041', 'N. ROSYANINGSIH, S.Pd., M.Pd.', '', 'A-041', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(16, 'A-042', 'Drs. G.A. MULYANA', '', 'A-042', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(17, 'A-045', 'NENENG EVA LUCIA, S.Pd., M.Pd.', '', 'A-045', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(18, 'A-046', 'YAYAT HIDAYAT, S.Pd.', '', 'A-046', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(19, 'A-047', 'ENDANG RUHIAT, S.Pd.', '', 'A-047', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(20, 'A-048', 'Dra. EUIS CAHYAWATI', '', 'A-048', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(21, 'A-052', 'Hj. LILIS SURYANI, S.Pd., M.M.', '', 'A-052', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(22, 'A-054', 'AHADIAT, S.ST', '', 'A-054', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(23, 'A-055', 'Hj. ADE SRI MUTIARA, S.Pd.', '', 'A-055', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(24, 'A-056', 'R. SONI HERISON, M.T.', '', 'A-056', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(25, 'A-058', 'Drs. H. RYA M.MARYUN, M.M', '', 'A-058', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(26, 'A-059', 'H. ISDIYONO, S.Pd., M.T.', '', 'A-059', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(27, 'A-060', 'Dr. Drs. ENJANG SURYANA, M.M', '', 'A-060', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(28, 'A-061', 'Drs. SURYANA KUSNADI', '', 'A-061', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(29, 'A-062', 'JEJE JOHAN, S.Pd.', '', 'A-062', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(30, 'A-063', 'AJENG SUPRIYANTO, S.Pd.', '', 'A-063', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(31, 'A-064', 'M. DIAN ADRIANA,S.Pd., M.Pd.', '', 'A-064', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(32, 'A-067', 'WAHSATILKIROM, S.Pd.', '', 'A-067', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(33, 'A-068', 'DENDI MUHAMAD RIDWAN, S.Pd.', '', 'A-068', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(34, 'A-069', 'ENGKUS KOSWARA, S.Pd.', '', 'A-069', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(35, 'A-070', 'HENHEN SUHENDAR, S.Pd.', '', 'A-070', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(36, 'A-071', 'YANA SUPRIATNA, S. Pd.', '', 'A-071', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(37, 'A-072', 'AGUS SUTRESNA S., S.Pd., M.M', '', 'A-072', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(38, 'A-073', 'TIN SUTINI, S.Pd.', '', 'A-073', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(39, 'A-076', 'DEKE HERNADIN, S.Pd.', '', 'A-076', 'VFZSSmVrNUVWVEk9', '', 'non aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(40, 'A-077', 'AHMAD FATONI, S.Pd., M.Pd.', '', 'A-077', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(41, 'A-078', 'ADE HERYANTO, S.Pd., M.Pd.', '', 'A-078', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(42, 'A-079', 'RINA DEWI KANIA, S.Pd., M.Pd.', '', 'A-079', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(43, 'A-081', 'ZAKARIA, S.Ag.', '', 'A-081', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(44, 'A-082', 'SITI KURAESIN, S.Pd., M.M.', '', 'A-082', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(45, 'A-083', 'IMAS JAKIYAH, S.Pd.', '', 'A-083', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(46, 'A-084', 'HERMAN SUHERMAN, S.Pd.I., M.M.Pd.', '', 'A-084', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(47, 'A-085', 'MUKHLIS, S.Pd., M.Pd.', '', 'A-085', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(48, 'A-086', 'ARIE DWI ARIANDHANI, S.Pd.', '', 'A-086', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(49, 'A-087', 'ENNY ROHAYATY, S.Pd.', '', 'A-087', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(50, 'A-088', 'ARIF HIDAYAT, S.Pd.', '', 'A-088', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(51, 'A-089', 'YOSEP YANA SURYANA, S.Pd.', '', 'A-089', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(52, 'A-090', 'SRIE TANTIE, S.Pd.', '', 'A-090', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(53, 'A-091', 'ABD. RAHMAN, S.Ag', '', 'A-091', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(54, 'A-092', 'MIFTAH FAUZI, S.Pd., M.Pd.', '', 'A-092', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(55, 'A-093', 'AAN KRISNAWATI, S.Pd.', '', 'A-093', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, 'admin'),
(56, 'A-094', 'RUDI RUSBIANTO, S.ST., M.Pd.', '', 'A-094', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(57, 'A-095', 'MUHAMAD RIDWAN, S.Pd.', '', 'A-095', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(58, 'A-096', 'BAMBANG HADY NUGRAHA, S.Pd.', '', 'A-096', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(59, 'A-097', 'RAISA ZELINA PUTRI, S.Pd., M.Pd.', '', 'A-097', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(60, 'A-098', 'PRAYOGA HALIM WIBOWO, S.Pd.', '', 'A-098', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(61, 'A-099', 'LUINA, S.Pd.', '', 'A-099', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(62, 'A-100', 'AI SITI HASANAH, S.Pd.', '', 'A-100', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', 'profile/7YKEKPzAz5nk9ZuDDuT4BZlFTYwx8MsjMvjTem6p.png', NULL, NULL),
(63, 'A-101', 'YAYAN SUPRIATNA, S.Kom., M.Si.', '', 'A-101', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(64, 'A-102', 'HENDRAYANI, S.Pd.', '', 'A-102', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(65, 'A-103', 'APRIANTO BUDI PRASETYO, S.Pd.T', '', 'A-103', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(66, 'A-104', 'AZIS ABDUL AZIZ, S.Pd.', '', 'A-104', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(67, 'A-105', 'PEBI PEBRIADI, S.Kom.. M.M., M.T.', '', 'A-105', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(68, 'A-106', 'DEWI NURMAYASARI S.Pd.', '', 'A-106', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(69, 'A-107', 'DEDE TAUFIK NUROHMAN S.Pd.', '', 'A-107', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(70, 'A-108', 'FERILA RENGGA PRIHADIKA, S.Pd.', '', 'A-108', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(71, 'A-109', 'DIKDIK IMADUDIN, S.ST.', '', 'A-109', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(72, 'A-110', 'LUQMAN HAKIM, S.Pd.', '', 'A-110', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, '2023-01-18 20:55:48', NULL),
(73, 'A-111', 'MOHAMAD IDAN HARIRI, S.Pd.', '', 'A-111', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(74, 'A-112', 'KENDAR HERMAWAN, S.Pd.', '', 'A-112', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(75, 'A-113', 'FERA FERIANTI, S.Pd.', '', 'A-113', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(76, 'A-114', 'FAHMI BADRUL FALAH, S.Pd.', '', 'A-114', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(77, 'A-147', 'YENI HERDIANI, S.Sos.', '', 'A-147', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(78, 'A-148', 'IDA KARNIDA, S.Sos.', '', 'A-148', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(79, 'A-150', 'YUYUM YULIA, S.Sos.', '', 'A-150', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(80, 'A-151', 'DODI WATMIKA, S.Sos.', '', 'A-151', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(81, 'A-152', 'MOHAMAD RIDWAN, S.Pd.', '', 'A-152', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(82, 'A-153', 'YANI MULYANI, S.Sos.', '', 'A-153', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(83, 'A-154', 'PINGGIR RUBIYANTO, A.Md.', '', 'A-154', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(84, 'A-155', 'RIDWAN ARIFIN, A.Md.', '', 'A-155', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(85, 'A-198', 'IYIN MULYANI, S.Pd.', '', 'A-198', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(86, 'A-115', 'Dra. Hj. ENEN KHOERIYAH, M.M.', '', 'A-115', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(87, 'A-116', 'HEPI WAHID ROJALI, S.Pd.', '', 'A-116', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(88, 'A-117', 'LENI NURHAYATI, S.Pd.', '', 'A-117', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(89, 'A-118', 'TRESNA RASPATI, S.ST.', '', 'A-118', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(90, 'A-119', 'INDRAWATI, S.Pd., M.Pd.', '', 'A-119', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(91, 'A-120', 'NUNI NOPRIANTINA BASUKI, S.Pd.', '', 'A-120', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(92, 'A-121', 'AGUS NURYAMAN, S.T., Gr.', '', 'A-121', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(93, 'A-122', 'GILANG GANTINA ADIPRAJA, S.Pd.', '', 'A-122', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(94, 'A-123', 'JAJAT SUDRAJAT, S.IP.', '', 'A-123', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(95, 'A-124', 'INDRA YUSUP PRAMANTIA, S.Pd.', '', 'A-124', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(96, 'A-126', 'ADE IRMA TRIPANI, S.Pd.', '', 'A-126', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(97, 'A-127', 'HERLAN WIDIAWAN, ST', '', 'A-127', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(98, 'A-128', 'HERNY SURYANY, S.Pd.', '', 'A-128', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(99, 'A-130', 'OPIK TAOPIK, S.Pd.I', '', 'A-130', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', 'profile/HlQUnsT4IwEEq9Wl5qFec4x2LJp39udyXkTHqDiB.png', '2023-01-28 06:54:41', NULL),
(100, 'A-131', 'ECHSANUDDIN, M.Pd.', '', 'A-131', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(101, 'A-133', 'IWAN SETIAWAN, S.Kom', '', 'A-133', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(102, 'A-135', 'RISTIANI HOTIMAH, S.Pd.', '', 'A-135', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(103, 'A-136', 'MUCHAMAD SIDIK, S.Kom', '', 'A-136', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(104, 'A-138', 'LINDA YULIA, S.Pd.', '', 'A-138', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(105, 'A-140', 'ANDRI ANDRIYAN, S.T.', '', 'A-140', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(106, 'A-142', 'BAYU NURUL FAJRI, S.Ds.', '', 'A-142', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(107, 'A-143', 'DICKY NURUL ILHAM, S.Pd.', '', 'A-143', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(108, 'A-144', 'LIA SRI MULYATI, S.Pd.I.', '', 'A-144', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(109, 'A-145', 'WIDYA DEWI SUSANTI, S.Sn.', '', 'A-145', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(110, 'A-156', 'CICIH RATNANINGSIH, S.Sos.', '', 'A-156', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(111, 'A-157', 'YANNI MELANI, S.Sos.', '', 'A-157', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(112, 'A-158', 'DADAN HERMAWAN, S.Sos.', '', 'A-158', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(113, 'A-159', 'AGUS HERMAWAN, A.Md.', '', 'A-159', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(114, 'A-160', 'NANI SRI HARTINI, S.Pd.', '', 'A-160', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(115, 'A-161', 'ERNA NINGSIH, S.Sos.', '', 'A-161', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(116, 'A-163', 'DEDY NOPIADY', '', 'A-163', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(117, 'A-164', 'YANA MULYANA, S.Sos.', '', 'A-164', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(118, 'A-165', 'IQBAL MUHAMMAD NOOR, A.Md.', '', 'A-165', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(119, 'A-166', 'NUNUY SANTONI, A.Mkes', '', 'A-166', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(120, 'A-167', 'DZIKRI ALI PERMANA, S.T.', '', 'A-167', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(121, 'A-169', 'REYHAN TIDAR', '', 'A-169', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(122, 'A-171', 'HILDA HERMAWANTI', '', 'A-171', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(123, 'A-172', 'PERMANA', '', 'A-172', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(124, 'A-173', 'SLAMET', '', 'A-173', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(125, 'A-174', 'ARIS RAMDANI', '', 'A-174', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(126, 'A-175', 'SURAHMAN', '', 'A-175', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(127, 'A-178', 'SANTANA', '', 'A-178', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(128, 'A-179', 'MUKHASIM', '', 'A-179', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(129, 'A-180', 'MUMU MUSLIHUDIN', '', 'A-180', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(130, 'A-182', 'ANDRI SOFWAN SAORI', '', 'A-182', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(131, 'A-183', 'AGUS HENDRI', '', 'A-183', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(132, 'A-185', 'ADING NURKADIR', '', 'A-185', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(133, 'A-186', 'SAEPUL BAKIR', '', 'A-186', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(134, 'A-187', 'ELIS CARLIAH', '', 'A-187', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(135, 'A-188', 'DEWI PATIIMAH, S.Pd.', '', 'A-188', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(136, 'A-189', 'WIDI ALPIANI PUTRI, S.Pd.', '', 'A-189', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(137, 'A-190', 'ASTI PUSPITA, S.Pd.', '', 'A-190', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(138, 'A-192', 'A. RAIS BAJURI, S.Pd., M.Pd.', '', 'A-192', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(139, 'A-193', 'NUR RASYIRINA FILDZAH, S.Pd.', '', 'A-193', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(140, 'A-195', 'SALMAN ARRASYID TAUFIQURRAHMAN, S.Pd.', '', 'A-195', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(141, 'A-196', 'IIS ARISA SRI KUSTIA, S.Pd.I.', '', 'A-196', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(142, 'A-197', 'NADYA MUFLIHATI ALIFAH, S.Pd.', '', 'A-197', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(143, 'A-200', 'HANNA ROSIANA H., S.Pd.', '', 'A-200', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(144, 'A-201', 'GALIH FIRMANTO, S.Pd.', '', 'A-201', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(145, 'A-202', 'RISKA HESTIGUSTINAWATI, S.Pd.', '', 'A-202', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(146, 'A-203', 'YUNUS KARSIANA', '', 'A-203', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(147, 'A-204', 'NANDI HUSNANDYA', '', 'A-204', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(148, 'A-205', 'AZRI AZHARI', '', 'A-205', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(149, 'A-206', 'ENDANG', '', 'A-206', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(150, 'A-207', 'PURNAMA', '', 'A-207', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(151, 'A-208', 'ENDANG BUDI TAUFIK, S.Pd.', '', 'A-208', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(152, 'A-209', 'LILIS SURYANI, S.Pd.', '', 'A-209', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(153, 'A-210', 'KANIA PURNAMA, S.Pd.,MM.', '', 'A-210', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(154, 'A-211', 'ACHMAD LINGGA M.', '', 'A-211', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(155, 'A-212', 'LINDA WALIDATUL MUNAWAROH, S.Pd., M.Pd.', '', 'A-212', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(156, 'A-213', 'HANINDIA FIANANTA AZZIZ, S.Pd.', '', 'A-213', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(157, 'A-214', 'YOGASWARA', '', 'A-214', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(158, 'A-215', 'RISMA DEWI HUSAENI, S.Tr.T.', '', 'A-215', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(159, 'A-216', 'DIAN LESTIANI, S.Pd.', '', 'A-216', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(160, 'A-217', 'IRWAN WARDANI, S.Kom', '', 'A-217', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(161, 'A-218', 'AI ASIAH NURAENI, S.Pd.', '', 'A-218', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(162, 'A-219', 'DANI MAULANA ROHMAN, S.Kom.', '', 'A-219', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(163, 'A-220', 'ERFIN ERFARAMA', '', 'A-220', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(164, 'A-221', 'DEDI SUYATMAN', '', 'A-221', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(165, 'A-222', 'ANTON SUSANTO, S.Pd., M.Pd.', '', 'A-222', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(166, 'A-223', 'SITI NUNUNG NURAENI, S.Pd.', '', 'A-223', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(167, 'A-224', 'DEWI PURNAMA, S.Pd.', '', 'A-224', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(168, 'A-225', 'GUNGUN GUNAWAN', '', 'A-225', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(169, 'A-226', 'TESA WIRA ANDRIYAN', '', 'A-226', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(170, 'A-227', 'YULI YULIANI', '', 'A-227', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL),
(171, 'A-228', 'DEVI AMALIA LESTARI, S.Pd.', '', 'A-228', 'VFZSSmVrNUVWVEk9', '', 'aktif', '', '', '2023-01-12 03:16:19', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_angsuran`
--

CREATE TABLE `tbl_angsuran` (
  `angsuran_id` int UNSIGNED NOT NULL,
  `anggota_id` int DEFAULT NULL,
  `kode_pinjaman` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rencana_bayar` varchar(255) DEFAULT '0',
  `jumlah_angsur` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '0',
  `periode` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tbl_angsuran`
--

INSERT INTO `tbl_angsuran` (`angsuran_id`, `anggota_id`, `kode_pinjaman`, `rencana_bayar`, `jumlah_angsur`, `periode`, `timestamp`) VALUES
(3, 6, 'PIN-533185', NULL, '120000', NULL, '2023-02-05 13:32:45'),
(4, 4, 'PIN-904346', NULL, '1000', NULL, '2023-02-05 13:42:31'),
(5, 4, 'PIN-904346', NULL, '119000', NULL, '2023-02-05 13:46:38'),
(6, 8, 'PIN-57316', NULL, '1000', NULL, '2023-02-05 13:47:53'),
(7, 8, 'PIN-57316', NULL, '1000', NULL, '2023-02-05 14:01:33'),
(11, 8, 'PIN-57316', NULL, '110000', NULL, '2023-02-05 14:11:15'),
(12, 2, 'PIN-974993', NULL, '110000', NULL, '2023-02-05 14:13:34'),
(13, 8, 'PIN-57316', NULL, '8000', NULL, '2023-02-05 14:13:54'),
(14, 3, 'PIN-610917', NULL, '10000', NULL, '2023-02-05 14:14:33'),
(15, 2, 'PIN-974993', NULL, '1000', NULL, '2023-02-05 14:15:00'),
(16, 3, 'PIN-610917', NULL, '2000', NULL, '2023-02-05 14:15:18'),
(17, 3, 'PIN-610917', NULL, '98000', NULL, '2023-02-05 14:15:45'),
(18, 2, 'PIN-974993', NULL, '9000', NULL, '2023-02-05 14:16:01');

--
-- Trigger `tbl_angsuran`
--
DELIMITER $$
CREATE TRIGGER `angsuran` AFTER INSERT ON `tbl_angsuran` FOR EACH ROW BEGIN
UPDATE tbl_pinjaman SET jumlah_bayar = jumlah_bayar + NEW.jumlah_angsur WHERE kode_pinjaman = NEW.kode_pinjaman;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_group_angsuran`
--

CREATE TABLE `tbl_group_angsuran` (
  `angsuran_group_id` int UNSIGNED NOT NULL,
  `kode_group` varchar(255) DEFAULT NULL,
  `timestamp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tbl_group_angsuran`
--

INSERT INTO `tbl_group_angsuran` (`angsuran_group_id`, `kode_group`, `timestamp`) VALUES
(1, 'ANG-1022000001', '02-10-2022 14:20:02'),
(2, 'ANG-1022000002', '02-10-2022 14:21:25'),
(3, 'ANG-1022000003', '02-10-2022 14:27:08'),
(4, 'ANG-1022000004', '02-10-2022 14:30:20'),
(5, 'ANG-1022000005', '02-10-2022 14:30:49'),
(6, 'ANG-1022000006', '02-10-2022 14:31:58'),
(7, 'ANG-1022000007', '02-10-2022 14:32:09'),
(8, 'ANG-1022000008', '02-10-2022 14:33:30'),
(9, 'ANG-1022000009', '02-10-2022 14:34:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_pinjaman`
--

CREATE TABLE `tbl_jenis_pinjaman` (
  `jenis_pinjaman_id` int NOT NULL,
  `jenis_pinjaman` varchar(255) DEFAULT NULL,
  `singkatan` varchar(255) DEFAULT NULL,
  `kategori_item` varchar(255) DEFAULT NULL COMMENT 'jenis barang ex: elektronik, sembako, dll...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_jenis_pinjaman`
--

INSERT INTO `tbl_jenis_pinjaman` (`jenis_pinjaman_id`, `jenis_pinjaman`, `singkatan`, `kategori_item`) VALUES
(1, 'Pinjaman Anggota', 'PA', NULL),
(2, 'Piutang Dagang', 'PD', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_simpanan`
--

CREATE TABLE `tbl_jenis_simpanan` (
  `id_jenis` int NOT NULL,
  `jenis_simpanan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_jenis_simpanan`
--

INSERT INTO `tbl_jenis_simpanan` (`id_jenis`, `jenis_simpanan`) VALUES
(1, 'pokok'),
(2, 'wajib'),
(3, 'hari_raya'),
(4, 'umroh'),
(5, 'wisata');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengeluaran`
--

CREATE TABLE `tbl_pengeluaran` (
  `pengeluaran_id` int NOT NULL,
  `anggota_id` int DEFAULT NULL,
  `sumber_simpanan` varchar(255) DEFAULT NULL,
  `jumlah_pengeluaran` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `periode` varchar(255) DEFAULT NULL,
  `timestamp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_pengeluaran`
--

INSERT INTO `tbl_pengeluaran` (`pengeluaran_id`, `anggota_id`, `sumber_simpanan`, `jumlah_pengeluaran`, `keterangan`, `periode`, `timestamp`) VALUES
(1, 1, 'simpok', '50000', '', '01-2022', ''),
(2, 1, 'simwa', '1400000', '', '01-2022', ''),
(3, 15, 'shr', '20000000', '', '01-2022', ''),
(4, 61, 'shr', '1500000', '', '01-2022', ''),
(5, 124, 'simpok', '50000', '', '01-2022', ''),
(6, 124, 'simwa', '4250000', '', '01-2022', ''),
(7, 133, 'simpok', '50000', '', '01-2022', ''),
(8, 133, 'simwa', '4250000', '', '01-2022', ''),
(9, 32, 'shr', '2000000', '', '02-2022', ''),
(10, 90, 'shr', '4500000', '', '02-2022', ''),
(11, 95, 'simpok', '50000', '', '02-2022', ''),
(12, 95, 'simwa', '4250000', '', '02-2022', ''),
(13, 101, 'simpok', '50000', '', '02-2022', ''),
(14, 101, 'simwa', '4350000', '', '02-2022', ''),
(15, 103, 'simpok', '50000', '', '02-2022', ''),
(16, 103, 'simwa', '4350000', '', '02-2022', ''),
(17, 108, 'shr', '600000', '', '02-2022', ''),
(18, 128, 'simpok', '50000', '', '02-2022', ''),
(19, 128, 'simwa', '4250000', '', '02-2022', ''),
(20, 128, 'shr', '3500000', '', '02-2022', ''),
(21, 3, 'shr', '5000000', '', '03-2022', ''),
(22, 4, 'shr', '30000000', '', '03-2022', ''),
(23, 9, 'shr', '37000000', '', '03-2022', ''),
(24, 13, 'shr', '5400000', '', '03-2022', ''),
(25, 18, 'shr', '3000000', '', '03-2022', ''),
(26, 20, 'shr', '4000000', '', '03-2022', ''),
(27, 26, 'shr', '5000000', '', '03-2022', ''),
(28, 35, 'shr', '2000000', '', '03-2022', ''),
(29, 38, 'shr', '20000000', '', '03-2022', ''),
(30, 40, 'shr', '1500000', '', '03-2022', ''),
(31, 41, 'shr', '2000000', '', '03-2022', ''),
(32, 42, 'shr', '10000000', '', '03-2022', ''),
(33, 44, 'shr', '20000000', '', '03-2022', ''),
(34, 45, 'shr', '1000000', '', '03-2022', ''),
(35, 47, 'shr', '2000000', '', '03-2022', ''),
(36, 48, 'shr', '2000000', '', '03-2022', ''),
(37, 50, 'shr', '1000000', '', '03-2022', ''),
(38, 52, 'shr', '10000000', '', '03-2022', ''),
(39, 55, 'shr', '4000000', '', '03-2022', ''),
(40, 57, 'shr', '2000000', '', '03-2022', ''),
(41, 58, 'shr', '2000000', '', '03-2022', ''),
(42, 60, 'shr', '10000000', '', '03-2022', ''),
(43, 61, 'shr', '4950000', '', '03-2022', ''),
(44, 64, 'shr', '1000000', '', '03-2022', ''),
(45, 65, 'shr', '2000000', '', '03-2022', ''),
(46, 66, 'shr', '2500000', '', '03-2022', ''),
(47, 68, 'shr', '5188000', '', '03-2022', ''),
(48, 71, 'shr', '2310000', '', '03-2022', ''),
(49, 72, 'shr', '3000000', '', '03-2022', ''),
(50, 86, 'shr', '3000000', '', '03-2022', ''),
(51, 87, 'shr', '2000000', '', '03-2022', ''),
(52, 88, 'shr', '2000000', '', '03-2022', ''),
(53, 89, 'shr', '2000000', '', '03-2022', ''),
(54, 102, 'shr', '5000000', '', '03-2022', ''),
(55, 104, 'shr', '1000000', '', '03-2022', ''),
(56, 78, 'shr', '1098000', '', '03-2022', ''),
(57, 79, 'shr', '7000000', '', '03-2022', ''),
(58, 80, 'shr', '3000000', '', '03-2022', ''),
(59, 81, 'shr', '10000000', '', '03-2022', ''),
(60, 82, 'shr', '3500000', '', '03-2022', ''),
(61, 132, 'shr', '2000000', '', '03-2022', ''),
(62, 134, 'shr', '1000000', '', '03-2022', ''),
(63, 135, 'shr', '1000000', '', '03-2022', ''),
(64, 138, 'shr', '1000000', '', '03-2022', ''),
(65, 139, 'shr', '2000000', '', '03-2022', ''),
(66, 142, 'shr', '1000000', '', '03-2022', ''),
(67, 85, 'shr', '2000000', '', '03-2022', ''),
(68, 145, 'shr', '2000000', '', '03-2022', ''),
(69, 153, 'simpok', '50000', '', '03-2022', ''),
(70, 153, 'simwa', '300000', '', '03-2022', ''),
(71, 153, 'shr', '600000', '', '03-2022', ''),
(72, 17, 'shr', '6000000', '', '04-2022', ''),
(73, 95, 'simwa', '200000', '', '04-2022', ''),
(74, 110, 'shr', '5000000', '', '04-2022', ''),
(75, 115, 'shr', '5000000', '', '04-2022', ''),
(76, 141, 'shr', '2000000', '', '04-2022', ''),
(77, 125, 'simpok', '50000', '', '05-2022', ''),
(78, 125, 'simwa', '4650000', '', '05-2022', ''),
(79, 105, 'simpok', '50000', '', '06-2022', ''),
(80, 105, 'simwa', '4650000', '', '06-2022', ''),
(81, 107, 'simpok', '50000', '', '07-2022', ''),
(82, 107, 'simwa', '4850000', '', '07-2022', ''),
(83, 111, 'shr', '900000', '', '07-2022', ''),
(84, 139, 'simpok', '50000', '', '07-2022', ''),
(85, 139, 'simwa', '3800000', '', '07-2022', ''),
(86, 139, 'shr', '400000', '', '07-2022', ''),
(87, 139, 'wisata', '400000', '', '07-2022', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pinjaman`
--

CREATE TABLE `tbl_pinjaman` (
  `kode_pinjaman` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `anggota_id` int DEFAULT NULL,
  `jumlah_pinjaman` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '0',
  `periode` varchar(50) DEFAULT NULL,
  `jumlah_bayar` int NOT NULL,
  `keterangan` text,
  `timestamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tbl_pinjaman`
--

INSERT INTO `tbl_pinjaman` (`kode_pinjaman`, `anggota_id`, `jumlah_pinjaman`, `periode`, `jumlah_bayar`, `keterangan`, `timestamp`) VALUES
('PIN-533185', 6, '120000', '12-2021', 120000, NULL, '2023-02-05 06:30:59'),
('PIN-57316', 8, '120000', '12-2021', 120000, NULL, '2023-02-05 06:47:01'),
('PIN-610917', 3, '110000', '12-2021', 110000, NULL, '2023-02-05 07:14:08'),
('PIN-904346', 4, '120000', '12-2021', 120000, NULL, '2023-02-05 06:42:13'),
('PIN-974993', 2, '120000', '12-2021', 120000, NULL, '2023-02-05 07:13:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_simpanan`
--

CREATE TABLE `tbl_simpanan` (
  `id_simpanan` int NOT NULL,
  `id_anggota` int DEFAULT NULL,
  `id_jenis_simpanan` int NOT NULL,
  `jumlah` int NOT NULL,
  `periode` varchar(255) DEFAULT NULL,
  `tanggal_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL,
  `log` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `nama_lengkap`, `username`, `password`, `level`, `log`) VALUES
(1, 'Irwan Wardani', 'only', 'WTFoa2JBPT0=', 'super', NULL);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_group_angsuran`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_group_angsuran` (
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_group_angsuran`
--
DROP TABLE IF EXISTS `view_group_angsuran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_group_angsuran`  AS SELECT `a`.`angsuran_id` AS `angsuran_id`, `a`.`anggota_id` AS `anggota_id`, `a`.`group_id` AS `group_id`, `d`.`kode_group` AS `kode_group`, `b`.`nama_lengkap` AS `nama_lengkap`, `a`.`jenis_pinjaman_id` AS `jenis_pinjaman_id`, `c`.`jenis_pinjaman` AS `jenis_pinjaman`, `a`.`periode` AS `periode`, substr(`a`.`periode`,4,4) AS `tahun`, sum(`a`.`jumlah_bayar`) AS `jumlah_bayar`, (select sum(`b`.`jumlah_pinjaman`) from `tbl_pinjaman` `b` where ((`b`.`anggota_id` = `a`.`anggota_id`) and (`b`.`jenis_pinjaman_id` = `a`.`jenis_pinjaman_id`))) AS `jumlah_pinjaman` FROM (((`tbl_angsuran` `a` left join `tbl_anggota` `b` on((`a`.`anggota_id` = `b`.`anggota_id`))) left join `tbl_jenis_pinjaman` `c` on((`a`.`jenis_pinjaman_id` = `c`.`jenis_pinjaman_id`))) left join `tbl_group_angsuran` `d` on((`a`.`group_id` = `d`.`angsuran_group_id`))) GROUP BY `a`.`angsuran_id` ORDER BY `a`.`group_id` ASC, `b`.`nama_lengkap` ASC  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`anggota_id`);

--
-- Indeks untuk tabel `tbl_angsuran`
--
ALTER TABLE `tbl_angsuran`
  ADD PRIMARY KEY (`angsuran_id`);

--
-- Indeks untuk tabel `tbl_group_angsuran`
--
ALTER TABLE `tbl_group_angsuran`
  ADD PRIMARY KEY (`angsuran_group_id`);

--
-- Indeks untuk tabel `tbl_jenis_pinjaman`
--
ALTER TABLE `tbl_jenis_pinjaman`
  ADD PRIMARY KEY (`jenis_pinjaman_id`);

--
-- Indeks untuk tabel `tbl_jenis_simpanan`
--
ALTER TABLE `tbl_jenis_simpanan`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  ADD PRIMARY KEY (`pengeluaran_id`);

--
-- Indeks untuk tabel `tbl_pinjaman`
--
ALTER TABLE `tbl_pinjaman`
  ADD PRIMARY KEY (`kode_pinjaman`),
  ADD KEY `jumlah_pinjaman` (`jumlah_pinjaman`);

--
-- Indeks untuk tabel `tbl_simpanan`
--
ALTER TABLE `tbl_simpanan`
  ADD PRIMARY KEY (`id_simpanan`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `anggota_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT untuk tabel `tbl_angsuran`
--
ALTER TABLE `tbl_angsuran`
  MODIFY `angsuran_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_group_angsuran`
--
ALTER TABLE `tbl_group_angsuran`
  MODIFY `angsuran_group_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis_pinjaman`
--
ALTER TABLE `tbl_jenis_pinjaman`
  MODIFY `jenis_pinjaman_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis_simpanan`
--
ALTER TABLE `tbl_jenis_simpanan`
  MODIFY `id_jenis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  MODIFY `pengeluaran_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `tbl_simpanan`
--
ALTER TABLE `tbl_simpanan`
  MODIFY `id_simpanan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

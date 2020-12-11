-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2020 pada 09.24
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_berita_smk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berlangganan`
--

CREATE TABLE `tb_berlangganan` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_berlangganan`
--

INSERT INTO `tb_berlangganan` (`id`, `email`) VALUES
(1, 'ideapedyudi@gmail.com'),
(4, 'wahyudiwebtech@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `nik` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nama_karyawan` varchar(45) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tmp_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status` enum('ketua','guru','staf') NOT NULL,
  `mengajar` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`nik`, `foto`, `nama_karyawan`, `jk`, `tmp_lahir`, `tgl_lahir`, `status`, `mengajar`, `alamat`, `no_hp`) VALUES
(1243534, 'team-member.jpg', 'qomariyah', 'P', 'jakarta', '2017-11-06', 'guru', 'Olahraga', 'jakarta', '534667458'),
(12345678, 'man1.jpg', 'erik wibowo', 'P', 'Pekalongan', '2017-11-21', 'guru', 'IPS', 'Kajen', '43453644');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategoripost`
--

CREATE TABLE `tb_kategoripost` (
  `id_kat` int(5) NOT NULL,
  `kategori_post` varchar(30) NOT NULL,
  `slug_katpost` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategoripost`
--

INSERT INTO `tb_kategoripost` (`id_kat`, `kategori_post`, `slug_katpost`) VALUES
(1, 'Kesehatan', 'kesehatan'),
(2, 'Peristiwa', 'peristiwa'),
(3, 'Prestasi Siswa', 'Prestasi Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `menu`) VALUES
(1, 'Profil'),
(2, 'Visi dan Misi'),
(3, 'Struktur Organisasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menudetail`
--

CREATE TABLE `tb_menudetail` (
  `id_md` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `isi_menu` text NOT NULL,
  `slug_menu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_menudetail`
--

INSERT INTO `tb_menudetail` (`id_md`, `id_menu`, `isi_menu`, `slug_menu`) VALUES
(1, 1, 'Isi menu profil', 'profil'),
(2, 2, 'Isi menu Visi dan Misi', 'visimisi'),
(3, 3, 'Isi menu Struktur Organisasi', 'strukturorganisasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_post`
--

CREATE TABLE `tb_post` (
  `id_post` int(11) NOT NULL,
  `id_kat` int(11) NOT NULL,
  `tgl_post` date NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `gambar_berita` varchar(20) NOT NULL,
  `deskripsi_berita` text NOT NULL,
  `kategori_berita` varchar(225) NOT NULL,
  `isi_berita` text NOT NULL,
  `id_user` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_post`
--

INSERT INTO `tb_post` (`id_post`, `id_kat`, `tgl_post`, `judul_berita`, `gambar_berita`, `deskripsi_berita`, `kategori_berita`, `isi_berita`, `id_user`) VALUES
(342, 1, '2020-08-18', 'Kesehatan Siswa dan Guru', 'padusa.jpg', 'kesehatan adalah karunia terbaik dari tuhan...', 'kesehatan', 'SEMARANG - Gubernur Jawa Tengah Ganjar Pranowo mengingatkan para guru yang mengajar daring dari sekolah untuk memperhatikan protokol kesehatan.  Dia juga meminta kepada kepala sekolah dan guru untuk menyiapkan Satgas Jogo Sekolah untuk mengawasi dan memantau kepatuhan protokol.  &quot;Bapak-Ibu semuanya, kalau di dalam ruangan tolong jendelanya dibuka, setelah satu jam bisa keluar ruangan dulu, kalau perlu pasang alat steril udara. Mejanya juga kalau bisa disorot atau dibersihkan sendiri-sendiri tiap hari,&quot; kata Ganjar saat melakukan sidak di SMA 1 Semarang, Rabu (29/7/2020). Terkait keprotokolan itu, Ganjar menyampaikan kepada para guru bahwa beberapa hal seperti pemakaian masker saat di dalam ruangan juga dianjurkan dan mulai membiasakan diri tidak membuka masker saat berbicara dengan orang lain.  Ia juga menyarankan agar petugas keamanan di gerbang juga melakukan pengecekan kepada setiap ada orang yang hendak masuk.&quot;Masker dan hand sanitizer ini kita sudah lumayan bagus. Tapi jaga jarak ini yang kita masih belum bagus, kadang masih ada yang saling berdekatan atau bahkan nempel saat kumpul. Kalau bicara juga tidak usah dekat-dekat, dari jauh saja, agak teriak tidak apa-apa. Apalagi Semarang ini covidnya masih naik-turun,&quot; ungkap Ganjar mengenai kebiasaan baru yang harus dilakukan. Hal lain yang disampaikan Ganjar dalam inspeksi mendadak itu adalah terkait Satgas Jogo Sekolah. Jogo Sekolah ini diharapkan ada di setiap sekolah untuk saling mengawasi dan memantau kepatuhan protokol. Ia juga meminta kepada sekolah untuk mulai persiapkan kesiapan sekolah untuk menghadapi kemungkinan jika sekolah harus masuk.  &quot;Jogo Sekolah ini perlu untuk mengawasi. Mulai juga cek kesiapan sekolah apabila mungkin nanti entah kapan sekolah masuk. Siapkan kalau siswa masuk semua gimana, kalau sebagian gimana prosesnya. Lalu bagaimana ketika anak-anak di jalan atau di transportasi umum dan saat berkumpul dengan temannya. Ini harus diperhatikan betul,&quot; ujarnya. Sementara terkait proses belajar daring di SMAN 11 Semarang relatif tidak ada masalah. Beberapa kendala yang sempat muncul seperti kuota dan anak yang tidak memiliki fasilitas gawai sementara ini sudah teratasi.  Misalnya untuk kesulitan kuota, pihak sekolah memberikan bantuan berupa voucher internet senilai Rp50.000. Dari data sekolah ada sekitar 130an anak yang mendapat bantuan yang bersumber dari dana BOS dan BOP tersebut.  Untuk yang tidak memiliki gawai ada seorang siswa yang dipinjami smartphone milik kepala sekolah dan seorang siswa yang dipinjami laptop milik sekolah. Bantuan itu agar siswa dapat mengakses internet dan mengikuti kegiatan belajar mengajar (KBM) secara daring.  Beberapa hari lalu Ganjar juga melihat proses KBM daring di SMAN 5 Semarang dan SMKN 7 Semarang. Di dua sekolah itu juga ada pemberian bantuan untuk kuota internet yang bersumber dari BOS dan BOP. Bahkan di SMAN 5 Semarang, siswa yang tidak memiliki smartphone juga dipinjami laptop milik sekolah.  &quot;Sekolah kan punya laptop untuk laboratorium TI, itu saja digunakan atau dipinjamkan dulu kepada anak yang tidak memiliki HP,&quot; kata Ganjar. (k28)', 'ID003'),
(432, 3, '2020-09-03', 'hadrah smkn 1 gending tampil gemilang', 'hadrah.jpg', 'kelompok hadrah smkn 1 gendig tampil gemilang pada acara perpisahan siswa tahun 2020...', 'Prestasi Siswa', 'Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Ullam laudantium eligendi quas quo iure in a enim atque fugiat tempora? Voluptatem quia in porro non nihil possimus vero voluptatum repellat ipsum. Aliquid quo neque pariatur dicta, est molestiae fuga minus quam optio omnis, quisquam! Exercitationem eaque, excepturi officia fugiat quam, aspernatur perspiciatis veritatis expedita, nemo illo iure doloremque dolores molestias consectetur itaque nam recusandae dolor maiores earum nihil placeat necessitatibus distinctio sunt aperiam! Pariatur architecto repellendus, dicta rerum beatae, et eos nesciunt numquam, doloremque quaerat autem modi neque. Perspiciatis, explicabo vel exercitationem aut. Recusandae magnam voluptas, tempora labore, unde rerum atque hic vero, assumenda minima, aut. Nemo eos maiores cum inventore ipsam nam odio tenetur quis obcaecati nulla itaque nostrum, eaque temporibus error minima saepe ullam reiciendis vitae culpa repellat quo est recusandae dignissimos expedita dolore! Inventore porro eos odio? Fugiat expedita et eius ducimus rerum eaque delectus necessitatibus aliquid quae nostrum, quisquam mollitia hic illo unde sequi est incidunt cumque nam blanditiis iusto eos, voluptatibus assumenda quasi. Molestias hic beatae deleniti libero animi quaerat reprehenderit distinctio sed consequatur vero suscipit, quae temporibus, eum at optio exercitationem cumque consequuntur? Odit qui, blanditiis. Cupiditate cum maxime ipsa architecto corrupti fugiat ullam porro laborum vel hic, tempore aperiam necessitatibus adipisci quas, minus dolorum excepturi expedita exercitationem dolores, nostrum et veniam, vitae libero? Veritatis quam maiores dolorum nihil id vero ipsum cumque sunt, fugiat, molestiae. Dolore repellat magnam aperiam corporis, nemo quibusdam quidem porro impedit assumenda et tenetur repudiandae qui earum odio fuga error vel vero amet iste minus ipsam officiis. Consequuntur quod corporis quibusdam dolor natus, ea animi sint sapiente numquam. Aliquid ipsum nihil nam voluptatibus voluptatem molestias nobis exercitationem. Optio repellendus temporibus quae explicabo placeat sed deserunt fugiat, culpa reprehenderit dignissimos. Qui sapiente doloremque corrupti praesentium est optio a hic in quia dolore earum consectetur illo omnis laborum quae ad modi quo illum nobis similique, neque tenetur? Dolor possimus, nemo voluptates consequuntur quam illo officia, laborum soluta porro doloremque odit, ratione aut fuga magni provident sit hic culpa blanditiis dignissimos et facere est cum alias. Eaque aliquam, consequatur quo asperiores consectetur laborum cupiditate. Vero, officiis sit autem soluta facere nulla molestiae, officia cum mollitia explicabo dolorem odit modi consequuntur rerum error assumenda repudiandae provident praesentium id minima dolor. Aut libero sapiente quo ducimus vel voluptatum, ipsum debitis, suscipit, alias quas veniam delectus? Itaque in reprehenderit animi excepturi ipsam ipsum consectetur, nesciunt deleniti beatae expedita, laboriosam unde aut ex illo molestiae! Odit dicta atque, deserunt eaque voluptates autem? Ex, omnis. Tempora ad ipsum rerum. Ab, cumque, culpa. Illo maiores hic deleniti eveniet, commodi adipisci voluptatum aspernatur, suscipit ex ipsa error a minus explicabo ab doloremque voluptate fugit vero quas rem odio ipsam praesentium! Tempore pariatur, nobis nisi. Cumque repellendus doloremque esse deleniti ea error asperiores odio soluta facere enim vitae, ipsam velit, alias excepturi et magni nisi sint doloribus in rerum officia. Dicta atque enim harum laudantium incidunt veniam inventore similique commodi corporis quia repellat facere aperiam consequatur, voluptate, aut, nemo tempora quo. Magni incidunt sint exercitationem, at pariatur facere reprehenderit fuga deserunt iure perspiciatis quibusdam necessitatibus est laborum unde, possimus odit. Ab id pariatur quam temporibus odio ratione molestiae, rerum saepe recusandae sequi beatae assumenda commodi nostrum officiis quibusdam iste sunt, ipsam in maxime. Dignissimos ut tempora quasi maiores corporis tenetur sequi veniam ab dolorum totam, accusamus ducimus aliquam, aperiam omnis, fugiat ipsam perferendis! Magnam fugit nobis error recusandae quo et a, quam explicabo cum maxime minima incidunt qui temporibus repellat reiciendis praesentium ad? Sint, delectus quas reprehenderit minima laudantium, officiis et corrupti explicabo magni provident repellendus, perspiciatis temporibus facilis tempore ea. Esse at pariatur dicta optio amet nostrum nam inventore nobis doloribus ut, odit dolores ullam necessitatibus vitae et quaerat itaque eius ipsa enim quod recusandae saepe, quisquam delectus porro? Molestiae et harum, a excepturi error tenetur, exercitationem dolor itaque ullam odio, quos facere unde repellendus temporibus, vel. Laboriosam, amet recusandae corporis error neque, tenetur quod distinctio provident impedit consectetur exercitationem consequatur nam maxime ab, perferendis dicta officia illo molestiae. Eveniet praesentium omnis aut architecto, officia quasi, libero accusamus ducimus commodi nobis quam quis molestias a enim quas non dolore eos quisquam corrupti eligendi fugiat harum error culpa, perferendis? Officia recusandae ullam vitae atque nesciunt adipisci consequatur aut enim quis mollitia officiis consectetur quo temporibus, provident ducimus doloremque fugiat harum cupiditate ipsam error ut eaque facilis corrupti. Accusantium, nulla rem, perspiciatis a alias explicabo veritatis fugit maxime repellendus. Vel, harum suscipit totam, consequuntur itaque eos blanditiis dolor placeat iure. Ullam placeat laboriosam tenetur explicabo, culpa minima, deserunt modi porro quibusdam illum blanditiis doloremque repellendus eveniet cumque numquam earum doloribus, at dolore quis aliquam distinctio consequuntur. Velit eaque repudiandae unde magni omnis amet dolorum nemo ipsam voluptas eos perferendis nulla aspernatur soluta dolore fugiat quam obcaecati, facilis, quis qui nam ratione quae ipsum expedita repellendus accusantium? Tenetur dolore accusantium et distinctio delectus praesentium, nesciunt esse minima error quasi officia in dignissimos nostrum odio ad, eum quod magnam ut possimus tempore. Eum, sunt nihil vel, quis placeat itaque sequi. Est illum quo amet deserunt, sequi! Culpa reiciendis odit pariatur deserunt ut saepe hic nulla aperiam? Explicabo, optio maxime ipsum perspiciatis numquam debitis assumenda, voluptatibus eaque dolores exercitationem nam non voluptatem. Aliquam debitis rerum dolorum qui reiciendis eum cupiditate labore temporibus repellendus culpa quibusdam quos nobis eaque delectus, eius dolore quasi, repudiandae quas repellat ex. Doloribus ratione odit dignissimos laboriosam magnam velit. Quo laborum labore eos corporis nostrum quisquam perspiciatis cumque quasi sed quaerat vitae odio minus, dolorem natus molestias? Similique explicabo delectus expedita quod asperiores enim molestias ipsum hic. Voluptatum, quam. Repudiandae doloremque eligendi recusandae et modi corporis voluptatem qui, hic dignissimos consectetur similique? Repellendus, neque assumenda saepe eaque error sit eum nostrum dolores quisquam sint, provident nesciunt ad iste ratione natus nam necessitatibus similique ipsa vitae. Ducimus eveniet dolores possimus cumque corrupti, facilis laborum fugit quod totam molestiae atque odio, temporibus! Vel vitae corporis numquam quisquam quod, velit maiores necessitatibus in doloribus illo nesciunt, mollitia blanditiis porro saepe, sunt? Quasi quo placeat corrupti minus delectus dignissimos a in quos! Saepe minima ratione ab rerum dolorem, voluptatum sequi dicta totam eligendi. Repellat fuga sapiente sunt odit voluptatem amet, alias pariatur, quibusdam, id tempora assumenda nemo modi a neque unde accusantium aspernatur incidunt tempore sed ducimus quaerat nisi enim nobis quisquam officiis? Reprehenderit hic maiores dolore exercitationem? Dolor expedita eum, aut ipsum, porro quidem dignissimos doloribus necessitatibus pariatur. Nobis voluptate odio incidunt accusantium quidem fugit voluptatibus sequi hic rerum nam cumque, maxime at quia, molestiae, ex. Provident, animi veritatis itaque quos tenetur eos temporibus, consectetur eius voluptate neque. Sapiente, ullam delectus eaque magnam odit iste quis sed inventore aliquam aspernatur? Temporibus voluptate nam consequatur voluptatem dolor, iure placeat deserunt. Dolores, vitae! Explicabo ad perspiciatis unde blanditiis a sunt, eos praesentium cumque hic facilis incidunt nesciunt, sapiente voluptas voluptatum. Molestiae, dicta. Recusandae assumenda odit inventore, ab dolorem nam, doloribus consectetur nemo voluptatibus vitae doloremque beatae aliquid officiis aspernatur, debitis, fugit consequatur animi optio delectus tempore deleniti voluptates similique? Omnis quis repellat, accusamus adipisci incidunt similique quas reiciendis, labore nostrum quos molestiae ullam. Animi magnam in nemo iusto? Nihil sit qui unde nemo alias, vitae tempora numquam, corrupti, dolore ab illum esse nam dicta eos.', 'ID001'),
(632, 2, '2020-09-03', '8 tips lomba lks web tecnology agar jadi juara', 'lks.jpg', 'LKS (Lomba Kompetensi Siswa) lomba yang diadakan di seluruh daerah indonesia oleh kementreian Pendidikan dan Kebudayaan....', 'Peristiwa', 'Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Ullam laudantium eligendi quas quo iure in a enim atque fugiat tempora? Voluptatem quia in porro non nihil possimus vero voluptatum repellat ipsum. Aliquid quo neque pariatur dicta, est molestiae fuga minus quam optio omnis, quisquam! Exercitationem eaque, excepturi officia fugiat quam, aspernatur perspiciatis veritatis expedita, nemo illo iure doloremque dolores molestias consectetur itaque nam recusandae dolor maiores earum nihil placeat necessitatibus distinctio sunt aperiam! Pariatur architecto repellendus, dicta rerum beatae, et eos nesciunt numquam, doloremque quaerat autem modi neque. Perspiciatis, explicabo vel exercitationem aut. Recusandae magnam voluptas, tempora labore, unde rerum atque hic vero, assumenda minima, aut. Nemo eos maiores cum inventore ipsam nam odio tenetur quis obcaecati nulla itaque nostrum, eaque temporibus error minima saepe ullam reiciendis vitae culpa repellat quo est recusandae dignissimos expedita dolore! Inventore porro eos odio? Fugiat expedita et eius ducimus rerum eaque delectus necessitatibus aliquid quae nostrum, quisquam mollitia hic illo unde sequi est incidunt cumque nam blanditiis iusto eos, voluptatibus assumenda quasi. Molestias hic beatae deleniti libero animi quaerat reprehenderit distinctio sed consequatur vero suscipit, quae temporibus, eum at optio exercitationem cumque consequuntur? Odit qui, blanditiis. Cupiditate cum maxime ipsa architecto corrupti fugiat ullam porro laborum vel hic, tempore aperiam necessitatibus adipisci quas, minus dolorum excepturi expedita exercitationem dolores, nostrum et veniam, vitae libero? Veritatis quam maiores dolorum nihil id vero ipsum cumque sunt, fugiat, molestiae. Dolore repellat magnam aperiam corporis, nemo quibusdam quidem porro impedit assumenda et tenetur repudiandae qui earum odio fuga error vel vero amet iste minus ipsam officiis. Consequuntur quod corporis quibusdam dolor natus, ea animi sint sapiente numquam. Aliquid ipsum nihil nam voluptatibus voluptatem molestias nobis exercitationem. Optio repellendus temporibus quae explicabo placeat sed deserunt fugiat, culpa reprehenderit dignissimos. Qui sapiente doloremque corrupti praesentium est optio a hic in quia dolore earum consectetur illo omnis laborum quae ad modi quo illum nobis similique, neque tenetur? Dolor possimus, nemo voluptates consequuntur quam illo officia, laborum soluta porro doloremque odit, ratione aut fuga magni provident sit hic culpa blanditiis dignissimos et facere est cum alias. Eaque aliquam, consequatur quo asperiores consectetur laborum cupiditate. Vero, officiis sit autem soluta facere nulla molestiae, officia cum mollitia explicabo dolorem odit modi consequuntur rerum error assumenda repudiandae provident praesentium id minima dolor. Aut libero sapiente quo ducimus vel voluptatum, ipsum debitis, suscipit, alias quas veniam delectus? Itaque in reprehenderit animi excepturi ipsam ipsum consectetur, nesciunt deleniti beatae expedita, laboriosam unde aut ex illo molestiae! Odit dicta atque, deserunt eaque voluptates autem? Ex, omnis. Tempora ad ipsum rerum. Ab, cumque, culpa. Illo maiores hic deleniti eveniet, commodi adipisci voluptatum aspernatur, suscipit ex ipsa error a minus explicabo ab doloremque voluptate fugit vero quas rem odio ipsam praesentium! Tempore pariatur, nobis nisi. Cumque repellendus doloremque esse deleniti ea error asperiores odio soluta facere enim vitae, ipsam velit, alias excepturi et magni nisi sint doloribus in rerum officia. Dicta atque enim harum laudantium incidunt veniam inventore similique commodi corporis quia repellat facere aperiam consequatur, voluptate, aut, nemo tempora quo. Magni incidunt sint exercitationem, at pariatur facere reprehenderit fuga deserunt iure perspiciatis quibusdam necessitatibus est laborum unde, possimus odit. Ab id pariatur quam temporibus odio ratione molestiae, rerum saepe recusandae sequi beatae assumenda commodi nostrum officiis quibusdam iste sunt, ipsam in maxime. Dignissimos ut tempora quasi maiores corporis tenetur sequi veniam ab dolorum totam, accusamus ducimus aliquam, aperiam omnis, fugiat ipsam perferendis! Magnam fugit nobis error recusandae quo et a, quam explicabo cum maxime minima incidunt qui temporibus repellat reiciendis praesentium ad? Sint, delectus quas reprehenderit minima laudantium, officiis et corrupti explicabo magni provident repellendus, perspiciatis temporibus facilis tempore ea. Esse at pariatur dicta optio amet nostrum nam inventore nobis doloribus ut, odit dolores ullam necessitatibus vitae et quaerat itaque eius ipsa enim quod recusandae saepe, quisquam delectus porro? Molestiae et harum, a excepturi error tenetur, exercitationem dolor itaque ullam odio, quos facere unde repellendus temporibus, vel. Laboriosam, amet recusandae corporis error neque, tenetur quod distinctio provident impedit consectetur exercitationem consequatur nam maxime ab, perferendis dicta officia illo molestiae. Eveniet praesentium omnis aut architecto, officia quasi, libero accusamus ducimus commodi nobis quam quis molestias a enim quas non dolore eos quisquam corrupti eligendi fugiat harum error culpa, perferendis? Officia recusandae ullam vitae atque nesciunt adipisci consequatur aut enim quis mollitia officiis consectetur quo temporibus, provident ducimus doloremque fugiat harum cupiditate ipsam error ut eaque facilis corrupti. Accusantium, nulla rem, perspiciatis a alias explicabo veritatis fugit maxime repellendus. Vel, harum suscipit totam, consequuntur itaque eos blanditiis dolor placeat iure. Ullam placeat laboriosam tenetur explicabo, culpa minima, deserunt modi porro quibusdam illum blanditiis doloremque repellendus eveniet cumque numquam earum doloribus, at dolore quis aliquam distinctio consequuntur. Velit eaque repudiandae unde magni omnis amet dolorum nemo ipsam voluptas eos perferendis nulla aspernatur soluta dolore fugiat quam obcaecati, facilis, quis qui nam ratione quae ipsum expedita repellendus accusantium? Tenetur dolore accusantium et distinctio delectus praesentium, nesciunt esse minima error quasi officia in dignissimos nostrum odio ad, eum quod magnam ut possimus tempore. Eum, sunt nihil vel, quis placeat itaque sequi. Est illum quo amet deserunt, sequi! Culpa reiciendis odit pariatur deserunt ut saepe hic nulla aperiam? Explicabo, optio maxime ipsum perspiciatis numquam debitis assumenda, voluptatibus eaque dolores exercitationem nam non voluptatem. Aliquam debitis rerum dolorum qui reiciendis eum cupiditate labore temporibus repellendus culpa quibusdam quos nobis eaque delectus, eius dolore quasi, repudiandae quas repellat ex. Doloribus ratione odit dignissimos laboriosam magnam velit. Quo laborum labore eos corporis nostrum quisquam perspiciatis cumque quasi sed quaerat vitae odio minus, dolorem natus molestias? Similique explicabo delectus expedita quod asperiores enim molestias ipsum hic. Voluptatum, quam. Repudiandae doloremque eligendi recusandae et modi corporis voluptatem qui, hic dignissimos consectetur similique? Repellendus, neque assumenda saepe eaque error sit eum nostrum dolores quisquam sint, provident nesciunt ad iste ratione natus nam necessitatibus similique ipsa vitae. Ducimus eveniet dolores possimus cumque corrupti, facilis laborum fugit quod totam molestiae atque odio, temporibus! Vel vitae corporis numquam quisquam quod, velit maiores necessitatibus in doloribus illo nesciunt, mollitia blanditiis porro saepe, sunt? Quasi quo placeat corrupti minus delectus dignissimos a in quos! Saepe minima ratione ab rerum dolorem, voluptatum sequi dicta totam eligendi. Repellat fuga sapiente sunt odit voluptatem amet, alias pariatur, quibusdam, id tempora assumenda nemo modi a neque unde accusantium aspernatur incidunt tempore sed ducimus quaerat nisi enim nobis quisquam officiis? Reprehenderit hic maiores dolore exercitationem? Dolor expedita eum, aut ipsum, porro quidem dignissimos doloribus necessitatibus pariatur. Nobis voluptate odio incidunt accusantium quidem fugit voluptatibus sequi hic rerum nam cumque, maxime at quia, molestiae, ex. Provident, animi veritatis itaque quos tenetur eos temporibus, consectetur eius voluptate neque. Sapiente, ullam delectus eaque magnam odit iste quis sed inventore aliquam aspernatur? Temporibus voluptate nam consequatur voluptatem dolor, iure placeat deserunt. Dolores, vitae! Explicabo ad perspiciatis unde blanditiis a sunt, eos praesentium cumque hic facilis incidunt nesciunt, sapiente voluptas voluptatum. Molestiae, dicta. Recusandae assumenda odit inventore, ab dolorem nam, doloribus consectetur nemo voluptatibus vitae doloremque beatae aliquid officiis aspernatur, debitis, fugit consequatur animi optio delectus tempore deleniti voluptates similique? Omnis quis repellat, accusamus adipisci incidunt similique quas reiciendis, labore nostrum quos molestiae ullam. Animi magnam in nemo iusto? Nihil sit qui unde nemo alias, vitae tempora numquam, corrupti, dolore ab illum esse nam dicta eos.', 'ID002'),
(843, 3, '2020-08-18', 'Siswa tebaik jurusan RPL', 'rpl.jpg', 'setiap tahunnya kita mengadakan perpisahan kelas 12 dalam wakru sakral tersebut kami memeilih siswa lulusan terbaik unntuk jurusan RPL...', 'prestasi siswa', 'Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Ullam laudantium eligendi quas quo iure in a enim atque fugiat tempora? Voluptatem quia in porro non nihil possimus vero voluptatum repellat ipsum. Aliquid quo neque pariatur dicta, est molestiae fuga minus quam optio omnis, quisquam! Exercitationem eaque, excepturi officia fugiat quam, aspernatur perspiciatis veritatis expedita, nemo illo iure doloremque dolores molestias consectetur itaque nam recusandae dolor maiores earum nihil placeat necessitatibus distinctio sunt aperiam! Pariatur architecto repellendus, dicta rerum beatae, et eos nesciunt numquam, doloremque quaerat autem modi neque. Perspiciatis, explicabo vel exercitationem aut. Recusandae magnam voluptas, tempora labore, unde rerum atque hic vero, assumenda minima, aut. Nemo eos maiores cum inventore ipsam nam odio tenetur quis obcaecati nulla itaque nostrum, eaque temporibus error minima saepe ullam reiciendis vitae culpa repellat quo est recusandae dignissimos expedita dolore! Inventore porro eos odio? Fugiat expedita et eius ducimus rerum eaque delectus necessitatibus aliquid quae nostrum, quisquam mollitia hic illo unde sequi est incidunt cumque nam blanditiis iusto eos, voluptatibus assumenda quasi. Molestias hic beatae deleniti libero animi quaerat reprehenderit distinctio sed consequatur vero suscipit, quae temporibus, eum at optio exercitationem cumque consequuntur? Odit qui, blanditiis. Cupiditate cum maxime ipsa architecto corrupti fugiat ullam porro laborum vel hic, tempore aperiam necessitatibus adipisci quas, minus dolorum excepturi expedita exercitationem dolores, nostrum et veniam, vitae libero? Veritatis quam maiores dolorum nihil id vero ipsum cumque sunt, fugiat, molestiae. Dolore repellat magnam aperiam corporis, nemo quibusdam quidem porro impedit assumenda et tenetur repudiandae qui earum odio fuga error vel vero amet iste minus ipsam officiis. Consequuntur quod corporis quibusdam dolor natus, ea animi sint sapiente numquam. Aliquid ipsum nihil nam voluptatibus voluptatem molestias nobis exercitationem. Optio repellendus temporibus quae explicabo placeat sed deserunt fugiat, culpa reprehenderit dignissimos. Qui sapiente doloremque corrupti praesentium est optio a hic in quia dolore earum consectetur illo omnis laborum quae ad modi quo illum nobis similique, neque tenetur? Dolor possimus, nemo voluptates consequuntur quam illo officia, laborum soluta porro doloremque odit, ratione aut fuga magni provident sit hic culpa blanditiis dignissimos et facere est cum alias. Eaque aliquam, consequatur quo asperiores consectetur laborum cupiditate. Vero, officiis sit autem soluta facere nulla molestiae, officia cum mollitia explicabo dolorem odit modi consequuntur rerum error assumenda repudiandae provident praesentium id minima dolor. Aut libero sapiente quo ducimus vel voluptatum, ipsum debitis, suscipit, alias quas veniam delectus? Itaque in reprehenderit animi excepturi ipsam ipsum consectetur, nesciunt deleniti beatae expedita, laboriosam unde aut ex illo molestiae! Odit dicta atque, deserunt eaque voluptates autem? Ex, omnis. Tempora ad ipsum rerum. Ab, cumque, culpa. Illo maiores hic deleniti eveniet, commodi adipisci voluptatum aspernatur, suscipit ex ipsa error a minus explicabo ab doloremque voluptate fugit vero quas rem odio ipsam praesentium! Tempore pariatur, nobis nisi. Cumque repellendus doloremque esse deleniti ea error asperiores odio soluta facere enim vitae, ipsam velit, alias excepturi et magni nisi sint doloribus in rerum officia. Dicta atque enim harum laudantium incidunt veniam inventore similique commodi corporis quia repellat facere aperiam consequatur, voluptate, aut, nemo tempora quo. Magni incidunt sint exercitationem, at pariatur facere reprehenderit fuga deserunt iure perspiciatis quibusdam necessitatibus est laborum unde, possimus odit. Ab id pariatur quam temporibus odio ratione molestiae, rerum saepe recusandae sequi beatae assumenda commodi nostrum officiis quibusdam iste sunt, ipsam in maxime. Dignissimos ut tempora quasi maiores corporis tenetur sequi veniam ab dolorum totam, accusamus ducimus aliquam, aperiam omnis, fugiat ipsam perferendis! Magnam fugit nobis error recusandae quo et a, quam explicabo cum maxime minima incidunt qui temporibus repellat reiciendis praesentium ad? Sint, delectus quas reprehenderit minima laudantium, officiis et corrupti explicabo magni provident repellendus, perspiciatis temporibus facilis tempore ea. Esse at pariatur dicta optio amet nostrum nam inventore nobis doloribus ut, odit dolores ullam necessitatibus vitae et quaerat itaque eius ipsa enim quod recusandae saepe, quisquam delectus porro? Molestiae et harum, a excepturi error tenetur, exercitationem dolor itaque ullam odio, quos facere unde repellendus temporibus, vel. Laboriosam, amet recusandae corporis error neque, tenetur quod distinctio provident impedit consectetur exercitationem consequatur nam maxime ab, perferendis dicta officia illo molestiae. Eveniet praesentium omnis aut architecto, officia quasi, libero accusamus ducimus commodi nobis quam quis molestias a enim quas non dolore eos quisquam corrupti eligendi fugiat harum error culpa, perferendis? Officia recusandae ullam vitae atque nesciunt adipisci consequatur aut enim quis mollitia officiis consectetur quo temporibus, provident ducimus doloremque fugiat harum cupiditate ipsam error ut eaque facilis corrupti. Accusantium, nulla rem, perspiciatis a alias explicabo veritatis fugit maxime repellendus. Vel, harum suscipit totam, consequuntur itaque eos blanditiis dolor placeat iure. Ullam placeat laboriosam tenetur explicabo, culpa minima, deserunt modi porro quibusdam illum blanditiis doloremque repellendus eveniet cumque numquam earum doloribus, at dolore quis aliquam distinctio consequuntur. Velit eaque repudiandae unde magni omnis amet dolorum nemo ipsam voluptas eos perferendis nulla aspernatur soluta dolore fugiat quam obcaecati, facilis, quis qui nam ratione quae ipsum expedita repellendus accusantium? Tenetur dolore accusantium et distinctio delectus praesentium, nesciunt esse minima error quasi officia in dignissimos nostrum odio ad, eum quod magnam ut possimus tempore. Eum, sunt nihil vel, quis placeat itaque sequi. Est illum quo amet deserunt, sequi! Culpa reiciendis odit pariatur deserunt ut saepe hic nulla aperiam? Explicabo, optio maxime ipsum perspiciatis numquam debitis assumenda, voluptatibus eaque dolores exercitationem nam non voluptatem. Aliquam debitis rerum dolorum qui reiciendis eum cupiditate labore temporibus repellendus culpa quibusdam quos nobis eaque delectus, eius dolore quasi, repudiandae quas repellat ex. Doloribus ratione odit dignissimos laboriosam magnam velit. Quo laborum labore eos corporis nostrum quisquam perspiciatis cumque quasi sed quaerat vitae odio minus, dolorem natus molestias? Similique explicabo delectus expedita quod asperiores enim molestias ipsum hic. Voluptatum, quam. Repudiandae doloremque eligendi recusandae et modi corporis voluptatem qui, hic dignissimos consectetur similique? Repellendus, neque assumenda saepe eaque error sit eum nostrum dolores quisquam sint, provident nesciunt ad iste ratione natus nam necessitatibus similique ipsa vitae. Ducimus eveniet dolores possimus cumque corrupti, facilis laborum fugit quod totam molestiae atque odio, temporibus! Vel vitae corporis numquam quisquam quod, velit maiores necessitatibus in doloribus illo nesciunt, mollitia blanditiis porro saepe, sunt? Quasi quo placeat corrupti minus delectus dignissimos a in quos! Saepe minima ratione ab rerum dolorem, voluptatum sequi dicta totam eligendi. Repellat fuga sapiente sunt odit voluptatem amet, alias pariatur, quibusdam, id tempora assumenda nemo modi a neque unde accusantium aspernatur incidunt tempore sed ducimus quaerat nisi enim nobis quisquam officiis? Reprehenderit hic maiores dolore exercitationem? Dolor expedita eum, aut ipsum, porro quidem dignissimos doloribus necessitatibus pariatur. Nobis voluptate odio incidunt accusantium quidem fugit voluptatibus sequi hic rerum nam cumque, maxime at quia, molestiae, ex. Provident, animi veritatis itaque quos tenetur eos temporibus, consectetur eius voluptate neque. Sapiente, ullam delectus eaque magnam odit iste quis sed inventore aliquam aspernatur? Temporibus voluptate nam consequatur voluptatem dolor, iure placeat deserunt. Dolores, vitae! Explicabo ad perspiciatis unde blanditiis a sunt, eos praesentium cumque hic facilis incidunt nesciunt, sapiente voluptas voluptatum. Molestiae, dicta. Recusandae assumenda odit inventore, ab dolorem nam, doloribus consectetur nemo voluptatibus vitae doloremque beatae aliquid officiis aspernatur, debitis, fugit consequatur animi optio delectus tempore deleniti voluptates similique? Omnis quis repellat, accusamus adipisci incidunt similique quas reiciendis, labore nostrum quos molestiae ullam. Animi magnam in nemo iusto? Nihil sit qui unde nemo alias, vitae tempora numquam, corrupti, dolore ab illum esse nam dicta eos.', 'ID001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_post_populer`
--

CREATE TABLE `tb_post_populer` (
  `id` int(11) NOT NULL,
  `id_user_populer` char(5) NOT NULL,
  `gambar_berita_populer` varchar(225) NOT NULL,
  `judul_berita_populer` varchar(225) NOT NULL,
  `detail_berita_populer` varchar(225) NOT NULL,
  `isi_berita_populer` text NOT NULL,
  `tgl_berita_populer` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_post_populer`
--

INSERT INTO `tb_post_populer` (`id`, `id_user_populer`, `gambar_berita_populer`, `judul_berita_populer`, `detail_berita_populer`, `isi_berita_populer`, `tgl_berita_populer`) VALUES
(2, 'ID001', '5f8d3b7c6a124.jpg', 'Rekayasa Perangkat Lunak Berkarya', 'karya karya jurusan RPL dalam programming komputer', 'r itaque nam recusandae dolor maiores earum nihil placeat necessitatibus distinctio sunt aperiam! Pariatur architecto repellendus, dicta rerum beatae, et eos nesciunt numquam, doloremque quaerat autem modi neque. Perspiciatis, explicabo vel exercitationem aut. Recusandae magnam voluptas, tempora labore, unde rerum atque hic vero, assumenda minima, aut. Nemo eos maiores cum inventore ipsam nam odio tenetur quis obcaecati nulla itaque nostrum, eaque temporibus error minima saepe ullam reiciendis vitae culpa repellat quo est recusandae dignissimos expedita dolore! Inventore porro eos odio? Fugiat expedita et eius ducimus rerum eaque delectus necessitatibus aliquid quae nostrum, quisquam mollitia hic illo unde sequi est incidunt cumque nam blanditiis iusto eos, voluptatibus assumenda quasi. Molestias hic beatae deleniti libero animi quaerat reprehenderit distinctio sed consequatur vero suscipit, quae temporibus, eum at optio exercitationem cumque consequuntur? Odit qui, blanditiis. Cupiditate cum maxime ipsa architecto corrupti fugiat ullam porro laborum vel hic, tempore aperiam necessitatibus adipisci quas, minus dolorum excepturi expedita exercitationem dolores, nostrum et veniam, vitae libero? Veritatis quam maiores dolorum nihil id vero ipsum cumque sunt, fugiat, molestiae. Dolore repellat magnam aperiam corporis, nemo quibusdam', '2020-10-19'),
(18, 'ID002', '5f8d3aea2a028.jpg', 'Profile SMKN 1 Gending', 'deskripsi tentang smkn 1 gending', 'smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat smk hebat ', '2020-10-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` varchar(10) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nama_siswa` varchar(45) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tmp_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `tahun_masuk` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `foto`, `nama_siswa`, `jk`, `tmp_lahir`, `tgl_lahir`, `alamat`, `tahun_masuk`) VALUES
('121212', 'team-member.jpg', 'Novelia Anita', 'P', 'Jakarta', '2017-11-14', 'Pekalongan', 2017),
('123111', 'client3.png', 'Dimas Bayu', 'L', 'Pekalongan', '2017-11-03', 'Pekalongan', 2016);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id_slider` int(11) NOT NULL,
  `slider` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_slider`
--

INSERT INTO `tb_slider` (`id_slider`, `slider`) VALUES
(1, 'slider_one.jpg'),
(2, 'gallery2.jpg'),
(4, 'accordion1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `idb` int(11) NOT NULL,
  `id_user` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`idb`, `id_user`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'ID001', 'silvi', '$2y$10$lXj4fcIb./s8J4KVgXjxBumg8Z7.saEcjHiKHVtJoXpQkqklCeVVK', 'silvi hariyani'),
(2, 'ID002', 'mila', '$2y$10$rr8vb1qCXFpuboxd/g27puD30SapM3Mi/D9KJXk7N8GawwAXMkHde', 'mila alkamil'),
(3, 'ID003', 'farikhin', '$2y$10$zd0gHFbLmvJNxNeOtHMkXuiMCWSC8x7dDO.J2p/Drpse8x.y1aS8a', 'akhmad farikhin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_berlangganan`
--
ALTER TABLE `tb_berlangganan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `tb_kategoripost`
--
ALTER TABLE `tb_kategoripost`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indeks untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tb_menudetail`
--
ALTER TABLE `tb_menudetail`
  ADD PRIMARY KEY (`id_md`,`id_menu`);

--
-- Indeks untuk tabel `tb_post`
--
ALTER TABLE `tb_post`
  ADD PRIMARY KEY (`id_post`,`id_kat`,`id_user`);

--
-- Indeks untuk tabel `tb_post_populer`
--
ALTER TABLE `tb_post_populer`
  ADD PRIMARY KEY (`id`,`id_user_populer`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`idb`,`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_berlangganan`
--
ALTER TABLE `tb_berlangganan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_kategoripost`
--
ALTER TABLE `tb_kategoripost`
  MODIFY `id_kat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_menudetail`
--
ALTER TABLE `tb_menudetail`
  MODIFY `id_md` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_post`
--
ALTER TABLE `tb_post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=865;

--
-- AUTO_INCREMENT untuk tabel `tb_post_populer`
--
ALTER TABLE `tb_post_populer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `idb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

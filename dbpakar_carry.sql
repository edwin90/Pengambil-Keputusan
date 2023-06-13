-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 17 Okt 2014 pada 01.39
-- Versi Server: 5.6.14
-- Versi PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `dbpakar_carry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bagian`
--

CREATE TABLE IF NOT EXISTS `tb_bagian` (
  `kd_bagian` varchar(4) NOT NULL,
  `nm_bagian` varchar(35) NOT NULL,
  `kd_gejala_utama` varchar(4) NOT NULL,
  PRIMARY KEY (`kd_bagian`),
  KEY `kd_gejala_utama` (`kd_gejala_utama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bagian`
--

INSERT INTO `tb_bagian` (`kd_bagian`, `nm_bagian`, `kd_gejala_utama`) VALUES
('B001', 'Sistem Starter', 'G002'),
('B002', 'Sistem Mesin', 'G003'),
('B003', 'Sistem Bahan Bakar', 'G017'),
('B004', 'Sistem Pengapian', 'G008'),
('B005', 'Sistem Injektion', 'G009');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gejala`
--

CREATE TABLE IF NOT EXISTS `tb_gejala` (
  `kd_gejala` varchar(4) NOT NULL,
  `nm_gejala` text NOT NULL,
  PRIMARY KEY (`kd_gejala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gejala`
--

INSERT INTO `tb_gejala` (`kd_gejala`, `nm_gejala`) VALUES
('G001', 'Tegangan battery kurang dari 11 Volt'),
('G002', 'Mesin tidak bisa distarter'),
('G003', 'Mesin tidak bisa hidup'),
('G004', 'Putaran idle mesin tidak sesuai spesifikasi'),
('G005', 'Waktu pengapian tidak sesuai spesifikasi'),
('G006', 'Supply bahan bakar tidak lancar'),
('G007', 'Suara fuel pump tidak terdengar dari lubang pengisian bahan bakar sekitar 2 detik setelah kunci kontak ON dan kemudian berhenti'),
('G008', 'Tidak ada pengapian pada busi'),
('G009', 'Fuel injector tidak berfungsi dengan baik'),
('G010', 'Suara magnetic switch terdengar'),
('G011', 'Motor starter tidak berputar'),
('G012', 'Sambungan kabel kendur'),
('G013', 'Sirkuit pull-in coil pada magnetic switch putus'),
('G014', 'Motor starter berputar, tetapi tidak menstarter mesin'),
('G015', 'Motor starter berputar, tetapi terlalu lambat atau momennya kecil'),
('G016', 'Motor starter tidak dapat berhenti'),
('G017', 'Pada tangki tidak terdapat cukup bahan bakar'),
('G018', 'Tidak ada tekanan balik atau suara yang dapat dirasakan pada selang bahan bakar saat kunci kontak di-ONkan'),
('G019', 'Pengapian tidak terjadi pada semua busi'),
('G020', 'Sirkuit signal pengapian dalam kondisi tidak baik ( terdapat kabel putus, konslet, atau terbakar)'),
('G021', 'Sambungan kabel ignition coil kendur atau lepas'),
('G022', 'Tahanan kabel busi tidak sesuai spesifikasi ( Resistan kabel busi 10 - 22 k Ohm/m )'),
('G023', 'Distributor tidak bekerja dengan baik'),
('G024', 'Tahanan pada ignition coil tidak sesuai spesifikasi ( Resistan ignition coil Primary: 0.41 - 0.53 Ohm, Secondary: 7 - 9 kOhm )'),
('G025', 'Terdapat injector yang tidak mengeluarkan suara'),
('G026', 'Mesin tidak bertenaga'),
('G027', 'Keluar asap putih pada lubang kenalpot'),
('G028', 'Asap putih keluar secara terus menerus'),
('G029', 'Asap putih keluar hanya saat dilakukan akselerasi'),
('G030', 'Asap putih keluar hanya saat pagi saja'),
('G031', 'Terdapat kerak karbon pada batang katup'),
('G032', 'Terdengar bunyi tidak normal pada bagian kepala silinder'),
('G033', 'Ada kebocoran pada sambungan atau selang bahan bakar'),
('G034', 'Ada penyumbatan pada selang bahan bakar atau saluran bahan bakar'),
('G035', 'Ada udara yang masuk atau kebocoran pada sistem air intake'),
('G036', 'Terdapat rembesan oli pada sambungan blok silinder dengan kepala silinder');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kesimpulan`
--

CREATE TABLE IF NOT EXISTS `tb_kesimpulan` (
  `id_kesimpulan` int(4) NOT NULL AUTO_INCREMENT,
  `kd_rusak` varchar(4) NOT NULL,
  `kd_solusi` varchar(4) NOT NULL,
  PRIMARY KEY (`id_kesimpulan`),
  KEY `id_kesimpulan` (`id_kesimpulan`),
  KEY `kd_solusi` (`kd_solusi`),
  KEY `kd_rusak` (`kd_rusak`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `tb_kesimpulan`
--

INSERT INTO `tb_kesimpulan` (`id_kesimpulan`, `kd_rusak`, `kd_solusi`) VALUES
(1, 'K001', 'S001'),
(2, 'K002', 'S002'),
(3, 'K003', 'S003'),
(4, 'K004', 'S004'),
(5, 'K005', 'S005'),
(6, 'K006', 'S006'),
(7, 'K007', 'S004'),
(8, 'K008', 'S007'),
(9, 'K009', 'S008'),
(10, 'K010', 'S009'),
(11, 'K011', 'S010'),
(12, 'K012', 'S011'),
(13, 'K013', 'S012'),
(14, 'K014', 'S013'),
(15, 'K015', 'S014'),
(16, 'K016', 'S015'),
(17, 'K017', 'S016'),
(18, 'K018', 'S017'),
(19, 'K019', 'S018'),
(20, 'K020', 'S019'),
(21, 'K021', 'S020'),
(22, 'K022', 'S021'),
(23, 'K023', 'S022'),
(24, 'K024', 'S023'),
(25, 'K025', 'S024');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_langkah`
--

CREATE TABLE IF NOT EXISTS `tb_langkah` (
  `kd_langkah` varchar(4) NOT NULL,
  `nm_langkah` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `urutan` varchar(2) NOT NULL,
  `kd_solusi` varchar(4) NOT NULL,
  PRIMARY KEY (`kd_langkah`),
  KEY `kd_solusi` (`kd_solusi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_langkah`
--

INSERT INTO `tb_langkah` (`kd_langkah`, `nm_langkah`, `gambar`, `urutan`, `kd_solusi`) VALUES
('L001', 'Pemeriksaan pada busi:<br/>\n* Lepas busi dari cylinder head.<br/>\n* Periksa apakah busi memercikkan bunga api.<br/>\n* Jika tidak ada percikan, ganti busi dengan tipe yang sama.<br/>\n* Pasang busi ke cylinder head.', 'gbr_api-busi-44436.jpg', '1', 'S017'),
('L002', 'Lepas kabel busi (3) dari  ignition coil assy. dengan memegang capnya.', 'gbr_kabel-busi-92205.jpg', '1', 'S012'),
('L003', 'Pemeriksaan kabel busi:<br/>\n* Ukur tahanan kabel busi No.1 (1) dan No.3 (2) dengan menggunakan ohmmeter. Jika tahanan tidak sesuai spesifikasi, ganti kabel busi.<br/>\n* <b>Tahanan kabel busi (No.1) 1.2 - 3.2 Ohm, Tahanan kabel busi (No.3) 0.5 - 1.6 Ohm</b>.<br/>\n* Pasang kabel busi.\n', 'gbr_cek-kabel-busi-18365.jpg', '2', 'S012'),
('L004', 'Melepas ignition coil dari mesin:<br/>\n* Lepas soket ignition coil dari pengapian coil assy.<br/>\n* Lepas baut-baut pengapian coil dan tarik ignition coil\nassy, dari cylinder head cover.', 'gbr_kabel-busi-61386.jpg', '1', 'S014'),
('L005', 'Pemeriksaan ignition coil:<br/>\n* Ukur tahanan lilitan secondar dengan menggunakan ohmmeter.Jika tahanan tidak sesuai spesifikasi, ganti ignition coil assy.<br/>\n* <b>Tahanan lilitan sekunder 7.1 - 9.5 kilo Ohm</b>\n', 'gbr_cek-coil-86572.jpg', '2', 'S014'),
('L006', 'Penggantian fuel pump:<br/>\n* Lepas fuel pump assy. (1) dari fuel tank (2).<br/>\n* Bersihkan permukaan antara fuel pump assy. (1) dan tangki bahan bakar.<br/>\n* Pasang gasket baru dan fuel pump assy dengan\nplate ke fuel tank.', 'gbr_fuel-pump-49050.jpg', '1', 'S010'),
('L007', 'Periksa saluran dari kebocoran bahan bakar, selang yang retak atau rusak. Pastikan semua klem terpasang dengan baik. Ganti komponen jika perlu.', 'gbr_saluran-bbm-32659.jpg', '1', 'S023'),
('L008', 'Pemasangan piston ring ke piston:<br/>\n* Perhatikan ukuran ring pertama (1) dari ring kedua (2) seperti pada gambar.<br/>\n* Seperti pada gambar, ring  pertama dan kedua memiliki\ntanda masing-masing (4).<br/>\n* Ketika memasang piston ring ke piston, arahkan tanda ke\nbagian atas piston.<br/>\n* Ketika memasang oil ring (3), pasang spacer terlebih dahulu dan kemudian kedua railnya.\n', 'gbr_susunan-ring-6872.jpg', '1', 'S018'),
('L009', 'Perbaikan dudukan valve:<br/>\n* Dudukan valve tidak membentuk pola gesekan yang\nseragam pada valve atau jika ada jarak tidak sesuai spesifikasi harus diperbaiki dengan cara menggerinda atau dipotong dan gerinda kembali, dan diakhiri dengan proses lapping.', 'gbr_skure-dudukan-value-18032.jpg', '1', 'S019'),
('L010', 'Mengukur jumlah oli pada oil pan:<br/>\n* Jika jumlahnya sedikit (berada di posisi lower), tambahkan hingga tanda penuh (1) atau (level di posisi upper).<br/>\nMengukur kualitas oli:<br/>\n* Jika oli berubah warna atau tercampur, ganti.<br/>\nKebocoran oli:<br/>\n* Jika ada kebocoran, perbaiki.', 'gbr_oli-level-82940.jpg', '1', '-'),
('L011', 'Pemeriksaan komponen pompa oli:<br/>\n* Periksa bibir oil seal dari kerusakan. Ganti jika perlu.<br />\n* Periksa outer dan inner rotor, rotor plate, dan oil pump case dari aus atau rusak.<br />\n* Periksa celah radial antara outer rotor (1) dan case (2) dengan menggunakan thickness gauge.Jika celah melebihi limit, ganti outer rotor atau case.<br />\n* Periksa celah samping dengan menggunakan mistar baja(1) dan thickness gauge.', 'gbr_bagian-oil-pump-37582.jpg', '1', '-'),
('L012', 'Pemasangan valve spring dan spring retainer:<br />\n* Setiap valve spring memiliki ujung atas (ujung besar (1)) dan ujung bawah (ujung kecil (2)). Pastikan posisi spring sudah benar dengan ujung bawahnya (sisi valve spring retainer (3)) menghadap ke bawah (sisi valve spring seat (4)).', 'gbr_valve-spring-79467.jpg', '1', 'S022'),
('L013', 'Pemeriksaan radiator dari kebocoran atau damage. Jika terdapat kebocoran, perbaiki atau ganti.', 'gbr_cek-radiator-12161.jpg', '1', '-'),
('L014', 'Pemeriksaan tutup radiator:<br/>\n* Periksa karet seal pada tutup radiator.<br />\n* Periksa pegas pada tutup radiator, jika sudah lemah, ganti.', 'gbr_ttp-radiator-39816.jpg', '1', '-'),
('L015', 'Pemeriksaan termostat:<br/>\n* Pastikan air bleed valve (1) pada thermostat kondisinya bersih, hal ini untuk mencegah overheat.<br />\n* Pastikan valve seat (2) bebas dari benda asing untuk mencegah valve macet.<br />\n* Periksa seal thermostat (3) dari bocor, berubah bentuk atau kerusakan lain.<br />\n* Jika valve mulai membuka pada suhu di bawah atau di atas suhu spesifikasi, ganti thermostat dengan yang baru.', 'gbr_termostat-29211.jpg', '1', '-'),
('L016', 'Pemeriksaan injector:<br/>\n* Gunakan sound scope (1) atau  sejenisnya, periksa suara injector (2) ketika mesin hidup atau saat starter. Putaran suara bervariasi sesuai putaran mesin. Jika tidak ada suara atau suaranya aneh, periksa sirkuit injector (kabel atau connector) atau injector.', 'gbr_injektor-1-69387.jpg', '1', 'S016'),
('L017', 'Pemeriksaan elektronik injector:<br/>\nv Lepas connector dari injector, pasang ohmmeter antar terminal injector dan periksa tahanan. Jika tahanan tidak sesuai spesifikasi, ganti fuel injector.<br/>\n* <b>Tahanan fuel injector: 10 - 15 Ohm pada 20 derajad C, 68 derajad F</b><br/>\n* Pasang connector ke injector dengan baik.', 'gbr_injektor-2-36883.jpg', '2', 'S016'),
('L018', 'Pemeriksaan timming pengapian:<br/>\n* Gunakan timing light (1) ke kabel busi No.1, dan kemudian\nperiksa ignition timing harus sesuai spesifikasi.', 'gbr_timing-pengapian-48605.jpg', '1', 'S007'),
('L019', 'Perbaikan kebocoran oli:<br/>\n* Bersihkan permukaan sealing pada oil pan dan cylinder block.<br />\n* Beri sealant ke seluruh permukaan oil pan seperti pada gambar.<br />\n* Pasang seal baru dengan posisi seperti semula.', 'gbr_seal-gasket-87219.jpg', '1', '-'),
('L020', 'Pemeriksaan sistem bahan bakar:<br/>\n* Sistem bahan bakar meliputi, tangki bahan bakar, selang bahan bakar, pompa bahan bakar, dll.', 'gbr_sis-bbm-38320.jpg', '1', 'S009'),
('L021', 'Pemeriksaan tekanan kompresi:<br/>\n Pasang special tool (compression gauge) pada lubang busi.<br />\n Injak pedal kopling untuk memperkecil beban pada mesin (untuk model M/T), dan tekan pedal gas untuk membuka throttle valve penuh.<br />\n Starter mesin dengan kondisi battery penuh, dan perhatikan tekanan tertinggi pada compression gauge.<br />\n Tekanan kompresi standar 1400kPa, Limit 1200kPa.', 'gbr_kompresi-tes-79483.jpg', '1', '-'),
('L022', 'Sistem pengapian terdiri dari komponen-komponen:<br />\n* ECM, Mendetekasi kondisi mesin dan kendaraan melalui sinyal dari sensor, untuk menentukan ignition timing yang tepat dan waktu mengalirnya arus listrik ke primary coil dan mengirim sinyal ke ignitor (power unit) di pengapian coil assy.<br />\n* Ignition coil assy, sebagai saklar untuk pembangkit tegangan tinggi pada coil.<br />\n* Kabel busi dan busi.', 'gbr_sis-api-18511.jpg', '1', '-'),
('L023', 'Pemeriksaan plunger:<br/>\n* Tekan masuk plunger (1) dan lepas. Plunger harus kembali dengan cepat ke posisi semula. Ganti jika perlu.', 'gbr_cek-plunger-2352.jpg', '1', 'S004'),
('L024', 'Tes Sirkuit Pull-in Coil:<br/>\n* Periksa hubungan antara switch magnetic terminal S (1) dan terminal M (2). Jika tidak terhubung,  coil putus dan terbakar, maka harus diganti.', 'gbr_pullincoil-76953.jpg', '2', 'S004'),
('L025', 'Tes Sirkuit Hold-in Coil:<br/>\n* Periksa hubungan antara magnetic switch S terminal (1) dan coil case. Jika tidak ada hubungan, coil putus maka harus diganti.', 'gbr_hollincoil-25564.jpg', '3', 'S004'),
('L026', 'Pemeriksaan kontak penghubung:<br/>\n* Saat plunger ditekan, periksa apakah switch terhubung atau tidak, jika tidak coba bersihkan kontak pada magnetik switch.', 'gbr_magnetik-switch-62094.jpg', '4', 'S004'),
('L027', 'Pemeriksaan brush dari aus:<br/>\n* Ukur panjang brush dan jika di bawah limit, ganti brush.<br />\n* <b>Panjang brush: Standar 17.0 mm, Limit 11.5 mm</b>.<br />\n* Pasang brush pada masing-masing brush holder dan periksa gerakannya.', 'gbr_panjang-brush-59664.jpg', '1', 'S006'),
('L028', 'Pemeriksaan pinion:<br/> \n* Apabila pinion aus, rusak atau kondisi abnormal lainnya. Ganti jika perlu.<br/>\n* Periksa apakah clutch mengunci saat diputar dan berputar lembut saat diputar ke arah sebaliknya. Ganti jika perlu.', 'gbr_over-running-clutch-30212.jpg', '1', 'S005'),
('L029', 'Ganti sikring, sesuai dengan nilai arus dan modelnya.', 'gbr_sekring-12075.jpg', '1', '-'),
('L030', 'Periksa sistem pengisian.', 'gbr_sis-pengisian-1245.jpg', '1', '-'),
('L031', 'Pemeriksaan sistem suspensi:<br/>\n* Memeriksa Stabilizer Bar, Stabilizer Bar Joint dan Bushing.<br />\n* Memeriksa Compression Rod dan Bushing.<br />\n* Memeriksa Strut Assembly.<br />\n* Memeriksa Control Arm Suspensi, Steering Knuckle dan Wheel Hub.<br />\n* Memeriksa Suspension Control Arm Joint.', 'gbr_sis-suspensi-35891.jpg', '1', '-'),
('L032', 'Ukuran tekanan angin ban biasanya dinyatakan dengan<br />\nkilopascal ( kPa ), pada plakat biasanya ditulis dua satuan yaitu kPa dan psi, Gunakan alat pengukur tekanan ban saat<br />\nmenambah tekanan angin.', 'gbr_ban-35809.jpg', '1', '-'),
('L033', 'Penyetelan Toe, Toe adalah putaran roda depan ke dalam (toe-in) atau ke luar (toe-out). Tujuan penyetelan ini adalah memastikan putaran paralel roda depan (toe-in atau toe-out yang terlalu besar mempercepat keausan ban).Nilai toe dapat dihasilkan dari pengurangan B dan A seperti pada gambar dalam satuan mm (in.).<br />\n<b>Standar : 0 Â± 1.5 mm.</b>', 'gbr_stel-toe-24426.jpg', '1', '-'),
('L034', 'Camber adalah penyimpangan tegak  lurus (vertical) pada roda depan yang dilihat dari posisi depan kendaraan, jika roda depan menyimpang ke arah luar pada bagian atasnya adalah camber positif sebaliknya jika roda depan menyimpang ke arah dalam pada bagian atasnya adalah camber negatif. Besaran penyimpangan dalam satuan derajat.', 'gbr_camber-43887.jpg', '2', '-'),
('L035', 'Agar keausan merata, rotasi ban secara berkala seperti pada\ngambar.', 'gbr_rotasi-ban-63580.jpg', '1', '-'),
('L036', 'Roda harus diganti bila kondisinya penyok/lingkarannya tidak bulat dan ada kebocoran udara pada bagian yang dilas atau lubang bautnya membesar serta berkarat.\nRoda dengan lingkaran yang tidak bulat/rata dapat menimbulkan getaran. Penggantian roda harus disesuaikan dengan ukuran beban, diameter, lebar velg, konfigurasi mounting dan off-set aslinya. Roda dengan ukuran tidak  sesuai ketentuan dapat mempengaruhi keawetan bearing, pendingin rem, kalibrasi\nspeedometer/odometer, jarak bodi/chasis dengan permukaan jalan.', 'gbr_roda-lepas-39804.jpg', '1', '-'),
('L037', 'Memeriksa Suspension Control Arm Joint:<br />\n* Periksa kehalusan atau kelembutan putaran.<br />\n* Periksa ball stud dari kerusakan.<br />\n* Periksa dust cover dari kerusakan.<br />\n* Periksa play ball joint. Jika rusak, ganti.', 'gbr_control-arm-84130.jpg', '1', '-'),
('L038', 'Steering gear box terdiri dari dua bagian, cylinder dan valve. Komponen utama cylinder adalah gear box (6) dan rack (7). Komponen utama valve adalah valve case (9), sleeve (3) dan stub shaft (1). Sleeve terhubung dengan pinion (5) melalui pin, valve dan stub shaft adalah satu kesatuan unit. Kemudian pinion dan stub shaft terhubung satu sama lain oleh torsion bar (2). Ketika stub shaft bergerak posisi valve akan berubah, dan minyak P/S akan mengalir dari pompa P/S ke cylinder untuk membantu memutar steer.', 'gbr_gear-box-8883.jpg', '1', '-'),
('L039', 'Pemeriksaan kebocoran pada P/S:<br/>\n* Periksa masing-masing sambungan dari kebocoran minyak dan keluarkan udara (air bleed).<br />\n* Periksa tekanan balik dengan mengukur tekanannya pada putaran mesin idle dan lepas setir.<br />\n* Periksa tekanan relief.', 'gbr_tekanan-ps-95056.jpg', '1', '-'),
('L040', 'Memeriksa minyak P/S, Dengan mesin mati, periksa jumlah minyak pada reservoir minyak P/S, jumlahnya harus di antara tanda UPPER dan LOWER. Jika kurang dari tanda LOWER, tambahkan minyak hingga tanda UPPER.', 'gbr_steering-force-80044.jpg', '1', '-'),
('L041', 'Memeriksa Steering Shaft Joint:<br/>\n* Periksa semua shaft joint dari kemungkinan aus, patah dan kerusakan lain. Jika rusak ganti dengan yang baru.', 'gbr_steering-shaft-joint-92218.jpg', '1', '-'),
('L042', 'Pemeriksaan strut:<br/>\n* Periksa strut dari kebocoran oli atau kerusakan,Jika strut rusak, ganti.<br />\n* Periksa rebound stopper dan strut mount dari keausan, retak atau berubah bentuk. Jika rusak, ganti.', 'gbr_strut-98812.jpg', '1', '-'),
('L043', 'Periksa masing-masing sambungan dari kebocoran minyak dan keluarkan udara (air bleed).', 'gbr_pipa-hidrolik-3588.jpg', '1', '-'),
('L044', 'Memeriksa Steering Gear Case:<br />\n* Periksa rack plunger dari aus atau kerusakan.<br />\n* Periksa rack plunger spring dari kerusakan.Jika ditemukan kerusakan, ganti.<br />\n* Periksa permukaan gigi pinion dari aus atau rusak.<br />\n* Periksa oil seal dari rusak.<br />\n* Ganti komponen yang rusak.<br />\n* Periksa kondisi putaran bearing dan periksa keausan. Jika ada rusak, ganti.', 'gbr_steering-gear-case-91360.jpg', '1', '-'),
('L045', 'Pemeriksaan belt:<br/>\n* Periksa belt dari kemungkinan rusak dan pemasang yang tidak sesuai pada pulley groove.<br />\n* Periksa ketegangan belt dengan mengukur berapa jauh\nkelenturannya saat ditekan di bagian tengah pulley dengan gaya/tekanan sebesar 10 kg (22 lb).<br />\n<b>Kelenturan belt pompa P/S: 8 - 9 mm (0.31 - 0.35 in.)</b>', 'gbr_belt-pompa-ps-81903.jpg', '1', '-'),
('L046', 'Pemeriksaan steering column:<br/>\n* Periksa kedua capsule dari kemungkinan rusak. Jika rusak, ganti steering column assembly.<br />\n* Ukur seperti pada gambar. Jika lebih pendek dari spesifikasi, ganti column assembly.<br />\n<b>Panjang: 497 Â± 1 mm.</b>', 'gbr_steering-coloum-5734.jpg', '1', '-'),
('L047', 'Periksa masing-masing boot dari sobek. Meskipun hanya sobek kecil, ganti dengan yang baru.', 'gbr_boot-tie-rod-end-64270.jpg', '1', '-'),
('L048', 'Periksa kerusakan atau keausan. Jika rusak, ganti.', 'gbr_control-arm-suspensi-86856.jpg', '1', '-'),
('L049', 'Periksa brake shoe dari aus. Jika keausan salah satu brake shoe mencapai batas, semua shoe harus diganti secara bersamaan.', 'gbr_break-shoes-lining-47174.jpg', '1', '-'),
('L050', 'Dengan special tool (A) pasang spring seperti pada gambar, putar baut special tool hingga tension spring lemah. Lemah atau belum diketahui dengan memutar strut perlahan saat strut spring dalam kondisi stationar.', 'gbr_pegas-lepas-51522.jpg', '1', '-'),
('L051', 'Periksa kerusakan atau aus. Jika rusak, ganti.', 'gbr_stabilizer-bar-com-61474.jpg', '1', '-'),
('L052', 'Pemeriksaan bearing:<br/>\n* Ukur thrust play bearing roda.Jika hasil pengukuran, ganti bearing.<br />\n<b>Batas thrust play: 0.1 mm (0.004 in.).</b><br />\n* Dengan memutar roda, periksa bearing roda dari noise dan putarannya. Jika rusak, ganti bearing.', 'gbr_cek-bearing-roda-63406.jpg', '1', '-'),
('L053', '* Periksa baut propeller shaft dari kemungkinan kendur. Jika ada yang kendur, kencangkan sesuai spesifikasi.<br/>\n* Periksa propeller shaft joints dari kemungkinan aus, bunyi\ndan rusak. Jika ada, ganti.', 'gbr_propeller-shaft-47406.jpg', '1', '-'),
('L054', '* Periksa propeller shaft dan flange yoke dari kerusakan.<br />\n* Periksa run-out propeller shaft. Jika ada kerusakan atau run-out shaft melebihi batas, ganti.<br />\n<b>Batas run-out propeller shaft : 1.0 mm (0.039 in.).</b>', 'gbr_cek-propeller-shaft-8053.jpg', '1', '-'),
('L055', 'Periksa jumlah minyak rem pada master cylinder. Jika jumlah minyak pada reservoir kurang dari minimum, isi kembali dengan minyak rem sesuai spesifikasi.', 'gbr_reservoir-minyak-rem-29577.jpg', '1', '-'),
('L056', '* Buka karpet dan periksa tinggi pedal rem. Jika tidak sesuai spesifikasi, periksa dan setel.<br />\n* Tinggi pedal rem dari lantai dan dash panel (tanpa sealer):  287 mm (11.3 in.)', 'gbr_gerak-bebas-pedal-67886.jpg', '1', '-'),
('L057', 'Saat pedal rem ditekan, terjadi tekanan hidrolik pada master cylinder yang akan menggerakkan piston (dua didepan dan empat di belakang).<br />\nBlend proportioning valve (BPV) terpasang pada sirkuit antara master cylinder dan rem belakang.<br />\nPada sistim rem ini, disc brake digunakan untuk rem roda depan, tromol rem (leading/trailing shoe) untuk rem roda belakang.<br />\nSistim rem tangan bekerja secara mekanik. Memberikan gaya pengereman hanya pada roda belakang saja melalui kabel dan sistim kerja mekanik. Shoe yang sama digunakan untuk pengereman.', 'gbr_mekanisme-rem-91973.jpg', '1', '-'),
('L058', 'Periksa kampas pad dari aus. Jika salah satu pad aus mencapai  limit, seluruh pad harus diganti secara bersamaan.<br />\n<b>Ketebalan pad (kampas) <br />\nStandar (a): 9.0 mm (0.354 in.)<br />\nLimit (b): 1.0 mm (0.04 in.)</b>', 'gbr_cek-kampas-97201.jpg', '1', '-'),
('L059', 'Bersihkan bagian kampas dan drum break menggunakan kain yang dibasahi dengan air.', 'gbr_break-shoes-52954.jpg', '1', '-'),
('L060', 'Lakukan bleeding untuk melepas udara yang masuk ke dalam saluran hidrolik rem. Saluran hidrolik pada sistim rem terdiri dari dua saluran, satu untuk rem depan dan lainnya untuk rem belakang. Lakukan bleeding pada rem bagian kanan dan kiri depan  dan rem kiri belakang (3 tempat).', 'gbr_blending-97171.jpg', '1', '-'),
('L061', 'Piston seal digunakan pada piston dan cylinder berfungsi untuk menyesuaikan celah antara pad dan disc.Ganti dengan yang baru setiap melakukan overhaul.', 'gbr_piston-kaliper-40252.jpg', '1', '-'),
('L062', 'Periksa shoe return spring, strut shoe return spring dan shoe hold down spring dari rusak, karat dan lemah. Jika ada yang rusak, ganti.', 'gbr_return-spring-90841.jpg', '1', '-'),
('L063', '* Periksa kebersihan tromol. Periksa keausan dengan mengukur diameter bagian dalam.<br />\n<b>Diameter dalam tromol rem<br />\nStandar: 220 mm (8.66 in.)<br />\nLimit: 222 mm (8.74 in.)</b><br />\n* Saat tromol dilepas, bersihkan seluruhnya dan periksa dari kondisi retak, gores atau bergelombang.<br />\n* Haluskan jika ada goresan. Jika goresannya terlalu dalam akan menyebabkan kampas tromol rem  menjadi aus dan jika perlu lapisi permukaan tromol rem.<br />\n* Jika kampas aus dan tromol beralur, maka tromol harus dipolish dengan menggunakan kain dan amril, tetapi tidak boleh digosok memutar.', 'gbr_cek-tromol-65979.jpg', '1', '-'),
('L064', 'Dengan menggunakan feeler gauge, periksa celah antara sleeve (1) dan gear shift fork (2). Ganti komponen jika perlu.<br />\n<b>Celah antara fork dan sleeve limit: 1.2 mm (0.047 in.).</b>', 'gbr_gear-shift-fork-84973.jpg', '1', '-'),
('L065', 'Ketebalan reverse synchronizer spring: <br />\n<b>Ketebalan: 1.3 mm (0.051 in.)<br />\nKetebalan: 1.6 mm (0.062 in.)</b>', 'gbr_sincronizering-11462.jpg', '1', '-'),
('L066', 'Clutch yang digunakan adalah tipe dry single disc. Spring diaphragma menggunakan tipe tapering-finger dengan ring solid yang terdapat pada bagian diameter luarnya, dengan susunan tapered finger/jari-jari mengarah kedalam.<br />\nTerdapat 4 coil torsional spring pada disc yang terpasang di gerigi input shaft transmisi.', 'gbr_sis-kopling-43496.jpg', '1', '-'),
('L067', 'Periksa celah antara synchronizer ring (1) dan gear (2), key slot lebar synchronizer ring dan masing-masing gigi tirus gear dan synchronizer ring. Ganti dengan yang baru jika perlu. Dan juga, periksa gigi-gigi gear.', 'gbr_gear-dog-68325.jpg', '1', '-'),
('L068', 'Isi dengan oli yang telah ditentukan hingga mencapai batas bawah lubang filler plug (3) seperti pada gambar.<br />\n* Klasifikasi SAE, lihat chart viscositas [A] seperti gambar.<br />\n* Rekomendasi untuk menggunakan API GL-4 80W-90 gear oil.<br />\n* Kapasitas oli transmisi: 1.75 liter (3.7/3.1 US/Imp. pt).', 'gbr_oli-transmisi-level-14874.jpg', '1', '-'),
('L069', 'Bersihkan semua komponen, periksa kondisi abnormal dan ganti dengan yang baru jika perlu.<br />\nBerikan oli transmisi ke permukaan bearing dan gear yang bergesekan .', 'gbr_gear-com-21002.jpg', '1', '-'),
('L070', 'Periksa  kabel clutch dan ganti jika kondisi di bawah ini terjadi.<br />\n* Kabel bergesekan<br />\n* Kabel sobek<br />\n* Kabel bengkok atau terpuntir<br />\n* Boot sobek<br />\n* Ujung kabel aus', 'gbr_kabel-kopling-68344.jpg', '1', '-'),
('L071', 'Ukur kedalaman rivet head, yakni jarak antara rivet head dan permukaan. Jika ada salah satu lubang yang melebihi limit, ganti disc assy.<br />\n<b>Kedalaman rivet head<br />\nStandar: 1.3 - 1.9 mm (0.05 - 0.07 in.)<br />\nService limit: 0.5 mm (0.02 in.)</b>', 'gbr_kopling-disk-98788.jpg', '1', '-'),
('L072', 'Pemeriksaan cover diafragma:<br/>\n* Periksa spring diaphragm  dari aus atau rusak.<br />\n* Periksa  pressure platedari aus atau hangus.<br />\n* Jika ada yang tidak normal, ganti clutch cover. Jangan dipisahkan menjadi diaphragm spring dan pressure plate (2).', 'gbr_cover-kopling-13427.jpg', '1', '-'),
('L073', '* Berikan sedikit grease ke input shaft (1), kemudian pasang transmisi assy.<br />\n* Saat memasang inputshaft  transmisi ke disc clutch, putar crankshaft  sedikit demi sedikit hingga inputshaft masuk dengan tepat.', 'gbr_input-shaft-82495.jpg', '1', '-'),
('L074', 'Bersihkan komponen sistem kopling yang terkena oli.', 'gbr_sis-kopling-com-92141.jpg', '1', '-'),
('L075', 'Untuk mengukur backlash drive bevel gear, pasang dial gauge pada gigi bevel gear dengan sudut yang benar, tepatkan drive bevel pinion, kencangkan kedua retainer dan baca dial gauge sambil menggeser bevel gear.<br />\n<b>Backlash drive gear<br />\nStandar: 0.13 - 0.20 mm (0.0052 - 0.0078 in.)<br />\nPerbedaan max.  antara dua titik: 0.05 mm (0.0019 in.)</b>', 'gbr_backlash-set-26296.jpg', '1', '-'),
('L076', 'Isi oil sesuai spesifikasi dengan jumlah seperti dibawah ini (hingga lubang oli).<br />\n* Gunakan oli SAE 80W-90.<br />\n* Oli differential, Hypoid gear oil API GL-5.<br />\n* Kapasitas oli differential 1.05 liter (2.2/1.8 US/Imp.pt)', 'gbr_oli-diferensial-67059.jpg', '1', '-'),
('L077', '* Periksa bearing  dari aus atau berubah warna.<br />\n* Periksa axle housing dari retak.<br />\n', 'gbr_bearing-bevel-pinion-73867.jpg', '1', '-'),
('L078', 'Pasang bearing shim (3) ke differential case (2) dan press-fit bearing differential (1) menggunakan special tool.', 'gbr_bearing-diferensial-81451.jpg', '1', '-'),
('L079', 'Berikan sealant ke permukaan cover differential (1)  seperti pada gambar.', 'gbr_seal-cover-diferensial-37753.jpg', '1', '-'),
('L080', '* Bersihkan permukaan yang menempel antara throttle body<br />\r\ndan intake manifold.<br />\r\n* Pasang gasket throttle body baru (1) ke intake manifold.', 'gbr_gasket-throttel-55776.jpg', '1', 'S024'),
('L081', '* Periksa commutator dan armature core. Jika ada hubungan,<br />\r\narmature digroundkan dan harus diganti.', 'gbr_armature1-72052.jpg', '1', 'S002'),
('L082', '* Periksa hubungan antar segment. Jika tidak ada hubungan<br />\r\npada titik tes, ada sirkuit yang putus dan armature harus<br />\r\ndiganti.', 'gbr_armature2-25717.jpg', '2', 'S002'),
('L083', '* Lepas gasket yang lama dan bersihkan oli di permukaan yang menempel dan pasang knock pin (2).<br />\r\n* Pasag gasket cylinder head yang baru (1) seperti pada gambar, tanda TOP pada gasket harus menghadap ke timing belt, menghadap ke atas (ke arah cylinder head).', 'gbr_gasket-head-61157.jpg', '1', 'S021'),
('L084', '* Pasang seal valve stem yang baru (1) ke valve guide.<br />\r\n* Setelah memberikan oli mesin ke seal dan spindle special<br />\r\ntool (valve guide installer handle), pasang oil seal ke spindle, dan kemudian pasang seal ke valve guide dengan cara menekan special tool dengan tangan.<br />\r\n* Setelah installing, pastikan seal terpasang dengan baik pada valve guide.', 'gbr_seal-klep-91311.jpg', '1', 'S020'),
('L085', '* Luruskan garis tengah rotor distributor (1) dengan tanda (2) pada housing distributor.<br />\r\n* Pasang baut flange secra perlahan dan lakukan persiapan untuk setel waktu pengapian.<br />\r\n* Pastikan rotor dalam kondisi baik.<br />\r\n* Periksa cap distributor dan bersihkan atau ganti jika perlu.<br />\r\n* Pasang cap.<br />\r\n* Pasang konektor CMP sensor.<br />\r\n* Periksa dan setel waktu pengapian.', 'gbr_distributor-1580.jpg', '1', 'S013');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE IF NOT EXISTS `tb_pengguna` (
  `kd_pengguna` int(4) NOT NULL AUTO_INCREMENT,
  `nm_pengguna` varchar(40) NOT NULL,
  `pass_pengguna` varchar(40) NOT NULL,
  PRIMARY KEY (`kd_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`kd_pengguna`, `nm_pengguna`, `pass_pengguna`) VALUES
(1, 'd033e22ae348aeb5660fc2140aec35850c4da997', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pohon`
--

CREATE TABLE IF NOT EXISTS `tb_pohon` (
  `kd_pohon` int(4) NOT NULL AUTO_INCREMENT,
  `kd_gejala` varchar(4) NOT NULL,
  `id_child_t` varchar(4) NOT NULL,
  `id_child_f` varchar(4) NOT NULL,
  PRIMARY KEY (`kd_pohon`),
  KEY `kd_pohon` (`kd_pohon`),
  KEY `kd_gejala` (`kd_gejala`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data untuk tabel `tb_pohon`
--

INSERT INTO `tb_pohon` (`kd_pohon`, `kd_gejala`, `id_child_t`, `id_child_f`) VALUES
(2, 'G001', 'K001', 'B001'),
(3, 'G002', 'G010', 'B002'),
(4, 'G003', 'B003', 'G026'),
(5, 'G004', 'G035', 'G036'),
(6, 'G005', 'K008', 'B005'),
(7, 'G006', 'G033', 'B004'),
(8, 'G007', 'K011', 'G033'),
(9, 'G008', 'G021', 'G019'),
(10, 'G009', 'G025', 'B002'),
(11, 'G010', 'G011', 'G012'),
(12, 'G011', 'K002', 'G014'),
(13, 'G012', 'K003', 'G013'),
(14, 'G013', 'K004', '0'),
(15, 'G014', 'K005', 'G015'),
(16, 'G015', 'K006', 'G016'),
(17, 'G016', 'K007', '0'),
(18, 'G017', 'K009', 'G018'),
(19, 'G018', 'G007', 'G006'),
(20, 'G019', 'K018', 'G020'),
(21, 'G020', 'K012', 'G005'),
(22, 'G021', 'K003', 'G022'),
(23, 'G022', 'K013', 'G023'),
(24, 'G023', 'K014', 'G024'),
(25, 'G024', 'K015', '0'),
(26, 'G025', 'K016', 'K017'),
(27, 'G026', 'G027', 'G004'),
(28, 'G027', 'G030', 'G032'),
(29, 'G028', 'K019', '0'),
(30, 'G029', 'K020', 'G028'),
(31, 'G030', 'G031', 'G029'),
(32, 'G031', 'K021', 'K020'),
(33, 'G032', 'K023', '0'),
(34, 'G033', 'K024', 'G034'),
(35, 'G034', 'K010', '0'),
(36, 'G035', 'K025', 'G005'),
(37, 'G036', 'K022', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rusak`
--

CREATE TABLE IF NOT EXISTS `tb_rusak` (
  `kd_rusak` varchar(4) NOT NULL,
  `nm_rusak` text NOT NULL,
  PRIMARY KEY (`kd_rusak`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rusak`
--

INSERT INTO `tb_rusak` (`kd_rusak`, `nm_rusak`) VALUES
('K001', 'Battery drop'),
('K002', 'Sirkuit armature koslet'),
('K003', 'Sambungan kabel tidak terhubung dengan baik'),
('K004', 'Magnetic switch rusak'),
('K005', 'Ujung pinion aus'),
('K006', 'Brush tidak pas atau aus'),
('K007', 'Kontak magnetic switch coil konslet'),
('K008', 'Waktu pengapian tidak tepat'),
('K009', 'Bahan bakar pada tangki kurang'),
('K010', 'Selang bahan bakar atau saluran bahan bakar tersumbat'),
('K011', 'Pompa bahan bakar rusak atau mati'),
('K012', 'Kemungkinan sirkuit putus, konslet dan kendur'),
('K013', 'Kabel busi bocor atau putus'),
('K014', 'Distributor rusak atau tidak berfungsi dengan baik'),
('K015', 'Ignition coil rusak atau mati'),
('K016', 'Sirkuit fuel injector putus atau konslet'),
('K017', 'Fuel injector rusak'),
('K018', 'Ada beberapa busi yang mati atau putus'),
('K019', 'Ring piston atau piston aus'),
('K020', 'Celah katup inlet atau outlet bocor'),
('K021', 'Seal katup bocor atau rusak'),
('K022', 'Kebocoran oli pada celah blok silinder dengan kepala silinder'),
('K023', 'Pegas katup lemah atau celah katup tidak sesuai spesifikasi'),
('K024', 'Kebocoran pada sambungan atau selang bahan bakar'),
('K025', 'Sistem air intake bocor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_solusi`
--

CREATE TABLE IF NOT EXISTS `tb_solusi` (
  `kd_solusi` varchar(4) NOT NULL,
  `nm_solusi` text NOT NULL,
  PRIMARY KEY (`kd_solusi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_solusi`
--

INSERT INTO `tb_solusi` (`kd_solusi`, `nm_solusi`) VALUES
('S001', 'Lakukan charger pada battery atau ganti battery'),
('S002', 'Perbaiki atau ganti armature'),
('S003', 'Kencangkan sambungan kabel yang kendur'),
('S004', 'Perbaiki atau ganti magnetic switch'),
('S005', 'Ganti over-running clutch'),
('S006', 'Perbaiki brush atau ganti brush dengan yang baru'),
('S007', 'Setel waktu pengapian dengan mengendurkan baut flange, setel timing dengan mengatur posisi distributor assy'),
('S008', 'Tambahkan bahan bakar pada tangki'),
('S009', 'Perbaiki saluran bahan bakar atau ganti selang bahan bakar '),
('S010', 'Perbaiki atau ganti pompa bahan bakar'),
('S011', 'Perbaiki sirkuit yang kendur atau ganti kabel yang terbakar'),
('S012', 'Ganti kabel busi yang bocor atau putus dengan kabel yang sesuai spesifikasi'),
('S013', 'Perbaiki atau ganti distributor'),
('S014', 'Ganti ignition coil'),
('S015', 'Ganti kabel yang putus atau yang memiliki resistan tinggi'),
('S016', 'Perbaiki atau ganti fuel injector'),
('S017', 'Ganti busi yang mati atau putus dengan busi yang bertipe sama'),
('S018', 'Ganti piston atau ring piston'),
('S019', 'Perbaiki dengan melakukan skur (meratakan dudukan katup) pada celah katup yang bocor'),
('S020', 'Ganti seal katup yang bocor'),
('S021', 'Ganti gasket kemudian kencangkan baut pengikat kepala silinder dengan silinder sesuai spesifikasi'),
('S022', 'Setel celah katup atau ganti pegas katup'),
('S023', 'Perbaiki sambungan bahan bakar yang bocor atau ganti selang yang bocor'),
('S024', 'Ganti gasket pada throttle body dengan yang baru kemudian kencangkan sesuai spesifikasi');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_bagian`
--
ALTER TABLE `tb_bagian`
  ADD CONSTRAINT `tb_bagian_ibfk_1` FOREIGN KEY (`kd_gejala_utama`) REFERENCES `tb_gejala` (`kd_gejala`);

--
-- Ketidakleluasaan untuk tabel `tb_kesimpulan`
--
ALTER TABLE `tb_kesimpulan`
  ADD CONSTRAINT `tb_kesimpulan_ibfk_1` FOREIGN KEY (`kd_solusi`) REFERENCES `tb_solusi` (`kd_solusi`),
  ADD CONSTRAINT `tb_kesimpulan_ibfk_2` FOREIGN KEY (`kd_rusak`) REFERENCES `tb_rusak` (`kd_rusak`);

--
-- Ketidakleluasaan untuk tabel `tb_pohon`
--
ALTER TABLE `tb_pohon`
  ADD CONSTRAINT `tb_pohon_ibfk_1` FOREIGN KEY (`kd_gejala`) REFERENCES `tb_gejala` (`kd_gejala`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

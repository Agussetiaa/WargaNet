-- WargaNet - Database Lengkap
CREATE DATABASE IF NOT EXISTS warganet_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE warganet_db;

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS informasi;
DROP TABLE IF EXISTS kas;
DROP TABLE IF EXISTS izin_ronda;
DROP TABLE IF EXISTS ronda_petugas;
DROP TABLE IF EXISTS ronda_kelompok;
DROP TABLE IF EXISTS warga;
DROP TABLE IF EXISTS keluarga;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE keluarga (
    id INT AUTO_INCREMENT PRIMARY KEY,
    blok ENUM('A12','A12a') NOT NULL,
    no_rumah VARCHAR(10) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY unique_rumah (blok, no_rumah)
) ENGINE=InnoDB;

CREATE TABLE warga (
    id INT AUTO_INCREMENT PRIMARY KEY,
    keluarga_id INT NULL,
    nama_lengkap VARCHAR(150) NOT NULL,
    nik VARCHAR(20) NULL,
    blok ENUM('A12','A12a') NOT NULL,
    no_rumah VARCHAR(10) NOT NULL,
    jabatan VARCHAR(100) NOT NULL DEFAULT 'Warga',
    no_hp VARCHAR(20) NOT NULL DEFAULT '-',
    status_hunian ENUM('Tetap','Kontrak') NOT NULL DEFAULT 'Tetap',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_warga_keluarga FOREIGN KEY (keluarga_id) REFERENCES keluarga(id) ON DELETE SET NULL,
    INDEX idx_warga_nama (nama_lengkap),
    INDEX idx_warga_rumah (blok, no_rumah)
) ENGINE=InnoDB;

CREATE TABLE ronda_kelompok (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pekan TINYINT UNSIGNED NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    jam_mulai TIME NOT NULL DEFAULT '00:00:00',
    jam_selesai TIME NOT NULL DEFAULT '04:00:00'
) ENGINE=InnoDB;

CREATE TABLE ronda_petugas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kelompok_id INT NOT NULL,
    warga_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY unique_petugas_kelompok (kelompok_id, warga_id),
    CONSTRAINT fk_petugas_kelompok FOREIGN KEY (kelompok_id) REFERENCES ronda_kelompok(id) ON DELETE CASCADE,
    CONSTRAINT fk_petugas_warga FOREIGN KEY (warga_id) REFERENCES warga(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE izin_ronda (
    id INT AUTO_INCREMENT PRIMARY KEY,
    warga_id INT NOT NULL,
    pekan TINYINT UNSIGNED NOT NULL,
    alasan TEXT NOT NULL,
    pengganti VARCHAR(150) NOT NULL DEFAULT '-',
    tanggal_input DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_izin_warga FOREIGN KEY (warga_id) REFERENCES warga(id) ON DELETE CASCADE,
    INDEX idx_izin_pekan (pekan)
) ENGINE=InnoDB;

CREATE TABLE kas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tanggal DATE NOT NULL,
    blok ENUM('A12','A12a') NOT NULL,
    bendahara VARCHAR(100) NOT NULL,
    keterangan VARCHAR(255) NOT NULL,
    jenis ENUM('MASUK','KELUAR') NOT NULL,
    jumlah DECIMAL(15,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_kas_blok_tanggal (blok, tanggal)
) ENGINE=InnoDB;

CREATE TABLE informasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(200) NOT NULL,
    tanggal DATE NOT NULL,
    waktu VARCHAR(100) NOT NULL,
    lokasi VARCHAR(200) NOT NULL,
    keterangan TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Rumah / KK
INSERT INTO keluarga (blok, no_rumah) VALUES
('A12a','12A'),('A12a','14'),('A12a','15'),('A12a','16'),('A12a','17'),
('A12a','18'),('A12a','19'),('A12a','20'),('A12a','21'),('A12a','22'),
('A12a','24'),('A12a','25'),
('A12','1'),('A12','2'),('A12','3'),('A12','4'),('A12','5'),
('A12','6'),('A12','7'),('A12','8'),('A12','9'),('A12','10'),
('A12','11'),('A12','12'),('A12','12A'),('A12','14');

INSERT INTO warga (nama_lengkap, blok, no_rumah, status_hunian, no_hp, jabatan) VALUES
('MASIRIA NDRAHA', 'A12a', '12A', 'Tetap', '-', 'Warga'),
('HAFAOMASI NDRAHA', 'A12a', '12A', 'Tetap', '-', 'Warga'),
('YOHANES ERWIN RIFALDI SILALAHI', 'A12a', '14', 'Tetap', '-', 'Warga'),
('UKI RAMADHAN', 'A12a', '15', 'Tetap', '-', 'Warga'),
('IQBAL IMAM MAHMUDI', 'A12a', '16', 'Tetap', '-', 'Warga'),
('NOVIA PUJIANI', 'A12a', '16', 'Tetap', '-', 'Warga'),
('LUSIANO F DZAKIURRAHMAN', 'A12a', '17', 'Tetap', '-', 'Warga'),
('SURTINI', 'A12a', '17', 'Tetap', '-', 'Warga'),
('IRFAN FADILLAH BAYHAQI', 'A12a', '18', 'Tetap', '-', 'Warga'),
('CHERLIA DINDA PUSPITA RINI', 'A12a', '18', 'Tetap', '-', 'Warga'),
('AQIL HAMZAH', 'A12a', '19', 'Tetap', '-', 'Warga'),
('PUSPA ANDANI', 'A12a', '19', 'Tetap', '-', 'Warga'),
('DAVANKA DANANTYA HAMZAH', 'A12a', '19', 'Tetap', '-', 'Warga'),
('NUR KHASANAH', 'A12a', '19', 'Tetap', '-', 'Warga'),
('SUNARTO', 'A12a', '20', 'Tetap', '-', 'Warga'),
('DIAN FITRI HANDAYANI', 'A12a', '20', 'Tetap', '-', 'Warga'),
('GILANG PUTRA NURHARIS WIJIYANTO', 'A12a', '20', 'Tetap', '-', 'Warga'),
('ARKA REGHA ADHIKARI RAMADAN', 'A12a', '20', 'Tetap', '-', 'Warga'),
('BALQIS RAFAILAH ALMAHYRA', 'A12a', '20', 'Tetap', '-', 'Warga'),
('HENDI MAULANA', 'A12a', '21', 'Tetap', '-', 'Warga'),
('LIUS SUNARDI', 'A12a', '22', 'Tetap', '-', 'Warga'),
('MOYA MISIL FARIDA', 'A12a', '22', 'Tetap', '-', 'Warga'),
('SRI WANTO', 'A12a', '24', 'Tetap', '-', 'Warga'),
('LISTYOWATI', 'A12a', '24', 'Tetap', '-', 'Warga'),
('ARIL RAMADHANI', 'A12a', '24', 'Tetap', '-', 'Warga'),
('YUSUF GUMILANG', 'A12a', '24', 'Tetap', '-', 'Warga'),
('GAVIN PUTRA PAMUNGKAS', 'A12a', '24', 'Tetap', '-', 'Warga'),
('AAB ABDULAH HUDA', 'A12a', '25', 'Tetap', '-', 'Warga'),
('DARMINI', 'A12a', '25', 'Tetap', '-', 'Warga'),
('AYUNDA FATIKHA SARI', 'A12a', '25', 'Tetap', '-', 'Warga'),
('DZIKRI FARHAN HAMDALAH', 'A12a', '25', 'Tetap', '-', 'Warga'),
('AGUS ACHMAD MAULANA', 'A12', '1', 'Tetap', '-', 'Warga'),
('RANI INDIKA RIZKI', 'A12', '1', 'Tetap', '-', 'Warga'),
('REYNANDRA ALRAFASYA DEWANDARU', 'A12', '1', 'Tetap', '-', 'Warga'),
('FERY EVINDHO', 'A12', '2', 'Tetap', '-', 'Warga'),
('KINDRI KRISMAYANTI', 'A12', '2', 'Tetap', '-', 'Warga'),
('ARETA ZAHRA KAMILATUNNISSA', 'A12', '2', 'Tetap', '-', 'Warga'),
('HAFSHA ATHALETA AZZAHRA', 'A12', '2', 'Tetap', '-', 'Warga'),
('HADI SARSAN ROHAYAN PUTRA', 'A12', '3', 'Tetap', '-', 'Warga'),
('SITI DWI WINDANINGSIH', 'A12', '3', 'Tetap', '-', 'Warga'),
('DEVANDRA ARKANA PUTRA', 'A12', '3', 'Tetap', '-', 'Warga'),
('AGUS SETIAWAN', 'A12', '4', 'Tetap', '-', 'Warga'),
('SUINITI', 'A12', '4', 'Tetap', '-', 'Warga'),
('ADINDA PERMATA SARI', 'A12', '4', 'Tetap', '-', 'Warga'),
('RAYYAN ARGIO SETIAWAN', 'A12', '4', 'Tetap', '-', 'Warga'),
('DEDY PRIYANTO', 'A12', '5', 'Tetap', '-', 'Warga'),
('ELI FITRIANA', 'A12', '5', 'Tetap', '-', 'Warga'),
('KUSMIFTAH', 'A12', '6', 'Tetap', '-', 'Warga'),
('WALYADI SAKHRUL', 'A12', '6', 'Tetap', '-', 'Warga'),
('UNAENAH', 'A12', '6', 'Tetap', '-', 'Warga'),
('YAZID S.', 'A12', '7', 'Tetap', '-', 'Warga'),
('JOKO DWI SANTOSO', 'A12', '8', 'Tetap', '-', 'Warga'),
('YENI PIRONIKA', 'A12', '8', 'Tetap', '-', 'Warga'),
('ALFI DHEFIN FATIH', 'A12', '8', 'Tetap', '-', 'Warga'),
('ANWAR', 'A12', '9', 'Tetap', '-', 'Warga'),
('HERNENGSIH', 'A12', '9', 'Tetap', '-', 'Warga'),
('EKA PAMELA', 'A12', '9', 'Tetap', '-', 'Warga'),
('KINNARA LISYANA SHIDOIN', 'A12', '9', 'Tetap', '-', 'Warga'),
('SOFYAN NURHENDI', 'A12', '10', 'Tetap', '-', 'Warga'),
('NISA KHOIRUNISA', 'A12', '10', 'Tetap', '-', 'Warga'),
('REINA NOVA SHIDQIA', 'A12', '10', 'Tetap', '-', 'Warga'),
('RAISHA SOFIA KHAIRUNISA', 'A12', '10', 'Tetap', '-', 'Warga'),
('DIKA ANDRIANTO', 'A12', '11', 'Tetap', '-', 'Warga'),
('TRIYANI', 'A12', '11', 'Tetap', '-', 'Warga'),
('FATAR KENZIE ADIKA', 'A12', '11', 'Tetap', '-', 'Warga'),
('AHMAD FIKRI FATAHUDIN', 'A12', '12', 'Tetap', '-', 'Warga'),
('NEPAL NURKARMILA', 'A12', '12', 'Tetap', '-', 'Warga'),
('DARONI', 'A12', '12A', 'Tetap', '-', 'Warga'),
('NIA RAMADHANI', 'A12', '12A', 'Tetap', '-', 'Warga'),
('MUKHAMMAD SYAHRUL', 'A12', '14', 'Tetap', '-', 'Warga'),
('DUROTUL ATIQOH', 'A12', '14', 'Tetap', '-', 'Warga'),
('MILA KAMELIA NAFIS', 'A12', '14', 'Tetap', '-', 'Warga'),
('AHMAD YAHYA MUZAKKI', 'A12', '14', 'Tetap', '-', 'Warga');

UPDATE warga w
JOIN keluarga k ON w.blok = k.blok AND w.no_rumah = k.no_rumah
SET w.keluarga_id = k.id;

INSERT INTO ronda_kelompok (pekan, nama) VALUES
(1,'Minggu Ke-1 (Malam Minggu)'),
(2,'Minggu Ke-2 (Malam Minggu)'),
(3,'Minggu Ke-3 (Malam Minggu)'),
(4,'Minggu Ke-4 (Malam Minggu)'),
(5,'Minggu Ke-5 (Malam Minggu)');

-- Penugasan awal menggunakan warga yang memang ada di database.
INSERT INTO ronda_petugas (kelompok_id, warga_id)
SELECT rk.id, w.id FROM ronda_kelompok rk JOIN warga w ON w.nama_lengkap='AGUS SETIAWAN' WHERE rk.pekan=1
UNION ALL
SELECT rk.id, w.id FROM ronda_kelompok rk JOIN warga w ON w.nama_lengkap='SUINITI' WHERE rk.pekan=1
UNION ALL
SELECT rk.id, w.id FROM ronda_kelompok rk JOIN warga w ON w.nama_lengkap='AGUS ACHMAD MAULANA' WHERE rk.pekan=2
UNION ALL
SELECT rk.id, w.id FROM ronda_kelompok rk JOIN warga w ON w.nama_lengkap='RANI INDIKA RIZKI' WHERE rk.pekan=2
UNION ALL
SELECT rk.id, w.id FROM ronda_kelompok rk JOIN warga w ON w.nama_lengkap='MASIRIA NDRAHA' WHERE rk.pekan=3
UNION ALL
SELECT rk.id, w.id FROM ronda_kelompok rk JOIN warga w ON w.nama_lengkap='HAFAOMASI NDRAHA' WHERE rk.pekan=3
UNION ALL
SELECT rk.id, w.id FROM ronda_kelompok rk JOIN warga w ON w.nama_lengkap='FERY EVINDHO' WHERE rk.pekan=4
UNION ALL
SELECT rk.id, w.id FROM ronda_kelompok rk JOIN warga w ON w.nama_lengkap='KINDRI KRISMAYANTI' WHERE rk.pekan=4
UNION ALL
SELECT rk.id, w.id FROM ronda_kelompok rk JOIN warga w ON w.nama_lengkap='YOHANES ERWIN RIFALDI SILALAHI' WHERE rk.pekan=5
UNION ALL
SELECT rk.id, w.id FROM ronda_kelompok rk JOIN warga w ON w.nama_lengkap='UKI RAMADHAN' WHERE rk.pekan=5;

INSERT INTO kas (tanggal, blok, bendahara, keterangan, jenis, jumlah) VALUES
('2026-03-01','A12','Agus Setiawan','Iuran Bulanan Warga Blok A12','MASUK',500000),
('2026-03-01','A12a','Siti Dwi Windaningsih','Iuran Bulanan Warga Blok A12a','MASUK',450000),
('2026-03-05','A12','Agus Setiawan','Beli Senter & Baterai Ronda','KELUAR',75000);

INSERT INTO informasi (judul,tanggal,waktu,lokasi,keterangan) VALUES
('Kerja Bakti Kebersihan Lingkungan & Parit','2026-10-11','07:30 WIB s/d Selesai','Selokan Utama Blok A12 & A12a','Diharapkan setiap KK membawa alat kebersihan masing-masing.'),
('Rapat RT & Silaturahmi Bulanan Warga','2026-10-18','19:30 WIB (Ba''da Isya)','Pos Ronda Utama','Agenda: Evaluasi Keamanan Lingkungan & Laporan Kas Bulanan.');

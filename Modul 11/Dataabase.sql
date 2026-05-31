-- =====================================================
-- Modul 11 - PHP Database (CRUD)
-- Database Setup Script
-- =====================================================

-- Buat database
CREATE DATABASE IF NOT EXISTS akademik;
USE akademik;

-- =====================================================
-- Tabel t_dosen
-- =====================================================
CREATE TABLE IF NOT EXISTS t_dosen (
    idDosen INT AUTO_INCREMENT PRIMARY KEY,
    namaDosen VARCHAR(50),
    noHP VARCHAR(25)
);

-- =====================================================
-- Tabel t_mahasiswa
-- =====================================================
CREATE TABLE IF NOT EXISTS t_mahasiswa (
    npm INT PRIMARY KEY,
    namaMhs VARCHAR(50),
    prodi VARCHAR(25),
    alamat VARCHAR(70),
    noHP VARCHAR(25)
);

-- =====================================================
-- Tabel t_matakuliah
-- =====================================================
CREATE TABLE IF NOT EXISTS t_matakuliah (
    kodeMK INT PRIMARY KEY,
    namaMK VARCHAR(70),
    sks INT,
    jam INT
);

-- =====================================================
-- Data contoh (optional)
-- =====================================================
INSERT INTO t_dosen (namaDosen, noHP) VALUES
('Dr. Ahmed Yusuf, M.Sc', '081222333444'),
('Jarwo Slamet Joyo, Ph.D', '081444333555');

INSERT INTO t_mahasiswa (npm, namaMhs, prodi, alamat, noHP) VALUES
(253307039, 'Hayyu Adhini Wahida', 'Teknologi Informasi', 'Jl. Teguhan No. 10, Madiun', '081234567890'),
(253307041, 'Widya Ony Yusnita Rahayu', 'Teknologi Informasi', 'Jl. Pahlawan No. 25, Madiun', '082345678901'),
(253307059, 'Ivana Agustyana Putri', 'Administrasi Bisnis', 'Jl. Sudirman No. 5, Madiun', '083456789012');

INSERT INTO t_matakuliah (kodeMK, namaMK, sks, jam) VALUES
(101, 'Pemrograman Web', 3, 4),
(102, 'Basis Data', 3, 4),
(103, 'Algoritma dan Pemrograman', 4, 6);
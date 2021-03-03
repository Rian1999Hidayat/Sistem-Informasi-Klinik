CREATE DATABASE klinik;
USE klinik;

CREATE TABLE tb_pasien (
	id_pasien CHAR(5) PRIMARY KEY NOT NULL,
	nama_pasien VARCHAR(50) NOT NULL,
	jenis_kelamin VARCHAR(10) NOT NULL,
	tanggal_lahir DATE DEFAULT NULL,
	alamat VARCHAR(50) NOT NULL,
	no_telepon VARCHAR(13) 
);

CREATE TABLE tb_user (
	id_user CHAR(5) PRIMARY KEY NOT NULL,
	username VARCHAR(50) NOT NULL,
	kata_sandi VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL,
	nama_lengkap VARCHAR(50) NOT NULL,
	ROLE ENUM('petugas_pendaftaran','dokter','kasir','apoteker','pemilik_klinik'
);
CREATE DATABASE bedug_sahur_db;
USE bedug_sahur_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);

INSERT INTO users (username,password)
VALUES ('panitia', MD5('12345'));

CREATE TABLE peserta (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    kelompok VARCHAR(100),
    keterangan VARCHAR(255)
);

CREATE TABLE absensi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    peserta_id INT,
    tanggal DATE,
    FOREIGN KEY (peserta_id) REFERENCES peserta(id)
);
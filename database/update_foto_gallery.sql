-- ================================================
-- UPDATE DATABASE SI-BORI - FITUR FOTO GALLERY
-- Menambahkan kolom foto pada tabel menu
-- ================================================

-- Tambah kolom foto untuk menyimpan JSON array filenames
ALTER TABLE `menu` ADD COLUMN `foto` TEXT NULL AFTER `konten`;

-- Set default value untuk data existing
UPDATE `menu` SET `foto` = NULL WHERE `foto` IS NULL;

-- Verifikasi kolom berhasil ditambahkan
-- DESCRIBE menu;

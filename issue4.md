# Feature: Hak Akses & Role Management (Admin, Kepala Panti, Petugas)

## 📌 Latar Belakang
Aplikasi manajemen panti asuhan saat ini memerlukan pengaturan **Role (Peran Pengguna)** untuk membatasi hak akses sesuai tugas dan wewenang pengurus di panti asuhan. Selain itu, diperlukan halaman **Manajemen Pengguna (UserResource)** agar Admin dapat menambah, mengubah, dan menghapus akun pengurus/petugas.

---

## 🎯 Pembagian 3 Role Utama

### 1. Admin
- **Deskripsi**: Penanggung jawab teknis & pengelola pengguna sistem.
- **Hak Akses Khusus**:
  - **Manajemen Pengguna (UserResource)**: Dapat membuat (Create), melihat (Read), mengubah (Update), dan menghapus (Delete) akun user/pengurus serta mereset password.
  - Full Access ke seluruh menu operasional, donasi, monitoring, dan laporan.
  - Mengelola Profil & Pengaturan Panti (`PantiSettings`).

---

### 2. Kepala Panti
- **Deskripsi**: Pimpinan Panti Asuhan yang berwenang mengawasi operasional dan menyetujui laporan.
- **Hak Akses**:
  - Melihat seluruh data panti (Anak Asuh, Monitoring, Donasi, Inventaris, Kegiatan).
  - Mengakses Dashboard & Statistik perkembangan anak dan donasi.
  - Mengakses **Pusat Laporan & Cetak PDF** serta melihat **Audit Log**.
  - *Tidak memiliki akses ke Manajemen Pengguna (UserResource) atau Pengaturan Panti.*

---

### 3. Petugas
- **Deskripsi**: Staf/Pengurus harian yang bertugas menginput dan memperbarui data operasional panti.
- **Hak Akses**:
  - Mengelola Data Anak Asuh (Tambah/Edit biodata).
  - Mengelola Monitoring Pendidikan & Kesehatan Anak.
  - Mengelola Data Donatur & Penerimaan Donasi.
  - Mengelola Inventaris Barang & Agenda Kegiatan.
  - *Tidak memiliki akses ke Manajemen Pengguna (UserResource) atau Pengaturan Panti.*

---

## 🛠️ Instruksi Implementasi High-Level

1. **Tabel Database `users`**:
   - Tambahkan kolom `role` (enum: `'admin'`, `'kepala_panti'`, `'petugas'`, default: `'petugas'`).

2. **Filament UserResource**:
   - Buat `UserResource` untuk kelola user (Nama, Email, Password, Role).
   - Batasi agar `UserResource` hanya tampil di sidebar untuk pengguna dengan role `admin`.

3. **Filament Authorization (Policies & Navigation)**:
   - Gunakan Laravel Policy / Filament `canViewAny()` untuk membatasi navigasi sidebar dan aksi tombol berdasarkan role user yang sedang login.

4. **Seeder**:
   - Update `DatabaseSeeder.php` untuk membuat akun contoh 3 role:
     - Admin: `admin@test.com` (password: `password`)
     - Kepala Panti: `kepala@test.com` (password: `password`)
     - Petugas: `petugas@test.com` (password: `password`)

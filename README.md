# 🎓 SIPKL (Sistem Informasi Praktik Kerja Lapangan)

**SIPKL** adalah aplikasi web berbasis Laravel untuk mempermudah pengelolaan proses **Praktik Kerja Lapangan (PKL)** di lingkungan **Jurusan Kampus**. Sistem ini menyediakan fitur lengkap mulai dari pendaftaran PKL, pengajuan bimbingan, unggah laporan, hingga penilaian akhir oleh dosen pembimbing.

## 📌 Fitur Utama

### 🔐 Otentikasi Role

-   Admin
-   Dosen Pembimbing
-   Mahasiswa

### 🎛️ Admin

-   Dashboard statistik
-   Kelola data mahasiswa dan dosen (manual & import Excel)
-   Kelola perusahaan mitra
-   Verifikasi pendaftaran dan laporan PKL
-   Upload format laporan resmi

### 🧑‍🏫 Dosen

-   Lihat mahasiswa bimbingan
-   Konfirmasi jadwal bimbingan dan lihat jadwal
-   Input nilai PKL (hanya jika mahasiswa minimal 4x bimbingan disetujui)

### 🎓 Mahasiswa

-   Pendaftaran PKL dan pantau status pendaftaran
-   Lihat list perusahaan dan ajukan referensi perusahaan
-   Ajukan bimbingan PKL
-   Unggah laporan PKL
-   Unduh format laporan

## 🧩 Teknologi

-   Laravel 11
-   Laravel Breeze (auth)
-   Tailwind CSS
-   Vite
-   MySQL

## Tampilan User Interface

<table>
  <tr>
    <td><img src="public/screenshots/login.png" alt="Login" width="220" /></td>
    <td><img src="public/screenshots/dashboard_admin.png" alt="Dashboard Admin" width="220" /></td>
  </tr>
  <tr>
    <td><img src="public/screenshots/admin_mahasiswa.png" alt="Admin Mahasiswa" width="220" /></td>
    <td><img src="public/screenshots/admin_dosen.png" alt="Admin Dosen" width="220" /></td>
  </tr>
  <tr>
    <td><img src="public/screenshots/admin_perusahaan.png" alt="Admin Perusahaan" width="220" /></td>
    <td><img src="public/screenshots/admin_verifikasi.png" alt="Admin Verifikasi" width="220" /></td>
  </tr>
  <tr>
    <td><img src="public/screenshots/admin_upload_format.png" alt="Admin Upload Format" width="220" /></td>
    <td><img src="public/screenshots/home_mahasiswa.png" alt="Home Mahasiswa" width="220" /></td>
  </tr>
  <tr>
    <td><img src="public/screenshots/mahasiswa_pendaftaran.png" alt="Mahasiswa Pendaftaran" width="220" /></td>
    <td><img src="public/screenshots/mahasiswa_perusahaan.png" alt="Mahasiswa Perusahaan" width="220" /></td>
  </tr>
  <tr>
    <td><img src="public/screenshots/mahasiswa_bimbingan.png" alt="Mahasiswa Bimbingan" width="220" /></td>
    <td><img src="public/screenshots/mahasiswa_upload_laporan.png" alt="Mahasiswa Upload Laporan" width="220" /></td>
  </tr>
  <tr>
    <td><img src="public/screenshots/mahasiswa_unduh_format.png" alt="Mahasiswa Unduh Format" width="220" /></td>
    <td><img src="public/screenshots/home_dosen.png" alt="Home Dosen" width="220" /></td>
  </tr>
  <tr>
    <td><img src="public/screenshots/dosen_mahasiswa_bimbingan.png" alt="Dosen Mahasiswa Bimbingan" width="220" /></td>
    <td><img src="public/screenshots/dosen_konfirmasi_jadwal.png" alt="Dosen Konfirmasi Jadwal" width="220" /></td>
  </tr>
  <tr>
    <td><img src="public/screenshots/dosen_input_nilai.png" alt="Dosen Input Nilai" width="220" /></td>
    <td></td>
  </tr>
</table>

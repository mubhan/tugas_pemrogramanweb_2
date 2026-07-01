nama : muhamad saef mubhaula abas 
NIM : 24260025
# 🏨 haji saef Resort - Hotel Room Management System

Aplikasi web manajemen kamar hotel berbasis **Full-Stack Laravel** dengan antarmuka modern menggunakan **Tailwind CSS**. Sistem ini mendukung operasi CRUD secara dinamis dan penyimpanan data terstruktur ke dalam database MySQL.

---

## 🚀 Alur Kerja Sistem (Workflow)

Aplikasi ini bekerja melalui siklus data yang terintegrasi antara **Route**, **Controller**, **Model (Eloquent)**, **Database (MySQL)**, dan **Blade View**:

### 1. Menampilkan Dashboard Kamar (Read)
* **Proses:** Ketika pengguna mengakses halaman utama (`/`), *Router* mengarahkan permintaan ke `RoomController@index`.
* **Alur Data:** Controller memanggil Model `Room::all()` untuk mengambil seluruh records dari tabel `rooms`.
* **Tampilan:** Data dikirim ke view `rooms.index`. Jika database kosong, sistem akan menampilkan pesan interaktif. Jika ada, data kamar dirender ke dalam tabel modern yang dilengkapi ringkasan statistik (Kamar Tersedia, Terisi, Perbaikan) secara real-time.

### 2. Menambahkan Kamar Baru (Create)
* **Proses:** Pengguna mengklik tombol **"+ Tambah Kamar Baru"**, Router membuka form `rooms.create`.
* **Input & Validasi:** Setelah pengguna mengisi form (termasuk memilih fasilitas via custom checkbox cards) dan menekan tombol simpan, data dikirim melalui metode `POST` ke `RoomController@store`.
* **Penyimpanan:** Controller melakukan validasi ketat (seperti memastikan `no_kamar` bersifat unik). Jika lolos, komponen array fasilitas otomatis dikonversi ke format JSON oleh model casting, lalu disimpan ke database. Pengguna dialihkan kembali ke dashboard dengan pesan sukses.

### 3. Melihat Detail Kamar (Read Detail)
* **Proses:** Ketika tombol **"Detail"** diklik pada baris kamar tertentu, aplikasi mengarah ke rute `/rooms/{id}`.
* **Alur Data:** Menggunakan fitur *Route Model Binding* Laravel, data spesifik kamar langsung ditarik dan dikirim ke `rooms.show`.
* **Tampilan:** Halaman ini menyajikan visualisasi sinematik (pemandangan, harga, status, tanggal pembersihan) serta ikon fasilitas yang berubah secara dinamis sesuai tipe fasilitas yang aktif.

### 4. Memperbarui Data Kamar (Update)
* **Proses:** Pengguna mengklik tombol **"Edit"**, Router membuka form `rooms.edit` yang otomatis memuat data lama dari database.
* **Alur Data:** Komponen checkbox fasilitas menggunakan logika `in_array` untuk mendeteksi opsi apa saja yang sudah tercentang sebelumnya.
* **Eksekusi:** Setelah data diubah dan dikirim (`PUT`), data divalidasi ulang di `RoomController@update` sebelum memperbarui records di database.

### 5. Menghapus Data Kamar (Delete)
* **Proses:** Pengguna mengklik tombol **"Hapus"** pada dashboard.
* **Alur Data:** Sistem memicu konfirmasi JavaScript (*onsubmit alert*). Jika pengguna memilih "Yakin", Router mengirim permintaan `DELETE` ke `RoomController@destroy` untuk menghapus record dari database secara permanen.

---

## 🛠️ Stack Teknologi

* **Backend Framework:** Laravel 11
* **Frontend Styling:** Tailwind CSS v4 & FontAwesome v6 (via CDN)
* **Database:** MySQL / MariaDB
* **Template Engine:** Laravel Blade

---

## 💻 Cara Instalasi Lokal

1. **Clone Repositori:**
   ```bash
   git clone [https://github.com/mubhan/tugas_pemrogramanweb_2.git](https://github.com/mubhan/tugas_pemrogramanweb_2.git)
   cd tugas_pemrogramanweb_2

# 🚗 Manajemen Data Supir, Kendaraan, dan Perjalanan Menggunakan Laravel + Filament

Aplikasi ini dirancang untuk mengelola data supir, kendaraan, dan perjalanan secara terintegrasi dan aman menggunakan *framework* **Laravel 12** dan panel admin **Filament v3**.

Sistem ini memungkinkan pengguna untuk:
* Menambahkan dan mengelola data supir beserta detail identitasnya.
* Menghubungkan supir dengan kendaraan tertentu.
* Mencatat dan melacak data perjalanan berdasarkan trayek dan jadwal.

---

## 📌 Modul Utama

### 1. Manajemen Supir

Modul ini menyimpan data-data penting mengenai supir seperti:
* Nama lengkap
* Nomor identitas (KTP/SIM)
* Tanggal lahir, alamat, dan nomor telepon
* Relasi dengan kendaraan dan data perjalanan

🛠 Implementasi menggunakan model `Supir` dan *resource* Filament `SupirResource`.

### 2. Manajemen Kendaraan

Menampung informasi kendaraan seperti:
* Nomor polisi
* Jenis kendaraan
* Merek dan kapasitas
* Status ketersediaan kendaraan

Setiap kendaraan dapat terhubung ke lebih dari satu supir (opsional).
🛠 Implementasi menggunakan model `Kendaraan`.

### 3. Manajemen Perjalanan

Mencatat aktivitas perjalanan yang dilakukan oleh supir, termasuk:
* Trayek atau rute perjalanan
* Kendaraan yang digunakan
* Tanggal dan waktu keberangkatan
* Tujuan  perjalanan

Perjalanan ini terkait langsung dengan entitas `Supir` dan `Kendaraan` melalui relasi `belongsTo`.
🛠 Model yang digunakan: `Perjalanan` dan `Trayek`.

---

## 🔐 Keamanan Data

Sebagai bagian dari mata kuliah Keamanan Informasi, sistem ini memperhatikan aspek berikut:
* Penggunaan migrasi Laravel untuk struktur data yang aman.
* Koneksi *database* terenkripsi melalui *environment* `.env`.
* Manajemen otentikasi Laravel bawaan (opsional, jika diimplementasikan).
* Isolasi *environment* menggunakan **Docker** agar sistem tidak mudah diakses dari luar tanpa kontrol.

---

## 📝 Laporan UAS

File **`Analisis_Docker_Laravel.pdf`** menyajikan penjelasan teknis mengenai:
* Setup Docker dan Laravel.
* Penyesuaian `.env`.
* Migrasi *database*.
* Pemindahan file konfigurasi.
* Struktur *repository* dan hasil implementasi.

---

## ⚙️ Cara Menjalankan Proyek (Contoh, sesuaikan dengan langkah Docker Anda)

Karena Anda menggunakan Docker, langkah-langkahnya mungkin sedikit berbeda. Berikut adalah contoh langkah-langkah umum. **Mohon sesuaikan dengan instruksi *setup* Docker yang lebih spesifik jika Anda memiliki prosedur berbeda.**

### 1. Clone repositori

```bash
git clone [https://github.com/username/manajemen-data-supir.git](https://github.com/username/manajemen-data-supir.git)
cd manajemen-data-supir
````

### 2\. Atur Environment dan Jalankan Docker

```bash
cp .env.example .env
# Sesuaikan pengaturan database di .env jika perlu, misal untuk koneksi Docker
# Contoh: DB_HOST=mysql_container_name (jika menggunakan docker-compose)

# Bangun dan jalankan container Docker (contoh untuk docker-compose)
docker-compose up -d --build
```

### 3\. Install Dependensi dan Migrasi Database (di dalam container)

Anda perlu menjalankan perintah ini di dalam *container* PHP/Laravel Anda.

```bash
# Masuk ke dalam container PHP/Laravel (ganti 'nama-container-anda' jika tahu)
docker-compose exec app bash # atau nama-service-php-anda

# Di dalam container:
composer install
php artisan key:generate
php artisan migrate --seed # Gunakan --seed jika ada seeder
exit # Keluar dari container
```

### 4\. Jalankan Node.js Dependencies (jika Filament atau Vite membutuhkan)

```bash
# Masuk lagi ke container (jika perlu) atau jalankan dari host jika ada Node.js terinstal
# Di dalam container (jika Dockerfile sudah menginstal Node.js)
npm install
npm run dev # atau npm run build

# Jika tidak ada Node.js di container, mungkin perlu dijalankan di host atau container terpisah
```

### 5\. Akses Aplikasi

Aplikasi akan tersedia di *port* yang telah Anda tentukan di Docker atau `.env` Anda, biasanya:
`http://localhost:8000` atau `http://localhost`.

-----

## 📷 Tampilan

(Anda bisa menambahkan *screenshot* di sini. Disarankan untuk membuat folder `screenshots/` dan meletakkan gambar di sana, lalu tautkan seperti contoh di bawah.)

  * **Dashboard**
    ![alt text](https://github.com/auwfiii/UAS_Keamanan_Informasi/blob/main/Screenshoot/dashboard.png?raw=true)
  * **Data Supir**
    ![alt text](https://github.com/auwfiii/UAS_Keamanan_Informasi/blob/main/Screenshoot/supir.png?raw=true)
  * **Data Perjalanan**
    ![alt text](https://github.com/auwfiii/UAS_Keamanan_Informasi/blob/main/Screenshoot/perjalanan.png?raw=true)
  * **Data Kendaraan**
    ![alt text](https://github.com/auwfiii/UAS_Keamanan_Informasi/blob/main/Screenshoot/kendaraan.png?raw=true)
  * **Data Trayek**
    ![alt text](https://github.com/auwfiii/UAS_Keamanan_Informasi/blob/main/Screenshoot/trayek.png?raw=true)

-----

## 👤 Developer

**Alfianita Ingsiany 20210801173** – [GitHub Profile](https://github.com/auwfiii)
-----

```
```

<p align="center"><a href="https://imgbb.com/"><img src="https://i.ibb.co.com/RH7qd4j/120px-Exit-profile.png" alt="120px-Exit-profile" border="0"></a></p>

## UKK Surat Menyurat
Bissmilah

## Fitur Yang Tersedia
- Authentication
  - Login
  - Register
- User
  - Admin
    - Manajemen User (menghapus, mengedit dan menambahkan)
    - Manajemen Surat (menghapus, mengedit, menambahkan, menyetujui/menolak surat dan print surat to pdf)
    - Manajemen Jenis Surat (menghapus, mengedit dan menambahkan)
    - Manajemen Kategori Surat (menghapus, mengedit dan menambahkan)
    - Manajemen Penduduk (menghapus, mengedit, menambahkan dan melihat detail penduduk)
    - Manajemen Pekerjaan (menghapus, mengedit dan menambahkan)
- HomePage
  - Pengajuan Surat
  - Pengecekan Surat
 
## Database Schema / Skema Database
<a href="https://ibb.co.com/4dGPyhR"><img src="https://i.ibb.co.com/tXt8fVp/Untitled-2.png" alt="Untitled-2" border="0"></a>

## UML Diagram Use Case
![alt text](https://raw.githubusercontent.com/Idkhowtoplay/ukk-persuratan/refs/heads/main/ya.drawio.png)

## Teknologi Yang Digunakan
- [Laravel 9](https://laravel.com/docs/9.x/releases)
- [Bootstrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/)
- [DataTables](https://datatables.net/)

## Persyaratan Untuk Melakukan Instalasi
- PHP 8.2.12 & Web Server (Apache)
- Database (MariaDB)
- Web Browser (Chrome)

## Installation / Instalasi

Jalankan perintah berikut untuk menginstal dependensi php dan Composer
```
composer install
npm install; npm run dev
```
Jalankan perintah berikut untuk mengubah .env.example menjadi .env
```
cp .env.example .env
```
Pastikan Anda telah membuat database baru di MySQL dan silakan sesuaikan file .env dengan database Anda. Jalankan perintah berikut untuk membuat key untuk web app Anda
```
php artisan key:generate
```
Jalankan Perintah Berikut untuk menghubungkan folder public Anda dengan storage
```
php artisan storage:link
```
Taruh gambar ini di storage dan ubah namanya menjadi kop

<a href="https://ibb.co.com/wzDs6DQ"><img src="https://i.ibb.co.com/gRsVgsW/kop.png" alt="kop" border="0"></a>

Run Migration
```
php artisan migrate
```
Start Server(jangan lupa nyalain xampp ygy)
```
php artisan serve
```
## Star History

[![Star History Chart](https://api.star-history.com/svg?repos=Idkhowtoplay/PROJECT-UKK-PERSURATAN-AKZ&type=Date)](https://star-history.com/#Idkhowtoplay/PROJECT-UKK-PERSURATAN-AKZ&Date)

**ukk persuratan dibuat oleh [idkhowtoplay](https://github.com/Idkhowtoplay) (muhamad akbar zainuri)**

<p align="center"><a href="https://imgbb.com/"><img src="https://i.ibb.co.com/RH7qd4j/120px-Exit-profile.png" alt="120px-Exit-profile" border="0"></a></p>

## UKK Surat Menyurat
WishMeLux

## Database Schema / Skema Database
<a href="https://ibb.co.com/4dGPyhR"><img src="https://i.ibb.co.com/tXt8fVp/Untitled-2.png" alt="Untitled-2" border="0"></a>

## Installation / Instalasi

Jalankan perintah berikut untuk menginstal dependensi php
```
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
Run Migration
```
php artisan migrate
```
Start Server(jangan lupa nyalain xampp ygy)
```
php artisan serve
```

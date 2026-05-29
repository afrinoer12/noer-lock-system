<div align="center">

<img src="https://capsule-render.vercel.app/api?type=waving&color=0:38BDF8,50:8B5CF6,100:22C55E&height=220&section=header&text=Noer%20Lock%20System&fontSize=45&fontColor=ffffff&animation=fadeIn&fontAlignY=38&desc=Smart%20Door%20Lock%20Monitoring%20Dashboard&descAlignY=58&descSize=17" />

<br>

<img src="https://readme-typing-svg.herokuapp.com?font=Poppins&weight=700&size=26&duration=3000&pause=800&color=38BDF8&center=true&vCenter=true&width=700&lines=Laravel+Smart+Door+Lock+System;Fingerprint+Access+Monitoring;IoT+Dashboard+with+Modern+UI;Secure+Door+Control+System" />

<br><br>

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![IoT](https://img.shields.io/badge/IoT-Smart%20Door-22C55E?style=for-the-badge)
![Status](https://img.shields.io/badge/Status-Development-38BDF8?style=for-the-badge)

</div>

---

# 🔐 Noer Lock System

**Noer Lock System** adalah aplikasi web berbasis **Laravel** untuk monitoring dan kontrol akses **Smart Door Lock** menggunakan fingerprint.

Project ini dirancang untuk membantu admin memantau status pintu, mengelola data fingerprint, melihat riwayat akses, serta mengontrol pintu secara manual melalui dashboard web.

---

## ✨ Preview Concept

<div align="center">

<img src="https://images.unsplash.com/photo-1558002038-1055907df827?auto=format&fit=crop&w=1200&q=80" width="90%" style="border-radius:20px;" />

</div>

---

## 🚀 Fitur Utama

✅ Dashboard monitoring smart door lock  
✅ Status pintu: terkunci / terbuka  
✅ Kontrol pintu manual dari web  
✅ Data pengguna fingerprint  
✅ Tambah dan hapus data fingerprint  
✅ Riwayat akses berhasil dan ditolak  
✅ Sistem berbasis Laravel  
✅ Database MySQL  
✅ Desain dark mode modern  
✅ Responsive untuk laptop dan HP  
✅ Siap dikembangkan untuk integrasi ESP32 / Arduino  

---

## 🧠 Konsep Sistem

```text
Sensor Fingerprint
        ↓
ESP32 / Arduino
        ↓
API Laravel
        ↓
Database MySQL
        ↓
Dashboard Web Admin
        ↓
Solenoid Door Lock
```

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Fungsi |
|---|---|
| Laravel | Framework backend |
| PHP | Bahasa pemrograman utama |
| MySQL | Database |
| Blade | Template tampilan |
| HTML | Struktur halaman |
| CSS | Desain dashboard |
| JavaScript | Interaksi halaman |
| ESP32 / Arduino | Mikrokontroler IoT |
| Fingerprint Sensor | Sistem autentikasi akses |
| Solenoid Door Lock | Pengunci pintu otomatis |

---

## 📌 Fitur Dashboard

| Fitur | Keterangan |
|---|---|
| Status Pintu | Menampilkan pintu sedang terkunci atau terbuka |
| Total Fingerprint | Menampilkan jumlah pengguna fingerprint |
| Akses Berhasil | Menghitung akses yang diterima |
| Akses Ditolak | Menghitung akses yang ditolak |
| Kontrol Pintu | Tombol buka dan kunci pintu |
| Riwayat Akses | Menampilkan aktivitas akses terbaru |

---

## 📁 Struktur Project

```bash
noer-lock-system/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── DashboardController.php
│   │       ├── DoorController.php
│   │       └── FingerprintUserController.php
│   │
│   └── Models/
│       ├── DoorStatus.php
│       ├── FingerprintUser.php
│       └── AccessLog.php
│
├── database/
│   └── migrations/
│
├── resources/
│   └── views/
│       ├── dashboard.blade.php
│       └── fingerprint/
│           └── index.blade.php
│
├── routes/
│   └── web.php
│
├── public/
├── .env.example
├── artisan
├── composer.json
└── README.md
```

---

## ⚙️ Cara Install Project

### 1. Clone Repository

```bash
git clone https://github.com/afrinoer12/noer-lock-system.git
```

### 2. Masuk ke Folder Project

```bash
cd noer-lock-system
```

### 3. Install Dependency Laravel

```bash
composer install
```

### 4. Copy File Environment

```bash
copy .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

---

## 🗄️ Setup Database

Buat database baru di phpMyAdmin:

```text
noer_lock_system
```

Lalu ubah file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=noer_lock_system
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migration:

```bash
php artisan migrate:fresh
```

---

## ▶️ Menjalankan Project

```bash
php artisan serve
```

Buka browser:

```text
http://127.0.0.1:8000
```

Atau langsung ke dashboard:

```text
http://127.0.0.1:8000/dashboard
```

---

## 🔐 Data Fingerprint

Halaman data fingerprint digunakan untuk mengelola pengguna yang memiliki akses ke pintu.

Data yang disimpan:

```text
ID Fingerprint
Nama Pengguna
Role
Status Aktif / Nonaktif
```

Contoh:

```text
ID Fingerprint : 1
Nama           : Afrizal Noer
Role           : Admin
Status         : Active
```

---

## 📊 Riwayat Akses

Setiap aktivitas akses akan disimpan ke database.

Data yang dicatat:

```text
Nama Pengguna
ID Fingerprint
Status Akses
Keterangan
Waktu Akses
```

Status akses:

```text
success = akses diterima
denied  = akses ditolak
```

---

## 🔌 Rencana Integrasi IoT

Project ini dapat dikembangkan dengan perangkat:

| Komponen | Fungsi |
|---|---|
| ESP32 | Mikrokontroler utama |
| Fingerprint Sensor | Membaca sidik jari |
| Solenoid Door Lock | Membuka dan mengunci pintu |
| Relay | Mengontrol solenoid |
| Buzzer | Notifikasi suara |
| LCD | Menampilkan status sistem |
| Push Button | Tombol manual |

---

## 🌐 API Rencana ESP32

Contoh endpoint yang akan digunakan ESP32:

```text
POST /api/access
GET  /api/door/status
POST /api/door/update
```

Contoh request fingerprint:

```json
{
  "fingerprint_id": 1
}
```

Contoh response akses diterima:

```json
{
  "access": true,
  "message": "Akses diterima",
  "name": "Afrizal Noer"
}
```

---

## 🎨 Konsep Desain

Project ini menggunakan konsep **modern IoT dashboard** dengan tema:

```text
Dark Mode
Neon Blue
Glassmorphism Card
Smart Security Style
Responsive Layout
```

Warna utama:

| Warna | Kode |
|---|---|
| Dark Navy | `#020617` |
| Card Dark | `#0F172A` |
| Blue Neon | `#38BDF8` |
| Green Success | `#22C55E` |
| Red Danger | `#EF4444` |
| Purple Accent | `#8B5CF6` |

---

## 📌 Tujuan Project

Project ini dibuat untuk:

- Membuat sistem monitoring pintu pintar
- Mengelola akses pengguna fingerprint
- Mencatat riwayat akses pintu
- Membantu admin memantau status pintu
- Menjadi dasar integrasi Laravel dengan IoT
- Menjadi project portfolio Laravel dan IoT

---

## 🧩 Status Pengembangan

| Modul | Status |
|---|---|
| Setup Laravel | ✅ Selesai |
| Database MySQL | ✅ Selesai |
| Dashboard | ✅ Selesai |
| Kontrol Pintu Web | ✅ Selesai |
| Data Fingerprint | ✅ Selesai |
| Riwayat Akses | 🔄 Pengembangan |
| API ESP32 | 🔄 Pengembangan |
| Integrasi Sensor | 🔄 Pengembangan |

---

## 👨‍💻 Developer

<div align="center">

### Afrizal Noer

[![GitHub](https://img.shields.io/badge/GitHub-afrinoer12-181717?style=for-the-badge&logo=github)](https://github.com/afrinoer12)
[![Email](https://img.shields.io/badge/Email-afrinoer12%40gmail.com-D14836?style=for-the-badge&logo=gmail&logoColor=white)](mailto:afrinoer12@gmail.com)

</div>

---

## ⭐ Support Project

Kalau project ini bermanfaat, jangan lupa beri bintang di repository ini.

<div align="center">

<img src="https://capsule-render.vercel.app/api?type=waving&color=0:38BDF8,50:8B5CF6,100:22C55E&height=120&section=footer" />

</div>

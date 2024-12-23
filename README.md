# AcaraKita

AcaraKita adalah sebuah website pemesanan tiket event secara online. Dengan AcaraKita, pengguna dapat dengan mudah mencari, memilih, dan memesan tiket untuk berbagai acara yang tersedia.

## UAS Pemrograman Web

-   Nama: Joshua Palti Sinaga
-   NIM: 122140141
-   Kelas: RA

## Deskripsi Aplikasi

AcaraKita menyediakan berbagai fitur yang memudahkan pengguna dalam melakukan pemesanan tiket event. Beberapa fitur utama yang tersedia di AcaraKita antara lain:

-   Pencarian Acara: Pengguna dapat mencari acara berdasarkan kategori, tanggal, atau lokasi.
-   Detail Acara: Setiap acara memiliki halaman detail yang memberikan informasi lengkap tentang acara tersebut, termasuk deskripsi, lokasi, tanggal, dan harga tiket.
-   Pemesanan Tiket: Pengguna dapat memilih jumlah tiket yang ingin dipesan dan melakukan pembayaran secara online.

(preview gambar)

## Struktur Proyek

```
assets/
├── css/
│   └── style.css
├── img/
│   ├── background.webp
│   └── hero.webp
└── js/
    └── cookie.js

helper/
└── database/
    ├── EventController.php
    ├── Koneksi.php
    ├── RegistrationController.php
    └── UserController.php
    model/
    ├── Event.php
    ├── Registration.php
    └── User.php

account.php
dashboard.php
detail.php
index.php
login.php
logout.php
README.md
register.php
tailwind.config.ts
```

## 3. Database

### 3.1 Pembuatan Tabel Database

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

```sql
CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    category VARCHAR(50) NOT NULL,
    location VARCHAR(255) NOT NULL,
    description TEXT,
    date DATE NOT NULL,
    price INTEGER NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

```sql
CREATE TABLE registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    event_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    payment_method ENUM('Transfer', 'E-Wallet') NOT NULL,
    quantity INT NOT NULL,
    total_price INT NOT NULL,
    chair_number INT,
    ip_address VARCHAR(50),
    browser TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (event_id) REFERENCES events(event_id)
);
```

### **Bagian 1: Client-side Programming (Bobot: 30%)**

#### 1.1 Manipulasi DOM dengan JavaScript (15%)

-   **a)** Buat form input dengan minimal 4 elemen input

    -   **login.php** dan **detail.php** memiliki form input berupa text, password, select, dan button submit.

-   **b)** Menampilkan data dari server ke dalam sebuah tabel HTML

    -   **detail.php** menampilkan tabel registrasi peserta.

#### 1.2 Event Handling (15%)

-   **a)** Tambahkan minimal 3 event yang berbeda untuk meng-handle form pada 1.1.
    -   **detail.php Line 329-331** (keyup, change, submit)
-   **b)** Implementasikan JavaScript untuk validasi setiap input sebelum diproses oleh PHP.
    -   **login.php Line 108**
    -   **register.php Lin 119**
    -   **detail.php Line 307** validateForm() untuk memeriksa input form sebelum submit.

---

### **Bagian 2: Server-side Programming (Bobot: 30%)**

#### 2.1 Pengelolaan Data dengan PHP (20%)

-   **a)** Gunakan metode POST atau GET pada formulir

    -   **login.php Line 3**
    -   **register.php Line 3**
    -   **detail.php** (POST, GET, PUT, DELETE)

-   **b)** Parsing data dari variabel global dan lakukan validasi di sisi server

    -   **login.php Line 5**
    -   **register.php Line 5**
    -   **detail.php**

-   **c)** Simpan ke basis data termasuk jenis browser dan alamat IP pengguna
    -   **detail.php Line 16** menggunakan \$\_SERVER['REMOTE_ADDR'] dan \$\_SERVER['HTTP_USER_AGENT']

#### 2.2 Objek PHP Berbasis OOP (10%)

-   **a)** Buat sebuah objek PHP berbasis OOP yang memiliki minimal dua metode dan gunakan objek tersebut dalam skenario tertentu.
    -   PHP OOP diimplementasikan pada direktori /helper (**EventController.php, RegistrationController.php, UserController.php**, **Event.php, Registration.php, User.php**, **Koneksi.php**)

---

### **Bagian 3: Database Management (Bobot: 20%)**

#### 3.1 Pembuatan Tabel Database (5%)

Database Dump terdapat di _acarakita.sql_:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

```sql
CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    category VARCHAR(50) NOT NULL,
    location VARCHAR(255) NOT NULL,
    description TEXT,
    date DATE NOT NULL,
    price INTEGER NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

```sql
CREATE TABLE registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    event_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    payment_method ENUM('Transfer', 'E-Wallet') NOT NULL,
    quantity INT NOT NULL,
    total_price INT NOT NULL,
    chair_number INT,
    ip_address VARCHAR(50),
    browser TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (event_id) REFERENCES events(event_id)
);
```

### **3.2 Konfigurasi Koneksi Database (5%)**

-   **a)** Buat file konfigurasi koneksi database.
    -   **Koneksi.php** di direktori /helper/database.
    -   Kredensial database:
        ```php
        $host = 'localhost';
        $db = 'acarakita';
        $user = 'acarakita123';
        $pass = 'acarakita123';
        ```

### **3.3 Manipulasi Data pada Database (10%)**

-   **a)** Implementasikan operasi CRUD pada aplikasi web Anda.
    -   **EventController.php** memiliki fungsi CRUD untuk tabel _events_
    -   **RegistrationController.php** memiliki fungsi CRUD untuk tabel _registrations_
    -   **UserController.php** memiliki fungsi CRUD untuk tabel _users_.

---

### **Bagian 4: State Management (Bobot: 20%)**

#### **4.1 State Management dengan Session (10%)**

-   **a)** Gunakan `session_start()` untuk memulai session. digunakan diseluruh halaman untuk menyimpan data user yang sedang login

-   **b)** Simpan informasi pengguna ke dalam session.  
    **detail.php** dan **logout.php** menggunakan session ini dengan \$\_SESSION['user'] untuk membuat data registrasi event

#### **4.2 Pengelolaan State dengan Cookie dan Browser Storage (10%)**

-   **a)** Buat fungsi untuk menetapkan, mendapatkan, dan menghapus cookie.  
    Cookie digunakan untuk menyimpan halaman terakhir yang dikunjungi pengguna (terlihat di semua halaman).
    Di file _/assets/js/cookie.js_ terdapat fungsi:
    -   Menetapkan cookie menggunakan `setCookie`.
    -   Mendapatkan cookie menggunakan `getCookie`.
    -   Menghapus cookie menggunakan `deleteCookie`.
    -   Membersihkan semua cookie menggunakan `clearCookies`.

-   **b)** Gunakan browser storage untuk menyimpan informasi secara lokal.  
    Local Storage digunakan untuk menyimpan data pencarian terakhir pada halaman **dashboard.php**

---

### **Bagian Bonus: Hosting Aplikasi Web (Bobot: 20%)**

#### **5%** Apa langkah-langkah yang Anda lakukan untuk meng-host aplikasi web Anda?

-   Pilih penyedia hosting (AWS, DigitalOcean, Heroku).
-   Siapkan server sesuai kebutuhan (CPU, RAM, OS).
-   Deploy aplikasi via FTP atau CI/CD.
-   Daftarkan dan arahkan domain ke server.
-   Uji aplikasi dan gunakan tools untuk monitoring.
-   Terapkan caching dan backup rutin.

#### **5%** Pilih penyedia hosting web yang menurut Anda paling cocok untuk aplikasi web Anda.

-   **AWS**: Fleksibel dan skalabel.
-   **Heroku**: Mudah digunakan untuk aplikasi kecil.
-   **DigitalOcean**: Terjangkau dan dapat disesuaikan.
-   **Netlify**: Cocok untuk aplikasi statis dengan CI/CD.

#### **5%** Bagaimana Anda memastikan keamanan aplikasi web yang Anda host?

-   Gunakan HTTPS untuk enkripsi data.
-   Terapkan firewall dan VPN untuk akses aman.
-   Pastikan update keamanan sistem secara rutin.
-   Lakukan backup dan siapkan redundansi.
-   Gunakan pemantauan keamanan dan autentikasi API.

#### **5%** Jelaskan konfigurasi server yang Anda terapkan untuk mendukung aplikasi web Anda.

-   Gunakan web server (Apache/Nginx) untuk menangani trafik.
-   Sesuaikan konfigurasi database (MySQL/PostgreSQL).
-   Terapkan load balancing untuk trafik tinggi.
-   Gunakan caching (Redis/Memcached).
-   Manfaatkan environment variables untuk data sensitif.
-   Terapkan sistem logging untuk monitoring.

---

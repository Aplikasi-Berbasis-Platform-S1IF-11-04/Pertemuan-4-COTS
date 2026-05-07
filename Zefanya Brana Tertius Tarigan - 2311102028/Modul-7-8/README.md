<h1 align="center">LAPORAN PRAKTIKUM</h1>
<h1 align="center">APLIKASI BERBASIS PLATFORM</h1>

<br>

<h2 align="center">TUGAS 2</h2>
<h2 align="center">Modul 7 & 8</h2>

<br>

<p align="center">
  <img src="./Asset/LogoTelkom.png" width="250" alt="Logo Telkom University">
</p>
<br><br>

<h2 align="center">Disusun Oleh :</h2>

<p align="center" style="font-size:28px;">
  <b>Zefanya Brana Tertius Tarigan</b><br>
  <b>2311102028</b><br>
  <b>S1 Informatika</b>
</p>

<br>

<h2 align="center">PROGRAM STUDI S1 INFORMATIKA</h2>
<h2 align="center">FAKULTAS INFORMATIKA</h2>
<h2 align="center">TELKOM UNIVERSITY</h2>
<h2 align="center">TAHUN 2026</h2>

<hr>

## 1. Dasar Teori

### NodeJS (Express)
NodeJS merupakan runtime JavaScript yang digunakan untuk menjalankan kode JavaScript di sisi server. Pada project ini, NodeJS digunakan bersama framework Express untuk mengatur routing halaman, menangani request dan response, serta menjalankan proses CRUD.

### Bootstrap
Bootstrap adalah framework CSS yang digunakan untuk membangun tampilan website agar lebih rapi, responsif, dan modern. Pada project ini, Bootstrap digunakan untuk membuat navbar, card, button, form, dan tabel.

### jQuery dan jQuery Plugin
jQuery adalah library JavaScript yang mempermudah manipulasi elemen HTML, event handling, dan interaksi halaman. Pada project ini, jQuery digunakan bersama plugin:
- DataTables
- jQuery Validate
- jQuery Toast

### CRUD
CRUD adalah singkatan dari Create, Read, Update, Delete. Pada project ini:
- Create digunakan untuk menambah data mahasiswa berprestasi
- Read digunakan untuk menampilkan data mahasiswa berprestasi
- Update digunakan untuk mengubah data mahasiswa berprestasi
- Delete digunakan untuk menghapus data mahasiswa berprestasi

### JSON
JSON adalah format pertukaran data yang ringan dan mudah dibaca. Pada project ini, data mahasiswa disimpan dalam file `students.json` dan ditampilkan ke tabel menggunakan DataTables.

## 2. Struktur Halaman

Aplikasi ini memiliki halaman utama sebagai berikut:

### Halaman Home
Halaman home merupakan halaman awal aplikasi yang berisi judul aplikasi, deskripsi singkat, dan tombol navigasi ke halaman input data serta tabel data mahasiswa berprestasi.

<p align="center">
  <img src="./Asset/Page%201.png" width="700" alt="Halaman Home">
</p>

### Halaman Form (Input Data) - Create
Halaman ini digunakan untuk memasukkan data mahasiswa berprestasi, seperti NIM, nama, jurusan, dan email. Data yang diinput akan diproses oleh server dan disimpan ke dalam file JSON.

<p align="center">
  <img src="./Asset/Page%202.png" width="700" alt="Halaman Form Input">
</p>

### Halaman Data (Tabel) - Read, Update & Delete
Halaman ini digunakan untuk menampilkan data mahasiswa dalam bentuk tabel interaktif menggunakan jQuery DataTables. Data diambil dari server dalam format JSON dan ditampilkan secara dinamis. Halaman ini juga menyediakan tombol Edit untuk memperbarui data dan tombol Hapus untuk menghapus data mahasiswa.

<p align="center">
  <img src="./Asset/Page%203.png" width="700" alt="Halaman Tabel Data">
</p>

### Halaman Edit
Halaman edit digunakan untuk memperbarui data mahasiswa yang sudah tersimpan. Form edit akan menampilkan data lama, lalu pengguna dapat mengubah data tersebut dan menyimpannya kembali.

## 3. Struktur Folder

```text
web-crud-app
│
├── app.js
├── package.json
├── package-lock.json
│
├── Asset
│   ├── LogoTelkom.png
│   ├── Page 1.png
│   ├── Page 2.png
│   └── Page 3.png
│
├── data
│   └── students.json
│
├── public
│   ├── css
│   │   └── style.css
│   └── js
│       ├── form.js
│       └── table.js
│
└── views
    ├── index.ejs
    ├── students.ejs
    ├── create.ejs
    ├── edit.ejs
    └── partials
        ├── header.ejs
        └── footer.ejs
```

### Penjelasan Struktur Folder

| File / Folder | Keterangan |
|--------------|-----------|
| `app.js` | File utama NodeJS (Express) yang mengatur routing halaman, endpoint JSON, dan proses CRUD data mahasiswa. |
| `package.json` | File konfigurasi project yang berisi informasi project, script untuk menjalankan aplikasi, dan daftar dependency yang digunakan. |
| `package-lock.json` | File lock dependency hasil instalasi npm untuk memastikan versi package yang digunakan tetap konsisten. |
| `Asset/` | Folder yang berisi logo dan dokumentasi output aplikasi berupa screenshot halaman project. |
| `Asset/LogoTelkom.png` | File logo yang ditampilkan pada bagian atas laporan di `README.md`. |
| `Asset/Page 1.png` | Screenshot halaman Home aplikasi. |
| `Asset/Page 2.png` | Screenshot halaman Form Input Data. |
| `Asset/Page 3.png` | Screenshot halaman Tabel Data Mahasiswa. |
| `data/` | Folder penyimpanan data utama aplikasi dalam format JSON. |
| `data/students.json` | File JSON yang berisi data mahasiswa dan digunakan sebagai sumber data pada tabel DataTables. |
| `public/` | Folder untuk file statis yang dapat diakses langsung oleh browser. |
| `public/css/` | Folder untuk file CSS tambahan. |
| `public/css/style.css` | File CSS yang digunakan untuk menambahkan styling khusus pada tampilan aplikasi. |
| `public/js/` | Folder untuk file JavaScript frontend. |
| `public/js/form.js` | File JavaScript yang berisi validasi form menggunakan jQuery Validate dan notifikasi menggunakan jQuery Toast. |
| `public/js/table.js` | File JavaScript yang berisi implementasi DataTables untuk menampilkan data JSON ke dalam tabel. |
| `views/` | Folder template EJS yang digunakan untuk menampilkan halaman aplikasi. |
| `views/index.ejs` | File halaman Home atau halaman utama aplikasi. |
| `views/create.ejs` | File halaman Form Input untuk menambahkan data mahasiswa. |
| `views/students.ejs` | File halaman Tabel Data yang menampilkan data mahasiswa dengan DataTables. |
| `views/edit.ejs` | File halaman Edit Data untuk memperbarui data mahasiswa. |
| `views/partials/` | Folder untuk komponen halaman yang digunakan berulang. |
| `views/partials/header.ejs` | Bagian header yang berisi struktur awal HTML, import Bootstrap CSS, dan navbar aplikasi. |
| `views/partials/footer.ejs` | Bagian footer yang berisi import jQuery, DataTables, jQuery Validate, jQuery Toast, dan penutup HTML. |

## 4. Kode Program

### 4.1 Penggunaan Framework Bootstrap
Bootstrap digunakan pada file:
- `views/partials/header.ejs`
- `views/index.ejs`
- `views/create.ejs`
- `views/students.ejs`
- `views/edit.ejs`

Contoh kode:
```html
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
```

Contoh class Bootstrap yang digunakan:
```html
class="navbar navbar-expand-lg navbar-dark bg-primary"
class="container"
class="btn btn-success"
class="btn btn-primary"
class="card shadow-sm"
class="form-control"
class="form-select"
class="table table-bordered"
```

**Penjelasan:**  
Bootstrap digunakan sebagai framework frontend untuk membangun tampilan aplikasi agar lebih rapi, responsif, dan mudah digunakan. Pada project ini, Bootstrap diterapkan pada komponen seperti navbar, tombol, card, form input, dan tabel data. Dengan adanya Bootstrap, proses pembuatan antarmuka menjadi lebih cepat karena sudah tersedia class bawaan yang siap digunakan.

### 4.2 3 Halaman Fungsional & CRUD Lengkap
Aplikasi ini memiliki halaman utama:
- `views/index.ejs` sebagai halaman **Home**
- `views/create.ejs` sebagai halaman **Form Input**
- `views/students.ejs` sebagai halaman **Tabel Data**
- `views/edit.ejs` sebagai halaman **Edit Data**

Route halaman pada `app.js`:
```javascript
app.get('/', (req, res) => {
  res.render('index', { title: 'Home' });
});

app.get('/students', (req, res) => {
  res.render('students', { title: 'Data Mahasiswa' });
});

app.get('/students/create', (req, res) => {
  res.render('create', { title: 'Tambah Mahasiswa' });
});

app.get('/students/:id/edit', (req, res) => {
  const students = readStudents();
  const student = students.find(item => item.id == req.params.id);

  res.render('edit', {
    title: 'Edit Mahasiswa',
    student
  });
});
```

CRUD pada `app.js`:
```javascript
app.post('/students', (req, res) => {
```

```javascript
app.get('/students/json', (req, res) => {
```

```javascript
app.put('/students/:id', (req, res) => {
```

```javascript
app.delete('/students/:id', (req, res) => {
```

**Penjelasan:**  
Aplikasi memiliki lebih dari 3 halaman fungsional, yaitu Home, Form Input, Tabel Data, dan Edit Data. Selain itu, aplikasi juga sudah menerapkan CRUD lengkap:
- **Create** untuk menambah data mahasiswa
- **Read** untuk menampilkan data mahasiswa
- **Update** untuk mengubah data mahasiswa
- **Delete** untuk menghapus data mahasiswa

### 4.3 Menggunakan NodeJS / Framework CodeIgniter
Project ini menggunakan **NodeJS** dengan framework **Express**.

Kode pada `app.js`:
```javascript
const express = require('express');
const bodyParser = require('body-parser');
const methodOverride = require('method-override');

const app = express();
const PORT = 3000;
```

Kode pada `package.json`:
```json
"scripts": {
  "start": "node app.js"
}
```

**Penjelasan:**  
NodeJS digunakan sebagai backend utama pada project ini. Framework Express berfungsi untuk menjalankan server, mengatur routing halaman, membaca input dari form, serta menangani seluruh proses CRUD. Dengan NodeJS, aplikasi dapat berjalan secara dinamis dan tidak hanya berupa tampilan statis.

### 4.4 Menggunakan jQuery & jQuery Plugin secara Lengkap
jQuery dan plugin dipakai di `views/partials/footer.ejs`:
```html
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
```

Penggunaan pada `public/js/form.js`:
```javascript
$('#studentForm').validate({
```

```javascript
$.toast({
```

Penggunaan pada `public/js/table.js`:
```javascript
$('#studentsTable').DataTable({
```

**Penjelasan:**  
jQuery digunakan untuk mempermudah manipulasi elemen halaman dan menangani event pada form maupun tabel. Plugin yang digunakan pada project ini adalah:
- **DataTables** untuk membuat tabel lebih interaktif
- **jQuery Validate** untuk validasi form input
- **jQuery Toast** untuk menampilkan notifikasi sukses

Dengan kombinasi tersebut, tampilan aplikasi menjadi lebih interaktif dan mudah digunakan.

### 4.5 Implementasi JSON pada DataTable
Data JSON disimpan pada `data/students.json`

Contoh:
```json
[
  {
    "id": 1,
    "nim": "2311102028",
    "nama": "Zefanya Tarigan",
    "jurusan": "Informatika",
    "email": "zefanyabrana@email.com"
  }
]
```

Endpoint JSON di `app.js`:
```javascript
app.get('/students/json', (req, res) => {
  const students = readStudents();
  res.json({ data: students });
});
```

Implementasi DataTables di `public/js/table.js`:
```javascript
$('#studentsTable').DataTable({
  ajax: '/students/json',
  columns: [
    { data: 'nim' },
    { data: 'nama' },
    { data: 'jurusan' },
    { data: 'email' }
  ]
});
```

**Penjelasan:**  
Data mahasiswa disimpan dalam file `students.json` dalam format JSON. Backend kemudian menyediakan endpoint `/students/json` untuk mengirim data tersebut ke frontend. Selanjutnya, DataTables membaca data JSON melalui AJAX dan menampilkannya ke dalam tabel. Dengan cara ini, tabel tidak diisi manual, tetapi berasal dari data JSON secara dinamis.

## 5. Kesimpulan

Project ini adalah aplikasi web sederhana untuk mengelola data mahasiswa berprestasi dengan fitur tambah, tampil, edit, dan hapus data. Aplikasi dibuat menggunakan NodeJS sebagai backend dan Bootstrap untuk tampilan, sehingga halaman terlihat lebih rapi dan mudah digunakan. Selain itu, project ini juga memakai jQuery beserta plugin seperti DataTables, Validate, dan Toast agar tabel lebih interaktif, form bisa divalidasi, dan notifikasi dapat tampil dengan baik. Data mahasiswa disimpan dalam format JSON dan ditampilkan ke tabel, sehingga aplikasi dapat berjalan sesuai fungsi yang dirancang.

## 6. Link Video Presentasi

Tambahkan link video presentasi di sini.

Contoh:
```text
(https://drive.google.com/drive/folders/1irJ7o_K69CUdq2W7iyxGskoOSfdBsEvl?usp=sharing)
```

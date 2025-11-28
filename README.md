# TP10DPBO2425C1
Proyek ini menggunakan framework MVVM 

## Janji
Saya Muhammad Rizkiana Pratama dengan NIM 2404421 mengerjakan Tugas Praktikum Latihan 10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Desain Program
### 1. **index.php**
- Berfungsi sebagai *entry point* dan router.
- Menerima parameter seperti `?entity=student&action=list`.
- Berdasarkan parameter tersebut, index memanggil ViewModel dan View yang sesuai.

### 2. **DB.php**
- Membuat dan menyediakan koneksi database menggunakan PDO.
- Digunakan oleh semua file di folder `models`.

### 3. **Models**
Setiap file model memiliki:
- Struktur data (property).
- Operasi database seperti `getAll()`, `insert()`, `update()`, `delete()`.
  
Contoh:
- `Student.php` mengelola data mahasiswa.
- `Lecturer.php` mengelola dosen.
- `Course.php` mengelola mata kuliah.
- `Enrollment.php` mengelola relasi mahasiswa dengan mata kuliah.

### 4. **ViewModels**
Bagian ini menjalankan logika penghubung, misalnya:
- Mengambil semua mahasiswa lalu meneruskan ke view.
- Mempersiapkan data pilihan dropdown (contoh: daftar dosen untuk pilihan pengampu).
- Memvalidasi input sederhana sebelum diteruskan ke model.

### 5. **Views**
Folder ini menyediakan file tampilan:
- `*_list.php` menampilkan data dalam tabel.
- `*_form.php` menampilkan form tambah/edit.
- Semua view memanggil template `header.php` dan `footer.php` agar tampil konsisten.

## Struktur Program
TP10/
│   index.php
│   README.md
│   
├───config/
│       DB.php
│       
├───db/
├───models
│       Course.php
│       Enrollment.php
│       Lecturer.php
│       Student.php
│       
├───viewmodels/
│       CourseViewModel.php
│       EnrollmentViewModel.php
│       LecturerViewModel.php
│       StudentViewModel.php
│       
└───views/
    │   course_form.php
    │   course_list.php
    │   enrollment_form.php
    │   enrollment_list.php
    │   lecturer_form.php
    │   lecturer_list.php
    │   student_form.php
    │   student_list.php
    │
    └───template/
            footer.php
            header.php

## Desain Database
<img width="1302" height="317" alt="Screenshot 2025-11-28 150813" src="https://github.com/user-attachments/assets/352ac5c2-f761-47f1-9bd9-9c80ba8d6eef" />


## Penjelasan Alur Program
1. Pengguna membuka halaman utama (`index.php`).
2. Memilih entitas, misalnya Students.
3. `index.php` memanggil StudentViewModel.
4. ViewModel mengambil data dari Student model.
5. View (`student_list.php`) menampilkan data.
6. Pengguna memilih tambah/edit/hapus.
7. ViewModel memproses permintaan, memanggil model, lalu mengembalikan hasil ke view.


## Dokumentasi

https://github.com/user-attachments/assets/73e5653f-bd86-4207-ad0c-16076ad4e21d


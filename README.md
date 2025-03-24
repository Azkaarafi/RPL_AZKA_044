# RPL_AZKA_044

![image](https://github.com/user-attachments/assets/3e88bef4-fde6-461d-9804-f8f6c95301d0)

Medlog merupakan sistem digital yang digunakan untuk menyimpan, mengelola, dan mengakses catatan kesehatan pasien. Biasanya, 
aplikasi ini digunakan oleh rumah sakit, klinik, atau dokter pribadi untuk mencatat riwayat kesehatan pasien secara terstruktur.
dan bersifat rahasia bagi rumah sakit itu sendiri. Sehingga hanya pihak pihak tertentu yang bisa melakukan akses seperti dokter dan perawat. 
Sistem ini mendukung fitur CRUD untuk pengguna, dokter, perawat, dan rekam medis.

1. Jenis Aplikasi
      Aplikasi Rekam Medis Sederhana berbasis Web dengan Laravel + MySQL.

2. Pemilihan Database dan Framework
      Framework: Laravel
      
      -Laravel menyediakan ORM (Eloquent) yang mempermudah pengelolaan database.
      
      -Memiliki fitur built-in untuk autentikasi yang mempermudah pengelolaan login dokter dan perawat.
      
      -Mendukung routing dan middleware untuk mengatur akses berdasarkan peran pengguna.
      
      Database: MySQL
      
      -Cocok untuk data yang terstruktur (pasien, dokter, rekam medis).
      
      -Mendukung transaksi ACID untuk integritas data.
      
      -Mudah diintegrasikan dengan Laravel melalui Eloquent ORM.
      
      -Memungkinkan penggunaan relasi antar tabel untuk menghubungkan data pengguna, dokter, perawat, dan rekam medis.


3. Struktur Database
   
  ![CDM](https://github.com/user-attachments/assets/b9ba26b6-bcc1-46db-b075-f5ac0b7c402a)  
  
  
  ![PDM](https://github.com/user-attachments/assets/e35f8b13-cda3-45e2-ae00-4860da744679)
  
  
  ![Screenshot 2025-03-24 231349](https://github.com/user-attachments/assets/87a40a2c-526f-4014-9cb5-4d3881324a2c)
  

4. Fitur Aplikasi

   Autentikasi:
   
    -Login/logout untuk dokter dan perawat.
   
    -Role-based access control (dokter & perawat memiliki hak akses berbeda).

   Manajemen Data
   
    -Dokter dapat menyimpan, mengupdate, dan menghapus data rekam medis pasien.

    -Dokter dan pperawat memiliki tabel tersendiri yang menyimpan id nama serta informasi penting
   
     lainnya,dengan yang memiliki foreign key terhadap tabel registrasi,login dan rekam medis


6. Justifikasi Pemilihan Database


      Menggunakan MySQL sebagai relational database karena:
      
      -Data pasien, dokter, dan perawat memiliki hubungan tetap dan terstruktur.
      
   
      -MySQL mendukung JOIN query, yang diperlukan untuk menghubungkan tabel seperti dokter dengan rekam medis.
   
      
      -Keamanan data lebih terjamin dengan fitur transaksi ACID.

8.  Penggunaan Fitur Penting dari Database  
      -JOIN Query digunakan untuk menampilkan rekam medis berdasarkan dokter atau perawat.
    
      -ENUM digunakan dalam tabel regis untuk membatasi role pengguna ke 'dokter' dan 'perawat'.
    
      -Foreign Key untuk menjaga integritas data antara tabel regis, dokter, perawat, dan rekam_medis.

    beberapa overview aplikasi:


    ![image](https://github.com/user-attachments/assets/3e88bef4-fde6-461d-9804-f8f6c95301d0)

    ![image](https://github.com/user-attachments/assets/8e9adcc8-762e-4d27-a1ad-1e5117b0ac8f)

    ![image](https://github.com/user-attachments/assets/1f63651a-f691-4d2f-b3f5-b6b224085b4c)

    ![image](https://github.com/user-attachments/assets/ce4f84e4-41f4-4372-b250-c0e86fa52100)

    ![image](https://github.com/user-attachments/assets/b87a6168-2f84-4b25-97df-387afe769112)

    ![image](https://github.com/user-attachments/assets/0605ab00-7661-498a-8109-9d9db0a8d60c)

    ![image](https://github.com/user-attachments/assets/d5a07bbc-222f-4496-ba9a-21252f328edf)

    ![image](https://github.com/user-attachments/assets/58771026-35aa-4873-8997-d19b738bc160)



   
 

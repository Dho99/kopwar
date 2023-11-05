
# Sistem Informasi Aplikasi web Informasi Koperasi Warga

Projek ini adalah projek yang dikembangkan untuk menyelesaikan tugas di sekolah dari pelajaran Mockup dan Pengembangan web

Aplikasi ini masih tergolong simpel dan belum menyentuh hingga transaksi yang menggunakan Payment gateway, transaksi di Aplikasi ini hanya dilakukan di tempat instansi atau tempat terjadinya transaksi menggunakan uang fisik

## Authors

- [@dho99](https://www.github.com/Dho99)


## Deployment

Untuk melakukan instalasi

1. Buat database
2. Lakukan migrasi table 
- Tanpa data dummy
```bash
  php artisan migrate
```
- Dengan data dummy
```bash
  php artisan migrate --seed
```

3. Jalankan Aplikasi
- Siapkan web server e.g Xampp or Laragon
- Jalankan aplikasi di terminal
```bash
  php artisan serve
```

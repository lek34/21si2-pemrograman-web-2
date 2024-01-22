Pertemuan 1
---

Menginstall Laravel:

1. Install PHP (bisa melalui xampp, brew atau package manager di OS masing-masing) atau bisa juga melalui docker

   Panduan di https://www.php.net/manual/en/install.php. Untuk OS Windows rekomendasi install menggunakan XAMPP https://www.apachefriends.org/.

   Setelah melakukan installasi, konfigurasi *system path variable* supaya *interpreter* PHP dapat diakses dari path mana saja.

   Check dengan menjalankan perintah `php --version` di terminal/console.

2. Install PHP package manager (composer) https://getcomposer.org/, ikuti langkah di https://getcomposer.org/download/.

   Setelah menjalankan perintah pada langkah instalasi, pindahkan script composer ke lokasi yang terdaftar di system path.
   Kalau menggunakan Linux/MacOS bisa di-copy ke `/usr/local/bin`, contoh: `sudo mv composer.phar /usr/local/bin/composer`.

   Kalau menggunakan Windows bisa dipindahkan ke directory bin XAMPP (kalau PHP diinstall menggunakan XAMPP), biasanya di `c:\xampp\bin`.

3. Membuat project laravel baru, bisa ikuti panduan di https://laravel.com/docs/10.x.

   ```
   composer create-project laravel/laravel <nama-project>
   ```
   Ganti nama directory sesuai dengan nama project yang diinginkan (usahakan jangan menggunakan spasi di nama project).
   Misalnya `example-app`.

   Kalau sudah, akan terbentuk directory baru sesuai nama project, misalnya `example-app`, `cd example-app`.

4. Jalankan server web development Laravel dengan perintah `php artisan serve`. Web dapat dilihat dengan mengunjungi halaman
   `http://localhost:8000`. Jika ingin, mengganti port number server development `php artisan serve --port <nomor-port>`.

   Gunakan `php artisan --help` atau `php artisan serve --help` untuk melihat bantuan mengenai perintah `artisan`.

5. `Artisan` adalah project manager project Laravel. Perintah ini digunakan untuk menjalankan server development,
   mengenerate controller, model, migration dan lain-lain untuk project Laravel.

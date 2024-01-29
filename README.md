# Form Request Validation

Selain mendefinisikan rule validasi pada controller langsung, kita bisa membuat request Validation.

Request validation digunakan untuk melakukan validasi yang lebih kompleks supaya logic di controller
lebih rapi, singkat dan jelas. Ini membantu developer ketika membaca code controller.

Selain itu request validator juga dapat di-_reuse_ sehingga jika ada validasi yang sama yang perlu
dilakukan pada controller yang berbeda cukup dengan me-refer ke request validation yang telah dibuat.

Membuat request validation

```shell
php artisan make:request CreateBarangRequest
```

Laravel akan membuat file baru di `app/Http/Requests/CreateBarangRequest.php`.

Baca dokumentasi di `https://laravel.com/docs/10.x/validation#form-request-validation`.

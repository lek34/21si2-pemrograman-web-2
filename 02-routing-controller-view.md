Routing, Controller & View
---

## Routing

Routing bertugas untuk me-mapping request HTTP ke request handler (controller). Lokasi config routing Laravel di directory `routes`.

1. `api.php` - routing yang digunakan untuk melayani request API (web frontend, mobile client, desktop client, dll).
2. `channels.php` - routing untuk broadcasting event ke channel
3. `console.php` - routing untuk command yang dijalan dari console, `php artisan`
4. `web.php` - routing untuk request dari web

Dokumentasi di https://laravel.com/docs/10.x/routing.

## Controller

Controller merupakan request handler yang bertugas untuk memproses request HTTP dan menghasilkan HTTP response.

Response dihasilkan dengan cara `return` dari controller. Response bisa berupa *string* biasa, `view` atau response lain
misalnya JSON.

File controller biasanya diletakkan di `/app/Http/Controllers`.

Controller dapat digenerate menggunakan artisan:

```
php artisan make:controller <nama-controller>
```

misalnya `php artisan make:controller Hello` akan dibentuk file controller di `/app/Http/Controllers/Hello.php`.

Controller perlu dihubungkan dengan router supaya dapat diakses dari web.

Misalnya, edit `routes/web.php`, tambahkan:

```php
use App\Http\Controllers\Hello;
...
Route::get('/pertemuan2/hello', [Hello::class, 'index']);
```

Ini menghubungkan URL `/pertemuan2/hello` untuk dihandle oleh controller `Hello` pada method `index`.

Sedangkan di controller `Hello.php` tadi tambahkan satu method `index` untuk meng-handle request dari `/pertemuan2/hello`.

```php
class Hello extends Controller
{
    function index() {
        return 'Hello World from Hello Controller';
    }
}
```

Dokumentasi lanjut di https://laravel.com/docs/10.x/controllers.

## View

View merupakan template yang digunakan oleh controller untuk menghasilkan response. Biasanya berupa dokumen HTML,
walaupun bisa berupa dokumen lain.

File view diletakkan di `/resources/views`. Nama filenya mengikuti pola tertentu.

Misalnya dari controller kita akan `return view('greet')` berarti file view nya harus disimpan dengan 
nama `/resources/views/greet.blade.php`.

Dokumentasi lanjut di https://laravel.com/docs/10.x/views.

Laravel menggunakan template `blade` https://laravel.com/docs/10.x/blade.

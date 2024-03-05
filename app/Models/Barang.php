<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Barang extends Model
{
    use HasFactory;

    // Supaya bisa di-mass assign pada create dan update
    // daftarkan created_by dan updated_by supaya bisa diisikan
    // dengan user id
    protected $fillable = ['nama', 'harga', 'created_by', 'updated_by'];

    // NOTE: query scope, digunakan untuk mengapply kriteria tertentu
    // ketika melakukan query
    // https://laravel.com/docs/10.x/eloquent#query-scopes
    // dengan menggunakan scope, kita dapat melakukan query seperti
    // Barang::owned() untuk meng-query seluruh data barang yang
    // di-created oleh user yang melakukan request
    function scopeOwned(Builder $query)
    {
        $query->where('created_by', Auth::id());
    }

    // Relationship https://laravel.com/docs/10.x/eloquent-relationships
    // disini kita mendefinisikan sebuah relasi ke dari barang ke user
    // Relasi createdBy menghubungkan data barang ke user melalui
    // foreign key `created_by` (one to one)
    //
    // NOTE: kita bisa mendefinisikan reverse relationship di model
    // User, satu User bisa memiliki banyak barang (one to many)
    //
    // dengan mendefinisikan relationship di model kita dapat
    // melakukan query dengan memanggil method relation
    function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Record barang belongs to User melalui kolom foreign key `updated_by`
    function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    static function normalizeNamaBarang(string $nama): string
    {
        return ucwords($nama);
    }
}

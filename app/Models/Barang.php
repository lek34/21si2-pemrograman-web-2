<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    use HasFactory;

    // Supaya bisa di-mass assign pada create dan update
    // daftarkan created_by dan updated_by supaya bisa diisikan
    // dengan user id
    protected $fillable = ['nama', 'harga', 'created_by', 'updated_by'];

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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    // Supaya bisa di-mass assign pada create dan update
    protected $fillable = ['nama', 'harga'];
}

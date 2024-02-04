<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // NOTE: reverse relationship dari User ke Barang
    // satu user memiliki banyak record barang melalui
    // foreign key `created_by` di table barangs
    function createdBarangs(): HasMany
    {
        return $this->hasMany(Barang::class, 'created_by');
    }

    // satu user memiliki banyak record barang melalui
    // foreign key `updated_by` di table barangs
    function updatedBarangs(): HasMany
    {
        return $this->hasMany(Barang::class, 'updated_by');
    }
}

<?php

namespace App\Policies;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Auth\Access\Response;

// NOTE: policy untuk authorization terhadap model Barang
// https://laravel.com/docs/10.x/authorization
// generate dengan perintah php artisan make:policy BarangPolicy
// mengikuti konvensi penamaan Laravel, Laravel menggunakan
// <namaModel>Policy untuk memilih policy mana yang akan di-apply
//
// Kita juga bisa meng-registrasikan policy terhadap model
// secara manual https://laravel.com/docs/10.x/authorization#registering-policies
class BarangPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    // NOTE: policy untuk membuat barang baru
    // policy create di-apply untuk membuat record Barang baru tanpa
    // merujuk ke object Barang tertentu
    public function create(User $user)
    {
        return true;
    }

    public function show(User $user, Barang $barang)
    {
        return collect([$barang->created_by, $barang->updated_by])
            ->contains(fn($key, $value) => $value === $user->id)
        ? Response::allow()
        : Response::deny('Only creator/updater can show barang detail');
    }

    // NOTE: policy untuk mengupdate barang existing
    // pada contoh ini hanya barang yang di-create oleh user yang
    // sama yang dapat mengupdate data barang
    // parameter yang dikirim adalah User dan instance Barang yang di update
    public function update(User $user, Barang $barang): Response
    {
        return $user->id === $barang->created_by
            ? Response::allow()
            : Response::deny('Only creator can update barang');
    }

    // NOTE: begitu juga dengan policy delete, sama dengan update
    public function delete(User $user, Barang $barang)
    {
        return $user->id === $barang->created_by
            ? Response::allow()
            : Response::deny('Only creator can delete barang');
    }
}

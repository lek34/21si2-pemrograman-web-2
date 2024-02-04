<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            // NOTE: created_by dan updated_by nantinya akan diisikan
            // dengan id user yang membuat dan mengupdate data barang
            // https://laravel.com/docs/10.x/migrations
            //
            // karena kita menambahkan kolom `created_by` dan `updated_by`
            // ke existing table yang kemungkinan sudah ada data kita harus
            // menggunakan option **nullable** (karena kalau sudah ada data
            // berarti kolom created_by dan updated_by untuk record existing
            // harus kosong atau paling tidak diisikan dengan default value)
            //
            // **foreignId** membuat kolom int/bigint untuk dihubungkan dengan
            // table lain
            //
            // **contrained** mendefinisikan relasi ke table lain, karena kita
            // menggunakan nama yang tidak standard `created_by` sehingga
            // kita harus mendefisinikan relasi secara explisit
            //
            // **cascadeOnUpdate** update created_by dan updated_by apa bila user id berubah
            // **nullOnDelete** apabila user dihapus, created_by dan updated_by menjadi null
            $table->foreignId('created_by')
                  ->nullable()
                  ->constrained(table: 'users', indexName: 'barangs_created_by')
                  ->cascadeOnUpdate()->nullOnDelete();

            $table->foreignId('updated_by')
                  ->nullable()
                  ->constrained(table: 'users', indexName: 'barangs_updated_by')
                  ->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // WARNING: sqlite tidak mendukung dropForeign key
        // gunakan php artisan migrate:fresh untuk membangun ulang
        // skema database (data di database akan hilang semua!)
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropForeign(['created_by', 'updated_by']);
        });
    }
};

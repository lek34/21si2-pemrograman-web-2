<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Barang;

class BarangTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_normalize_nama_barang(): void
    {
        // check expected value dengan method assert
        // lihat dokumentasi TestCase untuk informasi lengkap
        // assertTrue check apakah expression input bernilai true
        // jika hasilnya true maka test akan passed, jika tidak test akan fail
        // $this->assertTrue(Barang::normalizeNamaBarang('nama barang') == 'Nama Barang');

        // cara lain, menggunakan assertEquals
        /*$this->assertEquals(
            'Nama Barang',
            Barang::normalizeNamaBarang('nama barang'),
        );
        // negative test
        $this->assertNotEquals('Nama Barang', Barang::normalizeNamaBarang('nama_barang'));
        $this->assertEquals('Nama_barang', Barang::normalizeNamaBarang('nama_barang'));*/

        // test table
        // dengan menggunakan array yang meng-list skenario, expected value dan input value
        $testCases = [
            'semua lower case' => ['expected' => 'Nama Barang', 'input' => 'nama barang'],
            'nama barang underscore' => ['expected' => 'Nama_barang', 'input' => 'nama_barang'],
        ];
        foreach ($testCases as $title => $test) {
            $this->assertEquals($test['expected'], Barang::normalizeNamaBarang($test['input']), $title);
        }

    }
}

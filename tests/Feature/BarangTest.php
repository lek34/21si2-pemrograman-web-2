<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class BarangTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_index_barang_but_not_logged_in(): void
    {
        // test request get ke url /admin/barang
        $response = $this->get('/admin/barang/');
        // expected mendapat response redirection
        // $response->assertStatus(302);
        // $this->assertEquals(route('login'), $response->headers->get('location'));
        $response->assertRedirectToRoute('login');
    }

    public function test_index_barang_after_login(): void
    {
        // buat user untuk testing
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/admin/barang/');
        $response->assertStatus(200);
        // check response body mengandung string New Barang (dari view yang di render)
        $response->assertSee('New Barang');
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Barang;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

    public function test_new_barang(): void
    {
        //buat user untuk testing
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/admin/barang/new');
        $response->assertStatus(200);
        $response->assertSee('New Barang');
    }

    public function test_create_barang(): void
    {
        // Create a user (if necessary) and authenticate
        $user = User::factory()->create();

        // Define data for the new "barang"
        $data = [
            'nama' => fake()->name(),
            'harga' => fake()->numberBetween(20000, 100000)
        ];
        // Simulate form submission and store the response
        $response = $this->actingAs($user)->post('/admin/barang/', $data);

        // Assert that the request was successful
        $response->assertRedirect('/admin/barang/');

        // Optionally, assert further on the created "barang"
        // Example: $this->assertDatabaseHas('barang', $data);
    }

    public function test_show_barang(): void
    {
        // Create a user (if necessary) and authenticate
        $user = User::factory()->create();

        // Define data for the new "barang"
        $data = [
            'nama' => fake()->name(),
            'harga' => fake()->numberBetween(20000, 100000)
        ];
        // Simulate form submission and store the response
        $response = $this->actingAs($user)->post('/admin/barang/', $data);

        // Assert that the request was successful
        $response->assertRedirect('/admin/barang/');

        // Retrieve the latest "barang" from the database
        $barang = Barang::where('nama', $data['nama'])->latest()->first();
        $barangId = $barang->id;

        // Send a GET request to view the newly created "barang"
        $response = $this->actingAs($user)->get("/admin/barang/$barangId");

        // Assert that the response is successful (status code 200) and contains the expected data
        $response->assertStatus(200);
        $response->assertSee($data['nama']);
    }

    public function test_show_edit_barang(): void
    {
        // Create a user (if necessary) and authenticate
        $user = User::factory()->create();

        // Define data for the new "barang"
        $data = [
            'nama' => fake()->name(),
            'harga' => fake()->numberBetween(20000, 100000)
        ];
        // Simulate form submission and store the response
        $response = $this->actingAs($user)->post('/admin/barang/', $data);

        // Assert that the request was successful
        $response->assertRedirect('/admin/barang/');

        // Retrieve the latest "barang" from the database
        $barang = Barang::where('nama', $data['nama'])->latest()->first();
        $barangId = $barang->id;

        // Send a GET request to view the newly created "barang"
        $response = $this->actingAs($user)->get("/admin/barang/edit/$barangId");

        // Assert that the response is successful (status code 200) and contains the expected data
        $response->assertStatus(200);
        $response->assertSee("Edit Barang $barangId");
    }

    public function test_edit_barang(): void
    {
        // Create a user (if necessary) and authenticate
        $user = User::factory()->create();

        // Define data for the new "barang"
        $data = [
            'nama' => fake()->name(),
            'harga' => fake()->numberBetween(20000, 100000)
        ];
        $datanew = [
            'nama' => fake()->name(),
            'harga' => fake()->numberBetween(20000, 100000)
        ];
        // Simulate form submission and store the response
        $response = $this->actingAs($user)->post('/admin/barang/', $data);

        // Assert that the request was successful
        $response->assertRedirect('/admin/barang/');

        // Retrieve the latest "barang" from the database
        $barang = Barang::where('nama', $data['nama'])->latest()->first();
        $barangId = $barang->id;

        // Send a GET request to view the newly created "barang"
        $response = $this->actingAs($user)->post("/admin/barang/edit/$barangId", $datanew);

        // Assert that the response is successful (status code 200) and contains the expected data
        $this->assertDatabaseHas('barangs', $datanew);
    }

    public function test_delete_barang(): void
    {
        // Create a user (if necessary) and authenticate
        $user = User::factory()->create();

        // Define data for the new "barang"
        $data = [
            'nama' => fake()->name(),
            'harga' => fake()->numberBetween(20000, 100000)
        ];
        // Simulate form submission and store the response
        $response = $this->actingAs($user)->post('/admin/barang/', $data);

        // Assert that the request was successful
        $response->assertRedirect('/admin/barang/');

        // Retrieve the latest "barang" from the database
        $barang = Barang::where('nama', $data['nama'])->latest()->first();
        $barangId = $barang->id;

        // Send a GET request to view the newly created "barang"
        $response = $this->actingAs($user)->get("/admin/barang/delete/$barangId");

        // Assert that the response is successful (status code 200) and contains the expected data
        $this->assertDatabaseMissing('barangs', $data);
    }
}

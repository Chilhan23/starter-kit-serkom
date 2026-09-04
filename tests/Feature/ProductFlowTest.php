<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_dapat_diakses(): void
    {
        $response = $this->get(route('landing'));

        $response->assertOk();
        $response->assertSee('Kopi Ulee Kareng');
    }

    public function test_produk_valid_dapat_disimpan(): void
    {
        $response = $this->post(route('products.store'), [
            'name' => 'Kopi Test',
            'description' => 'Produk untuk pengujian.',
            'price' => 20000,
        ]);

        $response->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [
            'name' => 'Kopi Test',
            'price' => 20000,
        ]);
    }

    public function test_produk_dapat_diedit(): void
    {
        $product = Product::create([
            'name' => 'Kopi Lama',
            'description' => 'Deskripsi lama',
            'price' => 15000,
        ]);

        $response = $this->put(route('products.update', $product), [
            'name' => 'Kopi Baru',
            'description' => 'Deskripsi baru',
            'price' => 18000,
        ]);

        $response->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Kopi Baru',
        ]);
    }

    public function test_produk_dapat_dihapus(): void
    {
        $product = Product::create([
            'name' => 'Kopi Hapus',
            'description' => 'Akan dihapus',
            'price' => 10000,
        ]);

        $response = $this->delete(route('products.destroy', $product));

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}

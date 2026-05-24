<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\PreventRequestForgery::class);
    }

    public function test_can_list_products()    {
        Product::factory(3)->create();

        $response = $this->get(route('products.index'));

        $response->assertStatus(200);
        $response->assertViewHas('products');
    }

    public function test_can_create_product()
    {
        $data = [
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 99.99,
            'category' => 'electronics',
        ];

        $response = $this->post(route('products.store'), $data);

        $response->assertRedirect(route('products.show', 1));
        $this->assertDatabaseHas('products', ['name' => 'Test Product', 'status' => 'active']);
    }

    public function test_can_update_product()
    {
        $product = Product::factory()->create(['status' => 'active']);

        $data = [
            'name' => 'Updated Name',
            'price' => 150.00,
            'category' => 'home',
        ];

        $response = $this->put(route('products.update', $product), $data);

        $response->assertStatus(302);
        $response->assertRedirect(route('products.show', $product));
        $this->assertDatabaseHas('products', ['id' => $product->id, 'name' => 'Updated Name']);
    }

    public function test_can_update_product_status()
    {
        $product = Product::factory()->create(['status' => 'active']);

        $response = $this->patch(route('products.updateStatus', $product), ['status' => 'out_of_stock']);

        $response->assertStatus(302);
        $this->assertDatabaseHas('products', ['id' => $product->id, 'status' => 'out_of_stock']);
    }

    public function test_can_delete_product()
    {
        $product = Product::factory()->create();

        $response = $this->delete(route('products.destroy', $product));

        $response->assertStatus(302);
        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}

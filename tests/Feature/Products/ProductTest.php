<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    protected array $products;
    private string $url = "/api/v1/product";

    public function setUp()
    {
        parent::setUp();

    }
    public function test_show_all_products(): void
    {
        $response = $this->get($this->url);
        $response->assertStatus(200)
                 ->assertJsonStructure();

    }

    public function test_show_one_product():void
    {
        $response = $this->get($this->url);
        $response->assertStatus(200)
                ->assertJsonStructure();
    }

    public function test_create_product():void
    {
        $response = $this->post($this->url);
        $response->assertStatus(201)
                 ->assertJsonStructure();
    }

    public function test_update_product():void
    {
        $response = $this->put($this->url);
        $response->assertStatus(200)
                 ->assertJsonStructure();

    }

    public function test_delete_product():void
    {
        $response = $this->delete($this->url);
        $response->assertStatus(200)
            ->assertJsonStructure();
    }

    public function test_validation_product():void
    {
        $response = $this->post($this->url);
        $response->assertStatus(422)
            ->assertJsonStructure();
    }
}

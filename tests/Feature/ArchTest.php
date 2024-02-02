<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

test('globals')
    ->expect(['dd', 'dump'])
    ->not->tobeused();
it('displays products on the storefront', function () {
    $response = $this->get('/products');
    $response->assertStatus(200)
        ->assertSee('Product Name');
});

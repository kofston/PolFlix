<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class SliderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSlider()
    {
        $this->withoutMiddleware();
        $response = $this->json('GET','/');
        $response->assertStatus(200);
    }
}

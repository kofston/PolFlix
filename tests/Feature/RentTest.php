<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class RentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRent()
    {
        $this->withoutMiddleware();
        $response = $this->withSession(['Login_id' => 7])
            ->get('/rent',['days'=>1,'movie_id'=>1]);
        $response->assertSee(1);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSignup()
    {
        $this->withoutMiddleware();
        $response = $this->json('POST','/login/signup',['login'=>'lukkon','password'=>'lukkon123']);
        $response->assertStatus(200);
        $response->assertSeeText(1);
    }
    public function testSignin()
    {
        $this->withoutMiddleware();
        $response = $this->json('POST','/login/signin',['name_r'=>'Josh','lastname_r'=>'Nilson','login_r'=>'jnils','password_r'=>'jnils123','email_r'=>'jnilson@gmail.com']);
        $response->assertStatus(200);
        $response->assertSeeText(1);
    }
    public function testUnlog()
    {
        $this->withoutMiddleware();
        $response = $this->get('/login/unlog');
        $response->assertStatus(302);
    }
    public function testForgotpass()
    {
        $this->withoutMiddleware();
        $response = $this->json('POST','/login/forgot_pass',['forgot_pass'=>'forgotpass@gmail.com']);
        $response->assertStatus(302);
    }
}

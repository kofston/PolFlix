<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testAddmovie()
    {
        $_POST['file']=array();
        if (isset($_POST['file'])) {
            $_FILES["avatar_new"]=array();
        }
        $data =[
        'title_new'=>'NewTitle',
        'movie_id_new'=>'new',
       'desc_new'=>'DescriptionTest',
        'price_new'=>'44',
        'category_new'=>2,
        'director_new'=>'Robby Norton',
       'pegi_new'=>15,
        'carier_new'=>2,
        'amount_new'=>2,
        'image_name'=>'file',
       'trailer_new'=>'trailernametest',
       'movie_id_new'=>'new',
        ];
        $this->withoutMiddleware();
        $response = $this->json('POST','/admin/add_movie_form',$data);
        $response->assertSeeText(1);
    }
    public function testReminder()
    {
        $this->withoutMiddleware();
        $response = $this->json('GET','/admin/send_reminder/clientmail@gmail.com');
        $response->assertSeeText(1);
    }
    public function testReturnmovie()
    {
        $this->withoutMiddleware();
        $response = $this->json('GET','/admin/return_movie/6/2');
        $response->assertSeeText(1);
    }
    public function testAdminpanel()
    {
        $this->withoutMiddleware();
        $response = $this->json('GET','/admin/panel');
        $response->assertSuccessful();
    }
}

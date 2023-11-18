<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLoginPage()
    {
        $this->get('/login')
        ->assertSeeText("Login");
    }

    public function testLoginSuccess(){
        $this->post('/login', [
            "user" => "ucenklr",
            "password" => "5marethusen"
        ])->assertRedirect("/")
        ->assertSessionHas("user" , "ucenklr");
    }
}

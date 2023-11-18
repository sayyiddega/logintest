<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    private UserService $userService;

    protected function setup():void
    {
       parent::setUp();

       $this->userService= $this->app->make(UserService::class);
    }

    public function testLoginSuccess()
    {
        self::assertTrue(($this->userService->login("ucenklr","5marethusen")));
    }
    
    public function testLoginFailed()
    {
        self::assertFalse($this->userService->login("anjai", "anjai"));
    }

    public function testPasswordWrong() 
    {
        self::assertFalse($this->userService->login("ucenklr", "mamakau"));
    }
    
}

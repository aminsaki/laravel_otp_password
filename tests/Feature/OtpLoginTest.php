<?php

namespace UserAuth\laravelMobileAuth\Tests;
use Tests\TestCase;

class OtpLoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_page_first_otp()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}

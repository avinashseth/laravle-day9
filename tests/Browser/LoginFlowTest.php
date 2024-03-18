<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginFlowTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testLoginFlowForUser(): void
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                ->type('email', 'rosella.abbott@example.net')
                ->type('password', 'password')
                ->press('Login')
                ->assertPathIs('/dashboard');
        });
    }
}

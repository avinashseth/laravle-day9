<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testRegisterFlowForUser(): void
    {

        $this->browse(function ($browser) {
            $browser->visit('/register')
                ->value('#name', 'Avinash Seth')
                ->value('#email', 'zspencer@example.in')
                ->value('#password', '12345678')
                ->value('#password_confirmation', '1234567')
                ->click('button[type="submit"]')
                ->assertPathIs('/dashboard')
                ->assertSee("You're logged in!");

            $browser->screenshot('issue-' . rand(100,999));
        
        });

        // select * from users where email = $userEmail

        // $this->assertDatabaseHas('users', [
        //     'email' => $userEmail,
        // ]);
            
    }
}
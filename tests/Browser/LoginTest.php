<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class LoginTest extends DuskTestCase
{
    /**
     * test that after login, go to questions.
     *
     * @return void
     */
    public function testLoginTest()
    {
        $this->browse(function (Browser $browser) {
			$user = factory(User::class)->create();
            $browser->visit('/login')
					->type('email', $user->email)
                    ->type('password', $user->password)
                    ->press('Login')
                    ->assertPathIs('/login');
        });
    }
}

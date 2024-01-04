<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;

class UserTest extends PantherTestCase
{
    public function testRegister(): void
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/register');

        $this->assertSelectorTextContains('h1', 'Register');
    }

    public function testLogin(): void
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/login');

        $this->assertSelectorTextContains('h1', 'Please sign in');
    }
}

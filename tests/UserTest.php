<?php

namespace App\Tests;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\ORM\EntityManagerInterface;

class UserTest extends WebTestCase
{
    public function testRegister(): void
    {
        //$client = static::createPantherClient();
        $client = static::createClient();
        $crawler = $client->request('GET', '/register');

        $this->assertSelectorTextContains('h1', 'Register');

        $crawler = $client->request('GET', '/user');

        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        self::assertResponseStatusCodeSame(200);

        // Register
        $crawler = $client->request('GET', '/register'); 
        $form = $crawler->selectButton('Register')->form();
        $form['registration_form[email]'] = 'register@testing.es';
        $form['registration_form[plainPassword]'] = '1234567890';
        $form['registration_form[agreeTerms]'] = true;
        $client->submit($form);

        //Login
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('Sign in')->form();
        $form['email'] = 'register@testing.es';
        $form['password'] = '1234567890';
        $client->submit($form);

        $crawler = $client->request('GET', '/user');

        $this->assertSelectorTextContains('h1', 'User index');

        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');
        $userRepository = $entityManager->getRepository(User::class);
        // Borra los usuarios después de la prueba
        $users = $userRepository->findAll();
        foreach ($users as $user) {
            $entityManager->remove($user);
        }
        $entityManager->flush();
    }
}

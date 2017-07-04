<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class preferenciaControllerTest extends WebTestCase
{
    public function testCrear_pref()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/crear_pref');
    }

    public function testMod_pref()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/mod_pref');
    }

    public function testElim_pref()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/elim_pref');
    }

}

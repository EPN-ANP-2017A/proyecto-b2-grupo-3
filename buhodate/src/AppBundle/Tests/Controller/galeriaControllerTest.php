<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class galeriaControllerTest extends WebTestCase
{
    public function testCrear_foto()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/crear_foto');
    }

    public function testMod_foto()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/mod_foto');
    }

    public function testElim_foto()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/elim_foto');
    }

}

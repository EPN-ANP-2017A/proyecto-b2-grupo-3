<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BuscadorControllerTest extends WebTestCase
{
    public function testBuscars()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/buscarS');
    }

    public function testBuscarp()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/buscarP');
    }

}

<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NotificacionControllerTest extends WebTestCase
{
    public function testCrear()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/crear');
    }

    public function testView()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/view');
    }

}

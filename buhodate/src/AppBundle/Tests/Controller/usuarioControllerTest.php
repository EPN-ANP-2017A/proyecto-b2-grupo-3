<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class usuarioControllerTest extends WebTestCase
{
    public function testReg_uss()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/reg_uss');
    }

    public function testMod_uss()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/mod_uss');
    }

    public function testMod_pass()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/mod_pass');
    }

    public function testElim_uss()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/elim_uss');
    }

}

<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class InicioController extends Controller
{
    /**
     * @Route("/inicio")
     */
    public function inicioAction()
    {
        return $this->render('AppBundle:Inicio:inicio.html.twig', array(
            // ...
        ));
    }

}

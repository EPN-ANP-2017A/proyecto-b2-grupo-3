<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class NotificacionController extends Controller
{
    /**
     * @Route("/crear")
     */
    public function crearAction()
    {

        return $this->render('AppBundle:Notificacion:crear.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/view")
     */
    public function viewAction()
    {
        return $this->render('AppBundle:Notificacion:view.html.twig', array(
            // ...
        ));
    }

}

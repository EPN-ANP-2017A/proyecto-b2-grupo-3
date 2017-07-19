<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class usuarioController extends Controller
{
    /**
     * @Route("/index")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:usuario:index.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/registro")
     */
    public function registroAction()
    {
        return $this->render('AppBundle:usuario:registro.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/modificar")
     */
    public function modificarAction()
    {
        return $this->render('AppBundle:usuario:modificar.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/modpass")
     */
    public function modpassAction()
    {
        return $this->render('AppBundle:usuario:modpass.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/eliminar")
     */
    public function eliminarAction()
    {
        return $this->render('AppBundle:usuario:eliminar.html.twig', array(
            // ...
        ));
    }

}

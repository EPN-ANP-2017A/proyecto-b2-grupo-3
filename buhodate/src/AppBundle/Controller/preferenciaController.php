<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class preferenciaController extends Controller
{
    /**
     * @Route("/crear_pref")
     */
    public function crear_prefAction()
    {
        $nombre="";
        $descripcion="";
        $estado="activo";

        return $this->render('AppBundle:preferencia:crear.pref.html.twig', array(
            'nombre'=>$nombre,
            'descripcion'=>$descripcion,
            'estado'=>$estado
        ));
    }

    /**
     * @Route("/mod_pref")
     */
    public function mod_prefAction()
    {
        $nombre="";
        $descripcion="";

        return $this->render('AppBundle:preferencia:mod.pref.html.twig', array(
            'nombre'=>$nombre,
            'descripcion'=>$descripcion
        ));
    }

    /**
     * @Route("/elim_pref")
     */
    public function elim_prefAction()
    {
        $estado="activo";

        return $this->render('AppBundle:preferencia:elim.pref.html.twig', array(
            'estado'=>$estado
        ));
    }

}

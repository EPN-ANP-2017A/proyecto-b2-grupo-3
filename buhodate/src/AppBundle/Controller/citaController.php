<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class citaController extends Controller
{
    /**
     * @Route("/crear_cita")
     */
    public function crear_citaAction()
    {
        $id_emisor="";
        $id_receptor="";
        $estado="pendiente";
        $fecha_inicio="";

        return $this->render('AppBundle:cita:crear.cita.html.twig', array(
            'id_emisor'=>$id_emisor,
            'id_receptor'=>$id_receptor,
            'estado'=>$estado,
            'fecha_inicio'=>$fecha_inicio
        ));
    }

    /**
     * @Route("/mod_cita")
     */
    public function mod_citaAction()
    {
        $fecha_fin="";
        $direccion="";
        $calificacion="";
        $estado="aceptada";

        return $this->render('AppBundle:cita:mod.cita.html.twig', array(
            'fecha_fin'=>$fecha_fin,
            'direccion'=>$direccion,
            'calificacion'=>$calificacion,
            'estado'=>$estado
        ));
    }

    /**
     * @Route("/can_cita")
     */
    public function can_citaAction()
    {
        $estado="cancelada";
        return $this->render('AppBundle:cita:can.cita.html.twig', array(
            'estado'=>$estado
        ));
    }

}

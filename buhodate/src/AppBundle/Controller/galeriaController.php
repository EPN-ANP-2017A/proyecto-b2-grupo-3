<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class galeriaController extends Controller
{
    /**
     * @Route("/crear_foto")
     */
    public function crear_fotoAction()
    {
        $foto="";
        $descripcion="";
        $estado="activo";
        return $this->render('AppBundle:galeria:crear.foto.html.twig', array(
            'foto'=>$foto,
            'descripcion'=>$descripcion,
            'estado'=>$estado
        ));
    }

    /**
     * @Route("/mod_foto")
     */
    public function mod_fotoAction()
    {
        $descripcion="";

        return $this->render('AppBundle:galeria:mod.foto.html.twig', array(
            'descripcion'=>$descripcion,
        ));
    }

    /**
     * @Route("/elim_foto")
     */
    public function elim_fotoAction()
    {
        $estado="inactivo";
        return $this->render('AppBundle:galeria:elim.foto.html.twig', array(
            'estado'=>$estado
        ));
    }

}

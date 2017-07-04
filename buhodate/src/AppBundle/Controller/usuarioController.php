<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class usuarioController extends Controller
{
    /**
     * @Route("/reg_uss")
     */
    public function reg_ussAction()
    {
        $correo = "";
        $pass = "";
        $alias="";
        $estado="activo";
        return $this->render('AppBundle:usuario:reg.uss.html.twig', array(
            'correo'=>$correo,
            'pass'=>$pass,
            'alias'=>$alias,
            'estado'=>$estado

        ));
    }

    /**
     * @Route("/mod_uss")
     */
    public function mod_ussAction()
    {
        $nombre="";
        $apellido="";
        $alias="";
        $telefono="";
        $sexo="";
        $foto="";
        $fecha_nac="";
        $pais="";
        $provincia="";
        $ciudad="";
        $direccion="";
        $carrera="";
        $descripcion="";

        return $this->render('AppBundle:usuario:mod.uss.html.twig', array(
            'nombre'=>$nombre,
            'apellido'=>$apellido,
            'alias'=>$alias,
            'telefono'=>$telefono,
            'sexo'=>$sexo,
            'foto'=>$foto,
            'fecha_nac'=>$fecha_nac,
            'pais'=>$pais,
            'provincia'=>$provincia,
            'ciudad'=>$ciudad,
            'direccion'=>$direccion,
            'carrera'=>$carrera,
            'descripcion'=>$descripcion
        ));
    }

    /**
     * @Route("/mod_pass")
     */
    public function mod_passAction()
    {
        $pass="";

        return $this->render('AppBundle:usuario:mod.pass.html.twig', array(
            'pass'=>$pass
        ));
    }

    /**
     * @Route("/elim_uss")
     */
    public function elim_ussAction()
    {
        $estado="inactivo";

        return $this->render('AppBundle:usuario:elim.uss.html.twig', array(
            'estado'=>$estado
        ));
    }

}

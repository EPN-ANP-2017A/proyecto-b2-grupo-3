<?php

namespace AppBundle\Controller;

use AppBundle\Entity\usuario;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class BuscadorController extends Controller
{
    /**
     * @Route("/buscarS/{sexo}", name="buscar_usuarioS")
     * @Method("GET")
     */
    public function buscarSAction($sexo)
    {
        $em = $this->getDoctrine()->getManager();
        if ($sexo=='ambos')
        {
            $usuarios = $em->getRepository('AppBundle:user')->findAll();
        }else
        {
            $usuarios = $em->getRepository('AppBundle:user')->findBy(array('sexo'=> $sexo));
        }
        return $this->render('user/search.html.twig', array(
            'usuarios' => $usuarios,
        ));
    }

    /**
     * @Route("/buscarP", name="buscar_usuario")
     * @Method("GET")
     */
    public function buscarPAction()
    {
        $busqueda=$_GET["busqueda"];
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:user');
        $query = $repository->createQueryBuilder('u')
            ->where('u.username LIKE :username')
            ->setParameter('username','%'.$busqueda.'%')
            ->getQuery();

        $usuarios = $query->getResult();
        $numero=count($usuarios);
        if ($numero==0)
        {
            $query = $repository->createQueryBuilder('u')
                ->where('u.email LIKE :email')
                ->setParameter('email','%'.$busqueda.'%')
                ->getQuery();

            $usuarios = $query->getResult();

        }

        return $this->render('user/search.html.twig', array(
            'usuarios' => $usuarios,
            'numero' => $numero
        ));
    }

}

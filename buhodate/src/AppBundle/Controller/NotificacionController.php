<?php

namespace AppBundle\Controller;


use AppBundle\Entity\cita;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class NotificacionController extends Controller
{
    /**
     * @Route("/crear/{receptor}", name="notificaciones")
     * @Method("GET")
     */
    public function crearAction($receptor)
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:cita');
        $query = $repository->createQueryBuilder('c')
            ->where('c.idReceptor = :idReceptor AND c.estado LIKE :estado ')
            ->setParameter('idReceptor',$receptor)
            ->setParameter('estado','Pendiente')
            ->getQuery();

        $citas = $query->getResult();

        $query = $repository->createQueryBuilder('c')
            ->where('c.estado LIKE :estadoA OR  c.estado LIKE :estadoR AND c.usuarios = :idReceptor')
            ->setParameter('idReceptor',$receptor)
            ->setParameter('estadoA','Aceptada')
            ->setParameter('estadoR','Rechazada')
            ->getQuery();

        $citasEstado = $query->getResult();
        return $this->render('Notificacion/crear.html.twig', array(
            'citas' => $citas,
            'citasEstado' => $citasEstado,
        ));
    }



    /**
     * Displays a form to edit an existing citum entity.
     *
     * @Route("/aceptar/{id}", name="cita_aceptada")
     * @Method({"GET", "POST"})
     */
    public function AceptarAction(Request $request, cita $cita)
    {

        $cita->setEstado('Aceptada');

        $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('notificaciones', array('receptor' => $cita->getIdReceptor()));

    }


    /**
     * Displays a form to edit an existing citum entity.
     *
     * @Route("/rechazar/{id}", name="cita_rechazada")
     * @Method({"GET", "POST"})
     */
    public function RechazarAction(Request $request, cita $cita)
    {

        $cita->setEstado('Rechazada');

        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('notificaciones', array('receptor' => $cita->getIdReceptor()));

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

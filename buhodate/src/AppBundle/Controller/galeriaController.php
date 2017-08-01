<?php

namespace AppBundle\Controller;

use AppBundle\Entity\galeria;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Galerium controller.
 *
 * @Route("galeria")
 */
class galeriaController extends Controller
{
    /**
     * Lists all galerium entities.
     *
     * @Route("/", name="galeria_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $galerias = $em->getRepository('AppBundle:galeria')->findAll();

        return $this->render('galeria/inicio.html.twig', array(
            'galerias' => $galerias,
        ));
    }

    /**
     * Creates a new galerium entity.
     *
     * @Route("/new", name="galeria_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $galerium = new Galerium();
        $form = $this->createForm('AppBundle\Form\galeriaType', $galerium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($galerium);
            $em->flush();

            return $this->redirectToRoute('galeria_show', array('id' => $galerium->getId()));
        }

        return $this->render('galeria/new.html.twig', array(
            'galerium' => $galerium,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a galerium entity.
     *
     * @Route("/{id}", name="galeria_show")
     * @Method("GET")
     */
    public function showAction(galeria $galerium)
    {
        $deleteForm = $this->createDeleteForm($galerium);

        return $this->render('galeria/show.html.twig', array(
            'galerium' => $galerium,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing galerium entity.
     *
     * @Route("/{id}/edit", name="galeria_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, galeria $galerium)
    {
        $deleteForm = $this->createDeleteForm($galerium);
        $editForm = $this->createForm('AppBundle\Form\galeriaType', $galerium);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('galeria_edit', array('id' => $galerium->getId()));
        }

        return $this->render('galeria/edit.html.twig', array(
            'galerium' => $galerium,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a galerium entity.
     *
     * @Route("/{id}", name="galeria_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, galeria $galerium)
    {
        $form = $this->createDeleteForm($galerium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($galerium);
            $em->flush();
        }

        return $this->redirectToRoute('galeria_index');
    }

    /**
     * Creates a form to delete a galerium entity.
     *
     * @param galeria $galerium The galerium entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(galeria $galerium)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('galeria_delete', array('id' => $galerium->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

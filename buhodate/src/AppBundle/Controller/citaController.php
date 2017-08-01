<?php

namespace AppBundle\Controller;

use AppBundle\Entity\cita;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Citum controller.
 *
 * @Route("cita")
 */
class citaController extends Controller
{
    /**
     * Lists all citum entities.
     *
     * @Route("/", name="cita_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $citas = $em->getRepository('AppBundle:cita')->findAll();

        return $this->render('cita/inicio.html.twig', array(
            'citas' => $citas,
        ));
    }

    /**
     * Creates a new citum entity.
     *
     * @Route("/new", name="cita_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $citum = new Citum();
        $form = $this->createForm('AppBundle\Form\citaType', $citum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($citum);
            $em->flush();

            return $this->redirectToRoute('cita_show', array('id' => $citum->getId()));
        }

        return $this->render('cita/new.html.twig', array(
            'citum' => $citum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a citum entity.
     *
     * @Route("/{id}", name="cita_show")
     * @Method("GET")
     */
    public function showAction(cita $citum)
    {
        $deleteForm = $this->createDeleteForm($citum);

        return $this->render('cita/show.html.twig', array(
            'citum' => $citum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing citum entity.
     *
     * @Route("/{id}/edit", name="cita_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, cita $citum)
    {
        $deleteForm = $this->createDeleteForm($citum);
        $editForm = $this->createForm('AppBundle\Form\citaType', $citum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cita_edit', array('id' => $citum->getId()));
        }

        return $this->render('cita/edit.html.twig', array(
            'citum' => $citum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a citum entity.
     *
     * @Route("/{id}", name="cita_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, cita $citum)
    {
        $form = $this->createDeleteForm($citum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($citum);
            $em->flush();
        }

        return $this->redirectToRoute('cita_index');
    }

    /**
     * Creates a form to delete a citum entity.
     *
     * @param cita $citum The citum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(cita $citum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cita_delete', array('id' => $citum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

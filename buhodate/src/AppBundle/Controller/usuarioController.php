<?php

namespace AppBundle\Controller;

use AppBundle\Entity\usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Usuario controller.
 *
 * @Route("usuario")
 */
class usuarioController extends Controller
{
    /**
     * Lists all usuario entities.
     *
     * @Route("/", name="usuario_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $usuario = new Usuario();
        $form = $this->createForm('AppBundle\Form\usuarioType', $usuario);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $usuario = $form->getData();
            $usuario->setEstado('activo');
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();

            return $this->redirectToRoute('usuario_show', array('id' => $usuario->getId()));
        }

        return $this->render('usuario/index.html.twig', array(
            'usuario' => $usuario,
            'form' => $form->createView(),
        ));
    }

    /**
     * Lists all usuario entities.
     *
     * @Route("/login", name="usuario_login")
     * @Method("GET")
     */
    public function loginAction(Request $request, AuthenticationUtils $authUtils )
    {
        // Obtiene el error si hay uno
        $error = $authUtils->getLastAuthenticationError();

        // Ultimo nombre de usuario  ingresado por el usuario
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('usuario/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }

    /**
     * Creates a new usuario entity.
     *
     * @Route("/new", name="usuario_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $usuario = new Usuario();
        $form = $this->createForm('AppBundle\Form\usuarioType', $usuario);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $usuario->setEstado('activo');
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();

            return $this->redirectToRoute('usuario_show', array('id' => $usuario->getId()));
        }

        return $this->render('usuario/new.html.twig', array(
            'usuario' => $usuario,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a usuario entity.
     *
     * @Route("/{id}", name="usuario_show")
     * @Method("GET")
     */
    public function showAction(usuario $usuario)
    {
        $deleteForm = $this->createDeleteForm($usuario);

        return $this->render('usuario/show.html.twig', array(
            'usuario' => $usuario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing usuario entity.
     *
     * @Route("/{id}/edit", name="usuario_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, usuario $usuario)
    {
        $deleteForm = $this->createDeleteForm($usuario);
        $editForm = $this->createForm('AppBundle\Form\usuarioType', $usuario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('usuario_edit', array('id' => $usuario->getId()));
        }

        return $this->render('usuario/edit.html.twig', array(
            'usuario' => $usuario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
<<<<<<< HEAD
     * Deletes a usuario entity.
     *
     * @Route("/{id}", name="usuario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, usuario $usuario)
    {
        $form = $this->createDeleteForm($usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($usuario);
            $em->flush();
        }

        return $this->redirectToRoute('usuario_index');
    }

    /**
     * Creates a form to delete a usuario entity.
     *
     * @param usuario $usuario The usuario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(usuario $usuario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usuario_delete', array('id' => $usuario->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
=======
     * @Route("/perfil/{idUsuario}")
     */
    public function perfilAction($idUsuario)
    {
        $usuario=$this->getDoctrine()
            ->getRepository('AppBundle:usuario')
            ->find($idUsuario);
        return $this->render('AppBundle:usuario:perfil.html.twig', array(
            'usuario'=>$usuario
        ));
    }
>>>>>>> 4ba1e4fdbccff14b22f8fb226b1a4694bb9a89ae
}

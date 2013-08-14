<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Tipivoto;
use Scuola247\Bundle\CoreBundle\Form\TipivotoType;

/**
 * Tipivoto controller.
 *
 * @Route("/tipivoto")
 */
class TipivotoController extends Controller
{

    /**
     * Lists all Tipivoto entities.
     *
     * @Route("/", name="tipivoto")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Tipivoto')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Tipivoto entity.
     *
     * @Route("/", name="tipivoto_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Tipivoto:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Tipivoto();
        $form = $this->createForm(new TipivotoType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipivoto_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Tipivoto entity.
     *
     * @Route("/new", name="tipivoto_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Tipivoto();
        $form   = $this->createForm(new TipivotoType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Tipivoto entity.
     *
     * @Route("/{id}", name="tipivoto_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Tipivoto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipivoto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Tipivoto entity.
     *
     * @Route("/{id}/edit", name="tipivoto_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Tipivoto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipivoto entity.');
        }

        $editForm = $this->createForm(new TipivotoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Tipivoto entity.
     *
     * @Route("/{id}", name="tipivoto_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Tipivoto:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Tipivoto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipivoto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TipivotoType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipivoto_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Tipivoto entity.
     *
     * @Route("/{id}", name="tipivoto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Tipivoto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tipivoto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipivoto'));
    }

    /**
     * Creates a form to delete a Tipivoto entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

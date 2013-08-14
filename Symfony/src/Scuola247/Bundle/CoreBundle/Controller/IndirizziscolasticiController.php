<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Indirizziscolastici;
use Scuola247\Bundle\CoreBundle\Form\IndirizziscolasticiType;

/**
 * Indirizziscolastici controller.
 *
 * @Route("/indirizziscolastici")
 */
class IndirizziscolasticiController extends Controller
{

    /**
     * Lists all Indirizziscolastici entities.
     *
     * @Route("/", name="indirizziscolastici")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Indirizziscolastici')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Indirizziscolastici entity.
     *
     * @Route("/", name="indirizziscolastici_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Indirizziscolastici:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Indirizziscolastici();
        $form = $this->createForm(new IndirizziscolasticiType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('indirizziscolastici_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Indirizziscolastici entity.
     *
     * @Route("/new", name="indirizziscolastici_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Indirizziscolastici();
        $form   = $this->createForm(new IndirizziscolasticiType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Indirizziscolastici entity.
     *
     * @Route("/{id}", name="indirizziscolastici_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Indirizziscolastici')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Indirizziscolastici entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Indirizziscolastici entity.
     *
     * @Route("/{id}/edit", name="indirizziscolastici_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Indirizziscolastici')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Indirizziscolastici entity.');
        }

        $editForm = $this->createForm(new IndirizziscolasticiType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Indirizziscolastici entity.
     *
     * @Route("/{id}", name="indirizziscolastici_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Indirizziscolastici:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Indirizziscolastici')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Indirizziscolastici entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new IndirizziscolasticiType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('indirizziscolastici_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Indirizziscolastici entity.
     *
     * @Route("/{id}", name="indirizziscolastici_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Indirizziscolastici')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Indirizziscolastici entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('indirizziscolastici'));
    }

    /**
     * Creates a form to delete a Indirizziscolastici entity by id.
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

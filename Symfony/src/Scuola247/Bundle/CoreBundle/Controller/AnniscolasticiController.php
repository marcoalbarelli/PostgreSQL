<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Anniscolastici;
use Scuola247\Bundle\CoreBundle\Form\AnniscolasticiType;

/**
 * Anniscolastici controller.
 *
 * @Route("/anniscolastici")
 */
class AnniscolasticiController extends Controller
{

    /**
     * Lists all Anniscolastici entities.
     *
     * @Route("/", name="anniscolastici")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Anniscolastici')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Anniscolastici entity.
     *
     * @Route("/", name="anniscolastici_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Anniscolastici:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Anniscolastici();
        $form = $this->createForm(new AnniscolasticiType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('anniscolastici_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Anniscolastici entity.
     *
     * @Route("/new", name="anniscolastici_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Anniscolastici();
        $form   = $this->createForm(new AnniscolasticiType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Anniscolastici entity.
     *
     * @Route("/{id}", name="anniscolastici_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Anniscolastici')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Anniscolastici entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Anniscolastici entity.
     *
     * @Route("/{id}/edit", name="anniscolastici_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Anniscolastici')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Anniscolastici entity.');
        }

        $editForm = $this->createForm(new AnniscolasticiType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Anniscolastici entity.
     *
     * @Route("/{id}", name="anniscolastici_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Anniscolastici:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Anniscolastici')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Anniscolastici entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AnniscolasticiType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('anniscolastici_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Anniscolastici entity.
     *
     * @Route("/{id}", name="anniscolastici_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Anniscolastici')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Anniscolastici entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('anniscolastici'));
    }

    /**
     * Creates a form to delete a Anniscolastici entity by id.
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

<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Librettipersonalimessaggiletti;
use Scuola247\Bundle\CoreBundle\Form\LibrettipersonalimessaggilettiType;

/**
 * Librettipersonalimessaggiletti controller.
 *
 * @Route("/librettipersonalimessaggiletti")
 */
class LibrettipersonalimessaggilettiController extends Controller
{

    /**
     * Lists all Librettipersonalimessaggiletti entities.
     *
     * @Route("/", name="librettipersonalimessaggiletti")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Librettipersonalimessaggiletti')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Librettipersonalimessaggiletti entity.
     *
     * @Route("/", name="librettipersonalimessaggiletti_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Librettipersonalimessaggiletti:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Librettipersonalimessaggiletti();
        $form = $this->createForm(new LibrettipersonalimessaggilettiType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('librettipersonalimessaggiletti_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Librettipersonalimessaggiletti entity.
     *
     * @Route("/new", name="librettipersonalimessaggiletti_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Librettipersonalimessaggiletti();
        $form   = $this->createForm(new LibrettipersonalimessaggilettiType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Librettipersonalimessaggiletti entity.
     *
     * @Route("/{id}", name="librettipersonalimessaggiletti_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Librettipersonalimessaggiletti')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Librettipersonalimessaggiletti entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Librettipersonalimessaggiletti entity.
     *
     * @Route("/{id}/edit", name="librettipersonalimessaggiletti_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Librettipersonalimessaggiletti')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Librettipersonalimessaggiletti entity.');
        }

        $editForm = $this->createForm(new LibrettipersonalimessaggilettiType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Librettipersonalimessaggiletti entity.
     *
     * @Route("/{id}", name="librettipersonalimessaggiletti_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Librettipersonalimessaggiletti:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Librettipersonalimessaggiletti')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Librettipersonalimessaggiletti entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new LibrettipersonalimessaggilettiType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('librettipersonalimessaggiletti_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Librettipersonalimessaggiletti entity.
     *
     * @Route("/{id}", name="librettipersonalimessaggiletti_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Librettipersonalimessaggiletti')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Librettipersonalimessaggiletti entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('librettipersonalimessaggiletti'));
    }

    /**
     * Creates a form to delete a Librettipersonalimessaggiletti entity by id.
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

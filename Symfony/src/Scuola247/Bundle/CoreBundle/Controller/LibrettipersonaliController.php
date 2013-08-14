<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Librettipersonali;
use Scuola247\Bundle\CoreBundle\Form\LibrettipersonaliType;

/**
 * Librettipersonali controller.
 *
 * @Route("/librettipersonali")
 */
class LibrettipersonaliController extends Controller
{

    /**
     * Lists all Librettipersonali entities.
     *
     * @Route("/", name="librettipersonali")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Librettipersonali')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Librettipersonali entity.
     *
     * @Route("/", name="librettipersonali_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Librettipersonali:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Librettipersonali();
        $form = $this->createForm(new LibrettipersonaliType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('librettipersonali_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Librettipersonali entity.
     *
     * @Route("/new", name="librettipersonali_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Librettipersonali();
        $form   = $this->createForm(new LibrettipersonaliType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Librettipersonali entity.
     *
     * @Route("/{id}", name="librettipersonali_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Librettipersonali')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Librettipersonali entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Librettipersonali entity.
     *
     * @Route("/{id}/edit", name="librettipersonali_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Librettipersonali')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Librettipersonali entity.');
        }

        $editForm = $this->createForm(new LibrettipersonaliType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Librettipersonali entity.
     *
     * @Route("/{id}", name="librettipersonali_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Librettipersonali:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Librettipersonali')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Librettipersonali entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new LibrettipersonaliType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('librettipersonali_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Librettipersonali entity.
     *
     * @Route("/{id}", name="librettipersonali_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Librettipersonali')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Librettipersonali entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('librettipersonali'));
    }

    /**
     * Creates a form to delete a Librettipersonali entity by id.
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

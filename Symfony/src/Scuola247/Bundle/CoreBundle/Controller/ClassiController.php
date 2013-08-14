<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Classi;
use Scuola247\Bundle\CoreBundle\Form\ClassiType;

/**
 * Classi controller.
 *
 * @Route("/classi")
 */
class ClassiController extends Controller
{

    /**
     * Lists all Classi entities.
     *
     * @Route("/", name="classi")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Classi')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Classi entity.
     *
     * @Route("/", name="classi_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Classi:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Classi();
        $form = $this->createForm(new ClassiType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('classi_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Classi entity.
     *
     * @Route("/new", name="classi_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Classi();
        $form   = $this->createForm(new ClassiType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Classi entity.
     *
     * @Route("/{id}", name="classi_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Classi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classi entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Classi entity.
     *
     * @Route("/{id}/edit", name="classi_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Classi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classi entity.');
        }

        $editForm = $this->createForm(new ClassiType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Classi entity.
     *
     * @Route("/{id}", name="classi_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Classi:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Classi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classi entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ClassiType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('classi_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Classi entity.
     *
     * @Route("/{id}", name="classi_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Classi')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Classi entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('classi'));
    }

    /**
     * Creates a form to delete a Classi entity by id.
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

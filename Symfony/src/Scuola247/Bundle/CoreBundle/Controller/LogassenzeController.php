<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Logassenze;
use Scuola247\Bundle\CoreBundle\Form\LogassenzeType;

/**
 * Logassenze controller.
 *
 * @Route("/logassenze")
 */
class LogassenzeController extends Controller
{

    /**
     * Lists all Logassenze entities.
     *
     * @Route("/", name="logassenze")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Logassenze')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Logassenze entity.
     *
     * @Route("/", name="logassenze_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Logassenze:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Logassenze();
        $form = $this->createForm(new LogassenzeType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('logassenze_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Logassenze entity.
     *
     * @Route("/new", name="logassenze_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Logassenze();
        $form   = $this->createForm(new LogassenzeType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Logassenze entity.
     *
     * @Route("/{id}", name="logassenze_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Logassenze')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Logassenze entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Logassenze entity.
     *
     * @Route("/{id}/edit", name="logassenze_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Logassenze')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Logassenze entity.');
        }

        $editForm = $this->createForm(new LogassenzeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Logassenze entity.
     *
     * @Route("/{id}", name="logassenze_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Logassenze:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Logassenze')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Logassenze entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new LogassenzeType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('logassenze_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Logassenze entity.
     *
     * @Route("/{id}", name="logassenze_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Logassenze')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Logassenze entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('logassenze'));
    }

    /**
     * Creates a form to delete a Logassenze entity by id.
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

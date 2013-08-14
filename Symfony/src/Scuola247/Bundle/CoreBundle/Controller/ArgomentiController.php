<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Argomenti;
use Scuola247\Bundle\CoreBundle\Form\ArgomentiType;

/**
 * Argomenti controller.
 *
 * @Route("/argomenti")
 */
class ArgomentiController extends Controller
{

    /**
     * Lists all Argomenti entities.
     *
     * @Route("/", name="argomenti")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Argomenti')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Argomenti entity.
     *
     * @Route("/", name="argomenti_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Argomenti:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Argomenti();
        $form = $this->createForm(new ArgomentiType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('argomenti_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Argomenti entity.
     *
     * @Route("/new", name="argomenti_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Argomenti();
        $form   = $this->createForm(new ArgomentiType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Argomenti entity.
     *
     * @Route("/{id}", name="argomenti_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Argomenti')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Argomenti entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Argomenti entity.
     *
     * @Route("/{id}/edit", name="argomenti_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Argomenti')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Argomenti entity.');
        }

        $editForm = $this->createForm(new ArgomentiType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Argomenti entity.
     *
     * @Route("/{id}", name="argomenti_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Argomenti:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Argomenti')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Argomenti entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ArgomentiType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('argomenti_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Argomenti entity.
     *
     * @Route("/{id}", name="argomenti_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Argomenti')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Argomenti entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('argomenti'));
    }

    /**
     * Creates a form to delete a Argomenti entity by id.
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

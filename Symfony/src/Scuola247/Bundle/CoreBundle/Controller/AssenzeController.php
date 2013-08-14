<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Assenze;
use Scuola247\Bundle\CoreBundle\Form\AssenzeType;

/**
 * Assenze controller.
 *
 * @Route("/assenze")
 */
class AssenzeController extends Controller
{

    /**
     * Lists all Assenze entities.
     *
     * @Route("/", name="assenze")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Assenze')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Assenze entity.
     *
     * @Route("/", name="assenze_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Assenze:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Assenze();
        $form = $this->createForm(new AssenzeType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('assenze_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Assenze entity.
     *
     * @Route("/new", name="assenze_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Assenze();
        $form   = $this->createForm(new AssenzeType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Assenze entity.
     *
     * @Route("/{id}", name="assenze_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Assenze')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Assenze entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Assenze entity.
     *
     * @Route("/{id}/edit", name="assenze_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Assenze')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Assenze entity.');
        }

        $editForm = $this->createForm(new AssenzeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Assenze entity.
     *
     * @Route("/{id}", name="assenze_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Assenze:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Assenze')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Assenze entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AssenzeType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('assenze_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Assenze entity.
     *
     * @Route("/{id}", name="assenze_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Assenze')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Assenze entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('assenze'));
    }

    /**
     * Creates a form to delete a Assenze entity by id.
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

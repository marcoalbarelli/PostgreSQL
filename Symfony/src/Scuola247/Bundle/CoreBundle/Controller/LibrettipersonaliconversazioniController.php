<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Librettipersonaliconversazioni;
use Scuola247\Bundle\CoreBundle\Form\LibrettipersonaliconversazioniType;

/**
 * Librettipersonaliconversazioni controller.
 *
 * @Route("/librettipersonaliconversazioni")
 */
class LibrettipersonaliconversazioniController extends Controller
{

    /**
     * Lists all Librettipersonaliconversazioni entities.
     *
     * @Route("/", name="librettipersonaliconversazioni")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Librettipersonaliconversazioni')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Librettipersonaliconversazioni entity.
     *
     * @Route("/", name="librettipersonaliconversazioni_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Librettipersonaliconversazioni:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Librettipersonaliconversazioni();
        $form = $this->createForm(new LibrettipersonaliconversazioniType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('librettipersonaliconversazioni_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Librettipersonaliconversazioni entity.
     *
     * @Route("/new", name="librettipersonaliconversazioni_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Librettipersonaliconversazioni();
        $form   = $this->createForm(new LibrettipersonaliconversazioniType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Librettipersonaliconversazioni entity.
     *
     * @Route("/{id}", name="librettipersonaliconversazioni_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Librettipersonaliconversazioni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Librettipersonaliconversazioni entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Librettipersonaliconversazioni entity.
     *
     * @Route("/{id}/edit", name="librettipersonaliconversazioni_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Librettipersonaliconversazioni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Librettipersonaliconversazioni entity.');
        }

        $editForm = $this->createForm(new LibrettipersonaliconversazioniType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Librettipersonaliconversazioni entity.
     *
     * @Route("/{id}", name="librettipersonaliconversazioni_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Librettipersonaliconversazioni:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Librettipersonaliconversazioni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Librettipersonaliconversazioni entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new LibrettipersonaliconversazioniType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('librettipersonaliconversazioni_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Librettipersonaliconversazioni entity.
     *
     * @Route("/{id}", name="librettipersonaliconversazioni_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Librettipersonaliconversazioni')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Librettipersonaliconversazioni entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('librettipersonaliconversazioni'));
    }

    /**
     * Creates a form to delete a Librettipersonaliconversazioni entity by id.
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

<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Logannotazioni;
use Scuola247\Bundle\CoreBundle\Form\LogannotazioniType;

/**
 * Logannotazioni controller.
 *
 * @Route("/logannotazioni")
 */
class LogannotazioniController extends Controller
{

    /**
     * Lists all Logannotazioni entities.
     *
     * @Route("/", name="logannotazioni")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Logannotazioni')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Logannotazioni entity.
     *
     * @Route("/", name="logannotazioni_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Logannotazioni:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Logannotazioni();
        $form = $this->createForm(new LogannotazioniType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('logannotazioni_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Logannotazioni entity.
     *
     * @Route("/new", name="logannotazioni_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Logannotazioni();
        $form   = $this->createForm(new LogannotazioniType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Logannotazioni entity.
     *
     * @Route("/{id}", name="logannotazioni_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Logannotazioni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Logannotazioni entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Logannotazioni entity.
     *
     * @Route("/{id}/edit", name="logannotazioni_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Logannotazioni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Logannotazioni entity.');
        }

        $editForm = $this->createForm(new LogannotazioniType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Logannotazioni entity.
     *
     * @Route("/{id}", name="logannotazioni_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Logannotazioni:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Logannotazioni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Logannotazioni entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new LogannotazioniType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('logannotazioni_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Logannotazioni entity.
     *
     * @Route("/{id}", name="logannotazioni_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Logannotazioni')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Logannotazioni entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('logannotazioni'));
    }

    /**
     * Creates a form to delete a Logannotazioni entity by id.
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

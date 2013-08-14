<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Tipidicomunicazione;
use Scuola247\Bundle\CoreBundle\Form\TipidicomunicazioneType;

/**
 * Tipidicomunicazione controller.
 *
 * @Route("/tipidicomunicazione")
 */
class TipidicomunicazioneController extends Controller
{

    /**
     * Lists all Tipidicomunicazione entities.
     *
     * @Route("/", name="tipidicomunicazione")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Tipidicomunicazione')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Tipidicomunicazione entity.
     *
     * @Route("/", name="tipidicomunicazione_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Tipidicomunicazione:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Tipidicomunicazione();
        $form = $this->createForm(new TipidicomunicazioneType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipidicomunicazione_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Tipidicomunicazione entity.
     *
     * @Route("/new", name="tipidicomunicazione_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Tipidicomunicazione();
        $form   = $this->createForm(new TipidicomunicazioneType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Tipidicomunicazione entity.
     *
     * @Route("/{id}", name="tipidicomunicazione_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Tipidicomunicazione')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipidicomunicazione entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Tipidicomunicazione entity.
     *
     * @Route("/{id}/edit", name="tipidicomunicazione_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Tipidicomunicazione')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipidicomunicazione entity.');
        }

        $editForm = $this->createForm(new TipidicomunicazioneType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Tipidicomunicazione entity.
     *
     * @Route("/{id}", name="tipidicomunicazione_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Tipidicomunicazione:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Tipidicomunicazione')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipidicomunicazione entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TipidicomunicazioneType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipidicomunicazione_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Tipidicomunicazione entity.
     *
     * @Route("/{id}", name="tipidicomunicazione_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Tipidicomunicazione')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tipidicomunicazione entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipidicomunicazione'));
    }

    /**
     * Creates a form to delete a Tipidicomunicazione entity by id.
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

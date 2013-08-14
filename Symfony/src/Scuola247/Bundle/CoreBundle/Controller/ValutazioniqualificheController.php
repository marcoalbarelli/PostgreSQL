<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Valutazioniqualifiche;
use Scuola247\Bundle\CoreBundle\Form\ValutazioniqualificheType;

/**
 * Valutazioniqualifiche controller.
 *
 * @Route("/valutazioniqualifiche")
 */
class ValutazioniqualificheController extends Controller
{

    /**
     * Lists all Valutazioniqualifiche entities.
     *
     * @Route("/", name="valutazioniqualifiche")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Valutazioniqualifiche')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Valutazioniqualifiche entity.
     *
     * @Route("/", name="valutazioniqualifiche_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Valutazioniqualifiche:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Valutazioniqualifiche();
        $form = $this->createForm(new ValutazioniqualificheType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('valutazioniqualifiche_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Valutazioniqualifiche entity.
     *
     * @Route("/new", name="valutazioniqualifiche_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Valutazioniqualifiche();
        $form   = $this->createForm(new ValutazioniqualificheType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Valutazioniqualifiche entity.
     *
     * @Route("/{id}", name="valutazioniqualifiche_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Valutazioniqualifiche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Valutazioniqualifiche entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Valutazioniqualifiche entity.
     *
     * @Route("/{id}/edit", name="valutazioniqualifiche_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Valutazioniqualifiche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Valutazioniqualifiche entity.');
        }

        $editForm = $this->createForm(new ValutazioniqualificheType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Valutazioniqualifiche entity.
     *
     * @Route("/{id}", name="valutazioniqualifiche_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Valutazioniqualifiche:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Valutazioniqualifiche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Valutazioniqualifiche entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ValutazioniqualificheType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('valutazioniqualifiche_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Valutazioniqualifiche entity.
     *
     * @Route("/{id}", name="valutazioniqualifiche_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Valutazioniqualifiche')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Valutazioniqualifiche entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('valutazioniqualifiche'));
    }

    /**
     * Creates a form to delete a Valutazioniqualifiche entity by id.
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

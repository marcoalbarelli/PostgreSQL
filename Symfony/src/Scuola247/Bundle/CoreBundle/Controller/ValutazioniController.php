<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Valutazioni;
use Scuola247\Bundle\CoreBundle\Form\ValutazioniType;

/**
 * Valutazioni controller.
 *
 * @Route("/valutazioni")
 */
class ValutazioniController extends Controller
{

    /**
     * Lists all Valutazioni entities.
     *
     * @Route("/", name="valutazioni")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Valutazioni')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Valutazioni entity.
     *
     * @Route("/", name="valutazioni_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Valutazioni:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Valutazioni();
        $form = $this->createForm(new ValutazioniType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('valutazioni_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Valutazioni entity.
     *
     * @Route("/new", name="valutazioni_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Valutazioni();
        $form   = $this->createForm(new ValutazioniType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Valutazioni entity.
     *
     * @Route("/{id}", name="valutazioni_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Valutazioni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Valutazioni entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Valutazioni entity.
     *
     * @Route("/{id}/edit", name="valutazioni_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Valutazioni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Valutazioni entity.');
        }

        $editForm = $this->createForm(new ValutazioniType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Valutazioni entity.
     *
     * @Route("/{id}", name="valutazioni_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Valutazioni:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Valutazioni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Valutazioni entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ValutazioniType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('valutazioni_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Valutazioni entity.
     *
     * @Route("/{id}", name="valutazioni_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Valutazioni')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Valutazioni entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('valutazioni'));
    }

    /**
     * Creates a form to delete a Valutazioni entity by id.
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

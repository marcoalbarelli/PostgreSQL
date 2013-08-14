<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Giustificazioni;
use Scuola247\Bundle\CoreBundle\Form\GiustificazioniType;

/**
 * Giustificazioni controller.
 *
 * @Route("/giustificazioni")
 */
class GiustificazioniController extends Controller
{

    /**
     * Lists all Giustificazioni entities.
     *
     * @Route("/", name="giustificazioni")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Giustificazioni')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Giustificazioni entity.
     *
     * @Route("/", name="giustificazioni_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Giustificazioni:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Giustificazioni();
        $form = $this->createForm(new GiustificazioniType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('giustificazioni_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Giustificazioni entity.
     *
     * @Route("/new", name="giustificazioni_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Giustificazioni();
        $form   = $this->createForm(new GiustificazioniType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Giustificazioni entity.
     *
     * @Route("/{id}", name="giustificazioni_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Giustificazioni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Giustificazioni entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Giustificazioni entity.
     *
     * @Route("/{id}/edit", name="giustificazioni_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Giustificazioni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Giustificazioni entity.');
        }

        $editForm = $this->createForm(new GiustificazioniType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Giustificazioni entity.
     *
     * @Route("/{id}", name="giustificazioni_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Giustificazioni:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Giustificazioni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Giustificazioni entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new GiustificazioniType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('giustificazioni_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Giustificazioni entity.
     *
     * @Route("/{id}", name="giustificazioni_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Giustificazioni')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Giustificazioni entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('giustificazioni'));
    }

    /**
     * Creates a form to delete a Giustificazioni entity by id.
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

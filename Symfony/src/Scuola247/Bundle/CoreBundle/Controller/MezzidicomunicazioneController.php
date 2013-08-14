<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Mezzidicomunicazione;
use Scuola247\Bundle\CoreBundle\Form\MezzidicomunicazioneType;

/**
 * Mezzidicomunicazione controller.
 *
 * @Route("/mezzidicomunicazione")
 */
class MezzidicomunicazioneController extends Controller
{

    /**
     * Lists all Mezzidicomunicazione entities.
     *
     * @Route("/", name="mezzidicomunicazione")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Mezzidicomunicazione')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Mezzidicomunicazione entity.
     *
     * @Route("/", name="mezzidicomunicazione_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Mezzidicomunicazione:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Mezzidicomunicazione();
        $form = $this->createForm(new MezzidicomunicazioneType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mezzidicomunicazione_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Mezzidicomunicazione entity.
     *
     * @Route("/new", name="mezzidicomunicazione_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Mezzidicomunicazione();
        $form   = $this->createForm(new MezzidicomunicazioneType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Mezzidicomunicazione entity.
     *
     * @Route("/{id}", name="mezzidicomunicazione_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Mezzidicomunicazione')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mezzidicomunicazione entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Mezzidicomunicazione entity.
     *
     * @Route("/{id}/edit", name="mezzidicomunicazione_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Mezzidicomunicazione')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mezzidicomunicazione entity.');
        }

        $editForm = $this->createForm(new MezzidicomunicazioneType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Mezzidicomunicazione entity.
     *
     * @Route("/{id}", name="mezzidicomunicazione_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Mezzidicomunicazione:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Mezzidicomunicazione')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mezzidicomunicazione entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new MezzidicomunicazioneType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mezzidicomunicazione_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Mezzidicomunicazione entity.
     *
     * @Route("/{id}", name="mezzidicomunicazione_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Mezzidicomunicazione')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Mezzidicomunicazione entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mezzidicomunicazione'));
    }

    /**
     * Creates a form to delete a Mezzidicomunicazione entity by id.
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

<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Tipiindirizzi;
use Scuola247\Bundle\CoreBundle\Form\TipiindirizziType;

/**
 * Tipiindirizzi controller.
 *
 * @Route("/tipiindirizzi")
 */
class TipiindirizziController extends Controller
{

    /**
     * Lists all Tipiindirizzi entities.
     *
     * @Route("/", name="tipiindirizzi")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Tipiindirizzi')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Tipiindirizzi entity.
     *
     * @Route("/", name="tipiindirizzi_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Tipiindirizzi:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Tipiindirizzi();
        $form = $this->createForm(new TipiindirizziType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipiindirizzi_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Tipiindirizzi entity.
     *
     * @Route("/new", name="tipiindirizzi_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Tipiindirizzi();
        $form   = $this->createForm(new TipiindirizziType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Tipiindirizzi entity.
     *
     * @Route("/{id}", name="tipiindirizzi_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Tipiindirizzi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipiindirizzi entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Tipiindirizzi entity.
     *
     * @Route("/{id}/edit", name="tipiindirizzi_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Tipiindirizzi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipiindirizzi entity.');
        }

        $editForm = $this->createForm(new TipiindirizziType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Tipiindirizzi entity.
     *
     * @Route("/{id}", name="tipiindirizzi_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Tipiindirizzi:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Tipiindirizzi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipiindirizzi entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TipiindirizziType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipiindirizzi_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Tipiindirizzi entity.
     *
     * @Route("/{id}", name="tipiindirizzi_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Tipiindirizzi')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tipiindirizzi entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipiindirizzi'));
    }

    /**
     * Creates a form to delete a Tipiindirizzi entity by id.
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

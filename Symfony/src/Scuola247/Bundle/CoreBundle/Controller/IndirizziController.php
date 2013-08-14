<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Indirizzi;
use Scuola247\Bundle\CoreBundle\Form\IndirizziType;

/**
 * Indirizzi controller.
 *
 * @Route("/indirizzi")
 */
class IndirizziController extends Controller
{

    /**
     * Lists all Indirizzi entities.
     *
     * @Route("/", name="indirizzi")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Indirizzi')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Indirizzi entity.
     *
     * @Route("/", name="indirizzi_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Indirizzi:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Indirizzi();
        $form = $this->createForm(new IndirizziType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('indirizzi_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Indirizzi entity.
     *
     * @Route("/new", name="indirizzi_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Indirizzi();
        $form   = $this->createForm(new IndirizziType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Indirizzi entity.
     *
     * @Route("/{id}", name="indirizzi_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Indirizzi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Indirizzi entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Indirizzi entity.
     *
     * @Route("/{id}/edit", name="indirizzi_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Indirizzi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Indirizzi entity.');
        }

        $editForm = $this->createForm(new IndirizziType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Indirizzi entity.
     *
     * @Route("/{id}", name="indirizzi_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Indirizzi:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Indirizzi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Indirizzi entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new IndirizziType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('indirizzi_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Indirizzi entity.
     *
     * @Route("/{id}", name="indirizzi_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Indirizzi')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Indirizzi entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('indirizzi'));
    }

    /**
     * Creates a form to delete a Indirizzi entity by id.
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

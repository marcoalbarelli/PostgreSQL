<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Loglezioni;
use Scuola247\Bundle\CoreBundle\Form\LoglezioniType;

/**
 * Loglezioni controller.
 *
 * @Route("/loglezioni")
 */
class LoglezioniController extends Controller
{

    /**
     * Lists all Loglezioni entities.
     *
     * @Route("/", name="loglezioni")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Loglezioni')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Loglezioni entity.
     *
     * @Route("/", name="loglezioni_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Loglezioni:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Loglezioni();
        $form = $this->createForm(new LoglezioniType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('loglezioni_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Loglezioni entity.
     *
     * @Route("/new", name="loglezioni_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Loglezioni();
        $form   = $this->createForm(new LoglezioniType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Loglezioni entity.
     *
     * @Route("/{id}", name="loglezioni_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Loglezioni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Loglezioni entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Loglezioni entity.
     *
     * @Route("/{id}/edit", name="loglezioni_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Loglezioni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Loglezioni entity.');
        }

        $editForm = $this->createForm(new LoglezioniType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Loglezioni entity.
     *
     * @Route("/{id}", name="loglezioni_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Loglezioni:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Loglezioni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Loglezioni entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new LoglezioniType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('loglezioni_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Loglezioni entity.
     *
     * @Route("/{id}", name="loglezioni_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Loglezioni')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Loglezioni entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('loglezioni'));
    }

    /**
     * Creates a form to delete a Loglezioni entity by id.
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

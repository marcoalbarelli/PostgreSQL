<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Lezioni;
use Scuola247\Bundle\CoreBundle\Form\LezioniType;

/**
 * Lezioni controller.
 *
 * @Route("/lezioni")
 */
class LezioniController extends Controller
{

    /**
     * Lists all Lezioni entities.
     *
     * @Route("/", name="lezioni")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Lezioni')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Lezioni entity.
     *
     * @Route("/", name="lezioni_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Lezioni:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Lezioni();
        $form = $this->createForm(new LezioniType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lezioni_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Lezioni entity.
     *
     * @Route("/new", name="lezioni_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Lezioni();
        $form   = $this->createForm(new LezioniType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Lezioni entity.
     *
     * @Route("/{id}", name="lezioni_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Lezioni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lezioni entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Lezioni entity.
     *
     * @Route("/{id}/edit", name="lezioni_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Lezioni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lezioni entity.');
        }

        $editForm = $this->createForm(new LezioniType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Lezioni entity.
     *
     * @Route("/{id}", name="lezioni_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Lezioni:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Lezioni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lezioni entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new LezioniType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lezioni_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Lezioni entity.
     *
     * @Route("/{id}", name="lezioni_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Lezioni')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Lezioni entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('lezioni'));
    }

    /**
     * Creates a form to delete a Lezioni entity by id.
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

<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Festivi;
use Scuola247\Bundle\CoreBundle\Form\FestiviType;

/**
 * Festivi controller.
 *
 * @Route("/festivi")
 */
class FestiviController extends Controller
{

    /**
     * Lists all Festivi entities.
     *
     * @Route("/", name="festivi")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Festivi')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Festivi entity.
     *
     * @Route("/", name="festivi_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Festivi:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Festivi();
        $form = $this->createForm(new FestiviType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('festivi_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Festivi entity.
     *
     * @Route("/new", name="festivi_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Festivi();
        $form   = $this->createForm(new FestiviType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Festivi entity.
     *
     * @Route("/{id}", name="festivi_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Festivi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Festivi entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Festivi entity.
     *
     * @Route("/{id}/edit", name="festivi_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Festivi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Festivi entity.');
        }

        $editForm = $this->createForm(new FestiviType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Festivi entity.
     *
     * @Route("/{id}", name="festivi_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Festivi:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Festivi')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Festivi entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new FestiviType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('festivi_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Festivi entity.
     *
     * @Route("/{id}", name="festivi_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Festivi')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Festivi entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('festivi'));
    }

    /**
     * Creates a form to delete a Festivi entity by id.
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

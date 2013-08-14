<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Metriche;
use Scuola247\Bundle\CoreBundle\Form\MetricheType;

/**
 * Metriche controller.
 *
 * @Route("/metriche")
 */
class MetricheController extends Controller
{

    /**
     * Lists all Metriche entities.
     *
     * @Route("/", name="metriche")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Metriche')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Metriche entity.
     *
     * @Route("/", name="metriche_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Metriche:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Metriche();
        $form = $this->createForm(new MetricheType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('metriche_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Metriche entity.
     *
     * @Route("/new", name="metriche_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Metriche();
        $form   = $this->createForm(new MetricheType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Metriche entity.
     *
     * @Route("/{id}", name="metriche_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Metriche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Metriche entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Metriche entity.
     *
     * @Route("/{id}/edit", name="metriche_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Metriche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Metriche entity.');
        }

        $editForm = $this->createForm(new MetricheType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Metriche entity.
     *
     * @Route("/{id}", name="metriche_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Metriche:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Metriche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Metriche entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new MetricheType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('metriche_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Metriche entity.
     *
     * @Route("/{id}", name="metriche_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Metriche')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Metriche entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('metriche'));
    }

    /**
     * Creates a form to delete a Metriche entity by id.
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

<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Soggetti;
use Scuola247\Bundle\CoreBundle\Form\SoggettiType;

/**
 * Soggetti controller.
 *
 * @Route("/soggetti")
 */
class SoggettiController extends Controller
{

    /**
     * Lists all Soggetti entities.
     *
     * @Route("/", name="soggetti")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Soggetti')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Soggetti entity.
     *
     * @Route("/", name="soggetti_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Soggetti:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Soggetti();
        $form = $this->createForm(new SoggettiType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('soggetti_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Soggetti entity.
     *
     * @Route("/new", name="soggetti_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Soggetti();
        $form   = $this->createForm(new SoggettiType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Soggetti entity.
     *
     * @Route("/{id}", name="soggetti_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Soggetti')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Soggetti entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Soggetti entity.
     *
     * @Route("/{id}/edit", name="soggetti_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Soggetti')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Soggetti entity.');
        }

        $editForm = $this->createForm(new SoggettiType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Soggetti entity.
     *
     * @Route("/{id}", name="soggetti_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Soggetti:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Soggetti')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Soggetti entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SoggettiType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('soggetti_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Soggetti entity.
     *
     * @Route("/{id}", name="soggetti_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Soggetti')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Soggetti entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('soggetti'));
    }

    /**
     * Creates a form to delete a Soggetti entity by id.
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

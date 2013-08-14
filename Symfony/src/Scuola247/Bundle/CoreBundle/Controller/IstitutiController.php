<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Istituti;
use Scuola247\Bundle\CoreBundle\Form\IstitutiType;

/**
 * Istituti controller.
 *
 * @Route("/istituti")
 */
class IstitutiController extends Controller
{

    /**
     * Lists all Istituti entities.
     *
     * @Route("/", name="istituti")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Istituti')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Istituti entity.
     *
     * @Route("/", name="istituti_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Istituti:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Istituti();
        $form = $this->createForm(new IstitutiType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('istituti_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Istituti entity.
     *
     * @Route("/new", name="istituti_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Istituti();
        $form   = $this->createForm(new IstitutiType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Istituti entity.
     *
     * @Route("/{id}", name="istituti_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Istituti')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Istituti entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Istituti entity.
     *
     * @Route("/{id}/edit", name="istituti_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Istituti')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Istituti entity.');
        }

        $editForm = $this->createForm(new IstitutiType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Istituti entity.
     *
     * @Route("/{id}", name="istituti_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Istituti:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Istituti')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Istituti entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new IstitutiType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('istituti_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Istituti entity.
     *
     * @Route("/{id}", name="istituti_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Istituti')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Istituti entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('istituti'));
    }

    /**
     * Creates a form to delete a Istituti entity by id.
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

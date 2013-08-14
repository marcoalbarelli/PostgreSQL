<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Annotazionidocente;
use Scuola247\Bundle\CoreBundle\Form\AnnotazionidocenteType;

/**
 * Annotazionidocente controller.
 *
 * @Route("/annotazionidocente")
 */
class AnnotazionidocenteController extends Controller
{

    /**
     * Lists all Annotazionidocente entities.
     *
     * @Route("/", name="annotazionidocente")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Annotazionidocente')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Annotazionidocente entity.
     *
     * @Route("/", name="annotazionidocente_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Annotazionidocente:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Annotazionidocente();
        $form = $this->createForm(new AnnotazionidocenteType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('annotazionidocente_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Annotazionidocente entity.
     *
     * @Route("/new", name="annotazionidocente_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Annotazionidocente();
        $form   = $this->createForm(new AnnotazionidocenteType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Annotazionidocente entity.
     *
     * @Route("/{id}", name="annotazionidocente_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Annotazionidocente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Annotazionidocente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Annotazionidocente entity.
     *
     * @Route("/{id}/edit", name="annotazionidocente_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Annotazionidocente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Annotazionidocente entity.');
        }

        $editForm = $this->createForm(new AnnotazionidocenteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Annotazionidocente entity.
     *
     * @Route("/{id}", name="annotazionidocente_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Annotazionidocente:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Annotazionidocente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Annotazionidocente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AnnotazionidocenteType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('annotazionidocente_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Annotazionidocente entity.
     *
     * @Route("/{id}", name="annotazionidocente_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Annotazionidocente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Annotazionidocente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('annotazionidocente'));
    }

    /**
     * Creates a form to delete a Annotazionidocente entity by id.
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

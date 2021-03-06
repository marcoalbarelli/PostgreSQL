<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Materie;
use Scuola247\Bundle\CoreBundle\Form\MaterieType;

/**
 * Materie controller.
 *
 * @Route("/materie")
 */
class MaterieController extends Controller
{

    /**
     * Lists all Materie entities.
     *
     * @Route("/", name="materie")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Materie')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Materie entity.
     *
     * @Route("/", name="materie_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Materie:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Materie();
        $form = $this->createForm(new MaterieType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('materie_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Materie entity.
     *
     * @Route("/new", name="materie_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Materie();
        $form   = $this->createForm(new MaterieType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Materie entity.
     *
     * @Route("/{id}", name="materie_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Materie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Materie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Materie entity.
     *
     * @Route("/{id}/edit", name="materie_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Materie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Materie entity.');
        }

        $editForm = $this->createForm(new MaterieType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Materie entity.
     *
     * @Route("/{id}", name="materie_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Materie:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Materie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Materie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new MaterieType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('materie_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Materie entity.
     *
     * @Route("/{id}", name="materie_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Materie')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Materie entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('materie'));
    }

    /**
     * Creates a form to delete a Materie entity by id.
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

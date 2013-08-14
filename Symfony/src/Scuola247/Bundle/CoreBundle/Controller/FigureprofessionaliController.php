<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Figureprofessionali;
use Scuola247\Bundle\CoreBundle\Form\FigureprofessionaliType;

/**
 * Figureprofessionali controller.
 *
 * @Route("/figureprofessionali")
 */
class FigureprofessionaliController extends Controller
{

    /**
     * Lists all Figureprofessionali entities.
     *
     * @Route("/", name="figureprofessionali")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Figureprofessionali')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Figureprofessionali entity.
     *
     * @Route("/", name="figureprofessionali_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Figureprofessionali:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Figureprofessionali();
        $form = $this->createForm(new FigureprofessionaliType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('figureprofessionali_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Figureprofessionali entity.
     *
     * @Route("/new", name="figureprofessionali_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Figureprofessionali();
        $form   = $this->createForm(new FigureprofessionaliType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Figureprofessionali entity.
     *
     * @Route("/{id}", name="figureprofessionali_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Figureprofessionali')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Figureprofessionali entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Figureprofessionali entity.
     *
     * @Route("/{id}/edit", name="figureprofessionali_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Figureprofessionali')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Figureprofessionali entity.');
        }

        $editForm = $this->createForm(new FigureprofessionaliType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Figureprofessionali entity.
     *
     * @Route("/{id}", name="figureprofessionali_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Figureprofessionali:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Figureprofessionali')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Figureprofessionali entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new FigureprofessionaliType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('figureprofessionali_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Figureprofessionali entity.
     *
     * @Route("/{id}", name="figureprofessionali_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Figureprofessionali')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Figureprofessionali entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('figureprofessionali'));
    }

    /**
     * Creates a form to delete a Figureprofessionali entity by id.
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

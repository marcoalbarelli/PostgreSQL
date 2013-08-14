<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Gruppiqualifiche;
use Scuola247\Bundle\CoreBundle\Form\GruppiqualificheType;

/**
 * Gruppiqualifiche controller.
 *
 * @Route("/gruppiqualifiche")
 */
class GruppiqualificheController extends Controller
{

    /**
     * Lists all Gruppiqualifiche entities.
     *
     * @Route("/", name="gruppiqualifiche")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Gruppiqualifiche')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Gruppiqualifiche entity.
     *
     * @Route("/", name="gruppiqualifiche_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Gruppiqualifiche:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Gruppiqualifiche();
        $form = $this->createForm(new GruppiqualificheType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('gruppiqualifiche_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Gruppiqualifiche entity.
     *
     * @Route("/new", name="gruppiqualifiche_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Gruppiqualifiche();
        $form   = $this->createForm(new GruppiqualificheType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Gruppiqualifiche entity.
     *
     * @Route("/{id}", name="gruppiqualifiche_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Gruppiqualifiche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gruppiqualifiche entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Gruppiqualifiche entity.
     *
     * @Route("/{id}/edit", name="gruppiqualifiche_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Gruppiqualifiche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gruppiqualifiche entity.');
        }

        $editForm = $this->createForm(new GruppiqualificheType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Gruppiqualifiche entity.
     *
     * @Route("/{id}", name="gruppiqualifiche_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Gruppiqualifiche:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Gruppiqualifiche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gruppiqualifiche entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new GruppiqualificheType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('gruppiqualifiche_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Gruppiqualifiche entity.
     *
     * @Route("/{id}", name="gruppiqualifiche_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Gruppiqualifiche')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Gruppiqualifiche entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('gruppiqualifiche'));
    }

    /**
     * Creates a form to delete a Gruppiqualifiche entity by id.
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

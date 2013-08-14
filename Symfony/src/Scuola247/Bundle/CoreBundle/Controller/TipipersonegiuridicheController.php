<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Tipipersonegiuridiche;
use Scuola247\Bundle\CoreBundle\Form\TipipersonegiuridicheType;

/**
 * Tipipersonegiuridiche controller.
 *
 * @Route("/tipipersonegiuridiche")
 */
class TipipersonegiuridicheController extends Controller
{

    /**
     * Lists all Tipipersonegiuridiche entities.
     *
     * @Route("/", name="tipipersonegiuridiche")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Tipipersonegiuridiche')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Tipipersonegiuridiche entity.
     *
     * @Route("/", name="tipipersonegiuridiche_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Tipipersonegiuridiche:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Tipipersonegiuridiche();
        $form = $this->createForm(new TipipersonegiuridicheType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipipersonegiuridiche_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Tipipersonegiuridiche entity.
     *
     * @Route("/new", name="tipipersonegiuridiche_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Tipipersonegiuridiche();
        $form   = $this->createForm(new TipipersonegiuridicheType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Tipipersonegiuridiche entity.
     *
     * @Route("/{id}", name="tipipersonegiuridiche_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Tipipersonegiuridiche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipipersonegiuridiche entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Tipipersonegiuridiche entity.
     *
     * @Route("/{id}/edit", name="tipipersonegiuridiche_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Tipipersonegiuridiche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipipersonegiuridiche entity.');
        }

        $editForm = $this->createForm(new TipipersonegiuridicheType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Tipipersonegiuridiche entity.
     *
     * @Route("/{id}", name="tipipersonegiuridiche_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Tipipersonegiuridiche:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Tipipersonegiuridiche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tipipersonegiuridiche entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TipipersonegiuridicheType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipipersonegiuridiche_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Tipipersonegiuridiche entity.
     *
     * @Route("/{id}", name="tipipersonegiuridiche_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Tipipersonegiuridiche')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tipipersonegiuridiche entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipipersonegiuridiche'));
    }

    /**
     * Creates a form to delete a Tipipersonegiuridiche entity by id.
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

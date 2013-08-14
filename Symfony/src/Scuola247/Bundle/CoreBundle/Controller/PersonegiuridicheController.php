<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Personegiuridiche;
use Scuola247\Bundle\CoreBundle\Form\PersonegiuridicheType;

/**
 * Personegiuridiche controller.
 *
 * @Route("/personegiuridiche")
 */
class PersonegiuridicheController extends Controller
{

    /**
     * Lists all Personegiuridiche entities.
     *
     * @Route("/", name="personegiuridiche")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Personegiuridiche')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Personegiuridiche entity.
     *
     * @Route("/", name="personegiuridiche_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Personegiuridiche:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Personegiuridiche();
        $form = $this->createForm(new PersonegiuridicheType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('personegiuridiche_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Personegiuridiche entity.
     *
     * @Route("/new", name="personegiuridiche_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Personegiuridiche();
        $form   = $this->createForm(new PersonegiuridicheType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Personegiuridiche entity.
     *
     * @Route("/{id}", name="personegiuridiche_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Personegiuridiche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personegiuridiche entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Personegiuridiche entity.
     *
     * @Route("/{id}/edit", name="personegiuridiche_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Personegiuridiche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personegiuridiche entity.');
        }

        $editForm = $this->createForm(new PersonegiuridicheType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Personegiuridiche entity.
     *
     * @Route("/{id}", name="personegiuridiche_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Personegiuridiche:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Personegiuridiche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personegiuridiche entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PersonegiuridicheType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('personegiuridiche_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Personegiuridiche entity.
     *
     * @Route("/{id}", name="personegiuridiche_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Personegiuridiche')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Personegiuridiche entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('personegiuridiche'));
    }

    /**
     * Creates a form to delete a Personegiuridiche entity by id.
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

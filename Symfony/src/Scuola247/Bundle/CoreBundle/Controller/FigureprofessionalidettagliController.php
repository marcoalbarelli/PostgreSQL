<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Figureprofessionalidettagli;
use Scuola247\Bundle\CoreBundle\Form\FigureprofessionalidettagliType;

/**
 * Figureprofessionalidettagli controller.
 *
 * @Route("/figureprofessionalidettagli")
 */
class FigureprofessionalidettagliController extends Controller
{

    /**
     * Lists all Figureprofessionalidettagli entities.
     *
     * @Route("/", name="figureprofessionalidettagli")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Figureprofessionalidettagli')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Figureprofessionalidettagli entity.
     *
     * @Route("/", name="figureprofessionalidettagli_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Figureprofessionalidettagli:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Figureprofessionalidettagli();
        $form = $this->createForm(new FigureprofessionalidettagliType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('figureprofessionalidettagli_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Figureprofessionalidettagli entity.
     *
     * @Route("/new", name="figureprofessionalidettagli_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Figureprofessionalidettagli();
        $form   = $this->createForm(new FigureprofessionalidettagliType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Figureprofessionalidettagli entity.
     *
     * @Route("/{id}", name="figureprofessionalidettagli_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Figureprofessionalidettagli')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Figureprofessionalidettagli entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Figureprofessionalidettagli entity.
     *
     * @Route("/{id}/edit", name="figureprofessionalidettagli_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Figureprofessionalidettagli')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Figureprofessionalidettagli entity.');
        }

        $editForm = $this->createForm(new FigureprofessionalidettagliType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Figureprofessionalidettagli entity.
     *
     * @Route("/{id}", name="figureprofessionalidettagli_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Figureprofessionalidettagli:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Figureprofessionalidettagli')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Figureprofessionalidettagli entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new FigureprofessionalidettagliType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('figureprofessionalidettagli_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Figureprofessionalidettagli entity.
     *
     * @Route("/{id}", name="figureprofessionalidettagli_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Figureprofessionalidettagli')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Figureprofessionalidettagli entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('figureprofessionalidettagli'));
    }

    /**
     * Creates a form to delete a Figureprofessionalidettagli entity by id.
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

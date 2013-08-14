<?php

namespace Scuola247\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Scuola247\Bundle\CoreBundle\Entity\Gruppiqualifichedettaglio;
use Scuola247\Bundle\CoreBundle\Form\GruppiqualifichedettaglioType;

/**
 * Gruppiqualifichedettaglio controller.
 *
 * @Route("/gruppiqualifichedettaglio")
 */
class GruppiqualifichedettaglioController extends Controller
{

    /**
     * Lists all Gruppiqualifichedettaglio entities.
     *
     * @Route("/", name="gruppiqualifichedettaglio")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('Scuola247CoreBundle:Gruppiqualifichedettaglio')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Gruppiqualifichedettaglio entity.
     *
     * @Route("/", name="gruppiqualifichedettaglio_create")
     * @Method("POST")
     * @Template("Scuola247CoreBundle:Gruppiqualifichedettaglio:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Gruppiqualifichedettaglio();
        $form = $this->createForm(new GruppiqualifichedettaglioType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('gruppiqualifichedettaglio_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Gruppiqualifichedettaglio entity.
     *
     * @Route("/new", name="gruppiqualifichedettaglio_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Gruppiqualifichedettaglio();
        $form   = $this->createForm(new GruppiqualifichedettaglioType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Gruppiqualifichedettaglio entity.
     *
     * @Route("/{id}", name="gruppiqualifichedettaglio_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Gruppiqualifichedettaglio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gruppiqualifichedettaglio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Gruppiqualifichedettaglio entity.
     *
     * @Route("/{id}/edit", name="gruppiqualifichedettaglio_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Gruppiqualifichedettaglio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gruppiqualifichedettaglio entity.');
        }

        $editForm = $this->createForm(new GruppiqualifichedettaglioType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Gruppiqualifichedettaglio entity.
     *
     * @Route("/{id}", name="gruppiqualifichedettaglio_update")
     * @Method("PUT")
     * @Template("Scuola247CoreBundle:Gruppiqualifichedettaglio:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('Scuola247CoreBundle:Gruppiqualifichedettaglio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gruppiqualifichedettaglio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new GruppiqualifichedettaglioType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('gruppiqualifichedettaglio_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Gruppiqualifichedettaglio entity.
     *
     * @Route("/{id}", name="gruppiqualifichedettaglio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('Scuola247CoreBundle:Gruppiqualifichedettaglio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Gruppiqualifichedettaglio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('gruppiqualifichedettaglio'));
    }

    /**
     * Creates a form to delete a Gruppiqualifichedettaglio entity by id.
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

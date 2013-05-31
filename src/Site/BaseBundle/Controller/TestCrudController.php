<?php

namespace Site\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Site\BaseBundle\Entity\TestCrud;
use Site\BaseBundle\Form\TestCrudType;

/**
 * TestCrud controller.
 *
 */
class TestCrudController extends Controller
{
    /**
     * Lists all TestCrud entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BaseBundle:TestCrud')->findAll();

        return $this->render('BaseBundle:TestCrud:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new TestCrud entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new TestCrud();
        $form = $this->createForm(new TestCrudType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('testcrud_show', array('id' => $entity->getId())));
        }

        return $this->render('BaseBundle:TestCrud:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new TestCrud entity.
     *
     */
    public function newAction()
    {
        $entity = new TestCrud();
        $form   = $this->createForm(new TestCrudType(), $entity);

        return $this->render('BaseBundle:TestCrud:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TestCrud entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BaseBundle:TestCrud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TestCrud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BaseBundle:TestCrud:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing TestCrud entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BaseBundle:TestCrud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TestCrud entity.');
        }

        $editForm = $this->createForm(new TestCrudType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BaseBundle:TestCrud:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing TestCrud entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BaseBundle:TestCrud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TestCrud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TestCrudType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('testcrud_edit', array('id' => $id)));
        }

        return $this->render('BaseBundle:TestCrud:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TestCrud entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BaseBundle:TestCrud')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TestCrud entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('testcrud'));
    }

    /**
     * Creates a form to delete a TestCrud entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

<?php
/**
 * Date: 29/05/13
 * Time: 23:16
 * @author Nicolas Canfrere <nico.canfrere at gmail.com>
 */

namespace Site\AdminBundle\Controller;


use Site\AnimalBundle\Entity\Animal;
use Site\AnimalBundle\Form\AnimalType;
use Site\BaseBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;

class AnimalController extends BaseController
{
    public function indexAction()
    {
        $animals = $this->getEm()->getRepository("AnimalBundle:Animal")->findAll();
        return $this->render("AdminBundle:Animal:index.html.twig", ["animals"=>$animals]);
    }

    public function newAction()
    {
        $animal = new Animal();
        $form = $this->createForm(new AnimalType($this->container), $animal);
        return $this->render("AdminBundle:Animal:new.html.twig", ["form"=>$form->createView()]);
    }

    public function createAction(Request $request)
    {
        $animal = new Animal();
        $form = $this->createForm(new AnimalType($this->container), $animal);
        if($request->isMethod("POST")){
            $form->bind($request);
            if($form->isValid()){
                $em = $this->getEm();
                $em->persist($animal);
                $em->flush();
                return $this->redirect($this->generateUrl("admin_animal_homepage"));
            }
        }
        return $this->render("AdminBundle:Animal:new.html.twig", ["form"=>$form->createView()]);
    }

    public function editAction($id)
    {
        $em = $this->getEm();
        $animal = $em->getRepository("AnimalBundle:Animal")->find($id);
        if(!$animal){
            throw $this->createNotFoundException("Animal introuvable");
        }
        $form = $this->createForm(new AnimalType($this->container), $animal);
        $deleteForm = $this->createDeleteForm($id);
        return $this->render("AdminBundle:Animal:edit.html.twig", ["form"=>$form->createView(),"delete_form"=>$deleteForm->createView(), "entity"=>$animal]);
    }

    public function updateAction($id, Request $request)
    {
        $em = $this->getEm();
        $animal = $em->getRepository("AnimalBundle:Animal")->find($id);
        if(!$animal){
            throw $this->createNotFoundException("Animal introuvable");
        }
        $form = $this->createForm(new AnimalType($this->container), $animal);
        $form->bind($request);
        if($form->isValid()){
            $em = $this->getEm();
            $em->persist($animal);
            $em->flush();
            return $this->redirect($this->generateUrl("admin_animal_homepage"));
        }
        $deleteForm = $this->createDeleteForm($id);
        return $this->render("AdminBundle:Animal:edit.html.twig", ["form"=>$form->createView(),"delete_form"=>$deleteForm->createView(), "entity"=>$animal]);
    }

    public function deleteAction($id, Request $request)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AnimalBundle:Animal')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Animal introuvable.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_animal_homepage'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
            ;
    }
}

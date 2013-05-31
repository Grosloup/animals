<?php
/**
 * Date: 29/05/13
 * Time: 22:32
 * @author Nicolas Canfrere <nico.canfrere at gmail.com>
 */

namespace Site\AdminBundle\Controller;


use Site\AnimalBundle\Entity\Species;
use Site\AnimalBundle\Form\SpeciesType;
use Site\BaseBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;

class SpeciesController extends BaseController
{
    public function indexAction()
    {
        $species = $this->getEm()->getRepository("AnimalBundle:Species")->findAll();
        return $this->render("AdminBundle:Species:index.html.twig", ["species"=>$species]);
    }

    public function newAction()
    {
        $species = new Species();
        $form = $this->createForm(new SpeciesType($this->container), $species);
        return $this->render("AdminBundle:Species:new.html.twig", ["form"=>$form->createView()]);

    }

    public function createAction(Request $request)
    {
        $species = new Species();
        $form = $this->createForm(new SpeciesType($this->container), $species);
        if($request->isMethod("POST")){
            $form->bind($request);
            if($form->isValid()){
                $em = $this->getEm();
                $em->persist($species);
                $em->flush();
                return $this->redirect($this->generateUrl("admin_species_homepage"));
            }
        }
        return $this->render("AdminBundle:Species:new.html.twig", ["form"=>$form->createView()]);
    }

    public function editAction($id)
    {
        $em = $this->getEm();
        $species = $em->getRepository("AnimalBundle:Species")->find($id);
        if(!$species){
            throw $this->createNotFoundException("Espèce introuvable");
        }
        $form = $this->createForm(new SpeciesType($this->container), $species);
        $deleteForm = $this->createDeleteForm($id);
        return $this->render("AdminBundle:Species:edit.html.twig", ["form"=>$form->createView(),"delete_form"=>$deleteForm->createView(), "entity"=>$species]);
    }

    public function updateAction($id, Request $request)
    {
        $em = $this->getEm();
        $species = $em->getRepository("AnimalBundle:Species")->find($id);
        if(!$species){
            throw $this->createNotFoundException("Espèce introuvable");
        }
        $form = $this->createForm(new SpeciesType($this->container), $species);
        $form->bind($request);
        if($form->isValid()){
            $em = $this->getEm();
            $em->persist($species);
            $em->flush();
            return $this->redirect($this->generateUrl("admin_species_homepage"));
        }
        $deleteForm = $this->createDeleteForm($id);
        return $this->render("AdminBundle:Species:edit.html.twig", ["form"=>$form->createView(),"delete_form"=>$deleteForm->createView(), "entity"=>$species]);
    }

    public function deleteAction($id, Request $request)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AnimalBundle:Species')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Espèce introuvable.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_species_homepage'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
            ;
    }
}

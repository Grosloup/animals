<?php

namespace Site\FrontBundle\Controller;

use Site\BaseBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Site\AnimalBundle\Entity\Event;
use Site\AnimalBundle\Form\EventType;

class EventController extends BaseController
{
    public function indexAction()
    {
    	
    }

    public function newAction()
    {

    }

    public function addAction($id)
    {
        $animal = $this->getEm()->getRepository("AnimalBundle:Animal")->find($id);
        if(!$animal){
            throw $this->createNotFoundException("Animal introuvable");
        }
        $event = new Event();
        $form = $this->createForm(new EventType($id), $event);
        return $this->render("FrontBundle:Event:add.html.twig",["form"=>$form->createView(), "animal"=>$animal]);
    }

    public function createnewAction(Request $request)
    {

    }

    public function createaddAction(Request $request)
    {
        $event = new Event();
        $id = $request->get("event_form")["animal_id"];
        $form = $this->createForm(new EventType($id), $event);
        if($request->isMethod("POST")){
            $form->bind($request);
            
            $em = $this->getEm();
            $animal = $em->getRepository("AnimalBundle:Animal")->find($id);
            if(!$animal){
                throw $this->createNotFoundException("Animal introuvable");
            }
            if($form->isValid()){
                
                $em = $this->getEm();
                
                $event->setAnimal($animal);
                $em->persist($event);
                $em->flush();
                return $this->redirect($this->generateUrl("front_animal_show", ["id"=>$id]));
            }
        }
        return $this->render("FrontBundle:Event:add.html.twig",["form"=>$form->createView(), "animal"=>$animal]);
    }    

}
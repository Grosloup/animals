<?php

namespace Site\FrontBundle\Controller;

use Site\BaseBundle\Controller\BaseController;

class AnimalController extends BaseController
{
    public function indexAction()
    {
    	//$species = $this->getEm()->getRepository("AnimalBundle:Species")->findBy([],["commonName"=>"ASC"]);
    	$species = $this->getEm()->getRepository("AnimalBundle:Species")->findAllOrderByName();
        return $this->render('FrontBundle:Animal:index.html.twig',["species"=>$species]);
    }

    public function showAction($id)
    {
    	$entity = $this->getEm()->getRepository("AnimalBundle:Animal")->find($id);
    	if(!$entity){
    		throw $this->createNotFoundException("Animal introuvable.");
    	}
    	return $this->render("FrontBundle:Animal:show.html.twig", ["entity"=>$entity]);
    }

}
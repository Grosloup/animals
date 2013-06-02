<?php

namespace Site\FrontBundle\Controller;

use Site\BaseBundle\Controller\BaseController;

class AnimalController extends BaseController
{
    public function indexAction()
    {
    	//$species = $this->getEm()->getRepository("AnimalBundle:Species")->findBy([],["commonName"=>"ASC"]);
        $repo = $this->getEm()->getRepository("AnimalBundle:Species");
    	$species = $repo->findAllOrderByName();
        $numAnimalsBySpecies = $repo->getExistingAnimalsBySpecies();
        return $this->render('FrontBundle:Animal:index.html.twig',["species"=>$species, "numAnimalsBySpecies"=>$numAnimalsBySpecies]);
    }

    public function showAction($id, $page)
    {
    	$entity = $this->getEm()->getRepository("AnimalBundle:Animal")->find($id);
    	if(!$entity){
    		throw $this->createNotFoundException("Animal introuvable.");
    	}
        $events = $this->getEm()->getRepository("AnimalBundle:Event")->paginateByDate($page,2);
    	return $this->render("FrontBundle:Animal:show.html.twig", ["entity"=>$entity,"page"=>$page,"events"=>$events]);
    }

}
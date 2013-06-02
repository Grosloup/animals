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

    public function showAction($id)
    {
    	$entity = $this->getEm()->getRepository("AnimalBundle:Animal")->find($id);
    	if(!$entity){
    		throw $this->createNotFoundException("Animal introuvable.");
    	}
        $events = $entity->getEvents();
        $paginator = $this->container->get("site.basebundle.services.paginator");
        $paginator->paginateCollection($events, 1, 5);

    	return $this->render("FrontBundle:Animal:show.html.twig", ["entity"=>$entity,"paginator"=>$paginator]);
    }

}

<?php

namespace Site\FrontBundle\Controller;

use Site\BaseBundle\Controller\BaseController;

class SpeciesController extends BaseController
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
    	$entity = $this->getEm()->getRepository("AnimalBundle:Species")->find($id);
    	if(!$entity){
    		throw $this->createNotFoundException("Espèce introuvable.");
    	}
        if($this->container->hasParameter("iucn")){
            $iucn = $this->container->getParameter("iucn");
        }
        $status = $iucn[$entity->getIucnStatus()];
    	return $this->render("FrontBundle:Species:show.html.twig", ["entity"=>$entity, "iucn"=>$status]);
    }

}
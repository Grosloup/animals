<?php
/**
 * Date: 28/05/13
 * Time: 13:30
 * @author Nicolas Canfrere <nico.canfrere at gmail.com>
 */

namespace Site\AdminBundle\Controller;


use Site\BaseBundle\Controller\BaseController;

class MiscController extends BaseController
{
    public function indexAction()
    {
        $colors = $this->getEm()->getRepository("AdminBundle:Color")->findAll();

        $eventTypes = $this->getEm()->getRepository("AdminBundle:EventType")->findAll();
        $zoos = $this->getEm()->getRepository("ZooBundle:Zoo")->findAll();
        $status = [];
        if($this->container->hasParameter("status")){
            $status = $this->container->getParameter("status");
        }
        $iucn = [];
        if($this->container->hasParameter("iucn")){
            $iucn = $this->container->getParameter("iucn");
        }

        return $this->render("AdminBundle:Misc:index.html.twig", ["colors"=>$colors,"event_types"=>$eventTypes,"zoos"=>$zoos, "status"=>$status, "iucn"=>$iucn]);
    }
}

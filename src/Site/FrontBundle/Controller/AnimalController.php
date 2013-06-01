<?php

namespace Site\FrontBundle\Controller;

use Site\BaseBundle\Controller\BaseController;

class AnimalController extends BaseController
{
    public function indexAction()
    {
        return $this->render('FrontBundle:Default:index.html.twig');
    }

}
<?php

namespace Site\AnimalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AnimalBundle:Default:index.html.twig', array('name' => $name));
    }
}

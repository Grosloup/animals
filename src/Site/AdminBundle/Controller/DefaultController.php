<?php

namespace Site\AdminBundle\Controller;

use Site\BaseBundle\Controller\BaseController;

class DefaultController extends BaseController
{
    public function indexAction()
    {
        return $this->render('AdminBundle:Default:index.html.twig');
    }
}

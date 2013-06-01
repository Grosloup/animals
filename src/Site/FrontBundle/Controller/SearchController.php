<?php

namespace Site\FrontBundle\Controller;

use Site\BaseBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends BaseController
{
    public function searchAction(Request $request)
    {
        return $this->render('FrontBundle:Default:index.html.twig');
    }

}
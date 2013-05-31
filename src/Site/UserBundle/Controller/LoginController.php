<?php
/**
 * Date: 28/05/13
 * Time: 00:34
 * @author Nicolas Canfrere <nico.canfrere at gmail.com>
 */

namespace Site\UserBundle\Controller;

use Site\BaseBundle\Controller\BaseController;

class LoginController extends BaseController
{
    public function loginAction()
    {
        return $this->render("UserBundle:Login:login.html.twig");
    }
}

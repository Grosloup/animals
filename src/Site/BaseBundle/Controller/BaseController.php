<?php
/**
 * Date: 28/05/13
 * Time: 00:39
 * @author Nicolas Canfrere <nico.canfrere at gmail.com>
 */

namespace Site\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    /**
     * @return \Doctrine\ORM\EntityManager;
     */
    public function getEm()
    {
        return $this->getDoctrine()->getManager();
    }
}

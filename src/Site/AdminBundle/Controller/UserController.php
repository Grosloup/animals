<?php
/**
 * Date: 28/05/13
 * Time: 07:11
 * @author Nicolas Canfrere <nico.canfrere at gmail.com>
 */

namespace Site\AdminBundle\Controller;


use Site\BaseBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;

class UserController extends BaseController
{
    public function indexAction()
    {
        $users = $this->getEm()->getRepository("UserBundle:User")->findAll();
        return $this->render("AdminBundle:User:index.html.twig", ["users"=>$users]);
    }

    public function newAction()
    {
        return $this->render("AdminBundle:User:new.html.twig");
    }

    public function createAction(Request $request)
    {

    }

    public function editAction($id)
    {

    }

    public function updateAction($id, Request $request)
    {

    }

    public function deleteAction($id, Request $request)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UserBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Utilisateur introuvable.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_user_homepage'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
            ;
    }
}

<?php
/**
 * Date: 31/05/13
 * Time: 10:14
 * @author Nicolas Canfrere <nico.canfrere at gmail.com>
 */

namespace Site\AdminBundle\Controller;


use Site\BaseBundle\Controller\BaseController;
use Site\ZooBundle\Entity\Zoo;
use Site\ZooBundle\Form\ZooType;
use Symfony\Component\HttpFoundation\Request;

class ZooController extends BaseController
{
    public function indexAction()
    {

    }

    public function newAction()
    {
        $entity = new Zoo();
        $form = $this->createForm(new ZooType(), $entity);
        return $this->render("AdminBundle:Misc:Zoo/new.html.twig", ["form"=>$form->createView()]);
    }

    public function createAction(Request $request)
    {
        $entity = new Zoo();
        $form = $this->createForm(new ZooType(), $entity);
        if($request->isMethod("POST")){
            $form->bind($request);
            if($form->isValid()){
                $em = $this->getEm();
                $em->persist($entity);
                $em->flush();
                return $this->redirect($this->generateUrl("admin_misc_homepage"));
            }
        }
        return $this->render("AdminBundle:Misc:Zoo/new.html.twig", ["form"=>$form->createView()]);
    }

    public function editAction($id)
    {
        $em = $this->getEm();
        $entity = $em->getRepository("ZooBundle:Zoo")->find($id);
        if(!$entity){
            throw $this->createNotFoundException("Zoo introuvable");
        }
        $form = $this->createForm(new ZooType(), $entity);
        $deleteForm = $this->createDeleteForm($id);
        return $this->render("AdminBundle:Misc:Zoo/edit.html.twig", ["form"=>$form->createView(),"delete_form"=>$deleteForm->createView(), "entity"=>$entity]);
    }

    public function updateAction($id, Request $request)
    {
        $em = $this->getEm();
        $entity = $em->getRepository("ZooBundle:Zoo")->find($id);
        if(!$entity){
            throw $this->createNotFoundException("Zoo introuvable");
        }
        $form = $this->createForm(new ZooType(), $entity);
        $form->bind($request);
        if($form->isValid()){
            $em = $this->getEm();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl("admin_misc_homepage"));
        }
        $deleteForm = $this->createDeleteForm($id);
        return $this->render("AdminBundle:Misc:Zoo/edit.html.twig", ["form"=>$form->createView(),"delete_form"=>$deleteForm->createView(), "entity"=>$entity]);
    }

    public function deleteAction($id, Request $request)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ZooBundle:zoo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Zoo introuvable.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_misc_homepage'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
            ;
    }
}

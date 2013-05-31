<?php
/**
 * Date: 28/05/13
 * Time: 14:02
 * @author Nicolas Canfrere <nico.canfrere at gmail.com>
 */

namespace Site\AdminBundle\Controller;


use Site\AdminBundle\Entity\Color;
use Site\AdminBundle\Form\ColorType;
use Site\BaseBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;

class ColorController extends BaseController
{
    public function indexAction()
    {

    }

    public function newAction()
    {
        $color = new Color();
        $form = $this->createForm(new ColorType(), $color);
        return $this->render("AdminBundle:Misc:Color/new.html.twig", ["form"=>$form->createView()]);
    }

    public function createAction(Request $request)
    {
        $color = new Color();
        $form = $this->createForm(new ColorType(), $color);
        if($request->isMethod("POST")){
            $form->bind($request);
            if($form->isValid()){
                $em = $this->getEm();
                $em->persist($color);
                $em->flush();
                return $this->redirect($this->generateUrl("admin_misc_homepage"));
            }
        }
        return $this->render("AdminBundle:Misc:Color/new.html.twig", ["form"=>$form->createView()]);
    }

    public function editAction($id)
    {
        $em = $this->getEm();
        $color = $em->getRepository("AdminBundle:Color")->find($id);
        if(!$color){
            throw $this->createNotFoundException("Couleur introuvable");
        }
        $form = $this->createForm(new ColorType(), $color);
        $deleteForm = $this->createDeleteForm($id);
        return $this->render("AdminBundle:Misc:Color/edit.html.twig", ["form"=>$form->createView(),"delete_form"=>$deleteForm->createView(), "entity"=>$color]);
    }

    public function updateAction($id,Request $request)
    {
        $em = $this->getEm();
        $color = $em->getRepository("AdminBundle:Color")->find($id);
        if(!$color){
            throw $this->createNotFoundException("Couleur introuvable");
        }
        $form = $this->createForm(new ColorType(), $color);
        $form->bind($request);
        if($form->isValid()){
            $em = $this->getEm();
            $em->persist($color);
            $em->flush();
            return $this->redirect($this->generateUrl("admin_misc_homepage"));
        }
        return $this->render("AdminBundle:Misc:Color/edit.html.twig", ["form"=>$form->createView(), "entity"=>$color]);
    }

    public function deleteAction($id,Request $request)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AdminBundle:Color')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Couleur introuvable.');
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

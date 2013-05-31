<?php
/**
 * Date: 29/05/13
 * Time: 13:25
 * @author Nicolas Canfrere <nico.canfrere at gmail.com>
 */

namespace Site\AdminBundle\Controller;


use Site\AdminBundle\Entity\EventType;
use Site\AdminBundle\Form\EventTypeType;
use Site\BaseBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;

class EventTypeController extends BaseController
{
    public function indexAction()
    {

    }

    public function newAction()
    {
        $eventType = new EventType();
        $form = $this->createForm(new EventTypeType(), $eventType);
        return $this->render("AdminBundle:Misc:EventType/new.html.twig", ["form"=>$form->createView()]);
    }

    public function createAction(Request $request)
    {
        $eventType = new EventType();
        $form = $this->createForm(new EventTypeType(), $eventType);
        if($request->isMethod("POST")){
            $form->bind($request);
            if($form->isValid()){
                $em = $this->getEm();
                $em->persist($eventType);
                $em->flush();
                return $this->redirect($this->generateUrl("admin_misc_homepage"));
            }
        }
        return $this->render("AdminBundle:Misc:EventType/new.html.twig", ["form"=>$form->createView()]);
    }

    public function editAction($id)
    {
        $em = $this->getEm();
        $eventType = $em->getRepository("AdminBundle:EventType")->find($id);
        if(!$eventType){
            throw $this->createNotFoundException("Type d'événement introuvable");
        }
        $form = $this->createForm(new EventTypeType(), $eventType);
        $deleteForm = $this->createDeleteForm($id);
        return $this->render("AdminBundle:Misc:EventType/edit.html.twig", ["form"=>$form->createView(),"delete_form"=>$deleteForm->createView(), "entity"=>$eventType]);
    }

    public function updateAction($id, Request $request)
    {
        $em = $this->getEm();
        $eventType = $em->getRepository("AdminBundle:EventType")->find($id);
        if(!$eventType){
            throw $this->createNotFoundException("Type d'événement introuvable");
        }
        $form = $this->createForm(new EventTypeType(), $eventType);
        $form->bind($request);
        if($form->isValid()){
            $em = $this->getEm();
            $em->persist($eventType);
            $em->flush();
            return $this->redirect($this->generateUrl("admin_misc_homepage"));
        }
        $deleteForm = $this->createDeleteForm($id);
        return $this->render("AdminBundle:Misc:EventType/edit.html.twig", ["form"=>$form->createView(),"delete_form"=>$deleteForm->createView(), "entity"=>$eventType]);
    }

    public function deleteAction($id, Request $request)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AdminBundle:EventType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Type d\'événement introuvable.');
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

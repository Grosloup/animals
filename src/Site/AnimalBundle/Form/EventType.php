<?php
/**
 * Date: 31/05/13
 * Time: 06:58
 * @author Nicolas Canfrere <nico.canfrere at gmail.com>
 */

namespace Site\AnimalBundle\Form;


use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        /* $builder->add("name")
            ->add("status","choice",["choices"=>$status_choices])
            ->add("chip")
            ->add("earring")
            ->add("collar")
            ->add("species")
            ->add("sex","choice",["choices"=>$sexes_choices, "label"=>"Sexe :"])
            ->add("birthdate","text")
            ->add("indate","text")
            ->add("outdate","text")
            ->add("deathdate","text")
            ->add("birthPlace")->add("origin")->add("motherId")->add("fatherId")->add("isWeightable"); */
    }

    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        /*
        $view["name"]->vars["label"] = "Nom :";
        $view["status"]->vars["label"] = "Status :";
        $view["chip"]->vars["label"] = "Puce :";
        $view["earring"]->vars["label"] = "Boucle :";
        $view["collar"]->vars["label"] = "Bague :";
        $view["species"]->vars["label"] = "Espèce :";
        $view["birthdate"]->vars["label"] = "Date de naissance :";
        $view["indate"]->vars["label"] = "Date d'arrivée :";
        $view["outdate"]->vars["label"] = "Date de départ :";
        $view["deathdate"]->vars["label"] = "Date de décès :";
        $view["birthPlace"]->vars["label"] = "Lieu naissance :";
        $view["origin"]->vars["label"] = "Provenance :";
        $view["motherId"]->vars["label"] = "ID de la mère :";
        $view["fatherId"]->vars["label"] = "ID du père :";
        $view["isWeightable"]->vars["label"] = "Pesée possible";
        $view["isWeightable"]->vars["required"] = false;
        $view["isWeightable"]->vars["value"] = "0";
        */
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Site\AnimalBundle\Entity\Event'
        ));
    }


    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return "event_form";
    }
}

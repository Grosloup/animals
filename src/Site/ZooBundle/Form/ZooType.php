<?php
/**
 * Date: 31/05/13
 * Time: 10:16
 * @author Nicolas Canfrere <nico.canfrere at gmail.com>
 */

namespace Site\ZooBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ZooType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("name")->add("address")->add("city")->add("zipcode")->add("country");
    }

    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        $view["name"]->vars["label"] = "Nom :";
        $view["address"]->vars["label"] = "Adresse :";
        $view["city"]->vars["label"] = "Ville :";
        $view["zipcode"]->vars["label"] = "Code postal :";
        $view["country"]->vars["label"] = "Pays :";
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Site\ZooBundle\Entity\Zoo'
        ));
    }


    public function getName()
    {
        return "zoo_form";
    }
}

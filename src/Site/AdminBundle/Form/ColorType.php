<?php
/**
 * Date: 28/05/13
 * Time: 14:26
 * @author Nicolas Canfrere <nico.canfrere at gmail.com>
 */

namespace Site\AdminBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ColorType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("name", "text", ["label"=>"Nom de base :"])
            ->add("foreground", "text", ["label"=>"Couleur du texte :"])
            ->add("background", "text", ["label"=>"Couleur du fond :"]);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Site\AdminBundle\Entity\Color'
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return "color_form";
    }

    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        $view["foreground"]->vars["id"] = "color_foreground";
        $view["background"]->vars["id"] = "color_background";
    }
}

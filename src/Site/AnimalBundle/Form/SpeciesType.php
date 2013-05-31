<?php
/**
 * Date: 29/05/13
 * Time: 22:17
 * @author Nicolas Canfrere <nico.canfrere at gmail.com>
 */

namespace Site\AnimalBundle\Form;


use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SpeciesType extends AbstractType
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choices = [];
        $iucnStatus = $this->container->getParameter("iucn");

        foreach($iucnStatus as $k=>$v){
            $choices[$k] = $v["initial"] . " - " .$v["name_fr"];
        }

        $builder->add("commonName", "text", ["label"=>"Nom commun :"])
            ->add("latinName", "text", ["label"=>"Nom latin :"])
            ->add("englishName", "text", ["label"=>"Nom anglais :"])
            ->add("iucnStatus", "choice", ["label"=>"Status IUCN :","choices"=>$choices])
            ->add("socialOrganisation")
            ->add("description")
            ->add("distribution")
            ->add("hMale")
            ->add("hFemale")
            ->add("hBaby")
            ->add("lMale")
            ->add("lFemale")
            ->add("lBaby")
            ->add("wMale")
            ->add("wFemale")
            ->add("wBaby")
            ->add("lifeSpan")
            ->add("maturityMale")
            ->add("maturityFemale")
            ->add("cycle")
            ->add("gestation")
            ->add("reproRythm")
            ->add("numBabies")
            ->add("weaning")
            ->add("dietWild")
            ->add("dietZoo");
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Site\AnimalBundle\Entity\Species'
        ));
    }

    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        $view["socialOrganisation"]->vars["label"] = "Organisation sociale :";
        $view["description"]->vars["label"] = "Description :";
        $view["distribution"]->vars["label"] = "Répartition géographique :";
        $view["hMale"]->vars["label"] = "Hauteur - mâle :";
        $view["hFemale"]->vars["label"] = "Hauteur - femelle :";
        $view["hBaby"]->vars["label"] = "Hauteur - naissance :";
        $view["lMale"]->vars["label"] = "Longueur - mâle :";
        $view["lFemale"]->vars["label"] = "Longueur - femelle :";
        $view["lBaby"]->vars["label"] = "Longueur - naissance :";
        $view["wMale"]->vars["label"] = "Poids - mâle :";
        $view["wFemale"]->vars["label"] = "Poids - femelle :";
        $view["wBaby"]->vars["label"] = "Poids - naissance :";
        $view["lifeSpan"]->vars["label"] = "Longévité :";
        $view["maturityMale"]->vars["label"] = "Maturité sexuelle - mâle :";
        $view["maturityFemale"]->vars["label"] = "Maturité sexuelle - femelle :";
        $view["cycle"]->vars["label"] = "Durée cycle :";
        $view["gestation"]->vars["label"] = "Durée de gestation :";
        $view["reproRythm"]->vars["label"] = "Rythme de reproduction :";
        $view["numBabies"]->vars["label"] = "Petits par portée :";
        $view["weaning"]->vars["label"] = "age de sevrage :";
        $view["dietWild"]->vars["label"] = "Régime alimentaire - nature :";
        $view["dietZoo"]->vars["label"] = "Régime alimentaire - zoo :";


    }
    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return "species_form";
    }
}

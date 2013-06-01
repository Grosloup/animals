<?php

namespace Site\AnimalBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Species
 *
 * @ORM\Table(name="species")
 * @ORM\Entity(repositoryClass="Site\AnimalBundle\Entity\SpeciesRepository")
 */
class Species
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="commonName", type="string", length=255)
     */
    private $commonName;

    /**
     * @var string
     *
     * @ORM\Column(name="englishName", type="string", length=255, nullable=true)
     */
    private $englishName;

    /**
     * @var string
     *
     * @ORM\Column(name="latinName", type="string", length=255, nullable=true)
     */
    private $latinName;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     * @Gedmo\Slug(fields={"commonName"})
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="iucnStatus", type="integer")
     */
    private $iucnStatus;

    /**
     * @var string
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

    /**
     * @var string
     * @ORM\Column(name="socialOrganisation", type="text", nullable=true)
     */
    protected $socialOrganisation;

    /**
     * @var string
     * @ORM\Column(name="distribution", type="text", nullable=true)
     */
    protected $distribution;

    /**
     * @var string
     *
     * @ORM\Column(name="hMale", type="string", length=255, nullable=true)
     */
    protected $hMale;

    /**
     * @var string
     *
     * @ORM\Column(name="hFemale", type="string", length=255, nullable=true)
     */
    protected $hFemale;

    /**
     * @var string
     *
     * @ORM\Column(name="hBaby", type="string", length=255, nullable=true)
     */
    protected $hBaby;

    /**
     * @var string
     *
     * @ORM\Column(name="wMale", type="string", length=255, nullable=true)
     */
    protected $wMale;

    /**
     * @var string
     *
     * @ORM\Column(name="wFemale", type="string", length=255, nullable=true)
     */
    protected $wFemale;

    /**
     * @var string
     *
     * @ORM\Column(name="wBaby", type="string", length=255, nullable=true)
     */
    protected $wBaby;

    /**
     * @var string
     *
     * @ORM\Column(name="lMale", type="string", length=255, nullable=true)
     */
    protected $lMale;

    /**
     * @var string
     *
     * @ORM\Column(name="lFemale", type="string", length=255, nullable=true)
     */
    protected $lFemale;

    /**
     * @var string
     *
     * @ORM\Column(name="lBaby", type="string", length=255, nullable=true)
     */
    protected $lBaby;

    /**
     * @var string
     *
     * @ORM\Column(name="lifeSpan", type="string", length=255, nullable=true)
     */
    protected $lifeSpan;

    /**
     * @var string
     *
     * @ORM\Column(name="maturityMale", type="string", length=255, nullable=true)
     */
    protected $maturityMale;

    /**
     * @var string
     *
     * @ORM\Column(name="maturityFemale", type="string", length=255, nullable=true)
     */
    protected $maturityFemale;

    /**
     * @var string
     *
     * @ORM\Column(name="cycle", type="string", length=255, nullable=true)
     */
    protected $cycle;

    /**
     * @var string
     *
     * @ORM\Column(name="gestation", type="string", length=255, nullable=true)
     */
    protected $gestation;

    /**
     * @var string
     *
     * @ORM\Column(name="reproRythm", type="string", length=255, nullable=true)
     */
    protected $reproRythm;

    /**
     * @var string
     *
     * @ORM\Column(name="numBabies", type="string", length=255, nullable=true)
     */
    protected $numBabies;

    /**
     * @var string
     *
     * @ORM\Column(name="weaning", type="string", length=255, nullable=true)
     */
    protected $weaning;

    /**
     * @var string
     * @ORM\Column(name="dietWild", type="text", nullable=true)
     */
    protected $dietWild;

    /**
     * @var string
     * @ORM\Column(name="dietZoo", type="text", nullable=true)
     */
    protected $dietZoo;

    /**
     * @ORM\OneToMany(targetEntity="Site\AnimalBundle\Entity\Animal", mappedBy="species")
     */
    protected $animals;

    /**
    * @ORM\Column(name="iucnLink", type="string", length=255, nullable=true)
    */
    protected $iucnLink;

    public function getIucnLink()
    {
        return $this->iucnLink;
    }

    public function setIucnLink($iucnLink)
    {
        $this->iucnLink = $iucnLink;
        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set commonName
     *
     * @param string $commonName
     * @return Species
     */
    public function setCommonName($commonName)
    {
        $this->commonName = $commonName;

        return $this;
    }

    /**
     * Get commonName
     *
     * @return string
     */
    public function getCommonName()
    {
        return $this->commonName;
    }

    /**
     * Set englishName
     *
     * @param string $englishName
     * @return Species
     */
    public function setEnglishName($englishName)
    {
        $this->englishName = $englishName;

        return $this;
    }

    /**
     * Get englishName
     *
     * @return string
     */
    public function getEnglishName()
    {
        return $this->englishName;
    }

    /**
     * Set latinName
     *
     * @param string $latinName
     * @return Species
     */
    public function setLatinName($latinName)
    {
        $this->latinName = $latinName;

        return $this;
    }

    /**
     * Get latinName
     *
     * @return string
     */
    public function getLatinName()
    {
        return $this->latinName;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Species
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set iucnStatus
     *
     * @param int $iucnStatus
     * @return Species
     */
    public function setIucnStatus($iucnStatus)
    {
        $this->iucnStatus = $iucnStatus;

        return $this;
    }

    /**
     * Get iucnStatus
     *
     * @return int
     */
    public function getIucnStatus()
    {
        return $this->iucnStatus;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->commonName;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->animals = new ArrayCollection();
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Species
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set socialOrganisation
     *
     * @param string $socialOrganisation
     * @return Species
     */
    public function setSocialOrganisation($socialOrganisation)
    {
        $this->socialOrganisation = $socialOrganisation;

        return $this;
    }

    /**
     * Get socialOrganisation
     *
     * @return string
     */
    public function getSocialOrganisation()
    {
        return $this->socialOrganisation;
    }

    /**
     * Set distribution
     *
     * @param string $distribution
     * @return Species
     */
    public function setDistribution($distribution)
    {
        $this->distribution = $distribution;

        return $this;
    }

    /**
     * Get distribution
     *
     * @return string
     */
    public function getDistribution()
    {
        return $this->distribution;
    }

    /**
     * Add animals
     *
     * @param \Site\AnimalBundle\Entity\Animal $animals
     * @return Species
     */
    public function addAnimal(\Site\AnimalBundle\Entity\Animal $animals)
    {
        $this->animals[] = $animals;

        return $this;
    }

    /**
     * Remove animals
     *
     * @param \Site\AnimalBundle\Entity\Animal $animals
     */
    public function removeAnimal(\Site\AnimalBundle\Entity\Animal $animals)
    {
        $this->animals->removeElement($animals);
    }

    /**
     * Get animals
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnimals()
    {
        return $this->animals;
    }

    /**
     * Set hMale
     *
     * @param string $hMale
     * @return Species
     */
    public function setHMale($hMale)
    {
        $this->hMale = $hMale;

        return $this;
    }

    /**
     * Get hMale
     *
     * @return string 
     */
    public function getHMale()
    {
        return $this->hMale;
    }

    /**
     * Set hFemale
     *
     * @param string $hFemale
     * @return Species
     */
    public function setHFemale($hFemale)
    {
        $this->hFemale = $hFemale;

        return $this;
    }

    /**
     * Get hFemale
     *
     * @return string 
     */
    public function getHFemale()
    {
        return $this->hFemale;
    }

    /**
     * Set hBaby
     *
     * @param string $hBaby
     * @return Species
     */
    public function setHBaby($hBaby)
    {
        $this->hBaby = $hBaby;

        return $this;
    }

    /**
     * Get hBaby
     *
     * @return string 
     */
    public function getHBaby()
    {
        return $this->hBaby;
    }

    /**
     * Set wMale
     *
     * @param string $wMale
     * @return Species
     */
    public function setWMale($wMale)
    {
        $this->wMale = $wMale;

        return $this;
    }

    /**
     * Get wMale
     *
     * @return string 
     */
    public function getWMale()
    {
        return $this->wMale;
    }

    /**
     * Set wFemale
     *
     * @param string $wFemale
     * @return Species
     */
    public function setWFemale($wFemale)
    {
        $this->wFemale = $wFemale;

        return $this;
    }

    /**
     * Get wFemale
     *
     * @return string 
     */
    public function getWFemale()
    {
        return $this->wFemale;
    }

    /**
     * Set wBaby
     *
     * @param string $wBaby
     * @return Species
     */
    public function setWBaby($wBaby)
    {
        $this->wBaby = $wBaby;

        return $this;
    }

    /**
     * Get wBaby
     *
     * @return string 
     */
    public function getWBaby()
    {
        return $this->wBaby;
    }

    /**
     * Set lMale
     *
     * @param string $lMale
     * @return Species
     */
    public function setLMale($lMale)
    {
        $this->lMale = $lMale;

        return $this;
    }

    /**
     * Get lMale
     *
     * @return string 
     */
    public function getLMale()
    {
        return $this->lMale;
    }

    /**
     * Set lFemale
     *
     * @param string $lFemale
     * @return Species
     */
    public function setLFemale($lFemale)
    {
        $this->lFemale = $lFemale;

        return $this;
    }

    /**
     * Get lFemale
     *
     * @return string 
     */
    public function getLFemale()
    {
        return $this->lFemale;
    }

    /**
     * Set lBaby
     *
     * @param string $lBaby
     * @return Species
     */
    public function setLBaby($lBaby)
    {
        $this->lBaby = $lBaby;

        return $this;
    }

    /**
     * Get lBaby
     *
     * @return string 
     */
    public function getLBaby()
    {
        return $this->lBaby;
    }

    /**
     * Set lifeSpan
     *
     * @param string $lifeSpan
     * @return Species
     */
    public function setLifeSpan($lifeSpan)
    {
        $this->lifeSpan = $lifeSpan;

        return $this;
    }

    /**
     * Get lifeSpan
     *
     * @return string 
     */
    public function getLifeSpan()
    {
        return $this->lifeSpan;
    }

    /**
     * Set maturityMale
     *
     * @param string $maturityMale
     * @return Species
     */
    public function setMaturityMale($maturityMale)
    {
        $this->maturityMale = $maturityMale;

        return $this;
    }

    /**
     * Get maturityMale
     *
     * @return string 
     */
    public function getMaturityMale()
    {
        return $this->maturityMale;
    }

    /**
     * Set maturityFemale
     *
     * @param string $maturityFemale
     * @return Species
     */
    public function setMaturityFemale($maturityFemale)
    {
        $this->maturityFemale = $maturityFemale;

        return $this;
    }

    /**
     * Get maturityFemale
     *
     * @return string 
     */
    public function getMaturityFemale()
    {
        return $this->maturityFemale;
    }

    /**
     * Set cycle
     *
     * @param string $cycle
     * @return Species
     */
    public function setCycle($cycle)
    {
        $this->cycle = $cycle;

        return $this;
    }

    /**
     * Get cycle
     *
     * @return string 
     */
    public function getCycle()
    {
        return $this->cycle;
    }

    /**
     * Set gestation
     *
     * @param string $gestation
     * @return Species
     */
    public function setGestation($gestation)
    {
        $this->gestation = $gestation;

        return $this;
    }

    /**
     * Get gestation
     *
     * @return string 
     */
    public function getGestation()
    {
        return $this->gestation;
    }

    /**
     * Set reproRythm
     *
     * @param string $reproRythm
     * @return Species
     */
    public function setReproRythm($reproRythm)
    {
        $this->reproRythm = $reproRythm;

        return $this;
    }

    /**
     * Get reproRythm
     *
     * @return string 
     */
    public function getReproRythm()
    {
        return $this->reproRythm;
    }

    /**
     * Set numBabies
     *
     * @param string $numBabies
     * @return Species
     */
    public function setNumBabies($numBabies)
    {
        $this->numBabies = $numBabies;

        return $this;
    }

    /**
     * Get numBabies
     *
     * @return string 
     */
    public function getNumBabies()
    {
        return $this->numBabies;
    }

    /**
     * Set weaning
     *
     * @param string $weaning
     * @return Species
     */
    public function setWeaning($weaning)
    {
        $this->weaning = $weaning;

        return $this;
    }

    /**
     * Get weaning
     *
     * @return string 
     */
    public function getWeaning()
    {
        return $this->weaning;
    }

    /**
     * Set dietWild
     *
     * @param string $dietWild
     * @return Species
     */
    public function setDietWild($dietWild)
    {
        $this->dietWild = $dietWild;

        return $this;
    }

    /**
     * Get dietWild
     *
     * @return string 
     */
    public function getDietWild()
    {
        return $this->dietWild;
    }

    /**
     * Set dietZoo
     *
     * @param string $dietZoo
     * @return Species
     */
    public function setDietZoo($dietZoo)
    {
        $this->dietZoo = $dietZoo;

        return $this;
    }

    /**
     * Get dietZoo
     *
     * @return string 
     */
    public function getDietZoo()
    {
        return $this->dietZoo;
    }
}

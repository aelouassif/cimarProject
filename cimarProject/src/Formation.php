<?php
// src/Personne.php
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="Formation")
 **/
class Formation
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    /** @Column(type="string") **/
    protected $theme;
    /** @Column(type="string") **/
    protected $dateDebut;
    /** @Column(type="string") **/
    protected $dateFin;
    /** @Column(type="string") **/
    protected $objectif;
    /** @Column(type="string") **/
    protected $population;
    /** @Column(type="string") **/
    protected $formateur;
    /** @Column(type="string") **/
    protected $organisme;
    /** @Column(type="string") **/

    /**
     * @OneToMany(targetEntity="Evaluation", mappedBy="formation", cascade={"persist", "remove"}, orphanRemoval=TRUE)
     */
    protected $evaluation;

    public function __construct()
    {
        $this->theme = "";
        $this->dateDebut = "";
        $this->dateFin = "";
        $this->objectif = "";
        $this->population = "";
        $this->formateur = "";
        $this->organisme = "";
        $this->evaluation = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param mixed $theme
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param mixed $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }
    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param mixed $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return mixed
     */
    public function getObjectif()
    {
        return $this->objectif;
    }

    /**
     * @param mixed $objectif
     */
    public function setObjectif($objectif)
    {
        $this->objectif = $objectif;
    }

    /**
     * @return mixed
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * @param mixed $population
     */
    public function setPopulation($population)
    {
        $this->population = $population;
    }

    /**
     * @return mixed
     */
    public function getFormateur()
    {
        return $this->formateur;
    }

    /**
     * @param mixed $formateur
     */
    public function setFormateur($formateur)
    {
        $this->formateur = $formateur;
    }

    /**
     * @return mixed
     */
    public function getOrganisme()
    {
        return $this->organisme;
    }

    /**
     * @param mixed $organisme
     */
    public function setOrganisme($organisme)
    {
        $this->organisme = $organisme;
    }

    /**
     * @return mixed
     */
    public function getEvaluation()
    {
        return $this->evaluation->toArray();
    }

    public function addEvaluation(Evaluation $eval)
    {
        if (!$this->evaluation->contains($eval)) {
            $this->evaluation->add($eval);
            $eval->setFormation($this);
        }

        return $this;
    }

    public function removeEvaluation(Evaluation $evaluation)
    {
        if (!$this->evaluation->contains($evaluation)) {
            $this->evaluation->removeElement($evaluation);
            $evaluation->setFormation($this);
        }
    }
    public function getPersonnes()
    {
       return array_map(
           function ($evaluation) {
               return $evaluation->getPersonne();
           },
           $this->evaluation->toArray()
       );
    }

}

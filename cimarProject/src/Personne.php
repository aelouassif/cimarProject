<?php
// src/Personne.php
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="Personne")
 **/
class Personne
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    /** @Column(type="string")  **/
    protected $matrecule;
    /** @Column(type="string") **/
    protected $nomPrenom;
    /** @Column(type="string") **/
    protected $dateEmbache;
    /** @Column(type="string") **/
    protected $dateNaissance;
    /** @Column(type="string") **/
    protected $CNSS;
    /** @Column(type="string") **/
    protected $departement;

    /**
     * @OneToMany(targetEntity="Evaluation", mappedBy="personne", cascade={"persist", "remove"}, orphanRemoval=TRUE)
     */
    protected $evaluation;



    public function __construct()
    {
        $this->matrecule = "";
        $this->nomPrenom = "";
        $this->dateEmbache = "";
        $this->dateNaissance = "";
        $this->CNSS = "";
        $this->departement = "";
        $this->poste = "";

        $this->evaluation = new ArrayCollection();

    }



    public function getMatrecule()
    {
        return $this->matrecule;
    }

    public function setMatrecule($matrecule)
    {
        $this->matrecule = $matrecule;
    }

    /**
     * @return mixed
     */
    public function getNomPrenom()
    {
        return $this->nomPrenom;
    }

    /**
     * @param mixed $nomPrenom
     */
    public function setNomPrenom($nomPrenom)
    {
        $this->nomPrenom = $nomPrenom;
    }

    /**
     * @return mixed
     */
    public function getDateEmbache()
    {
        return $this->dateEmbache;
    }

    /**
     * @param mixed $dateAmbache
     */
    public function setDateEmbache($dateEmbache)
    {
        $this->dateEmbache = $dateEmbache;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * @param mixed $dateNaissance
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return mixed
     */
    public function getCNSS()
    {
        return $this->CNSS;
    }

    /**
     * @param mixed $CNSS
     */
    public function setCNSS($CNSS)
    {
        $this->CNSS = $CNSS;
    }

    /**
     * @return mixed
     */
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * @param mixed $poste
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;
    }
    /** @Column(type="string") **/
    protected $poste;

    public function getDepartement()
    {
        return $this->departement;
    }


    public function setDepartement($departement)
    {
        $this->departement = $departement;
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
             $eval->setPersonne($this);
         }

         return $this;
     }

     public function removeEvaluation(Evaluation $evaluation)
     {
         if (!$this->evaluation->contains($evaluation)) {
             $this->evaluation->removeElement($evaluation);
             $evaluation->setPersonne($this);
         }
     }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function getFormations()
    {
       return array_map(
           function ($evaluation) {
               return $evaluation->getFormation();
           },
           $this->evaluation->toArray()
       );
    }
}

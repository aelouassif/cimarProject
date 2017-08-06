<?php
/**
 * @Entity @Table(name="Evaluation")
 **/
class Evaluation
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /**
     * @ManyToOne(targetEntity="Personne", inversedBy="evaluation")
     * @JoinColumn(name="personne_id", referencedColumnName="id", nullable=TRUE)
     */
    protected $personne;
    //
    /**
     * @ManyToOne(targetEntity="Formation", inversedBy="evaluation")
     * @JoinColumn(name="formation_id", referencedColumnName="id", nullable=TRUE)
     */
    protected $formation;


    /** @Column(type="array",nullable=TRUE) **/
    protected $noteIndividuelle;
    /** @Column(type="array",nullable=TRUE) **/
    protected $noteResponsable;

    /**
     * @return mixed
     */
    public function getNoteIndividuelle()
    {
        return $this->noteIndividuelle;
    }

    /**
     * @param mixed $noteIndividuelle
     */
    public function setNoteIndividuelle(array $items)
    {
        if (!empty($items) && $items === $this->noteIndividuelle) {
            reset($items);
            $items[key($items)] = clone current($items);
        }
        $this->noteIndividuelle = $items;
    }

    /**
     * @return mixed
     */
    public function getNoteResponsable()
    {
        return $this->noteResponsable;
    }

    /**
     * @param mixed $noteResponsable
     */
    public function setNoteResponsable(array $items)
    {
        if (!empty($items) && $items === $this->noteResponsable) {
            reset($items);
            $items[key($items)] = clone current($items);
        }
        $this->noteResponsable = $items;
    }

    /**
     * Evaluation constructor.
     * @param $noteIndividuelle
     * @param $noteResponsable
     */
    public function __construct()
    {
        $this->noteIndividuelle = array("","","","","","","","","","","","","");
        $this->noteResponsable = array("","","","","","","");
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



    public function getPersonne()
    {
        return $this->personne;
    }


    public function setPersonne($personne)
    {
        $this->personne = $personne;
        return $this;
    }

    public function getFormation()
    {
        return $this->formation;
    }

    public function setFormation($formation)
    {
        $this->formation = $formation;
        return $this;
    }

    /**
     * @return mixed
     */

}

?>

<?php
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="test")
 **/
class test
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;



    /** @Column(type="array",nullable=TRUE) **/
    protected $note;

    /**
     * test constructor.
     * @param $note
     */
    public function __construct()
    {
        $this->note = array("1","2","3","4");

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        echo $this->note->count();
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote(array $items)
    {
        if (!empty($items) && $items === $this->note) {
            reset($items);
            $items[key($items)] = clone current($items);
        }
        $this->note = $items;
    }


    /**
     * @return mixed
     */

}
$t = new test();
?>

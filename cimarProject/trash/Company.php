<?php
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* Entity
* Table(name="people")
*/
class Person{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="Job", mappedBy="person", cascade={"persist", "remove"}, orphanRemoval=TRUE)
     */
    protected $jobs;

    public function __construct()
    {
        $this->jobs = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getJobs()
    {
        return $this->jobs->toArray();
    }

    public function addJob(Job $job)
    {
        if (!$this->jobs->contains($job)) {
            $this->jobs->add($job);
            $job->setPerson($this);
        }

        return $this;
    }

    public function removeJob(Job $job)
    {
        if ($this->jobs->contains($job)) {
            $this->jobs->removeElement($job);
            $job->setPerson(null);
        }

        return $this;
    }

    public function getCompanies()
    {
        return array_map(
            function ($job) {
                return $job->getCompany();
            },
            $this->jobs->toArray()
        );
    }
}

/**
* @ORM\Entity
* @ORM\Table(name="jobs")
*/
class Job{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="jobs")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id", nullable=FALSE)
     */
    protected $person;

    /**
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="jobs")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=FALSE)
     */
    protected $company;

    /**
     * @ORM\Column(type="date", name="started_on")
     */
    protected $startedOn;

    /**
     * @ORM\Column(type="integer", name="monthly_salary")
     */
    protected $monthlySalary;

    public function getId()
    {
        return $this->id;
    }

    public function getPerson()
    {
        return $this->person;
    }

    public function setPerson(Person $person = null)
    {
        $this->person = $person;
        return $this;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany(Company $company = null)
    {
        $this->company = $company;
        return $this;
    }

    public function getStartedOn()
    {
        return $this->startedOn;
    }

    public function setStartedOn(\DateTime $startedOn)
    {
        $this->startedOn = $startedOn;
        return $this;
    }

    public function getMonthlySalary()
    {
        return $this->monthlySalary;
    }

    public function setMonthlySalary($monthlySalary)
    {
        $this->monthlySalary = $monthlySalary;
        return $this;
    }
}

/**
* @ORM\Entity
* @ORM\Table(name="companies")
*/
class Company{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="Job", mappedBy="company", cascade={"persist", "remove"}, orphanRemoval=TRUE)
     */
    protected $jobs;

    public function __construct()
    {
        $this->jobs = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getJobs()
    {
        return $this->jobs->toArray();
    }

    public function addJob(Job $job)
    {
        if (!$this->jobs->contains($job)) {
            $this->jobs->add($job);
            $job->setCompany($this);
        }

        return $this;
    }

    public function removeJob(Job $job)
    {
        if ($this->jobs->contains($job)) {
            $this->jobs->removeElement($job);
            $job->setCompany(null);
        }

        return $this;
    }

    public function getPeople()
    {
        return array_map(
            function ($job) {
                return $job->getPerson();
            },
            $this->jobs->toArray()
        );
    }
}

 ?>

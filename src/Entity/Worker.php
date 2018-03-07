<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WorkerRepository")
 */
class Worker
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $id = 0;
    
    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @var string
     */
    private $lastName = '';
    
    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @var string
     */
    private $firstName = '';
    
    /**
     * @ORM\Column(type="decimal", precision=3, scale=1)
     * 
     * @var string
     */
    private $workingTime = '00.0';
    
    /**
     * @ORM\ManyToOne(targetEntity="Job")
     * 
     * @var Job
     */
    private $job;
    
    /**
     * @ORM\Column(type="date")
     * 
     * @var \DateTime
     */
    private $startDate;
    
    public function __construct()
    {
        $this->startDate = new \DateTime();
    }
    
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    
    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }
    
    /**
     * @param string $lastName
     * @return Worker
     */
    public function setLastName(string $lastName): Worker
    {
        $this->lastName = $lastName;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    
    /**
     * @param string $firstName
     * @return Worker
     */
    public function setFirstName(string $firstName): Worker
    {
        $this->firstName = $firstName;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getWorkingTime(): string
    {
        return $this->workingTime;
    }
    
    /**
     * @param string $workingTime
     * @return Worker
     */
    public function setWorkingTime(string $workingTime): Worker
    {
        $this->workingTime = $workingTime;
        
        return $this;
    }
    
    /**
     * @return \DateTime
     */
    public function getStartDate(): \DateTime
    {
        return $this->startDate;
    }
    
    /**
     * @param \DateTime $startDate
     * @return Worker
     */
    public function setStartDate(\DateTime $startDate): Worker
    {
        $this->startDate = $startDate;
        
        return $this;
    }
    
    /**
     * @return Job|null
     */
    public function getJob(): ? Job
    {
        return $this->job;
    }
    
    /**
     * @param Job $job
     * @return Worker
     */
    public function setJob(Job $job): Worker
    {
        $this->job = $job;
        
        return $this;
    }
}

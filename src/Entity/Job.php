<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Job
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @ORM\Id
     *
     * @var int
     */
    private $id = 0;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @var string
     */
    private $title = '';
    
    /**
     * @ORM\Column(type="text")
     * 
     * @var string
     */
    private $summary = '';
    
    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     * 
     * @var string
     */
    private $wage = '000.00';
    
    /**
     * @ORM\OneToMany(targetEntity="Worker", mappedBy="job")
     * 
     * @var Collection
     */
    private $workers;
    
    public function __construct()
    {
        $this->workers = new ArrayCollection();
    }
    
    /**
     * @ORM\PrePersist
     */
    public function correctTitle()
    {
        $this->title = ucfirst($this->title)[0] .
            strtolower(substr($this->title, 1));
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
    public function getTitle(): string
    {
        return $this->title;
    }
    
    /**
     * @param string $title
     * @return Job
     */
    public function setTitle(string $title): Job
    {
        $this->title = $title;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }
    
    /**
     * @param string $summary
     * @return Job
     */
    public function setSummary(string $summary): Job
    {
        $this->summary = $summary;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getWage(): string
    {
        return $this->wage;
    }
    
    /**
     * @param string $wage
     * @return Job
     */
    public function setWage(string $wage): Job
    {
        $this->wage = $wage;
        
        return $this;
    }
    
    /**
     * @return Collection
     */
    public function getWorkers(): Collection
    {
        return $this->workers;
    }
    
    /**
     * @param Worker $worker
     * @return Job
     */
    public function addWorker(Worker $worker): Job
    {
        $this->workers->add($worker);
        
        return $this;
    }
    
    /**
     * @param Worker $worker
     * @return Job
     */
    public function removeWorker(Worker $worker): Job
    {
        $this->workers->removeElement($worker);
        
        return $this;
    }
}

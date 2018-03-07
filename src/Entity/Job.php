<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobRepository::class)
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
}

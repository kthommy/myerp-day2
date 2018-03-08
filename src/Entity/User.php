<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @ORM\Id
     */
    private $id = 0;

    /**
     * @var string[]
     * @ORM\Column(type="json_array")
     *
     */
    private $roles = ['ROLE_USER'];
    
    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $password = '';
    
    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $salt = '';
    
    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $username = '';
    
    /**
     * @return string[]
     */
    public function getRoles(): array
    {
        return $this->roles;
    }
    
    /**
     * @param string[] $roles
     */
    public function setRoles(array $roles): UserInterface
    {
        $this->roles = $roles;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getPassword(): string
    {
        return $this->password;
    }
    
    /**
     * @param mixed $password
     */
    public function setPassword(string $password): UserInterface
    {
        $this->password = $password;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getSalt(): string
    {
        return $this->salt;
    }
    
    /**
     * @param mixed $salt
     */
    public function setSalt(string $salt): UserInterface
    {
        $this->salt = $salt;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getUsername(): string
    {
        return $this->username;
    }
    
    /**
     * @param mixed $username
     */
    public function setUsername(string $username): UserInterface
    {
        $this->username = $username;
        
        return $this;
    }
    
    public function eraseCredentials()
    {}
}

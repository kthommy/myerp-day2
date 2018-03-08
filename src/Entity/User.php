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
    private $id;

    /**
     * @var string[]
     * @ORM\Column(type="json_array")
     *
     */
    private $roles;
    
    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $password;
    
    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $salt;
    
    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $username;
    
    /**
     * @return string[]
     */
    public function getRoles()
    {
        return $this->roles;
    }
    
    /**
     * @param string[] $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }
    
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    /**
     * @return mixed
     */
    public function getSalt()
    {
        return $this->salt;
    }
    
    /**
     * @param mixed $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }
    
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    public function eraseCredentials()
    {}
}

<?php
namespace HelloWorldBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="HelloWorldBundle\Repository\UserRepository")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=255)
     */
    private $pseudo;
    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set pseudo
     *
     * @param string $pseudo
     *
     * @return User
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
        return $this;
    }
    /**
     * Get pseudo
     *
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }
    /**
     * Set age
     *
     * @param integer $age
     *
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }
    /**
     * Get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }
    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}
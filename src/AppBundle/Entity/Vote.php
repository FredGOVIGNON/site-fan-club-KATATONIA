<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vote
 *
 * @ORM\Table(name="vote")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VoteRepository")
 */
class Vote
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
     * @ORM\Column(name="iduser", type="string", length=255, nullable=true)
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="idalbum", type="string", length=255, nullable=true)
     */
    private $idalbum;

    /**
     * @var int
     *
     * @ORM\Column(name="value", type="integer", nullable=true)
     */
    private $value;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set iduser
     *
     * @param string $iduser
     * @return Vote
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return string 
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set idalbum
     *
     * @param string $idalbum
     * @return Vote
     */
    public function setIdalbum($idalbum)
    {
        $this->idalbum = $idalbum;

        return $this;
    }

    /**
     * Get idalbum
     *
     * @return string 
     */
    public function getIdalbum()
    {
        return $this->idalbum;
    }

    /**
     * Set value
     *
     * @param integer $value
     * @return Vote
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
    }
}

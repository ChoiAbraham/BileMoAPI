<?php

namespace App\Entity\Specifications;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class System.
 *
 * @ORM\Table(name="system_entity")
 * @ORM\Entity(repositoryClass="App\Repository\Specifications\SystemRepository")
 */
class System
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specification", mappedBy="system", cascade={"persist", "remove"})
     */
    private $specification;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"phone_details"})
     */
    protected $operatingSystem;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"phone_details"})
     */
    protected $interface;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getSpecification()
    {
        return $this->specification;
    }

    /**
     * @return string
     */
    public function getOperatingSystem(): string
    {
        return $this->operatingSystem;
    }

    /**
     * @return string
     */
    public function getInterface(): string
    {
        return $this->interface;
    }

    /**
     * @param mixed $specification
     */
    public function setSpecification($specification): void
    {
        $this->specification = $specification;
    }

    /**
     * @param string $operatingSystem
     */
    public function setOperatingSystem(string $operatingSystem): void
    {
        $this->operatingSystem = $operatingSystem;
    }

    /**
     * @param string $interface
     */
    public function setInterface(string $interface): void
    {
        $this->interface = $interface;
    }
}

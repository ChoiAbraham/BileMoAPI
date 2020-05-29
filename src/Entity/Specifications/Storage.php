<?php

namespace App\Entity\Specifications;

use App\Entity\Specification;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Storage.
 *
 * @ORM\Table(name="storage_entity")
 * @ORM\Entity(repositoryClass="App\Repository\Specifications\StorageRepository")
 */
class Storage
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specification", mappedBy="storage", cascade={"persist", "remove"})
     */
    private $specification;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"phone_details"})
     */
    protected $memory;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"phone_details"})
     */
    protected $extensible;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"phone_details"})
     */
    protected $maximum;

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
    public function getMemory(): string
    {
        return $this->memory;
    }

    /**
     * @return string
     */
    public function getExtensible(): string
    {
        return $this->extensible;
    }

    /**
     * @return string
     */
    public function getMaximum(): string
    {
        return $this->maximum;
    }

    /**
     * @param mixed $specification
     */
    public function setSpecification($specification): void
    {
        $this->specification = $specification;
    }

    /**
     * @param string $memory
     */
    public function setMemory(string $memory): void
    {
        $this->memory = $memory;
    }

    /**
     * @param string $extensible
     */
    public function setExtensible(string $extensible): void
    {
        $this->extensible = $extensible;
    }

    /**
     * @param string $maximum
     */
    public function setMaximum(string $maximum): void
    {
        $this->maximum = $maximum;
    }
}

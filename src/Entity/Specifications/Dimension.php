<?php

namespace App\Entity\Specifications;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Dimension.
 * @ORM\Table(name="dimension_entity")
 * @ORM\Entity(repositoryClass="App\Repository\Specifications\DimensionRepository")
 */
class Dimension
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specification", mappedBy="dimension", cascade={"persist", "remove"})
     */
    private $specification;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"phone_details"})
     */
    protected $weight;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"phone_details"})
     */
    protected $thickness;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"phone_details"})
     */
    protected $width;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"phone_details"})
     */
    protected $length;

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
    public function getWeight(): string
    {
        return $this->weight;
    }

    /**
     * @return string
     */
    public function getThickness(): string
    {
        return $this->thickness;
    }

    /**
     * @return string
     */
    public function getWidth(): string
    {
        return $this->width;
    }

    /**
     * @return string
     */
    public function getLength(): string
    {
        return $this->length;
    }

    /**
     * @param mixed $specification
     */
    public function setSpecification($specification): void
    {
        $this->specification = $specification;
    }

    /**
     * @param string $weight
     */
    public function setWeight(string $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @param string $thickness
     */
    public function setThickness(string $thickness): void
    {
        $this->thickness = $thickness;
    }

    /**
     * @param string $width
     */
    public function setWidth(string $width): void
    {
        $this->width = $width;
    }

    /**
     * @param string $length
     */
    public function setLength(string $length): void
    {
        $this->length = $length;
    }
}

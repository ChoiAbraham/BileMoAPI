<?php


namespace App\Entity\Specifications;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Divers.
 *
 * @ORM\Table(name="divers_entity")
 * @ORM\Entity(repositoryClass="App\Repository\Specifications\DiversRepository")
 */
class Divers
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specification", mappedBy="divers", cascade={"persist", "remove"})
     */
    private $specification;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"phone_listing:read"})
     */
    protected $family;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"phone_listing:read"})
     */
    protected $color;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"phone_listing:read"})
     */
    protected $appearance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     * @Groups({"phone_listing:read"})
     */
    protected $releaseDate;

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
    public function getFamily(): string
    {
        return $this->family;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @return string
     */
    public function getAppearance(): string
    {
        return $this->appearance;
    }

    /**
     * @return \DateTime
     */
    public function getReleaseDate(): \DateTime
    {
        return $this->releaseDate;
    }

    /**
     * @param mixed $specification
     */
    public function setSpecification($specification): void
    {
        $this->specification = $specification;
    }

    /**
     * @param string $family
     */
    public function setFamily(string $family): void
    {
        $this->family = $family;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * @param string $appearance
     */
    public function setAppearance(string $appearance): void
    {
        $this->appearance = $appearance;
    }

    /**
     * @param \DateTime $releaseDate
     */
    public function setReleaseDate(\DateTime $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }
}
<?php


namespace App\Entity\Specifications;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Battery.
 *
 * @ORM\Table(name="battery_entity")
 * @ORM\Entity(repositoryClass="App\Repository\Specifications\BatteryRepository")
 */
class Battery
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specification", mappedBy="battery", cascade={"persist", "remove"})
     */
    private $specification;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=45)
     * @Groups({"phone_details"})
     */
    protected $capacity;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=45)
     * @Groups({"phone_details"})
     */
    protected $power;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=45)
     * @Groups({"phone_details"})
     */
    protected $technology;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     * @Groups({"phone_details"})
     */
    protected $withoutCable;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     * @Groups({"phone_details"})
     */
    protected $removable;

    /**
     * Battery constructor.
     * @param string $capacity
     * @param string $power
     * @param string $technology
     * @param bool $withoutCable
     * @param bool $removable
     */
    public function __construct(bool $withoutCable = false, bool $removable = false, string $capacity = '', string $power = '', string $technology = '')
    {
        $this->capacity = $capacity;
        $this->power = $power;
        $this->technology = $technology;
        $this->withoutCable = $withoutCable;
        $this->removable = $removable;
    }

    /**
     * @param mixed $specification
     */
    public function setSpecification($specification): void
    {
        $this->specification = $specification;
    }

    /**
     * @param string $capacity
     */
    public function setCapacity(string $capacity): void
    {
        $this->capacity = $capacity;
    }

    /**
     * @param string $power
     */
    public function setPower(string $power): void
    {
        $this->power = $power;
    }

    /**
     * @param string $technology
     */
    public function setTechnology(string $technology): void
    {
        $this->technology = $technology;
    }

    /**
     * @param bool $withoutCable
     */
    public function setWithoutCable(bool $withoutCable): void
    {
        $this->withoutCable = $withoutCable;
    }

    /**
     * @param bool $removable
     */
    public function setRemovable(bool $removable): void
    {
        $this->removable = $removable;
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
    public function getCapacity(): string
    {
        return $this->capacity;
    }

    /**
     * @return string
     */
    public function getPower(): string
    {
        return $this->power;
    }

    /**
     * @return string
     */
    public function getTechnology(): string
    {
        return $this->technology;
    }

    /**
     * @return bool
     */
    public function isWithoutCable(): bool
    {
        return $this->withoutCable;
    }

    /**
     * @return bool
     */
    public function isRemovable(): bool
    {
        return $this->removable;
    }
}
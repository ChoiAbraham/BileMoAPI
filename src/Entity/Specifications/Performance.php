<?php


namespace App\Entity\Specifications;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Performance.
 *
 * @ORM\Table(name="performance_entity")
 * @ORM\Entity(repositoryClass="App\Repository\Specifications\PerformanceRepository")
 */
class Performance
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specification", mappedBy="performance", cascade={"persist", "remove"})
     */
    private $specification;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     * @Groups({"phone_listing:read"})
     */
    protected $processor;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"phone_listing:read"})
     */
    protected $ram;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"phone_listing:read"})
     */
    protected $fabriquant;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"phone_listing:read"})
     */
    protected $gpu;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"phone_listing:read"})
     */
    protected $frequence;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"phone_listing:read"})
     */
    protected $CPU;

    /**
     * @return mixed
     */
    public function getSpecification()
    {
        return $this->specification;
    }

    /**
     * @return bool
     */
    public function isProcessor(): bool
    {
        return $this->processor;
    }

    /**
     * @return string
     */
    public function getRam(): string
    {
        return $this->ram;
    }

    /**
     * @return string
     */
    public function getFabriquant(): string
    {
        return $this->fabriquant;
    }

    /**
     * @return string
     */
    public function getGpu(): string
    {
        return $this->gpu;
    }

    /**
     * @return string
     */
    public function getFrequence(): string
    {
        return $this->frequence;
    }

    /**
     * @return string
     */
    public function getCPU(): string
    {
        return $this->CPU;
    }

    /**
     * @param mixed $specification
     */
    public function setSpecification($specification): void
    {
        $this->specification = $specification;
    }

    /**
     * @param bool $processor
     */
    public function setProcessor(bool $processor): void
    {
        $this->processor = $processor;
    }

    /**
     * @param string $ram
     */
    public function setRam(string $ram): void
    {
        $this->ram = $ram;
    }

    /**
     * @param string $fabriquant
     */
    public function setFabriquant(string $fabriquant): void
    {
        $this->fabriquant = $fabriquant;
    }

    /**
     * @param string $gpu
     */
    public function setGpu(string $gpu): void
    {
        $this->gpu = $gpu;
    }

    /**
     * @param string $frequence
     */
    public function setFrequence(string $frequence): void
    {
        $this->frequence = $frequence;
    }

    /**
     * @param string $CPU
     */
    public function setCPU(string $CPU): void
    {
        $this->CPU = $CPU;
    }
}
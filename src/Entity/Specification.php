<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Specifications\Battery;
use App\Entity\Specifications\Camera;
use App\Entity\Specifications\Dimension;
use App\Entity\Specifications\Divers;
use App\Entity\Specifications\Network;
use App\Entity\Specifications\Performance;
use App\Entity\Specifications\Screen;
use App\Entity\Specifications\Storage;
use App\Entity\Specifications\System;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\SpecificationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpecificationRepository::class)
 */
class Specification
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specifications\System", inversedBy="specification", cascade={"persist", "remove"})
     * @Groups({"phone_listing:read", "phone_listing:write"})
     * @ORM\JoinColumn(name="system_id", referencedColumnName="id", nullable=true)
     */
    private $system;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specifications\Battery", inversedBy="specification", cascade={"persist", "remove"})
     * @Groups({"phone_listing:read", "phone_listing:write"})
     * @ORM\JoinColumn(name="battery_id", referencedColumnName="id", nullable=true)
     */
    private $battery;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specifications\Camera", inversedBy="specification", cascade={"persist", "remove"})
     * @Groups({"phone_listing:read", "phone_listing:write"})
     * @ORM\JoinColumn(name="camera_id", referencedColumnName="id", nullable=true)
     */
    private $camera;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specifications\Dimension", inversedBy="specification", cascade={"persist", "remove"})
     * @Groups({"phone_listing:read", "phone_listing:write"})
     * @ORM\JoinColumn(name="dimension_id", referencedColumnName="id", nullable=true)
     */
    private $dimension;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specifications\Divers", inversedBy="specification", cascade={"persist", "remove"})
     * @Groups({"phone_listing:read", "phone_listing:write"})
     * @ORM\JoinColumn(name="divers_id", referencedColumnName="id", nullable=true)
     */
    private $divers;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specifications\Network", inversedBy="specification", cascade={"persist", "remove"})
     * @Groups({"phone_listing:read", "phone_listing:write"})
     * @ORM\JoinColumn(name="network_id", referencedColumnName="id", nullable=true)
     */
    private $network;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specifications\Performance", inversedBy="specification", cascade={"persist", "remove"})
     * @Groups({"phone_listing:read", "phone_listing:write"})
     * @ORM\JoinColumn(name="performance_id", referencedColumnName="id", nullable=true)
     */
    private $performance;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specifications\Screen", inversedBy="specification", cascade={"persist", "remove"})
     * @Groups({"phone_listing:read", "phone_listing:write"})
     * @ORM\JoinColumn(name="screen_id", referencedColumnName="id", nullable=true)
     */
    private $screen;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Smartphone", mappedBy="specification", cascade={"persist"})
     */
    private $smartphones;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specifications\Storage", inversedBy="specification", cascade={"persist", "remove"})
     * @Groups({"phone_listing:read", "phone_listing:write"})
     * @ORM\JoinColumn(name="storage_id", referencedColumnName="id", nullable=true)
     */
    private $storage;

    /**
     * Specification constructor
     */
    public function __construct()
    {
        $this->smartphones = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getSmartphones(): ArrayCollection
    {
        return $this->smartphones;
    }

    /**
     * @return mixed
     */
    public function getSystem(): System
    {
        return $this->system;
    }

    /**
     * @param mixed $system
     */
    public function setSystem(System $system): void
    {
        $this->system = $system;
    }

    /**
     * @return mixed
     */
    public function getBattery(): Battery
    {
        return $this->battery;
    }

    /**
     * @param mixed $battery
     */
    public function setBattery(Battery $battery): void
    {
        $this->battery = $battery;
    }

    /**
     * @return mixed
     */
    public function getCamera(): Camera
    {
        return $this->camera;
    }

    /**
     * @param mixed $camera
     */
    public function setCamera(Camera $camera): void
    {
        $this->camera = $camera;
    }

    /**
     * @return mixed
     */
    public function getDimension(): Dimension
    {
        return $this->dimension;
    }

    /**
     * @param mixed $dimension
     */
    public function setDimension(Dimension $dimension): void
    {
        $this->dimension = $dimension;
    }

    /**
     * @return mixed
     */
    public function getDivers(): Divers
    {
        return $this->divers;
    }

    /**
     * @param mixed $divers
     */
    public function setDivers(Divers $divers): void
    {
        $this->divers = $divers;
    }

    /**
     * @return mixed
     */
    public function getNetwork(): Network
    {
        return $this->network;
    }

    /**
     * @param mixed $network
     */
    public function setNetwork(Network $network): void
    {
        $this->network = $network;
    }

    /**
     * @return mixed
     */
    public function getPerformance(): Performance
    {
        return $this->performance;
    }

    /**
     * @param mixed $performance
     */
    public function setPerformance(Performance $performance): void
    {
        $this->performance = $performance;
    }

    /**
     * @return mixed
     */
    public function getScreen(): Screen
    {
        return $this->screen;
    }

    /**
     * @param mixed $screen
     */
    public function setScreen(Screen $screen): void
    {
        $this->screen = $screen;
    }

    /**
     * @return mixed
     */
    public function getStorage(): Storage
    {
        return $this->storage;
    }

    /**
     * @param mixed $storage
     */
    public function setStorage(Storage $storage): void
    {
        $this->storage = $storage;
    }

    public function addSmartphone(Smartphone $smartphone): self
    {
        if (!$this->smartphones->contains($smartphone)) {
            $this->smartphones[] = $smartphone;
            $smartphone->setSpecification($this);
        }

        return $this;
    }

    public function removeSmartpone(Smartphone $smartphone): self
    {
        if ($this->smartphones->contains($smartphone)) {
            $this->smartphones->removeElement($smartphone);
            // set the owning side to null (unless already changed)
            if ($smartphone->getSpecification() === $this) {
                $smartphone->setSpecification(null);
            }
        }

        return $this;
    }
}

<?php


namespace App\Entity\Specifications;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Camera.
 * @ORM\Table(name="camera_entity")
 * @ORM\Entity(repositoryClass="App\Repository\Specifications\CameraRepository")
 */
class Camera
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specification", mappedBy="camera", cascade={"persist", "remove"})
     */
    private $specification;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"phone_details"})
     */
    protected $camera;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     * @Groups({"phone_details"})
     */
    protected $flashFront;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     *
     * @Groups({"phone_details"})
     */
    protected $flashBack;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", length=255)
     *
     * @Groups({"phone_details"})
     */
    protected $sensorNumber;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"phone_details"})
     */
    protected $sensorFrontPixels;

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
    public function getCamera(): string
    {
        return $this->camera;
    }

    /**
     * @return bool
     */
    public function isFlashFront(): bool
    {
        return $this->flashFront;
    }

    /**
     * @return bool
     */
    public function isFlashBack(): bool
    {
        return $this->flashBack;
    }

    /**
     * @return int
     */
    public function getSensorNumber(): int
    {
        return $this->sensorNumber;
    }

    /**
     * @return string
     */
    public function getSensorFrontPixels(): string
    {
        return $this->sensorFrontPixels;
    }

    /**
     * @param mixed $specification
     */
    public function setSpecification($specification): void
    {
        $this->specification = $specification;
    }

    /**
     * @param string $camera
     */
    public function setCamera(string $camera): void
    {
        $this->camera = $camera;
    }

    /**
     * @param bool $flashFront
     */
    public function setFlashFront(bool $flashFront): void
    {
        $this->flashFront = $flashFront;
    }

    /**
     * @param bool $flashBack
     */
    public function setFlashBack(bool $flashBack): void
    {
        $this->flashBack = $flashBack;
    }

    /**
     * @param int $sensorNumber
     */
    public function setSensorNumber(int $sensorNumber): void
    {
        $this->sensorNumber = $sensorNumber;
    }

    /**
     * @param string $sensorFrontPixels
     */
    public function setSensorFrontPixels(string $sensorFrontPixels): void
    {
        $this->sensorFrontPixels = $sensorFrontPixels;
    }
}
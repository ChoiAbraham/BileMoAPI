<?php


namespace App\Entity\Specifications;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Network.
 *
 * @ORM\Table(name="network_entity")
 * @ORM\Entity(repositoryClass="App\Repository\Specifications\NetworkRepository")
 */
class Network
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specification", mappedBy="network", cascade={"persist", "remove"})
     */
    private $specification;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"phone_listing:read"})
     */
    protected $wifi;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"phone_listing:read"})
     */
    protected $bluetooth;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     * @Groups({"phone_listing:read"})
     */
    protected $nfc;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Groups({"phone_listing:read"})
     */
    protected $usbVersion;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     * @Groups({"phone_listing:read"})
     */
    protected $gps;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     * @Groups({"phone_listing:read"})
     */
    protected $gyroscope;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     * @Groups({"phone_listing:read"})
     */
    protected $fingerprintSensor;

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
    public function getWifi(): string
    {
        return $this->wifi;
    }

    /**
     * @return string
     */
    public function getBluetooth(): string
    {
        return $this->bluetooth;
    }

    /**
     * @return bool
     */
    public function isNfc(): bool
    {
        return $this->nfc;
    }

    /**
     * @return string
     */
    public function getUsbVersion(): string
    {
        return $this->usbVersion;
    }

    /**
     * @return bool
     */
    public function isGps(): bool
    {
        return $this->gps;
    }

    /**
     * @return bool
     */
    public function isGyroscope(): bool
    {
        return $this->gyroscope;
    }

    /**
     * @return bool
     */
    public function isFingerprintSensor(): bool
    {
        return $this->fingerprintSensor;
    }

    /**
     * @param mixed $specification
     */
    public function setSpecification($specification): void
    {
        $this->specification = $specification;
    }

    /**
     * @param string $wifi
     */
    public function setWifi(string $wifi): void
    {
        $this->wifi = $wifi;
    }

    /**
     * @param string $bluetooth
     */
    public function setBluetooth(string $bluetooth): void
    {
        $this->bluetooth = $bluetooth;
    }

    /**
     * @param bool $nfc
     */
    public function setNfc(bool $nfc): void
    {
        $this->nfc = $nfc;
    }

    /**
     * @param string $usbVersion
     */
    public function setUsbVersion(string $usbVersion): void
    {
        $this->usbVersion = $usbVersion;
    }

    /**
     * @param bool $gps
     */
    public function setGps(bool $gps): void
    {
        $this->gps = $gps;
    }

    /**
     * @param bool $gyroscope
     */
    public function setGyroscope(bool $gyroscope): void
    {
        $this->gyroscope = $gyroscope;
    }

    /**
     * @param bool $fingerprintSensor
     */
    public function setFingerprintSensor(bool $fingerprintSensor): void
    {
        $this->fingerprintSensor = $fingerprintSensor;
    }
}
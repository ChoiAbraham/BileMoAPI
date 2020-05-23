<?php


namespace App\Entity\Specifications;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Screen.
 *
 * @ORM\Table(name="screen_entity")
 * @ORM\Entity(repositoryClass="App\Repository\Specifications\ScreenRepository")
 */
class Screen
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specification", mappedBy="screen", cascade={"persist", "remove"})
     */
    private $specification;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"phone_details"})
     */
    protected $size;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"phone_details"})
     */
    protected $defintion;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"phone_details"})
     */
    protected $dpi;

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
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getDefintion(): string
    {
        return $this->defintion;
    }

    /**
     * @return string
     */
    public function getDpi(): string
    {
        return $this->dpi;
    }

    /**
     * @param mixed $specification
     */
    public function setSpecification($specification): void
    {
        $this->specification = $specification;
    }

    /**
     * @param string $size
     */
    public function setSize(string $size): void
    {
        $this->size = $size;
    }

    /**
     * @param string $defintion
     */
    public function setDefintion(string $defintion): void
    {
        $this->defintion = $defintion;
    }

    /**
     * @param string $dpi
     */
    public function setDpi(string $dpi): void
    {
        $this->dpi = $dpi;
    }
}
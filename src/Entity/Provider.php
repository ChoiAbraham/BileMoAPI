<?php

namespace App\Entity;

use App\Repository\ProviderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ProviderRepository::class)
 */
class Provider
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"phone_details"})
     */
    private $companyName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"phone_details"})
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=100)
     * @Groups({"phone_details"})
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     * @Groups({"phone_details"})
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Groups({"phone_details"})
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=Smartphone::class, mappedBy="provider")
     */
    private $smartphones;

    public function __construct()
    {
        $this->smartphones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Smartphone[]
     */
    public function getSmartphones(): Collection
    {
        return $this->smartphones;
    }

    public function addSmartphone(Smartphone $smartphone): self
    {
        if (!$this->smartphones->contains($smartphone)) {
            $this->smartphones[] = $smartphone;
            $smartphone->setProvider($this);
        }

        return $this;
    }

    public function removeSmartphone(Smartphone $smartphone): self
    {
        if ($this->smartphones->contains($smartphone)) {
            $this->smartphones->removeElement($smartphone);
            // set the owning side to null (unless already changed)
            if ($smartphone->getProvider() === $this) {
                $smartphone->setProvider(null);
            }
        }

        return $this;
    }
}

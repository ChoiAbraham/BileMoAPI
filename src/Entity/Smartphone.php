<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SmartphoneRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;

/**
 * @ApiResource(
 *     collectionOperations={"get", "post"},
 *     itemOperations={
 *          "get"={
 *              "path"="/phone/{id}",
 *              "normalization_context"={"groups"={"phone_listing:read", "phone_details:read"}}
 *          },
 *     },
 *     shortName="phones",
 *     normalizationContext={"groups"={"phone_listing:read"}},
 *     denormalizationContext={"groups"={"phone_listing:write"}},
 *     attributes={
 *          "pagination_items_per_page"=10,
 *          "formats"={"jsonld", "json", "html", "csv"={"text/csv"}},
 *     },
 * )
 * @ApiFilter(SearchFilter::class, properties={
 *     "title": "partial",
 *     "content": "partial",
 *     "provider": "exact",
 *     "provider.companyName": "partial"
 * })
 * @ApiFilter(RangeFilter::class, properties={"price"})
 * @ApiFilter(PropertyFilter::class)
 * @ORM\Entity(repositoryClass=SmartphoneRepository::class)
 */
class Smartphone
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"phone_listing:read"})
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min=2,
     *     max=50,
     *     maxMessage="Describe your phone in 50 chars or less"
     * )
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"phone_listing:read"})
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Assert\NotBlank()
     * @Groups({"phone_listing:read"})
     */
    private $rate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank()
     * @Groups({"phone_details:read"})
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=Provider::class, inversedBy="smartphones")
     * @Groups({"phone_details:read"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $provider;

    /**
     * @ORM\ManyToOne(targetEntity=Specification::class)
     * @Groups({"phone_listing:read", "phone_listing:write"})
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private $specification;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @Groups("phone_listing:read")
     */
    public function getShortContent(): ?string
    {
        if (strlen($this->content) < 40) {
            return $this->content;
        }

        return substr($this->content, 0, 40).'...';
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getRate(): ?string
    {
        return $this->rate;
    }

    public function setRate(?string $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }


    /**
     * @param int|null $price
     * @return $this
     *
     * @SerializedName("description")
     */
    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getProvider(): ?Provider
    {
        return $this->provider;
    }

    public function setProvider(?Provider $provider): self
    {
        $this->provider = $provider;

        return $this;
    }

    public function getSpecification(): ?Specification
    {
        return $this->specification;
    }

    public function setSpecification(?Specification $specification): self
    {
        $this->specification = $specification;

        return $this;
    }
}

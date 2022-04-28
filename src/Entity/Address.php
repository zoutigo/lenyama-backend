<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AddressRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
#[ApiResource]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $adr_street;

    #[ORM\Column(type: 'text', nullable: true)]
    private $adr_description;

    #[ORM\Column(type: 'string', length: 255)]
    private $adr_long;

    #[ORM\Column(type: 'string', length: 255)]
    private $adr_lat;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\Column(type: 'datetime')]
    private $updatedAt;

    #[ORM\OneToMany(mappedBy: 'address', targetEntity: Restaurant::class)]
    private $restaurants;

    #[ORM\ManyToOne(targetEntity: Kwatta::class, inversedBy: 'addresses')]
    #[ORM\JoinColumn(nullable: false)]
    private $kwatta;

    public function __construct()
    {
        $this->restaurants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdrStreet(): ?string
    {
        return $this->adr_street;
    }

    public function setAdrStreet(?string $adr_street): self
    {
        $this->adr_street = $adr_street;

        return $this;
    }

    public function getAdrDescription(): ?string
    {
        return $this->adr_description;
    }

    public function setAdrDescription(?string $adr_description): self
    {
        $this->adr_description = $adr_description;

        return $this;
    }

    public function getAdrLong(): ?string
    {
        return $this->adr_long;
    }

    public function setAdrLong(string $adr_long): self
    {
        $this->adr_long = $adr_long;

        return $this;
    }

    public function getAdrLat(): ?string
    {
        return $this->adr_lat;
    }

    public function setAdrLat(string $adr_lat): self
    {
        $this->adr_lat = $adr_lat;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Restaurant>
     */
    public function getRestaurants(): Collection
    {
        return $this->restaurants;
    }

    public function addRestaurant(Restaurant $restaurant): self
    {
        if (!$this->restaurants->contains($restaurant)) {
            $this->restaurants[] = $restaurant;
            $restaurant->setAddress($this);
        }

        return $this;
    }

    public function removeRestaurant(Restaurant $restaurant): self
    {
        if ($this->restaurants->removeElement($restaurant)) {
            // set the owning side to null (unless already changed)
            if ($restaurant->getAddress() === $this) {
                $restaurant->setAddress(null);
            }
        }

        return $this;
    }

    public function getKwatta(): ?Kwatta
    {
        return $this->kwatta;
    }

    public function setKwatta(?Kwatta $kwatta): self
    {
        $this->kwatta = $kwatta;

        return $this;
    }
}

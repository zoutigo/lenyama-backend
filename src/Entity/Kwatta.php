<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\KwattaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KwattaRepository::class)]
#[ApiResource]
class Kwatta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $kwt_name;

    #[ORM\Column(type: 'text', nullable: true)]
    private $kwt_description;

    #[ORM\ManyToOne(targetEntity: City::class, inversedBy: 'kwattas')]
    #[ORM\JoinColumn(nullable: false)]
    private $city;

    #[ORM\OneToMany(mappedBy: 'kwatta', targetEntity: Address::class)]
    private $addresses;

    public function __construct()
    {
        $this->addresses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKwtName(): ?string
    {
        return $this->kwt_name;
    }

    public function setKwtName(string $kwt_name): self
    {
        $this->kwt_name = $kwt_name;

        return $this;
    }

    public function getKwtDescription(): ?string
    {
        return $this->kwt_description;
    }

    public function setKwtDescription(?string $kwt_description): self
    {
        $this->kwt_description = $kwt_description;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection<int, Address>
     */
    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    public function addAddress(Address $address): self
    {
        if (!$this->addresses->contains($address)) {
            $this->addresses[] = $address;
            $address->setKwatta($this);
        }

        return $this;
    }

    public function removeAddress(Address $address): self
    {
        if ($this->addresses->removeElement($address)) {
            // set the owning side to null (unless already changed)
            if ($address->getKwatta() === $this) {
                $address->setKwatta(null);
            }
        }

        return $this;
    }
}

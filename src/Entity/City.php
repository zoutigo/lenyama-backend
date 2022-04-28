<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CityRepository::class)]
#[ApiResource]
class City
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $cty_name;

    #[ORM\Column(type: 'text', nullable: true)]
    private $cty_description;

    #[ORM\Column(type: 'datetime')]
    private $updatedAt;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\OneToMany(mappedBy: 'city', targetEntity: Kwatta::class)]
    private $kwattas;

    public function __construct()
    {
        $this->kwattas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCtyName(): ?string
    {
        return $this->cty_name;
    }

    public function setCtyName(string $cty_name): self
    {
        $this->cty_name = $cty_name;

        return $this;
    }

    public function getCtyDescription(): ?string
    {
        return $this->cty_description;
    }

    public function setCtyDescription(?string $cty_description): self
    {
        $this->cty_description = $cty_description;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<int, Kwatta>
     */
    public function getKwattas(): Collection
    {
        return $this->kwattas;
    }

    public function addKwatta(Kwatta $kwatta): self
    {
        if (!$this->kwattas->contains($kwatta)) {
            $this->kwattas[] = $kwatta;
            $kwatta->setCity($this);
        }

        return $this;
    }

    public function removeKwatta(Kwatta $kwatta): self
    {
        if ($this->kwattas->removeElement($kwatta)) {
            // set the owning side to null (unless already changed)
            if ($kwatta->getCity() === $this) {
                $kwatta->setCity(null);
            }
        }

        return $this;
    }
}

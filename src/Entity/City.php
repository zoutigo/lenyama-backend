<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CityRepository;
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
}

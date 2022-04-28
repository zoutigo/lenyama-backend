<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MenuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
#[ApiResource]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $mnu_name;

    #[ORM\Column(type: 'text')]
    private $mnu_description;

    #[ORM\Column(type: 'float')]
    private $mnu_price;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\Column(type: 'datetime')]
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMnuName(): ?string
    {
        return $this->mnu_name;
    }

    public function setMnuName(string $mnu_name): self
    {
        $this->mnu_name = $mnu_name;

        return $this;
    }

    public function getMnuDescription(): ?string
    {
        return $this->mnu_description;
    }

    public function setMnuDescription(string $mnu_description): self
    {
        $this->mnu_description = $mnu_description;

        return $this;
    }

    public function getMnuPrice(): ?float
    {
        return $this->mnu_price;
    }

    public function setMnuPrice(float $mnu_price): self
    {
        $this->mnu_price = $mnu_price;

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
}

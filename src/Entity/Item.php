<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
#[ApiResource]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $itm_name;

    #[ORM\Column(type: 'text', nullable: true)]
    private $itm_description;

    #[ORM\Column(type: 'float')]
    private $itm_price;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\Column(type: 'datetime')]
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItmName(): ?string
    {
        return $this->itm_name;
    }

    public function setItmName(string $itm_name): self
    {
        $this->itm_name = $itm_name;

        return $this;
    }

    public function getItmDescription(): ?string
    {
        return $this->itm_description;
    }

    public function setItmDescription(?string $itm_description): self
    {
        $this->itm_description = $itm_description;

        return $this;
    }

    public function getItmPrice(): ?float
    {
        return $this->itm_price;
    }

    public function setItmPrice(float $itm_price): self
    {
        $this->itm_price = $itm_price;

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

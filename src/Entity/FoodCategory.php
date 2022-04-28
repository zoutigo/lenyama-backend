<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FoodCategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FoodCategoryRepository::class)]
#[ApiResource]
class FoodCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $fct_name;

    #[ORM\Column(type: 'text')]
    private $fct_description;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\Column(type: 'datetime')]
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFctName(): ?string
    {
        return $this->fct_name;
    }

    public function setFctName(string $fct_name): self
    {
        $this->fct_name = $fct_name;

        return $this;
    }

    public function getFctDescription(): ?string
    {
        return $this->fct_description;
    }

    public function setFctDescription(string $fct_description): self
    {
        $this->fct_description = $fct_description;

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

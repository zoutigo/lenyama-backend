<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
#[ApiResource]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $cmt_content;

    #[ORM\Column(type: 'string', length: 255)]
    private $cmt_title;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\Column(type: 'datetime')]
    private $updatedAt;

    #[ORM\ManyToOne(targetEntity: Order::class, inversedBy: 'comments')]
    private $horder;

    #[ORM\ManyToOne(targetEntity: Menu::class, inversedBy: 'comments')]
    private $menu;

    #[ORM\ManyToOne(targetEntity: Restaurant::class, inversedBy: 'comments')]
    private $restaurant;

    #[ORM\ManyToOne(targetEntity: Item::class, inversedBy: 'comments')]
    private $item;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCmtContent(): ?string
    {
        return $this->cmt_content;
    }

    public function setCmtContent(string $cmt_content): self
    {
        $this->cmt_content = $cmt_content;

        return $this;
    }

    public function getCmtTitle(): ?string
    {
        return $this->cmt_title;
    }

    public function setCmtTitle(string $cmt_title): self
    {
        $this->cmt_title = $cmt_title;

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

    public function getHorder(): ?Order
    {
        return $this->horder;
    }

    public function setHorder(?Order $horder): self
    {
        $this->horder = $horder;

        return $this;
    }

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    public function setMenu(?Menu $menu): self
    {
        $this->menu = $menu;

        return $this;
    }

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): self
    {
        $this->item = $item;

        return $this;
    }
}

<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OrderItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderItemRepository::class)]
#[ApiResource]
class OrderItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $odr_itm_quantity;

    #[ORM\ManyToOne(targetEntity: Order::class, inversedBy: 'horder')]
    #[ORM\JoinColumn(nullable: false)]
    private $horder;

    #[ORM\ManyToOne(targetEntity: Item::class, inversedBy: 'item')]
    #[ORM\JoinColumn(nullable: false)]
    private $item;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOdrItmQuantity(): ?int
    {
        return $this->odr_itm_quantity;
    }

    public function setOdrItmQuantity(int $odr_itm_quantity): self
    {
        $this->odr_itm_quantity = $odr_itm_quantity;

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

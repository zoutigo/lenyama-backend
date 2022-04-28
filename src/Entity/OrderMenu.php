<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OrderMenuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderMenuRepository::class)]
#[ApiResource]
class OrderMenu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $odr_mnu_quantity;

    #[ORM\ManyToOne(targetEntity: Menu::class, inversedBy: 'orderMenus')]
    #[ORM\JoinColumn(nullable: false)]
    private $menu;

    #[ORM\ManyToOne(targetEntity: Order::class, inversedBy: 'orderMenus')]
    #[ORM\JoinColumn(nullable: false)]
    private $horder;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOdrMnuQuantity(): ?int
    {
        return $this->odr_mnu_quantity;
    }

    public function setOdrMnuQuantity(int $odr_mnu_quantity): self
    {
        $this->odr_mnu_quantity = $odr_mnu_quantity;

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

    public function getHorder(): ?Order
    {
        return $this->horder;
    }

    public function setHorder(?Order $horder): self
    {
        $this->horder = $horder;

        return $this;
    }
}

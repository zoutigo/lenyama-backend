<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Traits\DefineId;
use App\Entity\Traits\Timestamp;
use App\Repository\PurchaseOrderMenuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks()]
#[ORM\Table(name:'purchase_order_menus')]
#[ORM\Entity(repositoryClass: PurchaseOrderMenuRepository::class)]
#[ApiResource]
class PurchaseOrderMenu
{
    use DefineId ;
    use Timestamp ;

    #[ORM\Column(type: 'integer')]
    private $pom_quantity;

    #[ORM\ManyToOne(targetEntity: Menu::class, inversedBy: 'purchaseOrderMenus')]
    #[ORM\JoinColumn(nullable: false)]
    private $menu;

    #[ORM\ManyToOne(targetEntity: PurchaseOrder::class, inversedBy: 'purchaseOrderMenus')]
    #[ORM\JoinColumn(nullable: false)]
    private $purchase_order;

  

    public function getPomQuantity(): ?int
    {
        return $this->pom_quantity;
    }

    public function setPomQuantity(int $pom_quantity): self
    {
        $this->pom_quantity = $pom_quantity;

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

    public function getPurchaseOrder(): ?PurchaseOrder
    {
        return $this->purchase_order;
    }

    public function setPurchaseOrder(?PurchaseOrder $purchase_order): self
    {
        $this->purchase_order = $purchase_order;

        return $this;
    }
}

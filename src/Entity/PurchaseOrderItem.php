<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Traits\DefineId;
use App\Entity\Traits\Timestamp;
use App\Repository\PurchaseOrderItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks()]
#[ORM\Table(name:'purchase_order_items')]
#[ORM\Entity(repositoryClass: PurchaseOrderItemRepository::class)]
#[ApiResource]
class PurchaseOrderItem
{
    use DefineId ;
    use Timestamp ;

    #[ORM\Column(type: 'integer')]
    private $poi_quantity;

 

    #[ORM\ManyToOne(targetEntity: PurchaseOrder::class, inversedBy: 'purchaseOrderItems')]
    #[ORM\JoinColumn(nullable: false)]
    private $purchase_order;

    #[ORM\ManyToOne(targetEntity: Item::class, inversedBy: 'purchaseOrderItems')]
    #[ORM\JoinColumn(nullable: false)]
    private $item;

    public function __construct()
    {
        $this->item = new ArrayCollection();
    }



    public function getPoiQuantity(): ?int
    {
        return $this->poi_quantity;
    }

    public function setPoiQuantity(int $poi_quantity): self
    {
        $this->poi_quantity = $poi_quantity;

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

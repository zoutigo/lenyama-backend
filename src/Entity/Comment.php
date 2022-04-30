<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Traits\DefineId;
use App\Entity\Traits\Timestamp;
use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks()]
#[ORM\Table(name:'comments')]
#[ORM\Entity(repositoryClass: CommentRepository::class)]
#[ApiResource]
class Comment
{
    use DefineId ;
    use Timestamp ;

    #[ORM\Column(type: 'string', length: 255)]
    private $cmt_title;

    #[ORM\Column(type: 'text')]
    private $cmt_content;

    #[ORM\ManyToOne(targetEntity: PurchaseOrder::class, inversedBy: 'comments')]
    private $purchase_order;

    #[ORM\ManyToOne(targetEntity: Menu::class, inversedBy: 'comments')]
    private $menu;

    #[ORM\ManyToOne(targetEntity: Restaurant::class, inversedBy: 'comments')]
    private $restaurant;

    #[ORM\ManyToOne(targetEntity: Item::class, inversedBy: 'comments')]
    private $item;





    public function getCmtTitle(): ?string
    {
        return $this->cmt_title;
    }

    public function setCmtTitle(string $cmt_title): self
    {
        $this->cmt_title = $cmt_title;

        return $this;
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

    public function getPurchaseOrder(): ?PurchaseOrder
    {
        return $this->purchase_order;
    }

    public function setPurchaseOrder(?PurchaseOrder $purchase_order): self
    {
        $this->purchase_order = $purchase_order;

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

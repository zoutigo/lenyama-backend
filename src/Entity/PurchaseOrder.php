<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Traits\DefineId;
use App\Entity\Traits\Timestamp;
use App\Repository\PurchaseOrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks()]
#[ORM\Table(name:'purchase_orders')]
#[ORM\Entity(repositoryClass: PurchaseOrderRepository::class)]
#[ApiResource]
class PurchaseOrder
{
    use DefineId ;
    use Timestamp ;

    #[ORM\Column(type: 'string', length: 255)]
    private $pod_status;

    #[ORM\Column(type: 'datetime')]
    private $pod_delivery_date;

    #[ORM\Column(type: 'string', length: 255)]
    private $pod_incoterms;

    #[ORM\Column(type: 'float')]
    private $pod_net_price;

    #[ORM\Column(type: 'float')]
    private $pod_taxes_price;

    #[ORM\Column(type: 'float')]
    private $pod_total_price;

    #[ORM\Column(type: 'float')]
    private $pod_delivery_price;

    #[ORM\OneToMany(mappedBy: 'purchase_order', targetEntity: PurchaseOrderItem::class)]
    private $purchaseOrderItems;

    #[ORM\OneToMany(mappedBy: 'purchase_order', targetEntity: PurchaseOrderMenu::class)]
    private $purchaseOrderMenus;

    #[ORM\ManyToOne(targetEntity: Restaurant::class, inversedBy: 'purchase_orders')]
    #[ORM\JoinColumn(nullable: false)]
    private $restaurant;

    #[ORM\OneToMany(mappedBy: 'purchase_order', targetEntity: Comment::class)]
    private $comments;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'purchase_orders')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

 

    public function __construct()
    {
        $this->purchaseOrderItems = new ArrayCollection();
        $this->purchaseOrderMenus = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }



    public function getPodStatus(): ?string
    {
        return $this->pod_status;
    }

    public function setPodStatus(string $pod_status): self
    {
        $this->pod_status = $pod_status;

        return $this;
    }

    public function getPodDeliveryDate(): ?\DateTimeInterface
    {
        return $this->pod_delivery_date;
    }

    public function setPodDeliveryDate(\DateTimeInterface $pod_delivery_date): self
    {
        $this->pod_delivery_date = $pod_delivery_date;

        return $this;
    }

    public function getPodIncoterms(): ?string
    {
        return $this->pod_incoterms;
    }

    public function setPodIncoterms(string $pod_incoterms): self
    {
        $this->pod_incoterms = $pod_incoterms;

        return $this;
    }

    public function getPodNetPrice(): ?float
    {
        return $this->pod_net_price;
    }

    public function setPodNetPrice(float $pod_net_price): self
    {
        $this->pod_net_price = $pod_net_price;

        return $this;
    }

    public function getPodTaxesPrice(): ?float
    {
        return $this->pod_taxes_price;
    }

    public function setPodTaxesPrice(float $pod_taxes_price): self
    {
        $this->pod_taxes_price = $pod_taxes_price;

        return $this;
    }

    public function getPodTotalPrice(): ?float
    {
        return $this->pod_total_price;
    }

    public function setPodTotalPrice(float $pod_total_price): self
    {
        $this->pod_total_price = $pod_total_price;

        return $this;
    }

    public function getPodDeliveryPrice(): ?float
    {
        return $this->pod_delivery_price;
    }

    public function setPodDeliveryPrice(float $pod_delivery_price): self
    {
        $this->pod_delivery_price = $pod_delivery_price;

        return $this;
    }

    /**
     * @return Collection<int, PurchaseOrderItem>
     */
    public function getPurchaseOrderItems(): Collection
    {
        return $this->purchaseOrderItems;
    }

    public function addPurchaseOrderItem(PurchaseOrderItem $purchaseOrderItem): self
    {
        if (!$this->purchaseOrderItems->contains($purchaseOrderItem)) {
            $this->purchaseOrderItems[] = $purchaseOrderItem;
            $purchaseOrderItem->setPurchaseOrder($this);
        }

        return $this;
    }

    public function removePurchaseOrderItem(PurchaseOrderItem $purchaseOrderItem): self
    {
        if ($this->purchaseOrderItems->removeElement($purchaseOrderItem)) {
            // set the owning side to null (unless already changed)
            if ($purchaseOrderItem->getPurchaseOrder() === $this) {
                $purchaseOrderItem->setPurchaseOrder(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PurchaseOrderMenu>
     */
    public function getPurchaseOrderMenus(): Collection
    {
        return $this->purchaseOrderMenus;
    }

    public function addPurchaseOrderMenu(PurchaseOrderMenu $purchaseOrderMenu): self
    {
        if (!$this->purchaseOrderMenus->contains($purchaseOrderMenu)) {
            $this->purchaseOrderMenus[] = $purchaseOrderMenu;
            $purchaseOrderMenu->setPurchaseOrder($this);
        }

        return $this;
    }

    public function removePurchaseOrderMenu(PurchaseOrderMenu $purchaseOrderMenu): self
    {
        if ($this->purchaseOrderMenus->removeElement($purchaseOrderMenu)) {
            // set the owning side to null (unless already changed)
            if ($purchaseOrderMenu->getPurchaseOrder() === $this) {
                $purchaseOrderMenu->setPurchaseOrder(null);
            }
        }

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

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setPurchaseOrder($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getPurchaseOrder() === $this) {
                $comment->setPurchaseOrder(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}

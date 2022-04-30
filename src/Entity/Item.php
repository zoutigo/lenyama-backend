<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Traits\DefineId;
use App\Entity\Traits\Timestamp;
use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks()]
#[ORM\Table(name:'items')]
#[ORM\Entity(repositoryClass: ItemRepository::class)]
#[ApiResource]
class Item
{
    use DefineId ;
    use Timestamp ;

    #[ORM\Column(type: 'string', length: 255)]
    private $itm_name;

    #[ORM\Column(type: 'text')]
    private $itm_description;

    #[ORM\Column(type: 'float')]
    private $itm_price;

    #[ORM\OneToMany(mappedBy: 'item', targetEntity: PurchaseOrderItem::class)]
    private $purchaseOrderItems;

    #[ORM\OneToMany(mappedBy: 'item', targetEntity: MenuItem::class)]
    private $menuItems;

    #[ORM\OneToMany(mappedBy: 'item', targetEntity: Comment::class)]
    private $comments;

    #[ORM\OneToMany(mappedBy: 'item', targetEntity: Image::class)]
    private $images;

    #[ORM\ManyToOne(targetEntity: Restaurant::class, inversedBy: 'items')]
    #[ORM\JoinColumn(nullable: false)]
    private $restaurant;

    public function __construct()
    {
        $this->purchaseOrderItems = new ArrayCollection();
        $this->menuItems = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->images = new ArrayCollection();
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

    public function setItmDescription(string $itm_description): self
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
            $purchaseOrderItem->setItem($this);
        }

        return $this;
    }

    public function removePurchaseOrderItem(PurchaseOrderItem $purchaseOrderItem): self
    {
        if ($this->purchaseOrderItems->removeElement($purchaseOrderItem)) {
            // set the owning side to null (unless already changed)
            if ($purchaseOrderItem->getItem() === $this) {
                $purchaseOrderItem->setItem(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MenuItem>
     */
    public function getMenuItems(): Collection
    {
        return $this->menuItems;
    }

    public function addMenuItem(MenuItem $menuItem): self
    {
        if (!$this->menuItems->contains($menuItem)) {
            $this->menuItems[] = $menuItem;
            $menuItem->setItem($this);
        }

        return $this;
    }

    public function removeMenuItem(MenuItem $menuItem): self
    {
        if ($this->menuItems->removeElement($menuItem)) {
            // set the owning side to null (unless already changed)
            if ($menuItem->getItem() === $this) {
                $menuItem->setItem(null);
            }
        }

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
            $comment->setItem($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getItem() === $this) {
                $comment->setItem(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setItem($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getItem() === $this) {
                $image->setItem(null);
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
}

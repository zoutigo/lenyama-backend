<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
#[ApiResource]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $odr_status;

    #[ORM\Column(type: 'datetime')]
    private $odr_delivery_date;

    #[ORM\Column(type: 'string', length: 255)]
    private $odr_incoterms;

    #[ORM\Column(type: 'float')]
    private $odr_net_price;

    #[ORM\Column(type: 'float')]
    private $odr_taxes_price;

    #[ORM\Column(type: 'float')]
    private $odr_total_price;

    #[ORM\Column(type: 'float')]
    private $odr_delivery_price;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\Column(type: 'datetime')]
    private $updatedAt;

    #[ORM\OneToMany(mappedBy: 'horder', targetEntity: OrderItem::class, orphanRemoval: false)]
    private $orderItems;

    #[ORM\OneToMany(mappedBy: 'horder', targetEntity: OrderMenu::class)]
    private $orderMenus;

    #[ORM\ManyToOne(targetEntity: Restaurant::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private $restaurant;

    #[ORM\OneToMany(mappedBy: 'horder', targetEntity: Comment::class)]
    private $comments;

    public function __construct()
    {
        $this->orderItems = new ArrayCollection();
        $this->orderMenus = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOdrStatus(): ?string
    {
        return $this->odr_status;
    }

    public function setOdrStatus(string $odr_status): self
    {
        $this->odr_status = $odr_status;

        return $this;
    }

    public function getOdrDeliveryDate(): ?\DateTimeInterface
    {
        return $this->odr_delivery_date;
    }

    public function setOdrDeliveryDate(\DateTimeInterface $odr_delivery_date): self
    {
        $this->odr_delivery_date = $odr_delivery_date;

        return $this;
    }

    public function getOdrIncoterms(): ?string
    {
        return $this->odr_incoterms;
    }

    public function setOdrIncoterms(string $odr_incoterms): self
    {
        $this->odr_incoterms = $odr_incoterms;

        return $this;
    }

    public function getOdrNetPrice(): ?float
    {
        return $this->odr_net_price;
    }

    public function setOdrNetPrice(float $odr_net_price): self
    {
        $this->odr_net_price = $odr_net_price;

        return $this;
    }

    public function getOdrTaxesPrice(): ?float
    {
        return $this->odr_taxes_price;
    }

    public function setOdrTaxesPrice(float $odr_taxes_price): self
    {
        $this->odr_taxes_price = $odr_taxes_price;

        return $this;
    }

    public function getOdrTotalPrice(): ?float
    {
        return $this->odr_total_price;
    }

    public function setOdrTotalPrice(float $odr_total_price): self
    {
        $this->odr_total_price = $odr_total_price;

        return $this;
    }

    public function getOdrDeliveryPrice(): ?float
    {
        return $this->odr_delivery_price;
    }

    public function setOdrDeliveryPrice(float $odr_delivery_price): self
    {
        $this->odr_delivery_price = $odr_delivery_price;

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

    /**
     * @return Collection<int, OrderItem>
     */
    public function getOrderItems(): Collection
    {
        return $this->orderItems;
    }

    public function addOrderItem(OrderItem $orderItem): self
    {
        if (!$this->orderItems->contains($orderItem)) {
            $this->orderItems[] = $orderItem;
            $orderItem->setHorder($this);
        }

        return $this;
    }

    public function removeOrderItem(OrderItem $orderItem): self
    {
        if ($this->orderItems->removeElement($orderItem)) {
            // set the owning side to null (unless already changed)
            if ($orderItem->getHorder() === $this) {
                $orderItem->setHorder(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, OrderMenu>
     */
    public function getOrderMenus(): Collection
    {
        return $this->orderMenus;
    }

    public function addOrderMenu(OrderMenu $orderMenu): self
    {
        if (!$this->orderMenus->contains($orderMenu)) {
            $this->orderMenus[] = $orderMenu;
            $orderMenu->setHorder($this);
        }

        return $this;
    }

    public function removeOrderMenu(OrderMenu $orderMenu): self
    {
        if ($this->orderMenus->removeElement($orderMenu)) {
            // set the owning side to null (unless already changed)
            if ($orderMenu->getHorder() === $this) {
                $orderMenu->setHorder(null);
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
            $comment->setHorder($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getHorder() === $this) {
                $comment->setHorder(null);
            }
        }

        return $this;
    }
}

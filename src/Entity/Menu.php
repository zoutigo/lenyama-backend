<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Traits\DefineId;
use App\Entity\Traits\Timestamp;
use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks()]
#[ORM\Table(name:'menus')]
#[ORM\Entity(repositoryClass: MenuRepository::class)]
#[ApiResource]
class Menu
{
    use DefineId ;
    use Timestamp ;

    #[ORM\Column(type: 'string', length: 255)]
    private $mnu_name;

    #[ORM\Column(type: 'text')]
    private $mnu_description;

    #[ORM\Column(type: 'float')]
    private $mnu_price;

    #[ORM\OneToMany(mappedBy: 'menu', targetEntity: PurchaseOrderMenu::class)]
    private $purchaseOrderMenus;

    #[ORM\ManyToOne(targetEntity: Restaurant::class, inversedBy: 'menus')]
    #[ORM\JoinColumn(nullable: false)]
    private $restaurant;

    #[ORM\OneToMany(mappedBy: 'menu', targetEntity: MenuItem::class)]
    private $menuItems;

    #[ORM\OneToMany(mappedBy: 'menu', targetEntity: Comment::class)]
    private $comments;

    #[ORM\OneToMany(mappedBy: 'menu', targetEntity: Image::class)]
    private $images;

    public function __construct()
    {
        $this->purchaseOrderMenus = new ArrayCollection();
        $this->menuItems = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->images = new ArrayCollection();
    }


    public function getMnuName(): ?string
    {
        return $this->mnu_name;
    }

    public function setMnuName(string $mnu_name): self
    {
        $this->mnu_name = $mnu_name;

        return $this;
    }

    public function getMnuDescription(): ?string
    {
        return $this->mnu_description;
    }

    public function setMnuDescription(string $mnu_description): self
    {
        $this->mnu_description = $mnu_description;

        return $this;
    }

    public function getMnuPrice(): ?float
    {
        return $this->mnu_price;
    }

    public function setMnuPrice(float $mnu_price): self
    {
        $this->mnu_price = $mnu_price;

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
            $purchaseOrderMenu->setMenu($this);
        }

        return $this;
    }

    public function removePurchaseOrderMenu(PurchaseOrderMenu $purchaseOrderMenu): self
    {
        if ($this->purchaseOrderMenus->removeElement($purchaseOrderMenu)) {
            // set the owning side to null (unless already changed)
            if ($purchaseOrderMenu->getMenu() === $this) {
                $purchaseOrderMenu->setMenu(null);
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
            $menuItem->setMenu($this);
        }

        return $this;
    }

    public function removeMenuItem(MenuItem $menuItem): self
    {
        if ($this->menuItems->removeElement($menuItem)) {
            // set the owning side to null (unless already changed)
            if ($menuItem->getMenu() === $this) {
                $menuItem->setMenu(null);
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
            $comment->setMenu($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getMenu() === $this) {
                $comment->setMenu(null);
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
            $image->setMenu($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getMenu() === $this) {
                $image->setMenu(null);
            }
        }

        return $this;
    }
}

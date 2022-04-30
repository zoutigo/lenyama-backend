<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Traits\DefineId;
use App\Entity\Traits\Timestamp;
use App\Repository\RestaurantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks()]
#[ORM\Table(name:'restaurants')]
#[ORM\Entity(repositoryClass: RestaurantRepository::class)]
#[ApiResource]
class Restaurant
{
    use DefineId ;
    use Timestamp ;

    #[ORM\Column(type: 'string', length: 255)]
    private $rst_name;

    #[ORM\Column(type: 'text')]
    private $rst_description;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'favorite_restaurants')]
    private $favorite_users;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'employers')]
    private $employees;

    #[ORM\ManyToOne(targetEntity: Address::class, inversedBy: 'restaurants')]
    #[ORM\JoinColumn(nullable: false)]
    private $address;

    #[ORM\ManyToOne(targetEntity: FoodCategory::class, inversedBy: 'restaurants')]
    #[ORM\JoinColumn(nullable: false)]
    private $food_category;

    #[ORM\OneToMany(mappedBy: 'restaurant', targetEntity: Menu::class)]
    private $menus;

    #[ORM\OneToMany(mappedBy: 'restaurant', targetEntity: PurchaseOrder::class)]
    private $purchase_orders;

    #[ORM\OneToMany(mappedBy: 'restaurant', targetEntity: Comment::class)]
    private $comments;

    #[ORM\OneToMany(mappedBy: 'restaurant', targetEntity: Image::class)]
    private $images;

    #[ORM\OneToMany(mappedBy: 'restaurant', targetEntity: Item::class)]
    private $items;

    public function __construct()
    {
        $this->favorite_users = new ArrayCollection();
        $this->employees = new ArrayCollection();
        $this->menus = new ArrayCollection();
        $this->purchase_orders = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->items = new ArrayCollection();
    }

  

    public function getRstName(): ?string
    {
        return $this->rst_name;
    }

    public function setRstName(string $rst_name): self
    {
        $this->rst_name = $rst_name;

        return $this;
    }

    public function getRstDescription(): ?string
    {
        return $this->rst_description;
    }

    public function setRstDescription(string $rst_description): self
    {
        $this->rst_description = $rst_description;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getFavoriteUsers(): Collection
    {
        return $this->favorite_users;
    }

    public function addFavoriteUser(User $favoriteUser): self
    {
        if (!$this->favorite_users->contains($favoriteUser)) {
            $this->favorite_users[] = $favoriteUser;
            $favoriteUser->addFavoriteRestaurant($this);
        }

        return $this;
    }

    public function removeFavoriteUser(User $favoriteUser): self
    {
        if ($this->favorite_users->removeElement($favoriteUser)) {
            $favoriteUser->removeFavoriteRestaurant($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    public function addEmployee(User $employee): self
    {
        if (!$this->employees->contains($employee)) {
            $this->employees[] = $employee;
        }

        return $this;
    }

    public function removeEmployee(User $employee): self
    {
        $this->employees->removeElement($employee);

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getFoodCategory(): ?FoodCategory
    {
        return $this->food_category;
    }

    public function setFoodCategory(?FoodCategory $food_category): self
    {
        $this->food_category = $food_category;

        return $this;
    }

    /**
     * @return Collection<int, Menu>
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menus->contains($menu)) {
            $this->menus[] = $menu;
            $menu->setRestaurant($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menus->removeElement($menu)) {
            // set the owning side to null (unless already changed)
            if ($menu->getRestaurant() === $this) {
                $menu->setRestaurant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PurchaseOrder>
     */
    public function getPurchaseOrders(): Collection
    {
        return $this->purchase_orders;
    }

    public function addPurchaseOrder(PurchaseOrder $purchaseOrder): self
    {
        if (!$this->purchase_orders->contains($purchaseOrder)) {
            $this->purchase_orders[] = $purchaseOrder;
            $purchaseOrder->setRestaurant($this);
        }

        return $this;
    }

    public function removePurchaseOrder(PurchaseOrder $purchaseOrder): self
    {
        if ($this->purchase_orders->removeElement($purchaseOrder)) {
            // set the owning side to null (unless already changed)
            if ($purchaseOrder->getRestaurant() === $this) {
                $purchaseOrder->setRestaurant(null);
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
            $comment->setRestaurant($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getRestaurant() === $this) {
                $comment->setRestaurant(null);
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
            $image->setRestaurant($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getRestaurant() === $this) {
                $image->setRestaurant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Item>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->setRestaurant($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getRestaurant() === $this) {
                $item->setRestaurant(null);
            }
        }

        return $this;
    }
}

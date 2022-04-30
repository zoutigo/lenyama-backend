<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Traits\DefineId;
use App\Entity\Traits\Timestamp;
use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks()]
#[ORM\Table(name:'images')]
#[ORM\Entity(repositoryClass: ImageRepository::class)]
#[ApiResource]
class Image
{
    use DefineId ;
    use Timestamp ;

    #[ORM\Column(type: 'string', length: 255)]
    private $img_name;

    #[ORM\Column(type: 'string', length: 255)]
    private $img_path;

    #[ORM\ManyToOne(targetEntity: Restaurant::class, inversedBy: 'images')]
    private $restaurant;

    #[ORM\ManyToOne(targetEntity: Menu::class, inversedBy: 'images')]
    private $menu;

    #[ORM\ManyToOne(targetEntity: Item::class, inversedBy: 'images')]
    private $item;

    #[ORM\ManyToOne(targetEntity: FoodCategory::class, inversedBy: 'images')]
    private $food_category;


    public function getImgName(): ?string
    {
        return $this->img_name;
    }

    public function setImgName(string $img_name): self
    {
        $this->img_name = $img_name;

        return $this;
    }

    public function getImgPath(): ?string
    {
        return $this->img_path;
    }

    public function setImgPath(string $img_path): self
    {
        $this->img_path = $img_path;

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

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    public function setMenu(?Menu $menu): self
    {
        $this->menu = $menu;

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

    public function getFoodCategory(): ?FoodCategory
    {
        return $this->food_category;
    }

    public function setFoodCategory(?FoodCategory $food_category): self
    {
        $this->food_category = $food_category;

        return $this;
    }
}

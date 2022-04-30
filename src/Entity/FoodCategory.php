<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Traits\DefineId;
use App\Entity\Traits\Timestamp;
use App\Repository\FoodCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks()]
#[ORM\Table(name:'food_categories')]
#[ORM\Entity(repositoryClass: FoodCategoryRepository::class)]
#[ApiResource]
class FoodCategory
{
    use DefineId ;
    use Timestamp ;

    #[ORM\Column(type: 'string', length: 255)]
    private $fct_name;

    #[ORM\Column(type: 'string', length: 255)]
    private $fct_description;

    #[ORM\OneToMany(mappedBy: 'food_category', targetEntity: Restaurant::class)]
    private $restaurants;

    #[ORM\OneToMany(mappedBy: 'food_category', targetEntity: Image::class)]
    private $images;

    public function __construct()
    {
        $this->restaurants = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

   

    public function getFctName(): ?string
    {
        return $this->fct_name;
    }

    public function setFctName(string $fct_name): self
    {
        $this->fct_name = $fct_name;

        return $this;
    }

    public function getFctDescription(): ?string
    {
        return $this->fct_description;
    }

    public function setFctDescription(string $fct_description): self
    {
        $this->fct_description = $fct_description;

        return $this;
    }

    /**
     * @return Collection<int, Restaurant>
     */
    public function getRestaurants(): Collection
    {
        return $this->restaurants;
    }

    public function addRestaurant(Restaurant $restaurant): self
    {
        if (!$this->restaurants->contains($restaurant)) {
            $this->restaurants[] = $restaurant;
            $restaurant->setFoodCategory($this);
        }

        return $this;
    }

    public function removeRestaurant(Restaurant $restaurant): self
    {
        if ($this->restaurants->removeElement($restaurant)) {
            // set the owning side to null (unless already changed)
            if ($restaurant->getFoodCategory() === $this) {
                $restaurant->setFoodCategory(null);
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
            $image->setFoodCategory($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getFoodCategory() === $this) {
                $image->setFoodCategory(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Traits\DefineId;
use App\Entity\Traits\Timestamp;
use App\Repository\MenuItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks()]
#[ORM\Table(name:'menu_items')]
#[ORM\Entity(repositoryClass: MenuItemRepository::class)]
#[ApiResource]
class MenuItem
{
    use DefineId ;
    use Timestamp ;

    #[ORM\Column(type: 'integer')]
    private $mnu_itm_quantity;

    #[ORM\ManyToOne(targetEntity: Item::class, inversedBy: 'menuItems')]
    #[ORM\JoinColumn(nullable: false)]
    private $item;

    #[ORM\ManyToOne(targetEntity: Menu::class, inversedBy: 'menuItems')]
    #[ORM\JoinColumn(nullable: false)]
    private $menu;

   

    public function getMnuItmQuantity(): ?int
    {
        return $this->mnu_itm_quantity;
    }

    public function setMnuItmQuantity(int $mnu_itm_quantity): self
    {
        $this->mnu_itm_quantity = $mnu_itm_quantity;

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

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    public function setMenu(?Menu $menu): self
    {
        $this->menu = $menu;

        return $this;
    }
}

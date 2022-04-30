<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Traits\DefineId;
use App\Entity\Traits\Timestamp;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\HasLifecycleCallbacks()]
#[ORM\Table(name:'users')]
#[ApiResource]
class User
{
    use Timestamp ;
    use DefineId ;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $usr_email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    private $usr_lastname;

    #[ORM\Column(type: 'string', length: 255)]
    private $usr_firstname;

    #[ORM\Column(type: 'string', length: 255)]
    private $usr_gender;

    #[ORM\Column(type: 'datetime')]
    private $usr_birthdate;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Note::class)]
    private $notes;

    #[ORM\ManyToMany(targetEntity: Restaurant::class, inversedBy: 'favorite_users')]
    private $favorite_restaurants;

    #[ORM\ManyToMany(targetEntity: Restaurant::class, mappedBy: 'employees')]
    private $employers;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: PurchaseOrder::class)]
    private $purchase_orders;

    public function __construct()
    {
        $this->notes = new ArrayCollection();
        $this->favorite_restaurants = new ArrayCollection();
        $this->employers = new ArrayCollection();
        $this->purchase_orders = new ArrayCollection();
    }

    public function getUsrEmail(): ?string
    {
        return $this->usr_email;
    }

    public function setUsrEmail(string $usr_email): self
    {
        $this->usr_email = $usr_email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->usr_email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUsrLastname(): ?string
    {
        return $this->usr_lastname;
    }

    public function setUsrLastname(string $usr_lastname): self
    {
        $this->usr_lastname = $usr_lastname;

        return $this;
    }

    public function getUsrFirstname(): ?string
    {
        return $this->usr_firstname;
    }

    public function setUsrFirstname(string $usr_firstname): self
    {
        $this->usr_firstname = $usr_firstname;

        return $this;
    }

    public function getUsrGender(): ?string
    {
        return $this->usr_gender;
    }

    public function setUsrGender(string $usr_gender): self
    {
        $this->usr_gender = $usr_gender;

        return $this;
    }

    public function getUsrBirthdate(): ?\DateTimeInterface
    {
        return $this->usr_birthdate;
    }

    public function setUsrBirthdate(\DateTimeInterface $usr_birthdate): self
    {
        $this->usr_birthdate = $usr_birthdate;

        return $this;
    }

    /**
     * @return Collection<int, Note>
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes[] = $note;
            $note->setUser($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getUser() === $this) {
                $note->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Restaurant>
     */
    public function getFavoriteRestaurants(): Collection
    {
        return $this->favorite_restaurants;
    }

    public function addFavoriteRestaurant(Restaurant $favoriteRestaurant): self
    {
        if (!$this->favorite_restaurants->contains($favoriteRestaurant)) {
            $this->favorite_restaurants[] = $favoriteRestaurant;
        }

        return $this;
    }

    public function removeFavoriteRestaurant(Restaurant $favoriteRestaurant): self
    {
        $this->favorite_restaurants->removeElement($favoriteRestaurant);

        return $this;
    }

    /**
     * @return Collection<int, Restaurant>
     */
    public function getEmployers(): Collection
    {
        return $this->employers;
    }

    public function addEmployer(Restaurant $employer): self
    {
        if (!$this->employers->contains($employer)) {
            $this->employers[] = $employer;
            $employer->addEmployee($this);
        }

        return $this;
    }

    public function removeEmployer(Restaurant $employer): self
    {
        if ($this->employers->removeElement($employer)) {
            $employer->removeEmployee($this);
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
            $purchaseOrder->setUser($this);
        }

        return $this;
    }

    public function removePurchaseOrder(PurchaseOrder $purchaseOrder): self
    {
        if ($this->purchase_orders->removeElement($purchaseOrder)) {
            // set the owning side to null (unless already changed)
            if ($purchaseOrder->getUser() === $this) {
                $purchaseOrder->setUser(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

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

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\Column(type: 'datetime')]
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
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
}

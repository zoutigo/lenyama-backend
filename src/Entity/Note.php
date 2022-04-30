<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Traits\DefineId;
use App\Entity\Traits\Timestamp;
use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NoteRepository::class)]
#[ORM\HasLifecycleCallbacks()]
#[ORM\Table(name:'notes')]
#[ApiResource]
class Note
{
    use DefineId ;
    use Timestamp ;

    #[ORM\Column(type: 'string', length: 255)]
    private $nte_title;

    #[ORM\Column(type: 'text')]
    private $nte_content;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'notes')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;



    public function getNteTitle(): ?string
    {
        return $this->nte_title;
    }

    public function setNteTitle(string $nte_title): self
    {
        $this->nte_title = $nte_title;

        return $this;
    }

    public function getNteContent(): ?string
    {
        return $this->nte_content;
    }

    public function setNteContent(string $nte_content): self
    {
        $this->nte_content = $nte_content;

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

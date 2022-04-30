<?php
namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait DefineId
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy:"CUSTOM")]
    #[ORM\Column(type: 'uuid', unique:true)]
    #[ORM\CustomIdGenerator(class:'doctrine.uuid_generator')]
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}

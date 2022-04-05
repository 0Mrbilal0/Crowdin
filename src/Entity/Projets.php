<?php

namespace App\Entity;

use App\Repository\ProjetsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetsRepository::class)]
class Projets
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'array')]
    private $languesrc = [];

    #[ORM\Column(type: 'string', length: 255)]
    private $langue;

    #[ORM\Column(type: 'string')]
    private $projetFileName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
    
    public function getLanguesrc(): array
    {
        return $this->languesrc;
    }

    public function setLanguesrc(array $languesrc): self
    {
        $this->langue = $languesrc;

        return $this;
    }
    
    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(string $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getProjetFileName()
    {
        return $this->projetFileName;
    }

    public function setProjetFileName($projetFileName)
    {
        $this->projetFileName = $projetFileName;

        return $this;
    }
}

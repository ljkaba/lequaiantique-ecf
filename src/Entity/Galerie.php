<?php

namespace App\Entity;

use App\Repository\GalerieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GalerieRepository::class)]
class Galerie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titreImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\ManyToMany(targetEntity: Carte::class, inversedBy: 'galeries')]
    private Collection $carte;

    public function __construct()
    {
        $this->carte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreImage(): ?string
    {
        return $this->titreImage;
    }

    public function setTitreImage(string $titreImage): self
    {
        $this->titreImage = $titreImage;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Carte>
     */
    public function getCarte(): Collection
    {
        return $this->carte;
    }

    public function addCarte(Carte $carte): self
    {
        if (!$this->carte->contains($carte)) {
            $this->carte->add($carte);
        }

        return $this;
    }

    public function removeCarte(Carte $carte): self
    {
        $this->carte->removeElement($carte);

        return $this;
    }
}

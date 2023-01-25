<?php

namespace App\Entity;

use App\Repository\CarteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarteRepository::class)]
class Carte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titrePlat = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descriptionPlat = null;

    #[ORM\Column(nullable: true)]
    private ?int $prixPlat = null;

    #[ORM\ManyToMany(targetEntity: Menus::class, mappedBy: 'carte')]
    private Collection $menuses;

    #[ORM\ManyToMany(targetEntity: Galerie::class, mappedBy: 'carte')]
    private Collection $galeries;

    public function __construct()
    {
        $this->menuses = new ArrayCollection();
        $this->galeries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitrePlat(): ?string
    {
        return $this->titrePlat;
    }

    public function setTitrePlat(string $titrePlat): self
    {
        $this->titrePlat = $titrePlat;

        return $this;
    }

    public function getDescriptionPlat(): ?string
    {
        return $this->descriptionPlat;
    }

    public function setDescriptionPlat(?string $descriptionPlat): self
    {
        $this->descriptionPlat = $descriptionPlat;

        return $this;
    }

    public function getPrixPlat(): ?int
    {
        return $this->prixPlat;
    }

    public function setPrixPlat(?int $prixPlat): self
    {
        $this->prixPlat = $prixPlat;

        return $this;
    }

    /**
     * @return Collection<int, Menus>
     */
    public function getMenuses(): Collection
    {
        return $this->menuses;
    }

    public function addMenus(Menus $menus): self
    {
        if (!$this->menuses->contains($menus)) {
            $this->menuses->add($menus);
            $menus->addCarte($this);
        }

        return $this;
    }

    public function removeMenus(Menus $menus): self
    {
        if ($this->menuses->removeElement($menus)) {
            $menus->removeCarte($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Galerie>
     */
    public function getGaleries(): Collection
    {
        return $this->galeries;
    }

    public function addGalery(Galerie $galery): self
    {
        if (!$this->galeries->contains($galery)) {
            $this->galeries->add($galery);
            $galery->addCarte($this);
        }

        return $this;
    }

    public function removeGalery(Galerie $galery): self
    {
        if ($this->galeries->removeElement($galery)) {
            $galery->removeCarte($this);
        }

        return $this;
    }
}

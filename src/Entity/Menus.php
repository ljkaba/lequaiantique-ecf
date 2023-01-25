<?php

namespace App\Entity;

use App\Repository\MenusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenusRepository::class)]
class Menus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titreMenu = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $formuleMenu = null;

    #[ORM\Column(nullable: true)]
    private ?int $prixMenu = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descriptionMenu = null;

    #[ORM\ManyToMany(targetEntity: Carte::class, inversedBy: 'menuses')]
    private Collection $carte;

    public function __construct()
    {
        $this->carte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreMenu(): ?string
    {
        return $this->titreMenu;
    }

    public function setTitreMenu(string $titreMenu): self
    {
        $this->titreMenu = $titreMenu;

        return $this;
    }

    public function getFormuleMenu(): ?string
    {
        return $this->formuleMenu;
    }

    public function setFormuleMenu(?string $formuleMenu): self
    {
        $this->formuleMenu = $formuleMenu;

        return $this;
    }

    public function getPrixMenu(): ?int
    {
        return $this->prixMenu;
    }

    public function setPrixMenu(?int $prixMenu): self
    {
        $this->prixMenu = $prixMenu;

        return $this;
    }

    public function getDescriptionMenu(): ?string
    {
        return $this->descriptionMenu;
    }

    public function setDescriptionMenu(?string $descriptionMenu): self
    {
        $this->descriptionMenu = $descriptionMenu;

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

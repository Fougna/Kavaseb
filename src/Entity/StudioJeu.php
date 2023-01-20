<?php

namespace App\Entity;

use App\Repository\StudioJeuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudioJeuRepository::class)
 */
class StudioJeu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $alias = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity=StudioDev::class, mappedBy="studio")
     */
    private $developpeurs;

    /**
     * @ORM\ManyToMany(targetEntity=StudioEdit::class, mappedBy="studio")
     */
    private $editeurs;

    public function __construct()
    {
        $this->developpeurs = new ArrayCollection();
        $this->editeurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAlias(): ?array
    {
        return $this->alias;
    }

    public function setAlias(?array $alias): self
    {
        $this->alias = $alias;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    // Méthode magique convertissant un tableau en chaîne de caractères à partir d'une colonne contenant une valeur en 'string'.
    public function __toString()
    {
        return $this->nom;
    }

    /**
     * @return Collection<int, StudioDev>
     */
    public function getDeveloppeurs(): Collection
    {
        return $this->developpeurs;
    }

    public function addDeveloppeur(StudioDev $developpeur): self
    {
        if (!$this->developpeurs->contains($developpeur)) {
            $this->developpeurs[] = $developpeur;
            $developpeur->addStudio($this);
        }

        return $this;
    }

    public function removeDeveloppeur(StudioDev $developpeur): self
    {
        if ($this->developpeurs->removeElement($developpeur)) {
            $developpeur->removeStudio($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, StudioEdit>
     */
    public function getEditeurs(): Collection
    {
        return $this->editeurs;
    }

    public function addEditeur(StudioEdit $editeur): self
    {
        if (!$this->editeurs->contains($editeur)) {
            $this->editeurs[] = $editeur;
            $editeur->addStudio($this);
        }

        return $this;
    }

    public function removeEditeur(StudioEdit $editeur): self
    {
        if ($this->editeurs->removeElement($editeur)) {
            $editeur->removeStudio($this);
        }

        return $this;
    }
}
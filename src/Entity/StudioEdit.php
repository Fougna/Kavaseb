<?php

namespace App\Entity;

use App\Repository\StudioEditRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudioEditRepository::class)
 */
class StudioEdit
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
     * @ORM\ManyToMany(targetEntity=StudioJeu::class, inversedBy="editeurs")
     */
    private $studio;

    /**
     * @ORM\ManyToMany(targetEntity=Jeu::class, inversedBy="editeurs")
     */
    private $jeu;

    /**
     * @ORM\Column(type="integer")
     */
    private $importance;

    public function __construct()
    {
        $this->studio = new ArrayCollection();
        $this->jeu = new ArrayCollection();
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

    /**
     * @return Collection<int, StudioJeu>
     */
    public function getStudio(): Collection
    {
        return $this->studio;
    }

    public function addStudio(StudioJeu $studio): self
    {
        if (!$this->studio->contains($studio)) {
            $this->studio[] = $studio;
        }

        return $this;
    }

    public function removeStudio(StudioJeu $studio): self
    {
        $this->studio->removeElement($studio);

        return $this;
    }

    /**
     * @return Collection<int, Jeu>
     */
    public function getJeu(): Collection
    {
        return $this->jeu;
    }

    public function addJeu(Jeu $jeu): self
    {
        if (!$this->jeu->contains($jeu)) {
            $this->jeu[] = $jeu;
        }

        return $this;
    }

    public function removeJeu(Jeu $jeu): self
    {
        $this->jeu->removeElement($jeu);

        return $this;
    }

    public function getImportance(): ?int
    {
        return $this->importance;
    }

    public function setImportance(int $importance): self
    {
        $this->importance = $importance;

        return $this;
    }

    // Méthode magique convertissant un tableau en chaîne de caractères à partir d'une colonne contenant une valeur en 'string'.
    public function __toString()
    {
        return $this->nom;
    }
}
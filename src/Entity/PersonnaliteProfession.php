<?php

namespace App\Entity;

use App\Repository\PersonnaliteProfessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonnaliteProfessionRepository::class)
 */
class PersonnaliteProfession
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
     * @ORM\ManyToMany(targetEntity=Personnalite::class, inversedBy="professions")
     */
    private $personnalite;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $professionId;

    public function __construct()
    {
        $this->personnalite = new ArrayCollection();
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
     * @return Collection<int, Personnalite>
     */
    public function getPersonnalite(): Collection
    {
        return $this->personnalite;
    }

    public function addPersonnalite(Personnalite $personnalite): self
    {
        if (!$this->personnalite->contains($personnalite)) {
            $this->personnalite[] = $personnalite;
        }

        return $this;
    }

    public function removePersonnalite(Personnalite $personnalite): self
    {
        $this->personnalite->removeElement($personnalite);

        return $this;
    }

    public function getProfessionId(): ?int
    {
        return $this->professionId;
    }

    public function setProfessionId(?int $professionId): self
    {
        $this->professionId = $professionId;

        return $this;
    }

    // Méthode magique convertissant un tableau en chaîne de caractères à partir d'une colonne contenant une valeur en 'string'.
    public function __toString()
    {
        return $this->nom;
    }
}
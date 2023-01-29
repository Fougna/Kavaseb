<?php

namespace App\Entity;

use App\Repository\EpisodeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EpisodeRepository::class)
 */
class Episode
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\ManyToOne(targetEntity=Saison::class, inversedBy="episodes")
     */
    private $saison;

    /**
     * @ORM\OneToMany(targetEntity=Role::class, mappedBy="episode")
     */
    private $roles;

    /**
     * @ORM\ManyToMany(targetEntity=Profession::class, mappedBy="episode")
     */
    private $professions;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
        $this->professions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSaison(): ?Saison
    {
        return $this->saison;
    }

    public function setSaison(?Saison $saison): self
    {
        $this->saison = $saison;

        return $this;
    }

    // Méthode magique convertissant un tableau en chaîne de caractères à partir d'une colonne contenant une valeur en 'string'.
    public function __toString()
    {
        return $this->titre;
    }

    /**
     * @return Collection<int, Role>
     */
    public function getRoles(): Collection
    {
        return $this->roles;
    }

    public function addRole(Role $role): self
    {
        if (!$this->roles->contains($role)) {
            $this->roles[] = $role;
            $role->setEpisode($this);
        }

        return $this;
    }

    public function removeRole(Role $role): self
    {
        if ($this->roles->removeElement($role)) {
            // set the owning side to null (unless already changed)
            if ($role->getEpisode() === $this) {
                $role->setEpisode(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Profession>
     */
    public function getProfessions(): Collection
    {
        return $this->professions;
    }

    public function addProfession(Profession $profession): self
    {
        if (!$this->professions->contains($profession)) {
            $this->professions[] = $profession;
            $profession->addEpisode($this);
        }

        return $this;
    }

    public function removeProfession(Profession $profession): self
    {
        if ($this->professions->removeElement($profession)) {
            $profession->removeEpisode($this);
        }

        return $this;
    }
}
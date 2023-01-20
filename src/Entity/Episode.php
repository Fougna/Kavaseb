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
     * @ORM\ManyToMany(targetEntity=Auteur::class, inversedBy="episodes")
     */
    private $auteur;

    /**
     * @ORM\ManyToMany(targetEntity=Scenariste::class, mappedBy="episode")
     */
    private $scenaristes;

    /**
     * @ORM\ManyToMany(targetEntity=Realisateur::class, mappedBy="episode")
     */
    private $realisateurs;

    /**
     * @ORM\ManyToMany(targetEntity=Producteur::class, mappedBy="episode")
     */
    private $producteurs;

    /**
     * @ORM\ManyToMany(targetEntity=Acteur::class, mappedBy="episode")
     */
    private $acteurs;

    /**
     * @ORM\ManyToMany(targetEntity=Doubleur::class, mappedBy="episode")
     */
    private $doubleurs;

    /**
     * @ORM\OneToMany(targetEntity=Role::class, mappedBy="episode")
     */
    private $roles;

    public function __construct()
    {
        $this->auteur = new ArrayCollection();
        $this->scenaristes = new ArrayCollection();
        $this->realisateurs = new ArrayCollection();
        $this->producteurs = new ArrayCollection();
        $this->acteurs = new ArrayCollection();
        $this->doubleurs = new ArrayCollection();
        $this->roles = new ArrayCollection();
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

    /**
     * @return Collection<int, Auteur>
     */
    public function getAuteur(): Collection
    {
        return $this->auteur;
    }

    public function addAuteur(Auteur $auteur): self
    {
        if (!$this->auteur->contains($auteur)) {
            $this->auteur[] = $auteur;
        }

        return $this;
    }

    public function removeAuteur(Auteur $auteur): self
    {
        $this->auteur->removeElement($auteur);

        return $this;
    }

    // Méthode magique convertissant un tableau en chaîne de caractères à partir d'une colonne contenant une valeur en 'string'.
    public function __toString()
    {
        return $this->titre;
    }

    /**
     * @return Collection<int, Scenariste>
     */
    public function getScenaristes(): Collection
    {
        return $this->scenaristes;
    }

    public function addScenariste(Scenariste $scenariste): self
    {
        if (!$this->scenaristes->contains($scenariste)) {
            $this->scenaristes[] = $scenariste;
            $scenariste->addEpisode($this);
        }

        return $this;
    }

    public function removeScenariste(Scenariste $scenariste): self
    {
        if ($this->scenaristes->removeElement($scenariste)) {
            $scenariste->removeEpisode($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Realisateur>
     */
    public function getRealisateurs(): Collection
    {
        return $this->realisateurs;
    }

    public function addRealisateur(Realisateur $realisateur): self
    {
        if (!$this->realisateurs->contains($realisateur)) {
            $this->realisateurs[] = $realisateur;
            $realisateur->addEpisode($this);
        }

        return $this;
    }

    public function removeRealisateur(Realisateur $realisateur): self
    {
        if ($this->realisateurs->removeElement($realisateur)) {
            $realisateur->removeEpisode($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Producteur>
     */
    public function getProducteurs(): Collection
    {
        return $this->producteurs;
    }

    public function addProducteur(Producteur $producteur): self
    {
        if (!$this->producteurs->contains($producteur)) {
            $this->producteurs[] = $producteur;
            $producteur->addEpisode($this);
        }

        return $this;
    }

    public function removeProducteur(Producteur $producteur): self
    {
        if ($this->producteurs->removeElement($producteur)) {
            $producteur->removeEpisode($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Acteur>
     */
    public function getActeurs(): Collection
    {
        return $this->acteurs;
    }

    public function addActeur(Acteur $acteur): self
    {
        if (!$this->acteurs->contains($acteur)) {
            $this->acteurs[] = $acteur;
            $acteur->addEpisode($this);
        }

        return $this;
    }

    public function removeActeur(Acteur $acteur): self
    {
        if ($this->acteurs->removeElement($acteur)) {
            $acteur->removeEpisode($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Doubleur>
     */
    public function getDoubleurs(): Collection
    {
        return $this->doubleurs;
    }

    public function addDoubleur(Doubleur $doubleur): self
    {
        if (!$this->doubleurs->contains($doubleur)) {
            $this->doubleurs[] = $doubleur;
            $doubleur->addEpisode($this);
        }

        return $this;
    }

    public function removeDoubleur(Doubleur $doubleur): self
    {
        if ($this->doubleurs->removeElement($doubleur)) {
            $doubleur->removeEpisode($this);
        }

        return $this;
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
}
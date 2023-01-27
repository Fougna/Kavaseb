<?php

namespace App\Entity;

use App\Repository\ChronologieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChronologieRepository::class)
 */
class Chronologie
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
     * @ORM\OneToMany(targetEntity=Film::class, mappedBy="chronologie")
     */
    private $film;

    /**
     * @ORM\OneToMany(targetEntity=Jeu::class, mappedBy="chronologie")
     */
    private $jeu;

    /**
     * @ORM\OneToMany(targetEntity=Livre::class, mappedBy="chronologie")
     */
    private $livre;

    /**
     * @ORM\OneToMany(targetEntity=Musique::class, mappedBy="chronologie")
     */
    private $musique;

    /**
     * @ORM\OneToMany(targetEntity=Serie::class, mappedBy="chronologie")
     */
    private $serie;

    public function __construct()
    {
        $this->film = new ArrayCollection();
        $this->jeu = new ArrayCollection();
        $this->livre = new ArrayCollection();
        $this->musique = new ArrayCollection();
        $this->serie = new ArrayCollection();
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
     * @return Collection<int, Film>
     */
    public function getFilm(): Collection
    {
        return $this->film;
    }

    public function addFilm(Film $film): self
    {
        if (!$this->film->contains($film)) {
            $this->film[] = $film;
            $film->setChronologie($this);
        }

        return $this;
    }

    public function removeFilm(Film $film): self
    {
        if ($this->film->removeElement($film)) {
            // set the owning side to null (unless already changed)
            if ($film->getChronologie() === $this) {
                $film->setChronologie(null);
            }
        }

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
            $jeu->setChronologie($this);
        }

        return $this;
    }

    public function removeJeu(Jeu $jeu): self
    {
        if ($this->jeu->removeElement($jeu)) {
            // set the owning side to null (unless already changed)
            if ($jeu->getChronologie() === $this) {
                $jeu->setChronologie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Livre>
     */
    public function getLivre(): Collection
    {
        return $this->livre;
    }

    public function addLivre(Livre $livre): self
    {
        if (!$this->livre->contains($livre)) {
            $this->livre[] = $livre;
            $livre->setChronologie($this);
        }

        return $this;
    }

    public function removeLivre(Livre $livre): self
    {
        if ($this->livre->removeElement($livre)) {
            // set the owning side to null (unless already changed)
            if ($livre->getChronologie() === $this) {
                $livre->setChronologie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Musique>
     */
    public function getMusique(): Collection
    {
        return $this->musique;
    }

    public function addMusique(Musique $musique): self
    {
        if (!$this->musique->contains($musique)) {
            $this->musique[] = $musique;
            $musique->setChronologie($this);
        }

        return $this;
    }

    public function removeMusique(Musique $musique): self
    {
        if ($this->musique->removeElement($musique)) {
            // set the owning side to null (unless already changed)
            if ($musique->getChronologie() === $this) {
                $musique->setChronologie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Serie>
     */
    public function getSerie(): Collection
    {
        return $this->serie;
    }

    public function addSerie(Serie $serie): self
    {
        if (!$this->serie->contains($serie)) {
            $this->serie[] = $serie;
            $serie->setChronologie($this);
        }

        return $this;
    }

    public function removeSerie(Serie $serie): self
    {
        if ($this->serie->removeElement($serie)) {
            // set the owning side to null (unless already changed)
            if ($serie->getChronologie() === $this) {
                $serie->setChronologie(null);
            }
        }

        return $this;
    }

    // Méthode magique convertissant un tableau en chaîne de caractères à partir d'une colonne contenant une valeur en 'string'.
    public function __toString()
    {
        return $this->nom;
    }
}
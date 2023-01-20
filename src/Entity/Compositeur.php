<?php

namespace App\Entity;

use App\Repository\CompositeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompositeurRepository::class)
 */
class Compositeur
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
    private $profession;

    /**
     * @ORM\ManyToOne(targetEntity=Personnalite::class, inversedBy="compositeurs")
     */
    private $personnalite;

    /**
     * @ORM\ManyToMany(targetEntity=Film::class, inversedBy="compositeurs")
     */
    private $film;

    /**
     * @ORM\ManyToMany(targetEntity=Serie::class, inversedBy="compositeurs")
     */
    private $serie;

    /**
     * @ORM\ManyToMany(targetEntity=Saison::class, inversedBy="compositeurs")
     */
    private $saison;

    /**
     * @ORM\ManyToMany(targetEntity=Episode::class, inversedBy="compositeurs")
     */
    private $episode;

    /**
     * @ORM\ManyToMany(targetEntity=Jeu::class, inversedBy="compositeurs")
     */
    private $jeu;

    /**
     * @ORM\ManyToMany(targetEntity=Musique::class, inversedBy="compositeurs")
     */
    private $musique;

    /**
     * @ORM\ManyToMany(targetEntity=Morceau::class, inversedBy="compositeurs")
     */
    private $morceau;

    /**
     * @ORM\Column(type="integer")
     */
    private $importance;

    public function __construct()
    {
        $this->film = new ArrayCollection();
        $this->serie = new ArrayCollection();
        $this->saison = new ArrayCollection();
        $this->episode = new ArrayCollection();
        $this->jeu = new ArrayCollection();
        $this->musique = new ArrayCollection();
        $this->morceau = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getPersonnalite(): ?Personnalite
    {
        return $this->personnalite;
    }

    public function setPersonnalite(?Personnalite $personnalite): self
    {
        $this->personnalite = $personnalite;

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
        }

        return $this;
    }

    public function removeFilm(Film $film): self
    {
        $this->film->removeElement($film);

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
        }

        return $this;
    }

    public function removeSerie(Serie $serie): self
    {
        $this->serie->removeElement($serie);

        return $this;
    }

    /**
     * @return Collection<int, Saison>
     */
    public function getSaison(): Collection
    {
        return $this->saison;
    }

    public function addSaison(Saison $saison): self
    {
        if (!$this->saison->contains($saison)) {
            $this->saison[] = $saison;
        }

        return $this;
    }

    public function removeSaison(Saison $saison): self
    {
        $this->saison->removeElement($saison);

        return $this;
    }

    /**
     * @return Collection<int, Episode>
     */
    public function getEpisode(): Collection
    {
        return $this->episode;
    }

    public function addEpisode(Episode $episode): self
    {
        if (!$this->episode->contains($episode)) {
            $this->episode[] = $episode;
        }

        return $this;
    }

    public function removeEpisode(Episode $episode): self
    {
        $this->episode->removeElement($episode);

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
        }

        return $this;
    }

    public function removeMusique(Musique $musique): self
    {
        $this->musique->removeElement($musique);

        return $this;
    }

    /**
     * @return Collection<int, Morceau>
     */
    public function getMorceau(): Collection
    {
        return $this->morceau;
    }

    public function addMorceau(Morceau $morceau): self
    {
        if (!$this->morceau->contains($morceau)) {
            $this->morceau[] = $morceau;
        }

        return $this;
    }

    public function removeMorceau(Morceau $morceau): self
    {
        $this->morceau->removeElement($morceau);

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
        return $this->profession;
    }
}
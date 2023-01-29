<?php

namespace App\Entity;

use App\Repository\ProfessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfessionRepository::class)
 */
class Profession
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
     * @ORM\ManyToMany(targetEntity=Film::class, inversedBy="professions")
     */
    private $film;

    /**
     * @ORM\ManyToMany(targetEntity=Jeu::class, inversedBy="professions")
     */
    private $jeu;

    /**
     * @ORM\ManyToMany(targetEntity=Livre::class, inversedBy="professions")
     */
    private $livre;

    /**
     * @ORM\ManyToMany(targetEntity=Morceau::class, inversedBy="professions")
     */
    private $morceau;

    /**
     * @ORM\ManyToMany(targetEntity=Musique::class, inversedBy="professions")
     */
    private $musique;

    /**
     * @ORM\ManyToMany(targetEntity=Episode::class, inversedBy="professions")
     */
    private $episode;

    /**
     * @ORM\ManyToMany(targetEntity=Serie::class, inversedBy="professions")
     */
    private $serie;

    public function __construct()
    {
        $this->personnalite = new ArrayCollection();
        $this->film = new ArrayCollection();
        $this->jeu = new ArrayCollection();
        $this->livre = new ArrayCollection();
        $this->morceau = new ArrayCollection();
        $this->musique = new ArrayCollection();
        $this->episode = new ArrayCollection();
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
        }

        return $this;
    }

    public function removeLivre(Livre $livre): self
    {
        $this->livre->removeElement($livre);

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

    // Méthode magique convertissant un tableau en chaîne de caractères à partir d'une colonne contenant une valeur en 'string'.
    public function __toString()
    {
        return $this->nom;
    }
}
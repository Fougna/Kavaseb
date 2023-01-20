<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoleRepository::class)
 */
class Role
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
     * @ORM\ManyToOne(targetEntity=Film::class, inversedBy="roles")
     */
    private $film;

    /**
     * @ORM\ManyToOne(targetEntity=Serie::class, inversedBy="roles")
     */
    private $serie;

    /**
     * @ORM\ManyToOne(targetEntity=Episode::class, inversedBy="roles")
     */
    private $episode;

    /**
     * @ORM\ManyToOne(targetEntity=Jeu::class, inversedBy="roles")
     */
    private $jeu;

    /**
     * @ORM\ManyToOne(targetEntity=Acteur::class, inversedBy="roles")
     */
    private $acteur;

    /**
     * @ORM\ManyToOne(targetEntity=Doubleur::class, inversedBy="roles")
     */
    private $doubleur;

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

    public function getFilm(): ?Film
    {
        return $this->film;
    }

    public function setFilm(?Film $film): self
    {
        $this->film = $film;

        return $this;
    }

    public function getSerie(): ?Serie
    {
        return $this->serie;
    }

    public function setSerie(?Serie $serie): self
    {
        $this->serie = $serie;

        return $this;
    }

    public function getEpisode(): ?Episode
    {
        return $this->episode;
    }

    public function setEpisode(?Episode $episode): self
    {
        $this->episode = $episode;

        return $this;
    }

    public function getJeu(): ?Jeu
    {
        return $this->jeu;
    }

    public function setJeu(?Jeu $jeu): self
    {
        $this->jeu = $jeu;

        return $this;
    }

    public function getActeur(): ?Acteur
    {
        return $this->acteur;
    }

    public function setActeur(?Acteur $acteur): self
    {
        $this->acteur = $acteur;

        return $this;
    }

    public function getDoubleur(): ?Doubleur
    {
        return $this->doubleur;
    }

    public function setDoubleur(?Doubleur $doubleur): self
    {
        $this->doubleur = $doubleur;

        return $this;
    }

    // Méthode magique convertissant un tableau en chaîne de caractères à partir d'une colonne contenant une valeur en 'string'.
    public function __toString()
    {
        return $this->nom;
    }
}
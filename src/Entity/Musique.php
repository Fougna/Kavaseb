<?php

namespace App\Entity;

use App\Repository\MusiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MusiqueRepository::class)
 */
class Musique
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
    private $titreOriginal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $surTitreOriginal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sousTitreOriginal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titreFrancais;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $surTitreFrancais;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sousTitreFrancais;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="date")
     */
    private $annee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteMusique;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $art;

    /**
     * @ORM\ManyToMany(targetEntity=Morceau::class, mappedBy="musique")
     */
    private $morceaux;

    /**
     * @ORM\ManyToMany(targetEntity=Label::class, mappedBy="musique")
     */
    private $labels;

    /**
     * @ORM\ManyToOne(targetEntity=Chronologie::class, inversedBy="musique")
     */
    private $chronologie;

    /**
     * @ORM\Column(type="integer")
     */
    private $ordreChrono;

    /**
     * @ORM\ManyToMany(targetEntity=Profession::class, mappedBy="musique")
     */
    private $professions;

    public function __construct()
    {
        $this->morceaux = new ArrayCollection();
        $this->labels = new ArrayCollection();
        $this->professions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreOriginal(): ?string
    {
        return $this->titreOriginal;
    }

    public function setTitreOriginal(string $titreOriginal): self
    {
        $this->titreOriginal = $titreOriginal;

        return $this;
    }

    public function getSurTitreOriginal(): ?string
    {
        return $this->surTitreOriginal;
    }

    public function setSurTitreOriginal(?string $surTitreOriginal): self
    {
        $this->surTitreOriginal = $surTitreOriginal;

        return $this;
    }

    public function getSousTitreOriginal(): ?string
    {
        return $this->sousTitreOriginal;
    }

    public function setSousTitreOriginal(?string $sousTitreOriginal): self
    {
        $this->sousTitreOriginal = $sousTitreOriginal;

        return $this;
    }

    public function getTitreFrancais(): ?string
    {
        return $this->titreFrancais;
    }

    public function setTitreFrancais(?string $titreFrancais): self
    {
        $this->titreFrancais = $titreFrancais;

        return $this;
    }

    public function getSurTitreFrancais(): ?string
    {
        return $this->surTitreFrancais;
    }

    public function setSurTitreFrancais(?string $surTitreFrancais): self
    {
        $this->surTitreFrancais = $surTitreFrancais;

        return $this;
    }

    public function getSousTitreFrancais(): ?string
    {
        return $this->sousTitreFrancais;
    }

    public function setSousTitreFrancais(?string $sousTitreFrancais): self
    {
        $this->sousTitreFrancais = $sousTitreFrancais;

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

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->annee;
    }

    public function setAnnee(\DateTimeInterface $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getNoteMusique(): ?int
    {
        return $this->noteMusique;
    }

    public function setNoteMusique(?int $noteMusique): self
    {
        $this->noteMusique = $noteMusique;

        return $this;
    }

    public function getArt(): ?string
    {
        return $this->art;
    }

    public function setArt(?string $art): self
    {
        $this->art = $art;

        return $this;
    }

    // Méthode magique convertissant un tableau en chaîne de caractères à partir d'une colonne contenant une valeur en 'string'.
    public function __toString()
    {
        return $this->titreOriginal;
    }

    /**
     * @return Collection<int, Morceau>
     */
    public function getMorceaux(): Collection
    {
        return $this->morceaux;
    }

    public function addMorceaux(Morceau $morceaux): self
    {
        if (!$this->morceaux->contains($morceaux)) {
            $this->morceaux[] = $morceaux;
            $morceaux->addMusique($this);
        }

        return $this;
    }

    public function removeMorceaux(Morceau $morceaux): self
    {
        if ($this->morceaux->removeElement($morceaux)) {
            $morceaux->removeMusique($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Label>
     */
    public function getLabels(): Collection
    {
        return $this->labels;
    }

    public function addLabel(Label $label): self
    {
        if (!$this->labels->contains($label)) {
            $this->labels[] = $label;
            $label->addMusique($this);
        }

        return $this;
    }

    public function removeLabel(Label $label): self
    {
        if ($this->labels->removeElement($label)) {
            $label->removeMusique($this);
        }

        return $this;
    }

    public function getChronologie(): ?Chronologie
    {
        return $this->chronologie;
    }

    public function setChronologie(?Chronologie $chronologie): self
    {
        $this->chronologie = $chronologie;

        return $this;
    }

    public function getOrdreChrono(): ?int
    {
        return $this->ordreChrono;
    }

    public function setOrdreChrono(int $ordreChrono): self
    {
        $this->ordreChrono = $ordreChrono;

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
            $profession->addMusique($this);
        }

        return $this;
    }

    public function removeProfession(Profession $profession): self
    {
        if ($this->professions->removeElement($profession)) {
            $profession->removeMusique($this);
        }

        return $this;
    }
}
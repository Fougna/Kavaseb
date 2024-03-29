<?php

namespace App\Entity;

use App\Repository\SerieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SerieRepository::class)
 */
class Serie
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
    private $titreOriginal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $surTitreOriginal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sousTiTreOriginal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="date")
     */
    private $anneeDebut;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $anneeFin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $format;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteSerie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteImage;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $avis;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $art;

    /**
     * @ORM\OneToMany(targetEntity=Saison::class, mappedBy="serie")
     */
    private $saisons;

    /**
     * @ORM\OneToMany(targetEntity=Role::class, mappedBy="serie")
     */
    private $roles;

    /**
     * @ORM\ManyToOne(targetEntity=Chronologie::class, inversedBy="serie")
     */
    private $chronologie;

    /**
     * @ORM\Column(type="integer")
     */
    private $ordreChrono;

    /**
     * @ORM\ManyToMany(targetEntity=Profession::class, mappedBy="serie")
     */
    private $professions;

    public function __construct()
    {
        $this->saisons = new ArrayCollection();
        $this->roles = new ArrayCollection();
        $this->professions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreFrancais(): ?string
    {
        return $this->titreFrancais;
    }

    public function setTitreFrancais(string $titreFrancais): self
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

    public function getSousTiTreOriginal(): ?string
    {
        return $this->sousTiTreOriginal;
    }

    public function setSousTiTreOriginal(?string $sousTiTreOriginal): self
    {
        $this->sousTiTreOriginal = $sousTiTreOriginal;

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

    public function getAnneeDebut(): ?\DateTimeInterface
    {
        return $this->anneeDebut;
    }

    public function setAnneeDebut(\DateTimeInterface $anneeDebut): self
    {
        $this->anneeDebut = $anneeDebut;

        return $this;
    }

    public function getAnneeFin(): ?\DateTimeInterface
    {
        return $this->anneeFin;
    }

    public function setAnneeFin(?\DateTimeInterface $anneeFin): self
    {
        $this->anneeFin = $anneeFin;

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

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(string $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function getNoteSerie(): ?int
    {
        return $this->noteSerie;
    }

    public function setNoteSerie(?int $noteSerie): self
    {
        $this->noteSerie = $noteSerie;

        return $this;
    }

    public function getNoteImage(): ?int
    {
        return $this->noteImage;
    }

    public function setNoteImage(?int $noteImage): self
    {
        $this->noteImage = $noteImage;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAvis(): ?string
    {
        return $this->avis;
    }

    public function setAvis(?string $avis): self
    {
        $this->avis = $avis;

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
        return $this->titreFrancais;
    }

    /**
     * @return Collection<int, Saison>
     */
    public function getSaisons(): Collection
    {
        return $this->saisons;
    }

    public function addSaison(Saison $saison): self
    {
        if (!$this->saisons->contains($saison)) {
            $this->saisons[] = $saison;
            $saison->setSerie($this);
        }

        return $this;
    }

    public function removeSaison(Saison $saison): self
    {
        if ($this->saisons->removeElement($saison)) {
            // set the owning side to null (unless already changed)
            if ($saison->getSerie() === $this) {
                $saison->setSerie(null);
            }
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
            $role->setSerie($this);
        }

        return $this;
    }

    public function removeRole(Role $role): self
    {
        if ($this->roles->removeElement($role)) {
            // set the owning side to null (unless already changed)
            if ($role->getSerie() === $this) {
                $role->setSerie(null);
            }
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
            $profession->addSerie($this);
        }

        return $this;
    }

    public function removeProfession(Profession $profession): self
    {
        if ($this->professions->removeElement($profession)) {
            $profession->removeSerie($this);
        }

        return $this;
    }
}
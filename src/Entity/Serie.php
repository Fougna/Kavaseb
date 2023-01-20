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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chronologie;

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
     * @ORM\ManyToMany(targetEntity=Auteur::class, inversedBy="series")
     */
    private $auteur;

    /**
     * @ORM\OneToMany(targetEntity=Saison::class, mappedBy="serie")
     */
    private $saisons;

    /**
     * @ORM\ManyToMany(targetEntity=Scenariste::class, mappedBy="serie")
     */
    private $scenaristes;

    /**
     * @ORM\ManyToMany(targetEntity=Realisateur::class, mappedBy="serie")
     */
    private $realisateurs;

    /**
     * @ORM\ManyToMany(targetEntity=Producteur::class, mappedBy="serie")
     */
    private $producteurs;

    /**
     * @ORM\ManyToMany(targetEntity=Acteur::class, mappedBy="serie")
     */
    private $acteurs;

    /**
     * @ORM\ManyToMany(targetEntity=Doubleur::class, mappedBy="serie")
     */
    private $doubleurs;

    /**
     * @ORM\OneToMany(targetEntity=Role::class, mappedBy="serie")
     */
    private $roles;

    public function __construct()
    {
        $this->auteur = new ArrayCollection();
        $this->saisons = new ArrayCollection();
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

    public function getChronologie(): ?int
    {
        return $this->chronologie;
    }

    public function setChronologie(?int $chronologie): self
    {
        $this->chronologie = $chronologie;

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
            $scenariste->addSerie($this);
        }

        return $this;
    }

    public function removeScenariste(Scenariste $scenariste): self
    {
        if ($this->scenaristes->removeElement($scenariste)) {
            $scenariste->removeSerie($this);
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
            $realisateur->addSerie($this);
        }

        return $this;
    }

    public function removeRealisateur(Realisateur $realisateur): self
    {
        if ($this->realisateurs->removeElement($realisateur)) {
            $realisateur->removeSerie($this);
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
            $producteur->addSerie($this);
        }

        return $this;
    }

    public function removeProducteur(Producteur $producteur): self
    {
        if ($this->producteurs->removeElement($producteur)) {
            $producteur->removeSerie($this);
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
            $acteur->addSerie($this);
        }

        return $this;
    }

    public function removeActeur(Acteur $acteur): self
    {
        if ($this->acteurs->removeElement($acteur)) {
            $acteur->removeSerie($this);
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
            $doubleur->addSerie($this);
        }

        return $this;
    }

    public function removeDoubleur(Doubleur $doubleur): self
    {
        if ($this->doubleurs->removeElement($doubleur)) {
            $doubleur->removeSerie($this);
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
}
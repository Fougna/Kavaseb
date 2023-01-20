<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivreRepository::class)
 */
class Livre
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
    private $sousTitreOriginal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="date")
     */
    private $annee;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreDePages;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $isbn;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chronologie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteLivre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteReliure;

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
     * @ORM\ManyToMany(targetEntity=Auteur::class, mappedBy="livre")
     */
    private $auteurs;

    /**
     * @ORM\ManyToMany(targetEntity=EditeurFrancais::class, mappedBy="livre")
     */
    private $editeurFrancais;

    /**
     * @ORM\ManyToMany(targetEntity=Traducteur::class, mappedBy="livre")
     */
    private $traducteurs;

    /**
     * @ORM\ManyToMany(targetEntity=Preface::class, mappedBy="livre")
     */
    private $prefaces;

    public function __construct()
    {
        $this->auteurs = new ArrayCollection();
        $this->editeurFrancais = new ArrayCollection();
        $this->traducteurs = new ArrayCollection();
        $this->prefaces = new ArrayCollection();
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

    public function getSousTitreOriginal(): ?string
    {
        return $this->sousTitreOriginal;
    }

    public function setSousTitreOriginal(?string $sousTitreOriginal): self
    {
        $this->sousTitreOriginal = $sousTitreOriginal;

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

    public function getNombreDePages(): ?int
    {
        return $this->nombreDePages;
    }

    public function setNombreDePages(int $nombreDePages): self
    {
        $this->nombreDePages = $nombreDePages;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

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

    public function getNoteLivre(): ?int
    {
        return $this->noteLivre;
    }

    public function setNoteLivre(?int $noteLivre): self
    {
        $this->noteLivre = $noteLivre;

        return $this;
    }

    public function getNoteReliure(): ?int
    {
        return $this->noteReliure;
    }

    public function setNoteReliure(?int $noteReliure): self
    {
        $this->noteReliure = $noteReliure;

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
     * @return Collection<int, Auteur>
     */
    public function getAuteurs(): Collection
    {
        return $this->auteurs;
    }

    public function addAuteur(Auteur $auteur): self
    {
        if (!$this->auteurs->contains($auteur)) {
            $this->auteurs[] = $auteur;
            $auteur->addLivre($this);
        }

        return $this;
    }

    public function removeAuteur(Auteur $auteur): self
    {
        if ($this->auteurs->removeElement($auteur)) {
            $auteur->removeLivre($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, EditeurFrancais>
     */
    public function getEditeurFrancais(): Collection
    {
        return $this->editeurFrancais;
    }

    public function addEditeurFrancai(EditeurFrancais $editeurFrancai): self
    {
        if (!$this->editeurFrancais->contains($editeurFrancai)) {
            $this->editeurFrancais[] = $editeurFrancai;
            $editeurFrancai->addLivre($this);
        }

        return $this;
    }

    public function removeEditeurFrancai(EditeurFrancais $editeurFrancai): self
    {
        if ($this->editeurFrancais->removeElement($editeurFrancai)) {
            $editeurFrancai->removeLivre($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Traducteur>
     */
    public function getTraducteurs(): Collection
    {
        return $this->traducteurs;
    }

    public function addTraducteur(Traducteur $traducteur): self
    {
        if (!$this->traducteurs->contains($traducteur)) {
            $this->traducteurs[] = $traducteur;
            $traducteur->addLivre($this);
        }

        return $this;
    }

    public function removeTraducteur(Traducteur $traducteur): self
    {
        if ($this->traducteurs->removeElement($traducteur)) {
            $traducteur->removeLivre($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Preface>
     */
    public function getPrefaces(): Collection
    {
        return $this->prefaces;
    }

    public function addPreface(Preface $preface): self
    {
        if (!$this->prefaces->contains($preface)) {
            $this->prefaces[] = $preface;
            $preface->addLivre($this);
        }

        return $this;
    }

    public function removePreface(Preface $preface): self
    {
        if ($this->prefaces->removeElement($preface)) {
            $preface->removeLivre($this);
        }

        return $this;
    }
}
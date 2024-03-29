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
     * @ORM\ManyToMany(targetEntity=EditeurFrancais::class, mappedBy="livre")
     */
    private $editeurFrancais;

    /**
     * @ORM\ManyToMany(targetEntity=EditeurOriginal::class, mappedBy="livre")
     */
    private $editeurOriginals;

    /**
     * @ORM\ManyToOne(targetEntity=Chronologie::class, inversedBy="livre")
     */
    private $chronologie;

    /**
     * @ORM\Column(type="integer")
     */
    private $ordreChrono;

    /**
     * @ORM\ManyToMany(targetEntity=Profession::class, mappedBy="livre")
     */
    private $professions;

    public function __construct()
    {
        $this->editeurFrancais = new ArrayCollection();
        $this->editeurOriginals = new ArrayCollection();
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
     * @return Collection<int, EditeurOriginal>
     */
    public function getEditeurOriginals(): Collection
    {
        return $this->editeurOriginals;
    }

    public function addEditeurOriginal(EditeurOriginal $editeurOriginal): self
    {
        if (!$this->editeurOriginals->contains($editeurOriginal)) {
            $this->editeurOriginals[] = $editeurOriginal;
            $editeurOriginal->addLivre($this);
        }

        return $this;
    }

    public function removeEditeurOriginal(EditeurOriginal $editeurOriginal): self
    {
        if ($this->editeurOriginals->removeElement($editeurOriginal)) {
            $editeurOriginal->removeLivre($this);
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
            $profession->addLivre($this);
        }

        return $this;
    }

    public function removeProfession(Profession $profession): self
    {
        if ($this->professions->removeElement($profession)) {
            $profession->removeLivre($this);
        }

        return $this;
    }
}
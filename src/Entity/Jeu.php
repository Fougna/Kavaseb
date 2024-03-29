<?php

namespace App\Entity;

use App\Repository\JeuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JeuRepository::class)
 */
class Jeu
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
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreJoueursMin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombreJoueursMax;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteJeu;

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
     * @ORM\OneToMany(targetEntity=Role::class, mappedBy="jeu")
     */
    private $roles;

    /**
     * @ORM\ManyToMany(targetEntity=Systeme::class, mappedBy="jeu")
     */
    private $systemes;

    /**
     * @ORM\ManyToMany(targetEntity=StudioDev::class, mappedBy="jeu")
     */
    private $developpeurs;

    /**
     * @ORM\ManyToMany(targetEntity=StudioEdit::class, mappedBy="jeu")
     */
    private $editeurs;

    /**
     * @ORM\ManyToOne(targetEntity=Chronologie::class, inversedBy="Jeu")
     */
    private $chronologie;

    /**
     * @ORM\Column(type="integer")
     */
    private $ordreChrono;

    /**
     * @ORM\ManyToMany(targetEntity=Profession::class, mappedBy="jeu")
     */
    private $professions;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
        $this->systemes = new ArrayCollection();
        $this->developpeurs = new ArrayCollection();
        $this->editeurs = new ArrayCollection();
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

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getNombreJoueursMin(): ?int
    {
        return $this->nombreJoueursMin;
    }

    public function setNombreJoueursMin(int $nombreJoueursMin): self
    {
        $this->nombreJoueursMin = $nombreJoueursMin;

        return $this;
    }

    public function getNombreJoueursMax(): ?int
    {
        return $this->nombreJoueursMax;
    }

    public function setNombreJoueursMax(?int $nombreJoueursMax): self
    {
        $this->nombreJoueursMax = $nombreJoueursMax;

        return $this;
    }

    public function getNoteJeu(): ?int
    {
        return $this->noteJeu;
    }

    public function setNoteJeu(?int $noteJeu): self
    {
        $this->noteJeu = $noteJeu;

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
            $role->setJeu($this);
        }

        return $this;
    }

    public function removeRole(Role $role): self
    {
        if ($this->roles->removeElement($role)) {
            // set the owning side to null (unless already changed)
            if ($role->getJeu() === $this) {
                $role->setJeu(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Systeme>
     */
    public function getSystemes(): Collection
    {
        return $this->systemes;
    }

    public function addSysteme(Systeme $systeme): self
    {
        if (!$this->systemes->contains($systeme)) {
            $this->systemes[] = $systeme;
            $systeme->addJeu($this);
        }

        return $this;
    }

    public function removeSysteme(Systeme $systeme): self
    {
        if ($this->systemes->removeElement($systeme)) {
            $systeme->removeJeu($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, StudioDev>
     */
    public function getDeveloppeurs(): Collection
    {
        return $this->developpeurs;
    }

    public function addDeveloppeur(StudioDev $developpeur): self
    {
        if (!$this->developpeurs->contains($developpeur)) {
            $this->developpeurs[] = $developpeur;
            $developpeur->addJeu($this);
        }

        return $this;
    }

    public function removeDeveloppeur(StudioDev $developpeur): self
    {
        if ($this->developpeurs->removeElement($developpeur)) {
            $developpeur->removeJeu($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, StudioEdit>
     */
    public function getEditeurs(): Collection
    {
        return $this->editeurs;
    }

    public function addEditeur(StudioEdit $editeur): self
    {
        if (!$this->editeurs->contains($editeur)) {
            $this->editeurs[] = $editeur;
            $editeur->addJeu($this);
        }

        return $this;
    }

    public function removeEditeur(StudioEdit $editeur): self
    {
        if ($this->editeurs->removeElement($editeur)) {
            $editeur->removeJeu($this);
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
            $profession->addJeu($this);
        }

        return $this;
    }

    public function removeProfession(Profession $profession): self
    {
        if ($this->professions->removeElement($profession)) {
            $profession->removeJeu($this);
        }

        return $this;
    }
}
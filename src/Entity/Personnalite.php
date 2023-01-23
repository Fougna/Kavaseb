<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PersonnaliteRepository;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PersonnaliteRepository::class)
 */
class Personnalite
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nationalite;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $naissance;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $deces;

    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\OneToMany(targetEntity=Auteur::class, mappedBy="personnalite")
     */
    private $auteurs;

    /**
     * @ORM\OneToMany(targetEntity=EditeurFrancais::class, mappedBy="personnalite")
     */
    private $editeurFrancais;

    /**
     * @ORM\OneToMany(targetEntity=Traducteur::class, mappedBy="personnalite")
     */
    private $traducteurs;

    /**
     * @ORM\OneToMany(targetEntity=Preface::class, mappedBy="personnalite")
     */
    private $prefaces;

    /**
     * @ORM\OneToMany(targetEntity=Scenariste::class, mappedBy="personnalite")
     */
    private $scenaristes;

    /**
     * @ORM\OneToMany(targetEntity=Realisateur::class, mappedBy="personnalite")
     */
    private $realisateurs;

    /**
     * @ORM\OneToMany(targetEntity=Producteur::class, mappedBy="personnalite")
     */
    private $producteurs;

    /**
     * @ORM\OneToMany(targetEntity=Acteur::class, mappedBy="personnalite")
     */
    private $acteurs;

    /**
     * @ORM\OneToMany(targetEntity=Doubleur::class, mappedBy="personnalite")
     */
    private $doubleurs;

    /**
     * @ORM\OneToMany(targetEntity=Compositeur::class, mappedBy="personnalite")
     */
    private $compositeurs;

    /**
     * @ORM\OneToMany(targetEntity=EditeurOriginal::class, mappedBy="personnalite")
     */
    private $editeurOriginals;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alias;

    public function __construct()
    {
        $this->auteurs = new ArrayCollection();
        $this->editeurFrancais = new ArrayCollection();
        $this->traducteurs = new ArrayCollection();
        $this->prefaces = new ArrayCollection();
        $this->scenaristes = new ArrayCollection();
        $this->realisateurs = new ArrayCollection();
        $this->producteurs = new ArrayCollection();
        $this->acteurs = new ArrayCollection();
        $this->doubleurs = new ArrayCollection();
        $this->compositeurs = new ArrayCollection();
        $this->editeurOriginals = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(?string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getNaissance(): ?\DateTimeInterface
    {
        return $this->naissance;
    }

    public function setNaissance(?\DateTimeInterface $naissance): self
    {
        $this->naissance = $naissance;

        return $this;
    }

    public function getDeces(): ?\DateTimeInterface
    {
        return $this->deces;
    }

    public function setDeces(?\DateTimeInterface $deces): self
    {
        $this->deces = $deces;

        return $this;
    }

    public function getAge(): int
    {
        if($this->deces)
        {
            return $this->deces->diff($this->naissance)->y;
        }

        $now = new \DateTime();

        return $now->diff($this->naissance)->y;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;
        return $this;
    }

    private function calculateAge()
    {
        $now = new DateTime();

        if ($this->deces) {
            $interval = $this->naissance->diff($this->deces);
        } else {
            $interval = $this->naissance->diff($now);
        }

        $this->age = $interval->y;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    // Méthode magique convertissant un tableau en chaîne de caractères à partir d'une colonne contenant une valeur en 'string'.
    public function __toString()
    {
        return $this->nom;
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
            $auteur->setPersonnalite($this);
        }

        return $this;
    }

    public function removeAuteur(Auteur $auteur): self
    {
        if ($this->auteurs->removeElement($auteur)) {
            // set the owning side to null (unless already changed)
            if ($auteur->getPersonnalite() === $this) {
                $auteur->setPersonnalite(null);
            }
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
            $editeurFrancai->setPersonnalite($this);
        }

        return $this;
    }

    public function removeEditeurFrancai(EditeurFrancais $editeurFrancai): self
    {
        if ($this->editeurFrancais->removeElement($editeurFrancai)) {
            // set the owning side to null (unless already changed)
            if ($editeurFrancai->getPersonnalite() === $this) {
                $editeurFrancai->setPersonnalite(null);
            }
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
            $traducteur->setPersonnalite($this);
        }

        return $this;
    }

    public function removeTraducteur(Traducteur $traducteur): self
    {
        if ($this->traducteurs->removeElement($traducteur)) {
            // set the owning side to null (unless already changed)
            if ($traducteur->getPersonnalite() === $this) {
                $traducteur->setPersonnalite(null);
            }
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
            $preface->setPersonnalite($this);
        }

        return $this;
    }

    public function removePreface(Preface $preface): self
    {
        if ($this->prefaces->removeElement($preface)) {
            // set the owning side to null (unless already changed)
            if ($preface->getPersonnalite() === $this) {
                $preface->setPersonnalite(null);
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
            $scenariste->setPersonnalite($this);
        }

        return $this;
    }

    public function removeScenariste(Scenariste $scenariste): self
    {
        if ($this->scenaristes->removeElement($scenariste)) {
            // set the owning side to null (unless already changed)
            if ($scenariste->getPersonnalite() === $this) {
                $scenariste->setPersonnalite(null);
            }
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
            $realisateur->setPersonnalite($this);
        }

        return $this;
    }

    public function removeRealisateur(Realisateur $realisateur): self
    {
        if ($this->realisateurs->removeElement($realisateur)) {
            // set the owning side to null (unless already changed)
            if ($realisateur->getPersonnalite() === $this) {
                $realisateur->setPersonnalite(null);
            }
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
            $producteur->setPersonnalite($this);
        }

        return $this;
    }

    public function removeProducteur(Producteur $producteur): self
    {
        if ($this->producteurs->removeElement($producteur)) {
            // set the owning side to null (unless already changed)
            if ($producteur->getPersonnalite() === $this) {
                $producteur->setPersonnalite(null);
            }
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
            $acteur->setPersonnalite($this);
        }

        return $this;
    }

    public function removeActeur(Acteur $acteur): self
    {
        if ($this->acteurs->removeElement($acteur)) {
            // set the owning side to null (unless already changed)
            if ($acteur->getPersonnalite() === $this) {
                $acteur->setPersonnalite(null);
            }
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
            $doubleur->setPersonnalite($this);
        }

        return $this;
    }

    public function removeDoubleur(Doubleur $doubleur): self
    {
        if ($this->doubleurs->removeElement($doubleur)) {
            // set the owning side to null (unless already changed)
            if ($doubleur->getPersonnalite() === $this) {
                $doubleur->setPersonnalite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Compositeur>
     */
    public function getCompositeurs(): Collection
    {
        return $this->compositeurs;
    }

    public function addCompositeur(Compositeur $compositeur): self
    {
        if (!$this->compositeurs->contains($compositeur)) {
            $this->compositeurs[] = $compositeur;
            $compositeur->setPersonnalite($this);
        }

        return $this;
    }

    public function removeCompositeur(Compositeur $compositeur): self
    {
        if ($this->compositeurs->removeElement($compositeur)) {
            // set the owning side to null (unless already changed)
            if ($compositeur->getPersonnalite() === $this) {
                $compositeur->setPersonnalite(null);
            }
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
            $editeurOriginal->setPersonnalite($this);
        }

        return $this;
    }

    public function removeEditeurOriginal(EditeurOriginal $editeurOriginal): self
    {
        if ($this->editeurOriginals->removeElement($editeurOriginal)) {
            // set the owning side to null (unless already changed)
            if ($editeurOriginal->getPersonnalite() === $this) {
                $editeurOriginal->setPersonnalite(null);
            }
        }

        return $this;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(string $alias): self
    {
        $this->alias = $alias;

        return $this;
    }
}
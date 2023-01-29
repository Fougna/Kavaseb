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
     * @ORM\OneToMany(targetEntity=EditeurFrancais::class, mappedBy="personnalite")
     */
    private $editeurFrancais;

    /**
     * @ORM\OneToMany(targetEntity=EditeurOriginal::class, mappedBy="personnalite")
     */
    private $editeurOriginals;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alias;

    /**
     * @ORM\ManyToMany(targetEntity=Profession::class, mappedBy="personnalite")
     */
    private $professions;

    /**
     * @ORM\Column(type="integer")
     */
    private $importance;

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
        $unknown = 0;

        if(!$this->naissance)
        {
            return $unknown;
        }
        
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
            $profession->addPersonnalite($this);
        }

        return $this;
    }

    public function removeProfession(Profession $profession): self
    {
        if ($this->professions->removeElement($profession)) {
            $profession->removePersonnalite($this);
        }

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
}
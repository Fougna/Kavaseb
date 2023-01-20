<?php

namespace App\Entity;

use App\Repository\MorceauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MorceauRepository::class)
 */
class Morceau
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
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titreOriginal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titreFrancais;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\ManyToMany(targetEntity=Musique::class, inversedBy="morceaux")
     */
    private $musique;

    /**
     * @ORM\ManyToMany(targetEntity=Compositeur::class, mappedBy="morceau")
     */
    private $compositeurs;

    public function __construct()
    {
        $this->musique = new ArrayCollection();
        $this->compositeurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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

    public function getTitreFrancais(): ?string
    {
        return $this->titreFrancais;
    }

    public function setTitreFrancais(?string $titreFrancais): self
    {
        $this->titreFrancais = $titreFrancais;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

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

    // Méthode magique convertissant un tableau en chaîne de caractères à partir d'une colonne contenant une valeur en 'string'.
    public function __toString()
    {
        return $this->type;
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
            $compositeur->addMorceau($this);
        }

        return $this;
    }

    public function removeCompositeur(Compositeur $compositeur): self
    {
        if ($this->compositeurs->removeElement($compositeur)) {
            $compositeur->removeMorceau($this);
        }

        return $this;
    }
}
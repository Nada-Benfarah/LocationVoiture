<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Serie = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateMiseEnMarche = null;

    #[ORM\Column(length: 255)]
    private ?string $Modele = null;

    #[ORM\Column]
    private ?float $PrixJour = null;

    #[ORM\OneToMany(mappedBy: 'voiture', targetEntity: Location::class)]
    private Collection $locations;

    public function __construct()
    {
        $this->locations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSerie(): ?string
    {
        return $this->Serie;
    }

    public function setSerie(?string $Serie): static
    {
        $this->Serie = $Serie;

        return $this;
    }

    public function getDateMiseEnMarche(): ?\DateTimeInterface
    {
        return $this->DateMiseEnMarche;
    }

    public function setDateMiseEnMarche(\DateTimeInterface $DateMiseEnMarche): static
    {
        $this->DateMiseEnMarche = $DateMiseEnMarche;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->Modele;
    }

    public function setModele(string $Modele): static
    {
        $this->Modele = $Modele;

        return $this;
    }

    public function getPrixJour(): ?float
    {
        return $this->PrixJour;
    }

    public function setPrixJour(float $PrixJour): static
    {
        $this->PrixJour = $PrixJour;

        return $this;
    }

    /**
     * @return Collection<int, Location>
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function addLocation(Location $location): static
    {
        if (!$this->locations->contains($location)) {
            $this->locations->add($location);
            $location->setVoiture($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): static
    {
        if ($this->locations->removeElement($location)) {
            // set the owning side to null (unless already changed)
            if ($location->getVoiture() === $this) {
                $location->setVoiture(null);
            }
        }

        return $this;
    }
}

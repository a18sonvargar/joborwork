<?php

namespace App\Entity;

use App\Repository\OfertaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OfertaRepository::class)
 */
class Oferta
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descripcio;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dataPub;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="ofertes")
     */
    private $empresa;

    /**
     * @ORM\OneToMany(targetEntity=Candidat::class, mappedBy="oferta")
     */
    private $candidats;

    /**
     * @var String
     */
    private $dataPubEnString;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titol;

    public function __construct()
    {
        $this->candidats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcio(): ?string
    {
        return $this->descripcio;
    }

    public function setDescripcio(?string $descripcio): self
    {
        $this->descripcio = $descripcio;

        return $this;
    }

    public function getDataPub(): ?\DateTimeInterface
    {
        return $this->dataPub;
    }

    public function setDataPub(?\DateTimeInterface $dataPub): self
    {
        $this->dataPub = $dataPub;
        $this->dataPubEnString = date_format($dataPub, 'Y-m-d');

        return $this;
    }

    public function getDataPubString() : string
    {
        $this->dataPubEnString = date_format($this->dataPub, 'Y-m-d');
        return $this->dataPubEnString;
    }

    public function getEmpresa(): ?Empresa
    {
        return $this->empresa;
    }

    public function setEmpresa(?Empresa $empresa): self
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * @return Collection|Candidat[]
     */
    public function getCandidats(): Collection
    {
        return $this->candidats;
    }

    public function addCandidat(Candidat $candidat): self
    {
        if (!$this->candidats->contains($candidat)) {
            $this->candidats[] = $candidat;
            $candidat->setOferta($this);
        }

        return $this;
    }

    public function removeCandidat(Candidat $candidat): self
    {
        if ($this->candidats->contains($candidat)) {
            $this->candidats->removeElement($candidat);
            // set the owning side to null (unless already changed)
            if ($candidat->getOferta() === $this) {
                $candidat->setOferta(null);
            }
        }

        return $this;
    }

    public function getTitol(): ?string
    {
        return $this->titol;
    }

    public function setTitol(?string $titol): self
    {
        $this->titol = $titol;

        return $this;
    }
}

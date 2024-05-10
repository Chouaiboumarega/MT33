<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehiculeRepository::class)
 */
class Vehicule
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
    private $matricule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $assurance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $controle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $circulation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $entretien;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kilometres;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getAssurance(): ?string
    {
        return $this->assurance;
    }

    public function setAssurance(string $assurance): self
    {
        $this->assurance = $assurance;

        return $this;
    }

    public function getControle(): ?string
    {
        return $this->controle;
    }

    public function setControle(string $controle): self
    {
        $this->controle = $controle;

        return $this;
    }

    public function getCirculation(): ?string
    {
        return $this->circulation;
    }

    public function setCirculation(string $circulation): self
    {
        $this->circulation = $circulation;

        return $this;
    }

    public function getEntretien(): ?string
    {
        return $this->entretien;
    }

    public function setEntretien(string $entretien): self
    {
        $this->entretien = $entretien;

        return $this;
    }

    public function getKilometres(): ?string
    {
        return $this->kilometres;
    }

    public function setKilometres(string $kilometres): self
    {
        $this->kilometres = $kilometres;

        return $this;
    }
}

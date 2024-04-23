<?php

namespace App\Entity;

use App\Repository\BilanRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BilanRepository::class)
 */
class Bilan
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $client;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vehicule;

    /**
     * @ORM\Column(type="integer")
     */
    private $distances;

    /**
     * @ORM\Column(type="integer")
     */
    private $depenses;

    /**
     * @ORM\Column(type="integer")
     */
    private $rotations;

    /**
     * @ORM\Column(type="integer")
     */
    private $volumes;

    /**
     * @ORM\Column(type="integer")
     */
    private $facturation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $observations;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getClient(): ?string
    {
        return $this->client;
    }

    public function setClient(string $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getVehicule(): ?string
    {
        return $this->vehicule;
    }

    public function setVehicule(string $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    public function getDistances(): ?int
    {
        return $this->distances;
    }

    public function setDistances(int $distances): self
    {
        $this->distances = $distances;

        return $this;
    }

    public function getDepenses(): ?int
    {
        return $this->depenses;
    }

    public function setDepenses(int $depenses): self
    {
        $this->depenses = $depenses;

        return $this;
    }

    public function getRotations(): ?int
    {
        return $this->rotations;
    }

    public function setRotations(int $rotations): self
    {
        $this->rotations = $rotations;

        return $this;
    }

    public function getVolumes(): ?int
    {
        return $this->volumes;
    }

    public function setVolumes(int $volumes): self
    {
        $this->volumes = $volumes;

        return $this;
    }

    public function getFacturation(): ?int
    {
        return $this->facturation;
    }

    public function setFacturation(int $facturation): self
    {
        $this->facturation = $facturation;

        return $this;
    }

    public function getObservations(): ?string
    {
        return $this->observations;
    }

    public function setObservations(string $observations): self
    {
        $this->observations = $observations;

        return $this;
    }
}

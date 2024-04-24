<?php

namespace App\Entity;

use App\Repository\FacturationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FacturationRepository::class)
 */
class Facturation
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
     * @ORM\Column(type="integer")
     */
    private $colis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prixht;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prixttc;

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

    public function getColis(): ?int
    {
        return $this->colis;
    }

    public function setColis(int $colis): self
    {
        $this->colis = $colis;

        return $this;
    }

    public function getPrixht(): ?string
    {
        return $this->prixht;
    }

    public function setPrixht(string $prixht): self
    {
        $this->prixht = $prixht;

        return $this;
    }

    public function getPrixttc(): ?string
    {
        return $this->prixttc;
    }

    public function setPrixttc(string $prixttc): self
    {
        $this->prixttc = $prixttc;

        return $this;
    }
}

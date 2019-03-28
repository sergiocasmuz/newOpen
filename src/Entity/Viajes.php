<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ViajesRepository")
 */
class Viajes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $salida;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $llegada;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $desde;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hasta;

    /**
     * @ORM\Column(type="integer")
     */
    private $diaLaboral;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Choferes", inversedBy="viajes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $chofer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CuentasCorrientes", inversedBy="viajes")
     */
    private $cc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $monto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSalida(): ?\DateTimeInterface
    {
        return $this->salida;
    }

    public function setSalida(?\DateTimeInterface $salida): self
    {
        $this->salida = $salida;

        return $this;
    }

    public function getLlegada(): ?\DateTimeInterface
    {
        return $this->llegada;
    }

    public function setLlegada(?\DateTimeInterface $llegada): self
    {
        $this->llegada = $llegada;

        return $this;
    }

    public function getDesde(): ?string
    {
        return $this->desde;
    }

    public function setDesde(string $desde): self
    {
        $this->desde = $desde;

        return $this;
    }

    public function getHasta(): ?string
    {
        return $this->hasta;
    }

    public function setHasta(string $hasta): self
    {
        $this->hasta = $hasta;

        return $this;
    }

    public function getChofer(): ?Choferes
    {
        return $this->chofer;
    }

    public function setChofer(?Choferes $chofer): self
    {
        $this->chofer = $chofer;

        return $this;
    }

    public function getCc(): ?CuentasCorrientes
    {
        return $this->cc;
    }

    public function setCc(?CuentasCorrientes $cc): self
    {
        $this->cc = $cc;

        return $this;
    }

    public function getMonto(): ?int
    {
        return $this->monto;
    }

    public function setMonto(?int $monto): self
    {
        $this->monto = $monto;

        return $this;
    }

    public function getDiaLaboral(): ?int
    {
        return $this->diaLaboral;
    }

    public function setDiaLaboral(?int $diaLaboral): self
    {
        $this->diaLaboral = $diaLaboral;

        return $this;
    }
}

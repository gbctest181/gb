<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProcesverbalRepository")
 */
class Procesverbal
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="blob")
     */
    private $pdf;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Intervention", inversedBy="fk_pv")
     */
    private $intervention;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPdf()
    {
        return $this->pdf;
    }

    public function setPdf($pdf): self
    {
        $this->pdf = $pdf;

        return $this;
    }

    public function getIntervention(): ?Intervention
    {
        return $this->intervention;
    }

    public function setIntervention(?Intervention $intervention): self
    {
        $this->intervention = $intervention;

        return $this;
    }

    public function __toString()
    {
        $format = "%s";
        return sprintf($format,
            $this->pdf
        );
    }
}

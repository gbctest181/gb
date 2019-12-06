<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaterielRepository")
 */
class Materiel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Piece", mappedBy="materiel")
     */
    private $fk_piece;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Intervention", inversedBy="fk_materiel")
     */
    private $intervention;

    public function __construct()
    {
        $this->fk_piece = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * @return Collection|Piece[]
     */
    public function getFkPiece(): Collection
    {
        return $this->fk_piece;
    }

    public function addFkPiece(Piece $fkPiece): self
    {
        if (!$this->fk_piece->contains($fkPiece)) {
            $this->fk_piece[] = $fkPiece;
            $fkPiece->setMateriel($this);
        }

        return $this;
    }

    public function removeFkPiece(Piece $fkPiece): self
    {
        if ($this->fk_piece->contains($fkPiece)) {
            $this->fk_piece->removeElement($fkPiece);
            // mettre le côté propriétaire à null (sauf si déjà changé)
            if ($fkPiece->getMateriel() === $this) {
                $fkPiece->setMateriel(null);
            }
        }

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
        $format = "%s,%s";
        return sprintf($format,
            $this->quantite,
            $this->fk_piece
        );
    }
}

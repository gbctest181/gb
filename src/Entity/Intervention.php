<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InterventionRepository")
 */
class Intervention
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $codepostal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mobile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $representant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fonction;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BonIntervention", mappedBy="intervention")
     */
    private $fk_bonintervention;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Materiel", mappedBy="intervention")
     */
    private $fk_materiel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ClientFinal", inversedBy="interventions")
     */
    private $fk_client;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Procesverbal", mappedBy="intervention")
     */
    private $fk_pv;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Formation", mappedBy="intervention")
     */
    private $fk_formation;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="interventions")
     */
    private $fk_user;

    public function __construct()
    {
        $this->fk_bonintervention = new ArrayCollection();
        $this->fk_materiel = new ArrayCollection();
        $this->fk_pv = new ArrayCollection();
        $this->fk_formation = new ArrayCollection();
        $this->fk_user = new ArrayCollection();
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodepostal(): ?int
    {
        return $this->codepostal;
    }

    public function setCodepostal(int $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    public function setMobile(?string $mobile): self
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getRepresentant(): ?string
    {
        return $this->representant;
    }

    public function setRepresentant(?string $representant): self
    {
        $this->representant = $representant;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(?string $fonction): self
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * @return Collection|BonIntervention[]
     */
    public function getFkBonintervention(): Collection
    {
        return $this->fk_bonintervention;
    }

    public function addFkBonintervention(BonIntervention $fkBonintervention): self
    {
        if (!$this->fk_bonintervention->contains($fkBonintervention)) {
            $this->fk_bonintervention[] = $fkBonintervention;
            $fkBonintervention->setIntervention($this);
        }

        return $this;
    }

    public function removeFkBonintervention(BonIntervention $fkBonintervention): self
    {
        if ($this->fk_bonintervention->contains($fkBonintervention)) {
            $this->fk_bonintervention->removeElement($fkBonintervention);
            // set the owning side to null (unless already changed)
            if ($fkBonintervention->getIntervention() === $this) {
                $fkBonintervention->setIntervention(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Materiel[]
     */
    public function getFkMateriel(): Collection
    {
        return $this->fk_materiel;
    }

    public function addFkMateriel(Materiel $fkMateriel): self
    {
        if (!$this->fk_materiel->contains($fkMateriel)) {
            $this->fk_materiel[] = $fkMateriel;
            $fkMateriel->setIntervention($this);
        }

        return $this;
    }

    public function removeFkMateriel(Materiel $fkMateriel): self
    {
        if ($this->fk_materiel->contains($fkMateriel)) {
            $this->fk_materiel->removeElement($fkMateriel);
            // set the owning side to null (unless already changed)
            if ($fkMateriel->getIntervention() === $this) {
                $fkMateriel->setIntervention(null);
            }
        }

        return $this;
    }

    public function getFkClient(): ?ClientFinal
    {
        return $this->fk_client;
    }

    public function setFkClient(?ClientFinal $fk_client): self
    {
        $this->fk_client = $fk_client;

        return $this;
    }

    /**
     * @return Collection|Procesverbal[]
     */
    public function getFkPv(): Collection
    {
        return $this->fk_pv;
    }

    public function addFkPv(Procesverbal $fkPv): self
    {
        if (!$this->fk_pv->contains($fkPv)) {
            $this->fk_pv[] = $fkPv;
            $fkPv->setIntervention($this);
        }

        return $this;
    }

    public function removeFkPv(Procesverbal $fkPv): self
    {
        if ($this->fk_pv->contains($fkPv)) {
            $this->fk_pv->removeElement($fkPv);
            // set the owning side to null (unless already changed)
            if ($fkPv->getIntervention() === $this) {
                $fkPv->setIntervention(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getFkFormation(): Collection
    {
        return $this->fk_formation;
    }

    public function addFkFormation(Formation $fkFormation): self
    {
        if (!$this->fk_formation->contains($fkFormation)) {
            $this->fk_formation[] = $fkFormation;
            $fkFormation->setIntervention($this);
        }

        return $this;
    }

    public function removeFkFormation(Formation $fkFormation): self
    {
        if ($this->fk_formation->contains($fkFormation)) {
            $this->fk_formation->removeElement($fkFormation);
            // set the owning side to null (unless already changed)
            if ($fkFormation->getIntervention() === $this) {
                $fkFormation->setIntervention(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getFkUser(): Collection
    {
        return $this->fk_user;
    }

    public function addFkUser(User $fkUser): self
    {
        if (!$this->fk_user->contains($fkUser)) {
            $this->fk_user[] = $fkUser;
        }

        return $this;
    }

    public function removeFkUser(User $fkUser): self
    {
        if ($this->fk_user->contains($fkUser)) {
            $this->fk_user->removeElement($fkUser);
        }

        return $this;
    }
}

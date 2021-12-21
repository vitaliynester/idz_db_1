<?php

namespace App\Entity;

use App\Repository\PositionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PositionRepository::class)
 */
class Position
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $positionSalary;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $positionName;

    /**
     * @ORM\OneToMany(targetEntity=Doctor::class, mappedBy="positionId", orphanRemoval=true)
     */
    private $doctors;

    public function __construct()
    {
        $this->doctors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPositionSalary(): ?string
    {
        return $this->positionSalary;
    }

    public function setPositionSalary(string $positionSalary): self
    {
        $this->positionSalary = $positionSalary;

        return $this;
    }

    public function getPositionName(): ?string
    {
        return $this->positionName;
    }

    public function setPositionName(string $positionName): self
    {
        $this->positionName = $positionName;

        return $this;
    }

    /**
     * @return Collection|Doctor[]
     */
    public function getDoctors(): Collection
    {
        return $this->doctors;
    }

    public function addDoctor(Doctor $doctor): self
    {
        if (!$this->doctors->contains($doctor)) {
            $this->doctors[] = $doctor;
            $doctor->setPosition($this);
        }

        return $this;
    }

    public function removeDoctor(Doctor $doctor): self
    {
        if ($this->doctors->removeElement($doctor)) {
            // set the owning side to null (unless already changed)
            if ($doctor->getPosition() === $this) {
                $doctor->setPosition(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->positionName;
    }
}

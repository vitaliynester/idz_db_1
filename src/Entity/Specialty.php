<?php

namespace App\Entity;

use App\Repository\SpecialtyRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpecialtyRepository::class)
 */
class Specialty
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $specialtyName;

    /**
     * @ORM\Column(type="time")
     */
    private $specialtyDuration;

    /**
     * @ORM\OneToMany(targetEntity=Doctor::class, mappedBy="specialtyId", orphanRemoval=true)
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

    public function getSpecialtyName(): ?string
    {
        return $this->specialtyName;
    }

    public function setSpecialtyName(string $specialtyName): self
    {
        $this->specialtyName = $specialtyName;

        return $this;
    }

    public function getSpecialtyDuration(): ?DateTimeInterface
    {
        return $this->specialtyDuration;
    }

    public function setSpecialtyDuration(DateTimeInterface $specialtyDuration): self
    {
        $this->specialtyDuration = $specialtyDuration;

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
            $doctor->setSpecialty($this);
        }

        return $this;
    }

    public function removeDoctor(Doctor $doctor): self
    {
        if ($this->doctors->removeElement($doctor)) {
            // set the owning side to null (unless already changed)
            if ($doctor->getSpecialty() === $this) {
                $doctor->setSpecialty(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->specialtyName;
    }
}

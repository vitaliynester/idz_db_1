<?php

namespace App\Entity;

use App\Repository\PatientCardRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatientCardRepository::class)
 */
class PatientCard
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Patient::class, inversedBy="patientCard", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;

    /**
     * @ORM\Column(type="date")
     */
    private $patientCardCreateDate;

    /**
     * @ORM\OneToMany(targetEntity=CardReception::class, mappedBy="patientCardId")
     */
    private $cardReceptions;

    public function __construct()
    {
        $this->cardReceptions = new ArrayCollection();
        $this->patientCardCreateDate = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    public function getPatientCardCreateDate(): ?DateTimeInterface
    {
        return $this->patientCardCreateDate;
    }

    public function setPatientCardCreateDate(DateTimeInterface $patientCardCreateDate): self
    {
        $this->patientCardCreateDate = $patientCardCreateDate;

        return $this;
    }

    /**
     * @return Collection|CardReception[]
     */
    public function getCardReceptions(): Collection
    {
        return $this->cardReceptions;
    }

    public function addCardReception(CardReception $cardReception): self
    {
        if (!$this->cardReceptions->contains($cardReception)) {
            $this->cardReceptions[] = $cardReception;
            $cardReception->setPatientCard($this);
        }

        return $this;
    }

    public function removeCardReception(CardReception $cardReception): self
    {
        if ($this->cardReceptions->removeElement($cardReception)) {
            // set the owning side to null (unless already changed)
            if ($cardReception->getPatientCard() === $this) {
                $cardReception->setPatientCard(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return "Карта пациента: " . $this->patient;
    }
}

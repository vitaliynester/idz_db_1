<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Account::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $account;

    /**
     * @ORM\Column(type="string", length=14)
     */
    private $patientSnills;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $patientJms;

    /**
     * @ORM\OneToOne(targetEntity=PatientCard::class, mappedBy="patientId", cascade={"persist", "remove"})
     */
    private $patientCard;

    /**
     * @ORM\OneToMany(targetEntity=Ticket::class, mappedBy="patientId")
     */
    private $tickets;

    public function __construct()
    {
        $this->tickets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccount(): ?Account
    {
        return $this->account;
    }

    public function setAccount(Account $account): self
    {
        $this->account = $account;

        return $this;
    }

    public function getPatientSnills(): ?string
    {
        return $this->patientSnills;
    }

    public function setPatientSnills(string $patientSnills): self
    {
        $this->patientSnills = $patientSnills;

        return $this;
    }

    public function getPatientJms(): ?string
    {
        return $this->patientJms;
    }

    public function setPatientJms(string $patientJms): self
    {
        $this->patientJms = $patientJms;

        return $this;
    }

    public function getPatientCard(): ?PatientCard
    {
        return $this->patientCard;
    }

    public function setPatientCard(PatientCard $patientCard): self
    {
        // set the owning side of the relation if necessary
        if ($patientCard->getPatient() !== $this) {
            $patientCard->setPatient($this);
        }

        $this->patientCard = $patientCard;

        return $this;
    }

    /**
     * @return Collection|Ticket[]
     */
    public function getTickets(): Collection
    {
        return $this->tickets;
    }

    public function addTicket(Ticket $ticket): self
    {
        if (!$this->tickets->contains($ticket)) {
            $this->tickets[] = $ticket;
            $ticket->setPatient($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $ticket): self
    {
        if ($this->tickets->removeElement($ticket)) {
            // set the owning side to null (unless already changed)
            if ($ticket->getPatient() === $this) {
                $ticket->setPatient(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->patientSnills . " | " . $this->patientJms;
    }
}

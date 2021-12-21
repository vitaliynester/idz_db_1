<?php

namespace App\Entity;

use App\Repository\DoctorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DoctorRepository::class)
 */
class Doctor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=4, nullable=true)
     */
    private $cabinetNumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $doctorExperience;

    /**
     * @ORM\OneToOne(targetEntity=Account::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $account;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="doctors")
     * @ORM\JoinColumn(nullable=false)
     */
    private $department;

    /**
     * @ORM\ManyToOne(targetEntity=Specialty::class, inversedBy="doctors")
     * @ORM\JoinColumn(nullable=false)
     */
    private $specialty;

    /**
     * @ORM\ManyToOne(targetEntity=Position::class, inversedBy="doctors")
     * @ORM\JoinColumn(nullable=false)
     */
    private $position;

    /**
     * @ORM\OneToMany(targetEntity=Timetable::class, mappedBy="doctorId")
     */
    private $timetables;

    /**
     * @ORM\OneToMany(targetEntity=Ticket::class, mappedBy="doctorId")
     */
    private $tickets;

    public function __construct()
    {
        $this->timetables = new ArrayCollection();
        $this->tickets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCabinetNumber(): ?string
    {
        return $this->cabinetNumber;
    }

    public function setCabinetNumber(?string $cabinetNumber): self
    {
        $this->cabinetNumber = $cabinetNumber;

        return $this;
    }

    public function getDoctorExperience(): ?int
    {
        return $this->doctorExperience;
    }

    public function setDoctorExperience(int $doctorExperience): self
    {
        $this->doctorExperience = $doctorExperience;

        return $this;
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

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getSpecialty(): ?Specialty
    {
        return $this->specialty;
    }

    public function setSpecialty(?Specialty $specialty): self
    {
        $this->specialty = $specialty;

        return $this;
    }

    public function getPosition(): ?Position
    {
        return $this->position;
    }

    public function setPosition(?Position $position): self
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return Collection|Timetable[]
     */
    public function getTimetables(): Collection
    {
        return $this->timetables;
    }

    public function addTimetable(Timetable $timetable): self
    {
        if (!$this->timetables->contains($timetable)) {
            $this->timetables[] = $timetable;
            $timetable->setDoctor($this);
        }

        return $this;
    }

    public function removeTimetable(Timetable $timetable): self
    {
        if ($this->timetables->removeElement($timetable)) {
            // set the owning side to null (unless already changed)
            if ($timetable->getDoctor() === $this) {
                $timetable->setDoctor(null);
            }
        }

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
            $ticket->setDoctor($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $ticket): self
    {
        if ($this->tickets->removeElement($ticket)) {
            // set the owning side to null (unless already changed)
            if ($ticket->getDoctor() === $this) {
                $ticket->setDoctor(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->department . " | " . $this->specialty . " | " . $this->position;
    }
}

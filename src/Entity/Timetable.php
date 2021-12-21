<?php

namespace App\Entity;

use App\Repository\TimetableRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TimetableRepository::class)
 */
class Timetable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $timetableStatus;

    /**
     * @ORM\Column(type="time")
     */
    private $timetableEndTime;

    /**
     * @ORM\Column(type="time")
     */
    private $timetableStartTime;

    /**
     * @ORM\Column(type="integer")
     */
    private $timetableWeekDay;

    /**
     * @ORM\ManyToOne(targetEntity=Doctor::class, inversedBy="timetables")
     * @ORM\JoinColumn(nullable=false)
     */
    private $doctor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTimetableStatus(): bool
    {
        return $this->timetableStatus ?? true;
    }

    public function setTimetableStatus(bool $timetableStatus): self
    {
        $this->timetableStatus = $timetableStatus;

        return $this;
    }

    public function getTimetableEndTime(): ?DateTimeInterface
    {
        return $this->timetableEndTime;
    }

    public function setTimetableEndTime(DateTimeInterface $timetableEndTime): self
    {
        $this->timetableEndTime = $timetableEndTime;

        return $this;
    }

    public function getTimetableStartTime(): ?DateTimeInterface
    {
        return $this->timetableStartTime;
    }

    public function setTimetableStartTime(DateTimeInterface $timetableStartTime): self
    {
        $this->timetableStartTime = $timetableStartTime;

        return $this;
    }

    public function getTimetableWeekDay(): ?int
    {
        return $this->timetableWeekDay;
    }

    public function setTimetableWeekDay(int $timetableWeekDay): self
    {
        $this->timetableWeekDay = $timetableWeekDay;

        return $this;
    }

    public function getDoctor(): ?Doctor
    {
        return $this->doctor;
    }

    public function setDoctor(?Doctor $doctor): self
    {
        $this->doctor = $doctor;

        return $this;
    }

    public function __toString()
    {
        return $this->timetableStartTime . " - " . $this->timetableEndTime . ' по ' . $this->timetableWeekDay . ' дню недели';
    }
}

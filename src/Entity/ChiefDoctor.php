<?php

namespace App\Entity;

use App\Repository\ChiefDoctorRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChiefDoctorRepository::class)
 */
class ChiefDoctor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateInauguration;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDismissal;

    /**
     * @ORM\OneToOne(targetEntity=Department::class, inversedBy="chiefDoctor", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $department;

    /**
     * @ORM\OneToOne(targetEntity=Account::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $account;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateInauguration(): ?DateTimeInterface
    {
        return $this->dateInauguration;
    }

    public function setDateInauguration(DateTimeInterface $dateInauguration): self
    {
        $this->dateInauguration = $dateInauguration;

        return $this;
    }

    public function getDateDismissal(): ?DateTimeInterface
    {
        return $this->dateDismissal;
    }

    public function setDateDismissal(?DateTimeInterface $dateDismissal): self
    {
        $this->dateDismissal = $dateDismissal;

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(Department $department): self
    {
        $this->department = $department;

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

    public function __toString()
    {
        return $this->account . " " . $this->dateInauguration . " " . $this->department;
    }
}

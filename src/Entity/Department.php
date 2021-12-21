<?php

namespace App\Entity;

use App\Repository\DepartmentRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartmentRepository::class)
 */
class Department
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $departmentDescription;

    /**
     * @ORM\Column(type="date")
     */
    private $departmentDateCreate;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $departmentName;

    /**
     * @ORM\ManyToMany(targetEntity=Referral::class, inversedBy="departments")
     */
    private $referral;

    /**
     * @ORM\OneToOne(targetEntity=ChiefDoctor::class, mappedBy="departmentId", cascade={"persist", "remove"})
     */
    private $chiefDoctor;

    /**
     * @ORM\OneToMany(targetEntity=Doctor::class, mappedBy="departmentId", orphanRemoval=true)
     */
    private $doctors;

    public function __construct()
    {
        $this->referral = new ArrayCollection();
        $this->doctors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartmentDescription(): ?string
    {
        return $this->departmentDescription;
    }

    public function setDepartmentDescription(string $departmentDescription): self
    {
        $this->departmentDescription = $departmentDescription;

        return $this;
    }

    public function getDepartmentDateCreate(): ?DateTimeInterface
    {
        return $this->departmentDateCreate;
    }

    public function setDepartmentDateCreate(DateTimeInterface $departmentDateCreate): self
    {
        $this->departmentDateCreate = $departmentDateCreate;

        return $this;
    }

    public function getDepartmentName(): ?string
    {
        return $this->departmentName;
    }

    public function setDepartmentName(string $departmentName): self
    {
        $this->departmentName = $departmentName;

        return $this;
    }

    /**
     * @return Collection|Referral[]
     */
    public function getReferral(): Collection
    {
        return $this->referral;
    }

    public function addReferralId(Referral $referralId): self
    {
        if (!$this->referral->contains($referralId)) {
            $this->referral[] = $referralId;
        }

        return $this;
    }

    public function removeReferralId(Referral $referralId): self
    {
        $this->referral->removeElement($referralId);

        return $this;
    }

    public function getChiefDoctor(): ?ChiefDoctor
    {
        return $this->chiefDoctor;
    }

    public function setChiefDoctor(ChiefDoctor $chiefDoctor): self
    {
        // set the owning side of the relation if necessary
        if ($chiefDoctor->getDepartment() !== $this) {
            $chiefDoctor->setDepartment($this);
        }

        $this->chiefDoctor = $chiefDoctor;

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
            $doctor->setDepartment($this);
        }

        return $this;
    }

    public function removeDoctor(Doctor $doctor): self
    {
        if ($this->doctors->removeElement($doctor)) {
            // set the owning side to null (unless already changed)
            if ($doctor->getDepartment() === $this) {
                $doctor->setDepartment(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->departmentName;
    }
}

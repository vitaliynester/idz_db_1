<?php

namespace App\Entity;

use App\Repository\ReferralRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReferralRepository::class)
 */
class Referral
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $referralName;

    /**
     * @ORM\ManyToMany(targetEntity=Department::class, mappedBy="referralId")
     */
    private $departments;

    public function __construct()
    {
        $this->departments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReferralName(): ?string
    {
        return $this->referralName;
    }

    public function setReferralName(string $referralName): self
    {
        $this->referralName = $referralName;

        return $this;
    }

    /**
     * @return Collection|Department[]
     */
    public function getDepartments(): Collection
    {
        return $this->departments;
    }

    public function addDepartment(Department $department): self
    {
        if (!$this->departments->contains($department)) {
            $this->departments[] = $department;
            $department->addReferralId($this);
        }

        return $this;
    }

    public function removeDepartment(Department $department): self
    {
        if ($this->departments->removeElement($department)) {
            $department->removeReferralId($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->referralName;
    }
}

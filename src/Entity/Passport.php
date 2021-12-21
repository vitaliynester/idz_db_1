<?php

namespace App\Entity;

use App\Repository\PassportRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PassportRepository::class)
 */
class Passport
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
    private $birthday;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $passportSeries;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $passportNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $passportIssuedBy;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sex;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBirthday(): ?DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getPassportSeries(): ?string
    {
        return $this->passportSeries;
    }

    public function setPassportSeries(string $passportSeries): self
    {
        $this->passportSeries = $passportSeries;

        return $this;
    }

    public function getPassportNumber(): ?string
    {
        return $this->passportNumber;
    }

    public function setPassportNumber(string $passportNumber): self
    {
        $this->passportNumber = $passportNumber;

        return $this;
    }

    public function getPassportIssuedBy(): ?string
    {
        return $this->passportIssuedBy;
    }

    public function setPassportIssuedBy(string $passportIssuedBy): self
    {
        $this->passportIssuedBy = $passportIssuedBy;

        return $this;
    }

    public function getSex(): ?bool
    {
        return $this->sex;
    }

    public function setSex(bool $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function __toString()
    {
        return $this->passportSeries . " " . $this->passportNumber;
    }
}

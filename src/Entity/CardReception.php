<?php

namespace App\Entity;

use App\Repository\CardReceptionRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CardReceptionRepository::class)
 */
class CardReception
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $cardReceptionStartTime;

    /**
     * @ORM\Column(type="datetime")
     */
    private $cardReceptionEndTime;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cardReceptionConclusion;

    /**
     * @ORM\Column(type="string", length=3000)
     */
    private $cardReceptionInfo;

    /**
     * @ORM\OneToOne(targetEntity=Ticket::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ticket;

    /**
     * @ORM\ManyToOne(targetEntity=PatientCard::class, inversedBy="cardReceptions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patientCard;

    public function __construct()
    {
        $this->cardReceptionEndTime = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCardReceptionStartTime(): ?DateTimeInterface
    {
        return $this->cardReceptionStartTime;
    }

    public function setCardReceptionStartTime(DateTimeInterface $cardReceptionStartTime): self
    {
        $this->cardReceptionStartTime = $cardReceptionStartTime;

        return $this;
    }

    public function getCardReceptionEndTime(): ?DateTimeInterface
    {
        return $this->cardReceptionEndTime;
    }

    public function setCardReceptionEndTime(DateTimeInterface $cardReceptionEndTime): self
    {
        $this->cardReceptionEndTime = $cardReceptionEndTime;

        return $this;
    }

    public function getCardReceptionConclusion(): ?string
    {
        return $this->cardReceptionConclusion;
    }

    public function setCardReceptionConclusion(string $cardReceptionConclusion): self
    {
        $this->cardReceptionConclusion = $cardReceptionConclusion;

        return $this;
    }

    public function getCardReceptionInfo(): ?string
    {
        return $this->cardReceptionInfo;
    }

    public function setCardReceptionInfo(string $cardReceptionInfo): self
    {
        $this->cardReceptionInfo = $cardReceptionInfo;

        return $this;
    }

    public function getTicket(): ?Ticket
    {
        return $this->ticket;
    }

    public function setTicket(Ticket $ticket): self
    {
        $this->ticket = $ticket;

        return $this;
    }

    public function getPatientCard(): ?PatientCard
    {
        return $this->patientCard;
    }

    public function setPatientCard(?PatientCard $patientCard): self
    {
        $this->patientCard = $patientCard;

        return $this;
    }

    public function __toString()
    {
        return $this->id . " | " . $this->ticket;
    }
}

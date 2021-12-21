<?php

namespace App\Entity;

use App\Repository\AdministratorRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdministratorRepository::class)
 */
class Administrator
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
     * @ORM\Column(type="datetime")
     */
    private $lastInteraction;

    public function __construct()
    {
        $this->lastInteraction = new DateTime();
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

    public function getLastInteraction(): ?DateTimeInterface
    {
        return $this->lastInteraction;
    }

    public function setLastInteraction(DateTimeInterface $lastInteraction): self
    {
        $this->lastInteraction = $lastInteraction;

        return $this;
    }

    public function __toString()
    {
        return $this->id . " | " . $this->account;
    }
}

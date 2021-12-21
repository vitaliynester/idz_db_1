<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvoiceRepository::class)
 */
class Invoice
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
    private $invoiceStatus;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $invoicePrice;

    /**
     * @ORM\OneToOne(targetEntity=Ticket::class, inversedBy="invoice", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ticket;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvoiceStatus(): bool
    {
        return $this->invoiceStatus ?? false;
    }

    public function setInvoiceStatus(bool $invoiceStatus): self
    {
        $this->invoiceStatus = $invoiceStatus;

        return $this;
    }

    public function getInvoicePrice(): ?string
    {
        return $this->invoicePrice;
    }

    public function setInvoicePrice(string $invoicePrice): self
    {
        $this->invoicePrice = $invoicePrice;

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

    public function __toString()
    {
        return $this->invoicePrice . " за " . $this->ticket;
    }
}

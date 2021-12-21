<?php

namespace App\Controller\Admin;

use App\Entity\Ticket;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class TicketCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ticket::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            BooleanField::new('ticketPayable', 'Платный прием'),
            DateTimeField::new('ticketCreateTime', 'Дата приема')->setRequired(true),
            BooleanField::new('ticketStatus', 'Состоялся ли прием'),
            AssociationField::new('patient', 'Пациент')->setRequired(true),
            AssociationField::new('doctor', 'Врач')->setRequired(true),
            AssociationField::new('invoice', 'Счет оплаты'),
        ];
    }
}

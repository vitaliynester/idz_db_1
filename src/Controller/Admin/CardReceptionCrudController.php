<?php

namespace App\Controller\Admin;

use App\Entity\CardReception;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CardReceptionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CardReception::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateTimeField::new('cardReceptionStartTime', 'Дата начала приема')->setRequired(true),
            DateTimeField::new('cardReceptionEndTime', 'Дата окончания приема'),
            TextField::new('cardReceptionConclusion', 'Заключение врача')->setRequired(true)->setMaxLength(255),
            TextField::new('cardReceptionInfo', 'Выводы по болезни')->setRequired(true)->setMaxLength(3000),
            AssociationField::new('ticket', 'Талон приема')->setRequired(true),
            AssociationField::new('patientCard', 'Карта пациента')->setRequired(true),
        ];
    }
}

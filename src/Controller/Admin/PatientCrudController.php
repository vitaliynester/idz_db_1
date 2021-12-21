<?php

namespace App\Controller\Admin;

use App\Entity\Patient;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PatientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Patient::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('account', 'Аккаунт')->setRequired(true),
            TextField::new('patientSnills', 'СНИЛС')->setRequired(true)->setMaxLength(14),
            TextField::new('patientJms', 'Полис ОМС')->setRequired(true)->setMaxLength(16),
            AssociationField::new('patientCard', 'Карта пациента')->setRequired(true),
            AssociationField::new('tickets', 'Записи на прием')->hideOnDetail(),
        ];
    }
}

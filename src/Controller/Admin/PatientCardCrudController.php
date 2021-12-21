<?php

namespace App\Controller\Admin;

use App\Entity\PatientCard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class PatientCardCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PatientCard::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('patient', 'Пациент')->setRequired(true),
            DateField::new('patientCardCreateDate', 'Дата создания карточки')->hideOnForm(),
            AssociationField::new('cardReceptions', 'Карточки приема'),
        ];
    }
}

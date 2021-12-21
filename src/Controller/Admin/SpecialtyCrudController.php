<?php

namespace App\Controller\Admin;

use App\Entity\Specialty;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class SpecialtyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Specialty::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('specialtyName', 'Название')->setRequired(true),
            TimeField::new('specialtyDuration', 'Время приема')->setRequired(true),
            AssociationField::new('doctors', 'Врачи'),
        ];
    }
}

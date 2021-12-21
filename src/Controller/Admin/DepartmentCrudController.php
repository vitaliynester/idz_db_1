<?php

namespace App\Controller\Admin;

use App\Entity\Department;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DepartmentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Department::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('departmentName', 'Название')->setRequired(true)->setMaxLength(50),
            TextField::new('departmentDescription', 'Описание')->setRequired(true)->setMaxLength(2000)->hideOnIndex(),
            DateField::new('departmentDateCreate', 'Дата формирования отделения')->setRequired(true),
            AssociationField::new('referral', 'Направления'),
            AssociationField::new('chiefDoctor', 'Главврач')->setRequired(true),
            AssociationField::new('doctors', 'Врачи'),
        ];
    }
}

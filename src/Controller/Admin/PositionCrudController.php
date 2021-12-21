<?php

namespace App\Controller\Admin;

use App\Entity\Position;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PositionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Position::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('positionName', 'Название должности')->setRequired(true)->setMaxLength(50),
            MoneyField::new('positionSalary', 'ЗП по должности')->setRequired(true),
            AssociationField::new('doctors', 'Врачи'),
        ];
    }
}

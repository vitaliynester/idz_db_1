<?php

namespace App\Controller\Admin;

use App\Entity\Administrator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class AdministratorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Administrator::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('account', 'Аккаунт')->setRequired(true),
            DateTimeField::new('lastInteraction', 'Последнее взаимодействие')->hideOnForm(),
        ];
    }
}

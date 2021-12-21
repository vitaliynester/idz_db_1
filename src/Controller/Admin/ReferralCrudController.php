<?php

namespace App\Controller\Admin;

use App\Entity\Referral;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReferralCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Referral::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('referralName', 'Название направления')->setRequired(true)->setMaxLength(255),
            AssociationField::new('departments', 'Отделения'),
        ];
    }
}

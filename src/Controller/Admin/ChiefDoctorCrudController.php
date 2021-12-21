<?php

namespace App\Controller\Admin;

use App\Entity\ChiefDoctor;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class ChiefDoctorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ChiefDoctor::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateField::new('dateInauguration', 'Дата вступления в должность')->setRequired(true),
            DateField::new('dateDismissal', 'Дата выхода из должности')->setRequired(true),
            AssociationField::new('department', 'Отделение')->setRequired(true),
            AssociationField::new('account', 'Аккаунт')->setRequired(true),
        ];
    }
}

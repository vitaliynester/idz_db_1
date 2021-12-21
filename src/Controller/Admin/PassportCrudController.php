<?php

namespace App\Controller\Admin;

use App\Entity\Passport;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PassportCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Passport::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateField::new('birthday', 'День рождения')->setRequired(true),
            TextField::new('passportSeries', 'Серия паспорта')->setRequired(true)->setMaxLength(4),
            TextField::new('passportNumber', 'Номер паспорта')->setRequired(true)->setMaxLength(6),
            TextField::new('passportIssuedBy', 'Выдан кем')->setRequired(true)->setMaxLength(255)->hideOnIndex(),
            BooleanField::new('sex', 'Пол (мужской/женский)'),
        ];
    }
}

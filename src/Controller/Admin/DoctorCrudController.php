<?php

namespace App\Controller\Admin;

use App\Entity\Doctor;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DoctorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Doctor::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('cabinetNumber', 'Номер кабинета')->setMaxLength(4),
            IntegerField::new('doctorExperience', 'Стаж работы')->setRequired(true),
            AssociationField::new('account', 'Аккаунт')->setRequired(true),
            AssociationField::new('department', 'Отделение')->setRequired(true),
            AssociationField::new('specialty', 'Специальность')->setRequired(true),
            AssociationField::new('position', 'Должность')->setRequired(true),
            AssociationField::new('timetables', 'Расписания'),
            AssociationField::new('tickets', 'Талоны на прием'),
        ];
    }
}

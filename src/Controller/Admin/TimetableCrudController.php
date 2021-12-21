<?php

namespace App\Controller\Admin;

use App\Entity\Timetable;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class TimetableCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Timetable::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            BooleanField::new('timetableStatus', 'Активно ли расписание'),
            TimeField::new('timetableStartTime', 'Время начала работы')->setRequired(true),
            TimeField::new('timetableEndTime', 'Время завершения работы')->setRequired(true),
            IntegerField::new('timetableWeekDay', 'День недели расписания')->setRequired(true),
            AssociationField::new('doctor', 'Врач')->setRequired(true),
        ];
    }
}

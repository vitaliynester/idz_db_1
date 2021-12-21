<?php

namespace App\Controller\Admin;

use App\Entity\Account;
use App\Entity\Administrator;
use App\Entity\CardReception;
use App\Entity\ChiefDoctor;
use App\Entity\Department;
use App\Entity\Doctor;
use App\Entity\Invoice;
use App\Entity\Passport;
use App\Entity\Patient;
use App\Entity\PatientCard;
use App\Entity\Position;
use App\Entity\Referral;
use App\Entity\Specialty;
use App\Entity\Ticket;
use App\Entity\Timetable;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        return $this->redirect($routeBuilder->setController(AccountCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Медицинское учреждение');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Главная', 'fa fa-home');
        yield MenuItem::section('Взаимодействие с пользователем');
        yield MenuItem::linkToCrud('Паспорт', 'fas fa-list', Passport::class);
        yield MenuItem::linkToCrud('Аккаунт', 'fas fa-list', Account::class);
        yield MenuItem::linkToCrud('Пациент', 'fas fa-list', Patient::class);
        yield MenuItem::linkToCrud('Администратор', 'fas fa-list', Administrator::class);
        yield MenuItem::linkToCrud('Главный врач', 'fas fa-list', ChiefDoctor::class);
        yield MenuItem::linkToCrud('Врач', 'fas fa-list', Doctor::class);
        yield MenuItem::section('Взаимодействие с пациентом');
        yield MenuItem::linkToCrud('Карточка пациента', 'fas fa-list', PatientCard::class);
        yield MenuItem::linkToCrud('Талон на запись', 'fas fa-list', Ticket::class);
        yield MenuItem::linkToCrud('Счет на оплату', 'fas fa-list', Invoice::class);
        yield MenuItem::section('Взаимодействие с врачом');
        yield MenuItem::linkToCrud('Расписание', 'fas fa-list', Timetable::class);
        yield MenuItem::linkToCrud('Отделение', 'fas fa-list', Department::class);
        yield MenuItem::linkToCrud('Специальность', 'fas fa-list', Specialty::class);
        yield MenuItem::linkToCrud('Должность', 'fas fa-list', Position::class);
        yield MenuItem::linkToCrud('Направление отделения', 'fas fa-list', Referral::class);
        yield MenuItem::linkToCrud('Запись приема', 'fas fa-list', CardReception::class);

    }
}

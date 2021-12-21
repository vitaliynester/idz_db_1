<?php

namespace App\Controller\Admin;

use App\Entity\Account;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AccountCrudController extends AbstractCrudController implements EventSubscriberInterface
{
    /**
     * @var UserPasswordHasherInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public static function getEntityFqcn(): string
    {
        return Account::class;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => 'encodePassword',
            BeforeEntityUpdatedEvent::class => 'encodePassword',
        ];
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            EmailField::new('email', 'Электронная почта')->setRequired(true),
            ArrayField::new('roles', 'Роли'),
            TextField::new('password', 'Пароль')->setFormType(PasswordType::class)->hideOnIndex(),
            TextField::new('firstName', 'Имя')->setRequired(true)->setMaxLength(50),
            TextField::new('lastName', 'Фамилия')->setRequired(true)->setMaxLength(50),
            TextField::new('patronymic', 'Отчество')->setRequired(false)->setMaxLength(50),
            TextField::new('login', 'Логин')->setRequired(true)->setMaxLength(50),
            TextField::new('phoneNumber', 'Номер телефона')->setRequired(true)->setMaxLength(12),
            AssociationField::new('passport', 'Паспорт')->setRequired(true),
        ];
    }

    /** @internal */
    public function encodePassword($event)
    {
        $user = $event->getEntityInstance();
        if ($user instanceof Account && $user->getPassword()) {
            $user->setPassword($this->passwordEncoder->hashPassword($user, $user->getPassword()));
        }
    }
}

<?php

namespace App\Controller\Admin\Crud;

use App\Classes\EnumRoles;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setEntityLabelInSingular('Utilisateur')
            ->setEntityLabelInPlural('Utilisateurs');
    }

    public function configureActions(Actions $actions): Actions
    {
        return parent::configureActions($actions)
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->remove(Crud::PAGE_INDEX, Action::NEW);
    }

    public function configureFields(string $pageName): iterable
    {
        if ($pageName === Crud::PAGE_DETAIL) {
            yield IdField::new('id');
        }

        yield TextField::new('username');
        yield EmailField::new('email');
        yield DateTimeField::new('createdAt');
        if ($pageName === Crud::PAGE_DETAIL) {
            yield DateTimeField::new('updatedAt');
        }
        yield DateTimeField::new('last_login');
        yield BooleanField::new('hasConfirmEmail');
        yield ChoiceField::new('roles')->setChoices(EnumRoles::getRoles())->allowMultipleChoices()->setRequired(false);

        if ($pageName === Crud::PAGE_INDEX) {
            yield AssociationField::new('userIps');
        } else if ($pageName === Crud::PAGE_DETAIL) {
            yield ArrayField::new('userIps');
        }
    }
}

<?php

namespace App\Controller\Admin\Crud;

use App\Entity\User;
use App\Entity\UserIp;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserIpCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UserIp::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setEntityLabelInPlural('IPs');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('ip'),
        ];
    }
}

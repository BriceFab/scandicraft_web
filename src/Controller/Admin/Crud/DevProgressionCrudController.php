<?php

namespace App\Controller\Admin\Crud;

use App\Entity\DevProgression;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DevProgressionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DevProgression::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setEntityLabelInSingular('Maintenance')
            ->setEntityLabelInPlural('Maintenances');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            IntegerField::new('pourcentage'),
            BooleanField::new('under_maintenance'),
        ];
    }
}

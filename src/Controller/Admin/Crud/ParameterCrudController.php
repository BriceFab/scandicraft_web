<?php

namespace App\Controller\Admin\Crud;

use App\Entity\Parameter;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ParameterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Parameter::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setEntityLabelInSingular('Paramètre')
            ->setEntityLabelInPlural('Paramètres')
            ;
    }

    public function configureFields(string $pageName): iterable
    {

        yield TextField::new('value');
        yield TextField::new('param_type');
        yield TextareaField::new('description');
        yield DateField::new('expirationDate');
        yield DateTimeField::new('updatedAt');
        yield DateTimeField::new('createdAt');
    }
}

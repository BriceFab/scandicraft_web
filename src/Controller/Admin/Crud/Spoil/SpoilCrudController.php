<?php

namespace App\Controller\Admin\Crud\Spoil;

use App\Controller\Admin\Common\BaseCrudController;
use App\Entity\Spoil;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SpoilCrudController extends BaseCrudController
{
    public static function getEntityFqcn(): string
    {
        return Spoil::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setEntityLabelInSingular('Spoil')
            ->setEntityLabelInPlural('Spoils');
    }

    public function configureActions(Actions $actions): Actions
    {
        return parent::configureActions($actions)
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title');
        yield TextEditorField::new('description');
        yield $this->getImagesField();
    }
}

<?php

namespace App\Controller\Admin\Crud\Forum;

use App\Entity\ForumDiscussionAnswer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ForumDiscussionAnswerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ForumDiscussionAnswer::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setEntityLabelInSingular('Réponse')
            ->setEntityLabelInPlural('Réponses');
    }

    public function configureActions(Actions $actions): Actions
    {
        return parent::configureActions($actions)
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->remove(Crud::PAGE_INDEX, Action::NEW);
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextEditorField::new('message');
    }
}

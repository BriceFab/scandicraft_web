<?php

namespace App\Controller\Admin\Crud\News;

use App\Entity\News;
use App\Form\Admin\ImagesType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class NewsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return News::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $image = ImageField::new('thumbnail')->setBasePath($this->getParameter('path_upload_images'));
        if ($pageName == Crud::PAGE_NEW || $pageName == Crud::PAGE_EDIT) {
            $image->setProperty('imageFile');
            $image->setFormType(VichImageType::class);
        }

        return [
            TextField::new('title'),
            TextEditorField::new('content'),
            AssociationField::new('thumbnail'),
            CollectionField::new('images')
                ->setFormTypeOptions([
                    'delete_empty' => true,
                    'by_reference' => false,
                ])
            ->setCustomOptions([
                'allowAdd' => true,
                'allowDelete' => true,
                'entryType' => ImagesType::class,
                'showEntryLabel' => false,
            ])
//            $image,
//            ImageField::new('images'),
        ];
    }
}

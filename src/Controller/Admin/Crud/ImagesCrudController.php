<?php

namespace App\Controller\Admin\Crud;

use App\Entity\Images;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ImagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Images::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $image = ImageField::new('src')->setBasePath($this->getParameter('path_upload_images'));
        if ($pageName == Crud::PAGE_NEW || $pageName == Crud::PAGE_EDIT) {
            $image->setProperty('file');
            $image->setFormType(VichImageType::class);
        }

        return [
            TextField::new('name'),
            TextField::new('title')->hideOnIndex(),
            TextField::new('alt')->hideOnIndex(),
            TextField::new('image_key')->hideOnIndex(),
            $image,
            TextEditorField::new('description'),
        ];
    }
}

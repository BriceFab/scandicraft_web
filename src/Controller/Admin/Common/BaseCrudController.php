<?php

namespace App\Controller\Admin\Common;

use App\Form\Admin\ImagesType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;

abstract class BaseCrudController extends AbstractCrudController
{
    public function getImagesField($propertyName = 'images')
    {
        return CollectionField::new($propertyName)
            ->setFormTypeOptions([
                'delete_empty' => true,
                'by_reference' => false,
            ])
            ->setCustomOptions([
                'allowAdd' => true,
                'allowDelete' => true,
                'entryType' => ImagesType::class,
                'showEntryLabel' => false,
            ]);
    }

}

<?php

namespace App\Controller\Admin\Crud;

use App\Classes\EnumParamType;
use App\Entity\Parameter;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\FieldDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\FormBuilderInterface;

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
            ->setEntityLabelInPlural('Paramètres');
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('value');
        yield TextField::new('param_type')->hideOnForm();
        yield TextareaField::new('description');
        yield DateField::new('expirationDate');
        yield DateTimeField::new('updatedAt');
        yield DateTimeField::new('createdAt');
    }

    public function createEditFormBuilder(EntityDto $entityDto, KeyValueStore $formOptions, AdminContext $context): FormBuilderInterface
    {
        $fields = $entityDto->getFields();

        /** @var Parameter $entity */
        $entity = $entityDto->getInstance();
        if (!is_null($entity->getParamType())) {
            /** @var FieldDto $paramType */
            switch ($entity->getParamType()) {
                case EnumParamType::IMAGE:
                    $fields['file'] = (ImageField::new('file'))->setFieldFqcn(ImageField::class)->getAsDto();
                    unset($fields['value']);
                    break;
            }
        }

        $entityDto->setFields($fields);

        return parent::createEditFormBuilder($entityDto, $formOptions, $context);
    }

}

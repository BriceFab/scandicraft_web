<?php

namespace App\Controller\Admin;

use App\Classes\ParamKey;
use App\Controller\Admin\Crud\ParameterCrudController;
use App\Controller\Admin\Crud\UserCrudController;
use App\Entity\Parameter;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/%ADMIN_PATH%")
 * Class DashboardController
 * @package App\Controller\Admin
 */
class DashboardController extends AbstractDashboardController
{
    private $siteName;

    public function __construct(EntityManagerInterface $em)
    {
        $this->siteName = $em->getRepository(Parameter::class)->findActiveParam(ParamKey::SITE_NAME);
    }

    /**
     * @Route(name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle($this->siteName ?? 'Site');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'icon class', UserCrudController::getEntityFqcn());
        yield MenuItem::linkToCrud('Parameter', 'icon class', ParameterCrudController::getEntityFqcn());
    }
}

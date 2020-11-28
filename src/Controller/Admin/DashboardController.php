<?php

namespace App\Controller\Admin;

use App\Classes\EnumParamKey;
use App\Controller\Admin\Crud\ParameterCrudController;
use App\Controller\Admin\Crud\UserCrudController;
use App\Security\ParameterService;
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
    private $parameterService;

    public function __construct(ParameterService $parameterService)
    {
        $this->parameterService = $parameterService;
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
            ->setTitle($this->parameterService->getDatabaseParam(EnumParamKey::SITE_NAME));
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'icon class', UserCrudController::getEntityFqcn());
        yield MenuItem::linkToCrud('Parameter', 'icon class', ParameterCrudController::getEntityFqcn());
    }
}

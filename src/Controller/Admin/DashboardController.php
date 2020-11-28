<?php

namespace App\Controller\Admin;

use App\Classes\EnumParamKey;
use App\Controller\Admin\Crud\CasIndexCrudController;
use App\Controller\Admin\Crud\DevProgressionCrudController;
use App\Controller\Admin\Crud\ParameterCrudController;
use App\Controller\Admin\Crud\UserCrudController;
use App\Controller\Admin\Crud\UserIpCrudController;
use App\Service\ParameterService;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
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
        /** @var CrudUrlBuilder $routeBuilder */
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->redirect($routeBuilder->setController(UserCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle($this->parameterService->getDatabaseParam(EnumParamKey::SITE_NAME))
            ->setFaviconPath('favicon.ico')
            ->setTranslationDomain('messages');
    }

    public function configureCrud(): Crud
    {
        return parent::configureCrud()
            ->setDateFormat('dd.MM.YYYY')
            ->setDateTimeFormat('dd.MM.YYYY HH:mm');
    }

    public function configureMenuItems(): iterable
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            yield MenuItem::linktoRoute('Statistiques', 'fa fa-bar-chart', 'admin_dashboard');
        }

        if ($this->isGranted('ROLE_MANAGEUR')) {
            yield MenuItem::subMenu('Utilisateurs', 'fa fa-users')->setSubItems([
                MenuItem::linkToCrud('Joueurs', null, UserCrudController::getEntityFqcn()),
                MenuItem::linkToCrud('Historique IPs', null, UserIpCrudController::getEntityFqcn()),
            ]);
        }

        if ($this->isGranted('ROLE_ADMIN')) {
            yield MenuItem::subMenu('Maintenance', 'fa fa-tools')->setSubItems([
                MenuItem::linkToCrud('Progressions', null, DevProgressionCrudController::getEntityFqcn()),
            ]);
        }

        yield MenuItem::linkToCrud('Parameter', 'icon class', ParameterCrudController::getEntityFqcn());
    }
}

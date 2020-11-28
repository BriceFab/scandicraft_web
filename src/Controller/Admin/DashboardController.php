<?php

namespace App\Controller\Admin;

use App\Classes\EnumParamKey;
use App\Classes\EnumRoles;
use App\Controller\Admin\Crud\DevProgressionCrudController;
use App\Controller\Admin\Crud\Forum\ForumCategoryCrudController;
use App\Controller\Admin\Crud\Forum\ForumDiscussionAnswerCrudController;
use App\Controller\Admin\Crud\Forum\ForumDiscussionCrudController;
use App\Controller\Admin\Crud\Forum\ForumDiscussionStatusCrudController;
use App\Controller\Admin\Crud\Forum\ForumSubCategoryCrudController;
use App\Controller\Admin\Crud\ParameterCrudController;
use App\Controller\Admin\Crud\Spoil\SpoilCrudController;
use App\Controller\Admin\Crud\Spoil\SpoilGoalTypeCrudController;
use App\Controller\Admin\Crud\Spoil\SpoilShareCrudController;
use App\Controller\Admin\Crud\Store\StoreArticleCrudController;
use App\Controller\Admin\Crud\Store\StoreCategoryCrudController;
use App\Controller\Admin\Crud\Survey\SurveyAnswerCrudController;
use App\Controller\Admin\Crud\Survey\SurveyAnswerListCrudController;
use App\Controller\Admin\Crud\Survey\SurveyCrudController;
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
        // Stats
        if ($this->isGranted(EnumRoles::ROLE_ADMIN)) {
            yield MenuItem::linktoRoute('Statistiques', 'fa fa-bar-chart', 'admin_dashboard');
        }

        // Utilisateurs
        if ($this->isGranted(EnumRoles::ROLE_MANAGEUR)) {
            yield MenuItem::subMenu('Utilisateurs', 'fa fa-users')->setSubItems([
                MenuItem::linkToCrud('Joueurs', null, UserCrudController::getEntityFqcn()),
                MenuItem::linkToCrud('Historique IPs', null, UserIpCrudController::getEntityFqcn()),
            ]);
        }

        // Maintenance
        if ($this->isGranted(EnumRoles::ROLE_ADMIN)) {
            yield MenuItem::subMenu('Maintenance', 'fa fa-tools')->setSubItems([
                MenuItem::linkToCrud('Progressions', null, DevProgressionCrudController::getEntityFqcn()),
            ]);
        }

        if ($this->isGranted(EnumRoles::ROLE_MANAGEUR)) {
            // Forum
            yield MenuItem::subMenu('Forum', 'fa fa-comments')->setSubItems([
                MenuItem::linkToCrud('Categories', null, ForumCategoryCrudController::getEntityFqcn()),
                MenuItem::linkToCrud('Sous-categories', null, ForumSubCategoryCrudController::getEntityFqcn()),
                MenuItem::linkToCrud('Discussions', null, ForumDiscussionCrudController::getEntityFqcn()),
                MenuItem::linkToCrud('Réponses', null, ForumDiscussionAnswerCrudController::getEntityFqcn()),
                MenuItem::linkToCrud('Status', null, ForumDiscussionStatusCrudController::getEntityFqcn())->setPermission(EnumRoles::ROLE_ADMIN),
            ]);

            // Sondages
            yield MenuItem::subMenu('Sondages', 'fa fa-poll-h')->setSubItems([
                MenuItem::linkToCrud('Sondages', null, SurveyCrudController::getEntityFqcn()),
                MenuItem::linkToCrud('Réponses', null, SurveyAnswerCrudController::getEntityFqcn()),
                MenuItem::linkToCrud('Liste réponses', null, SurveyAnswerListCrudController::getEntityFqcn()),
            ]);
        }

        // Boutique
        if ($this->isGranted(EnumRoles::ROLE_ADMIN)) {
            yield MenuItem::subMenu('Boutique', 'fa fa-store')->setSubItems([
                MenuItem::linkToCrud('Catégories', null, StoreCategoryCrudController::getEntityFqcn()),
                MenuItem::linkToCrud('Catégories', null, StoreArticleCrudController::getEntityFqcn()),
            ]);
        }

        if ($this->isGranted(EnumRoles::ROLE_MANAGEUR)) {
            // Spoils
            yield MenuItem::subMenu('Spoils', 'fa fa-question')->setSubItems([
                MenuItem::linkToCrud('Spoils', null, SpoilCrudController::getEntityFqcn()),
                MenuItem::linkToCrud('Partages', null, SpoilShareCrudController::getEntityFqcn()),
                MenuItem::linkToCrud('Objectifs', null, SpoilGoalTypeCrudController::getEntityFqcn()),
            ]);

            // Équipe
        }

        // Paramètres
        if ($this->isGranted(EnumRoles::ROLE_ADMIN)) {
            // Réseaux

            // Paramètres
        }

        // Logs
        if ($this->isGranted(EnumRoles::ROLE_ADMIN)) {

        }

        yield MenuItem::linkToCrud('Parameter', 'icon class', ParameterCrudController::getEntityFqcn());
    }
}

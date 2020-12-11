<?php

namespace App\Controller;

use App\Repository\DevProgressionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommunityController extends AbstractController
{
    /**
     * @Route("/maintenances", name="maintenances", options={"sitemap"="true"})
     * @param DevProgressionRepository $repo
     * @return Response
     */
    public function showMaintenances(DevProgressionRepository $repo)
    {
        return $this->render('pages/maintenance/show.html.twig', [
            'maintenances' => $repo->listMaintenances(),
        ]);
    }
}

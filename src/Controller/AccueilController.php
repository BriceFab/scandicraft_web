<?php

namespace App\Controller;

use App\Repository\ImagesRepository;
use App\Repository\NewsRepository;
use App\Repository\SpoilRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     * @param ImagesRepository $imagesRepository
     * @param NewsRepository $newsRepository
     * @param SpoilRepository $spoilRepository
     * @return Response
     */
    public function index(ImagesRepository $imagesRepository, NewsRepository $newsRepository, SpoilRepository $spoilRepository): Response
    {
        return $this->render('pages/accueil/index.html.twig', [
            'home_slides' => $imagesRepository->findImagesByKey('home_slide_'),
            'last_spoils' => $spoilRepository->findLast(5),
            'last_news' => $newsRepository->findLast(5),
        ]);
    }

    /**
     * @Route("/jouer", name="jouer")
     * @Route("/play")
     * @Route("/join")
     */
    public function jouer()
    {
        return $this->render('pages/jouer/index.html.twig');
    }
}

<?php

namespace App\Controller;

use App\Repository\ImagesRepository;
use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     * @param ImagesRepository $imagesRepository
     * @param NewsRepository $newsRepository
     * @return Response
     */
    public function index(ImagesRepository $imagesRepository, NewsRepository $newsRepository): Response
    {
        return $this->render('pages/accueil/index.html.twig', [
            'home_slides' => $imagesRepository->findImagesByKey('home_slide_'),
            'last_news' => $newsRepository->findLastNews(2),
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

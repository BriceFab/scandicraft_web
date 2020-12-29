<?php

namespace App\Controller;

use App\Repository\ImagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     * @param ImagesRepository $imagesRepository
     * @return Response
     */
    public function index(ImagesRepository $imagesRepository): Response
    {
        return $this->render('pages/accueil/index.html.twig', [
            'home_slides' => $imagesRepository->findImagesByKey('home_slide_')
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

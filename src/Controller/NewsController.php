<?php

namespace App\Controller;

use App\Controller\Common\BaseController;
use App\Entity\News;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class NewsController
 * @package App\Controller
 * @Route("news")
 */
class NewsController extends BaseController
{

    /**
     * @Route("/{slug}", name="show_news", methods={"GET"})
     * @param News $news
     */
    public function show(News $news) {
        dd($news);
    }

}

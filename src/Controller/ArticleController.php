<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('article/homepage.html.twig');
    }

    /**
     * @Route("/news/{slug}", name="article_show")
     */
    public function show($slug)
    {
        $comments = [
            'This is my comments 1: I am awesome!',
            'This is my 2nd comments: What should I say?',
            'Third Comment: I\'m going on an all-asteroid diet',
        ];

        return $this->render(
            'article/show.html.twig', [
                'title'    => ucwords(str_replace('-', ' ', $slug)),
                'slug' => $slug,
                'comments' => $comments,
            ]
        );
    }

    /**
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     */
    public function toggleArticleHeart()
    {
        // TODO - actually heart/unheart the article

        return new JsonResponse(['hearts' => rand(5, 100)]);
    }

}
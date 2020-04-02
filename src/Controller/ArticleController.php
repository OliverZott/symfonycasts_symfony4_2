<?php

namespace App\Controller;

use Michelf\MarkdownInterface;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Console\Descriptor\MarkdownDescriptor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

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
     * @param $slug
     * @param MarkdownInterface $markdown
     * @return Response
     */
    public function show($slug, MarkdownInterface $markdown)
    {
        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!',
            'Woohoo! I\'m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];

        // Heredoc-String
        $articleContent = <<<EOF
Spicy jalapeno **bacon** ipsum dolor amet tongue chuck drumstick rump. Ground round boudin ham hock, 
alcatra sausage bacon landjaeger [pastrami](https://baconipsum.com). Burgdoggen venison turkey picanha. Cupim turducken shank short ribs 
tail pork loin short loin, filet mignon corned beef andouille ground round. Meatball pancetta shank, 
kielbasa strip steak pork bacon bresaola picanha leberkas sausage cow kevin.

Spicy jalapeno **bacon** ipsum dolor amet tongue chuck drumstick rump. Ground round boudin ham hock, 
alcatra sausage bacon landjaeger [pastrami](https://baconipsum.com). Burgdoggen venison turkey picanha. Cupim turducken shank short ribs 
tail pork loin short loin, filet mignon corned beef andouille ground round. Meatball pancetta shank, 
kielbasa strip steak pork bacon bresaola picanha leberkas sausage cow kevin.
EOF;

        $articleContent = $markdown->transform($articleContent);

        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'articleContent' => $articleContent,
            'slug' => $slug,
            'comments' => $comments,
        ]);
    }

    /**
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     */
    public function toggleArticleHeart($slug, LoggerInterface $logger)
    {
        // TODO - actually heart/unheart the article!

        $logger->info('Article is being hearted!');

        return new JsonResponse(['hearts' => rand(5, 100)]);
    }
}

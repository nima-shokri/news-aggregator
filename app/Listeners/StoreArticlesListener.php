<?php

namespace App\Listeners;

use App\Events\ArticlesFetchedEvent;
use App\Repositories\ArticleRepository;

class StoreArticlesListener
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function handle(ArticlesFetchedEvent $event)
    {
        $this->articleRepository->storeArticles($event->articles, $event->source);
    }
}
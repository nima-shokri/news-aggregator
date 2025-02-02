<?php
namespace App\Events;

use Symfony\Contracts\EventDispatcher\Event;

class ArticlesFetchedEvent extends Event
{
    public array $articles;
    public string $source;

    public function __construct(array $articles, string $source)
    {
        $this->articles = $articles;
        $this->source = $source;
    }
}
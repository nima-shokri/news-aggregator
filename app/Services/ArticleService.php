<?php

namespace App\Services;

use App\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Http;

class ArticleService
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function fetchAndStoreArticles(string $source, string $category, string $url, array $params)
    {
        $response = Http::get($url, $params);
        // dd($response->json());
        if (!$response->successful()) {
            throw new \Exception("Failed to fetch articles from $source");
        }

        $articles = [];
        if ($source == 'guardian')
            $articles = $response->json()['response']['results'] ?? [];
        else if ($source == 'nytimes')
            $articles = $response->json()['results'] ?? [];
        else if ($source == 'newsapi')
            $articles = $response->json()['articles'] ?? [];


        // dd($response->json());
        $parser = ArticleParserFactory::create($source, $category);

        foreach ($articles as $article) {
            // save article
            $normalizedArticle = $parser->parse($article);
            // dump($normalizedArticle);
            $this->articleRepository->save($normalizedArticle);
        }
    }
}

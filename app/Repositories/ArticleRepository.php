<?php
namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    public function save(array $articleData)
    {
        return Article::updateOrCreate(
            ['url' => $articleData['url']],
            $articleData
        );
    }

}
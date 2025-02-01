<?php
namespace App\Services;

use App\Services\Parsers\NewsAPIParser;
use App\Services\Parsers\GuardianParser;
use App\Services\Parsers\NYTimesParser;
use App\Services\Parsers\ArticleParserInterface;

class ArticleParserFactory
{
    public static function create(string $source,string $category): ArticleParserInterface
    {
        return match ($source) {
            'newsapi' => new NewsAPIParser($category),
            'guardian' => new GuardianParser($category),
            'nytimes' => new NYTimesParser(),
            default => throw new \Exception("Unknown source: $source"),
        };
    }
}
